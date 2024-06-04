<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Gallery;
use App\Models\NationProduct;
use App\Models\Partner;
use App\Models\Blog;
use App\Models\ContentHome;
use App\Models\Certificate;
use App\Models\CaseStudy;
use App\Models\Testimonial;
use App\Models\SeoPage;
use App\Models\PageContent;
use App\Models\WhyChooseUs;
use App\Models\TeachingProcess;
use App\Models\ExtraCurricular;
use App\Models\Facility;
use App\Models\Faculty;
use App\Models\MobileOtp;
use App\Models\DailySchedule;
use App\Models\StudentClass;
use App\Models\AdmissionForm;
use App\Models\Wace;
use App\Models\WaceNew;
use App\Models\WaceNewTab;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
class IndexController extends Controller
{

    // Wace
    public function wace(){
        $waceData = Wace::where('id',1)->first();
        // dd($waceData);
        $all_wace_New_Tab_Data = [];
        $wace_New_Data = WaceNew::where('page_content_id',29)->get();
        // dd($wace_New_Data);
            if ($wace_New_Data->isNotEmpty()) {                  
                $all_wace_New_Tab_Data = [];
                foreach ($wace_New_Data as $wace_New) {
                    $wace_New_Tab_Data = WaceNewTab::where('wace_new_id', $wace_New->id)->get();

                    $all_wace_New_Tab_Data[$wace_New->id] = $wace_New_Tab_Data;
                }
            //  dd($all_wace_New_Tab_Data);
            } 
         return view('front.wace',compact('waceData','wace_New_Data','all_wace_New_Tab_Data'));
    }

    public function index(Request $request)
    {
        $data = (object)[];
        $data->home = PageContent::where('id', 1)->first();
        $data->WhyChooseUs = WhyChooseUs::where('status', 1)->latest('id')->get();
        $data->Gallery = Gallery::latest('id')->get();
        $data->blog = Blog::where('status', 1)->where('deleted_at', 1)->limit(6)->get();
        $data->Testimonial = Testimonial::where('status', 1)->latest('id')->get();
        $seo = SeoPage::where('page', 'HOME')->first();
        $ClassData = StudentClass::where('status', 1)->where('deleted_at', 1)->orderBy('id', "DESC")->get();
        return view('front.index', compact('data', 'seo', 'ClassData'));
    }

    
    public function founderMessage(Request $request){
          return view('front.founder-message');
    }
    public function AdmissionFormSubmit(Request $request){
        // dd($request->all());
        Validator::extend('valid_otp', function ($attribute, $value, $parameters, $validator) {
            // Extract the mobile number from the request
            $mobileNumber = $validator->getData()['mobile'];
        
            // Check if there's a matching record in the mobile_otp table
            $count = DB::table('mobile_otp')
                ->where('mobile', $mobileNumber)
                ->where('otp', $value)
                ->count();
        
            // Return true if there's a matching record, false otherwise
            return $count > 0;
        });
        $validator = Validator::make($request->all(), [
            'student_first_name' => 'required|string',
            'student_last_name' => 'required|string',
            'dob' => 'required|date',
            'class' => 'required|string',
            'otp' => 'required|digits:6|valid_otp',
            'parent_first_name' => 'required|string',
            'parent_last_name' => 'required|string',
            'country_code' => 'nullable|string',
            'mobile' => 'required|digits:10', // Ensure exactly 10 digits
            'email' => 'required|email',
            'pincode' => 'required|string|min:6|max:6', // Ensure exactly 6 characters
            // Add your other fields here if needed
        ], [
            'otp.required' => 'The OTP is required.',
            'otp.digits' => 'The OTP must be exactly 6 digits.',
            'otp.valid_otp' => 'The OTP entered is invalid.',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors(),
                'message' => 'Validation failed'
            ], 422);
        }
        if ($request->has('g-recaptcha-response') && !empty($request->input('g-recaptcha-response'))) {
            $secretKey  = '6Lfr-GApAAAAAHrFO1oAwczk879YnPt1158RQQbD';
            // Verify the reCAPTCHA API response
            $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secretKey.'&response='.$request->input('g-recaptcha-response'));
            
            // Decode JSON data of API response
            $responseData = json_decode($verifyResponse);
           if($responseData->success){
                DB::beginTransaction();
                try {
                    $data = new AdmissionForm;
                    $data->name = $request->student_first_name . ' ' . $request->student_last_name;
                    $data->dob = $request->dob;
                    $data->class = $request->class;
                    $data->parent_name = $request->parent_first_name . ' ' . $request->parent_last_name;
                    $data->country_code = $request->country_code?'+'.$request->country_code:"";
                    $data->mobile = $request->mobile;
                    $data->email = $request->email;
                    $data->pincode = $request->pincode;
                    $data->utm_source = $request->utm_source;
                    $data->utm_medium = $request->utm_medium;
                    $data->utm_campaign = $request->utm_campaign;
                    $data->utm_term = $request->utm_term;
                    $data->utm_content = $request->utm_content;
                    $data->save();
                    DB::commit();
                    $route = route('front.thankyou');
                    return response()->json(['status'=>200, 'message' => 'Form  submitted successfully', 'route'=>$route]);
                } catch (\Exception $e) {
                    DB::rollback();
                    return response()->json(['status'=>500, 'message' => 'Something went wrong please try again later', 'code'=>0]);
                }
           }else{
               return response()->json(['status'=>500, 'message' => 'reCAPTCHA verification failed', 'code'=>1]);
           }
        }else{
           return response()->json(['status'=>500, 'message' => 'Please check the reCAPTCHA checkbox.', 'code'=>1]);
        }

        
    }
    
    public function TIGSendOTP(Request $request){
        $rand = rand(100000,999999);
        // $rand = 123456;
        $mobile_otp = MobileOtp::where('mobile', $request->phno)->first();
        
        // If the mobile number exists, update the OTP
        if ($mobile_otp) {
            $mobile_otp->otp = $rand; 
            $mobile_otp->save();
        }
        // If the mobile number doesn't exist, create a new record
        else {
            $mobile_otp = new MobileOtp;
            $mobile_otp->mobile = $request->phno; // Use '=' instead of '=>'
            $mobile_otp->otp = $rand; // Use '=' instead of '=>'
            $mobile_otp->save();
        }
        $phno = $request->phno;
        $message = "Greetings from TIG World School. Your OTP for mobile number validation is " . $rand;
        /*API URL*/
        $url = 'http://103.16.101.52:8080/bulksms/bulksms?username=TI98-tigws&password=Wxyz1234&type=0&dlr=1&destination='.$phno.'&source=TIGADM&message='.urlencode($message).'&entityid=1701159369924804056&tempid=1707171169314579681';
        //exit;
        $ch = curl_init();
        curl_setopt_array($ch, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_SSL_VERIFYHOST => 0,
            CURLOPT_SSL_VERIFYPEER => 0
        ));
        /* get response */
        $output = curl_exec($ch);
        /* Print error if any */
        if(curl_errno($ch)) {
            echo 'error:' . curl_error($ch);
            $output = ["status" => "0"];
        } else {
            $output = ["status" => "1", "code" => $rand];
        }    
        curl_close($ch);
        return response()->json($output);

    }
    public function TIGCheckOTP(Request $request){
         $count = DB::table('mobile_otp')
                ->where('mobile', $request->mobile)
                ->where('otp', $request->otp)
                ->count();
                if($count>0){
                    return response()->json(['status'=>200, 'message' => 'Verified!']);
                }else{
                    return response()->json(['status'=>500, 'message' => 'OTP does not match.']);
                }
    }
    public function academics(Request $request){
        $data = PageContent::where('id', 11)->first();
        $TeachingProcess = TeachingProcess::latest()->where('status', 1)->get();
        $seo = SeoPage::where('page', 'ACADEMICS')->first();
        return view('front.academic', compact('data', 'seo', 'TeachingProcess'));
    }
    public function extra_curricular(Request $request){
        $data = PageContent::where('id', 8)->first();
        $seo = SeoPage::where('page', 'EXTRA CURRICULAR')->first();
        $ExtraCurricular = ExtraCurricular::latest()->get();
        return view('front.curricular', compact('data', 'seo','ExtraCurricular'));
    }
    public function schedule(Request $request){
        $data = PageContent::where('id', 4)->first();
        $seo = SeoPage::where('page', 'DAILE SCHEDULE')->first();
        $classData = StudentClass::orderBy('id', "ASC")->get();
        $DailySchedule = DailySchedule::with('ScheduleData')->latest()->where('status', 1)->where('deleted_at', 1)->get();
        return view('front.schedule', compact('data', 'seo','DailySchedule', 'classData'));
    }
     // Facility
     public function facility(){
        $seo = SeoPage::where('page', 'FACILITIES')->first();
        $content = PageContent::where('id', 7)->first();
        $data = Facility::with('SubFacilityData')
        ->latest()
        ->where('status', 1)
        ->where('deleted_at', 1)
        ->inRandomOrder() // Shuffle the results
        ->get();
        return view('front.content.facility', compact('data', 'seo', 'content'));
    }
    public function facilityBySlug($slug){
        $seo = SeoPage::where('page', 'FACILITIES')->first();
        $content = PageContent::where('id', 7)->first();
        $data = Facility::with('SubFacilityData')
        ->latest()
        ->where('status', 1)
        ->where('deleted_at', 1)
        ->where('slug', $slug)
        ->first();
        $relatedData = Facility::with('SubFacilityData')
        ->latest()
        ->where('status', 1)
        ->where('deleted_at', 1)
        ->where('id', '!=', $data->id)
        ->inRandomOrder() // Shuffle the results
        ->get();
        if($data){
            return view('front.content.facility_details', compact('data', 'seo', 'content', 'relatedData'));
        } else{
            return view('front.error.404');
        }
    }
     // Faculty
     public function faculty(){
        $seo = SeoPage::where('page', 'FACULTY')->first();
        $content = PageContent::where('id', 6)->first();
        $class_name = Faculty::select('class_name')->where('status', 1)->where('deleted_at', 1)->groupBy('class_name')->get();
        $data = Faculty::latest()->where('status', 1)->where('deleted_at', 1)->get();
        return view('front.faculty', compact('data', 'seo', 'content', 'class_name'));
    }

    public function dynamicPage($slug){
       $pageData = PageContent::where('slug', $slug)->first();
       if($pageData){
        return view('front.dynamic', compact('pageData'));
       }else{
        return view('front.error.404');
       }
    }
    public function thankyou(){
          return view('front.thank_you');
    }
}
