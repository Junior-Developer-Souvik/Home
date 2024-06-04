<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Facility;
use App\Models\ContentAbout;
use App\Models\ContentContact;
use App\Models\ContentEpc;
use App\Models\Lead;
use App\Models\Category;
use App\Models\Job;
use App\Models\Collection;
use App\Models\Unit;
use App\Models\Subject;
use App\Models\Career;
use App\Models\CareerExperience;
use Illuminate\Support\Facades\DB;
use App\Models\SeoPage;
use App\Models\Event;
use Carbon\Carbon;
use App\Models\ContentHome;
use App\Models\Setting;
use App\Models\PageContent;
use App\Models\CarrerHigherStudies;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
// use Auth;

class ContentController extends Controller
{
    public function send(Request $request){
        try {
            $mail = new PHPMailer(true);
            //Server settings
            $mail->isSMTP();
            $mail->Host       = 'smtp.netcorecloud.net';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'technoapi';
            $mail->Password   = 'TIGws@2024';
            $mail->SMTPSecure = 'tls';
            $mail->Port       = 587;

            //Recipients
            $mail->setFrom('admin@technoindiagroupworldschool.com', 'TIGWS');
            $mail->addAddress('rajibalikhan299@gmail.com', 'Rajib');

            // Content
            $mail->isHTML(true);
            $mail->Subject = 'Application Form Received';
            $mail->Body = '<html><body>
                <p>Thank you for applying for the position of <em>&lt;position name&gt;</em> at Techno India Group World School.</p>
                <p>Your application has been received.</p>
                <p>Please note your Application ID: <strong>xxxxxxxxxx</strong>.</p>
                <p>In case of any query related to your application, please feel free to contact us on <strong>&lt;mobile number&gt;</strong>.</p>
            </body></html>';
            $mail->send();
            return response()->json(['message' => 'Email has been sent successfully.']);
        } catch (Exception $e) {
            return response()->json(['error' => 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo]);
        }
    }

    public function about(Request $request){
        $seo = SeoPage::where('page', 'ABOUT')->first();
        $data = PageContent::where('id', 2)->first();
        return view('front.content.about', compact('data', 'seo'));
    }

    public function contact(Request $request)
    {
        $seo = SeoPage::where('page', 'CONTACT')->first();
        $data = PageContent::where('id', 2)->first();
        $Setting = Setting::get();
        return view('front.content.contact', compact('data', 'seo', 'Setting'));
    }

    public function contactEnquiry(Request $request){
        $data = new Lead;
        $data->full_name = $request->full_name;
        $data->mobile_no = $request->callback_number;
        $data->message = $request->message;
        $data->save();
        if($data){
            return response()->json(['status'=>200, 'message' => 'Form  submitted successfully']);
        }else{
            return response()->json(['status'=>500, 'message' => 'Something went wrong please try again later']);
        }
    }

    
    public function career(){
        $data =Job::latest()->where('status', 1)->where('deleted_at', 1)->get();
        // Retrieve unique categories
        $uniqueCategories = Job::select('category')
        ->where('status', 1)
        ->where('deleted_at', 1)
        ->groupBy('category')
        ->pluck('category');

        // Retrieve unique locations
        $uniqueLocations = Job::select('location')->where('deleted_at', 1)
        ->where('status', 1)
        ->groupBy('location')
        ->pluck('location');
        return view('front.content.career', compact('data', 'uniqueCategories', 'uniqueLocations'));
    }
    public function confirmation(){
        return view('front.content.career-confirmation');
    }
   
    public function CareerApplicationForm($slug){
        $subject = Subject::latest()->where('deleted_at', 1)->where('status', 1)->get();
        $units = Unit::latest()->where('deleted_at', 1)->where('status', 1)->get();
        $posts = Collection::latest()->where('deleted_at', 1)->where('status', 1)->get();
        $Data = Job::where('slug', $slug)->first();
        if($Data){
            return view('front.content.career-form', compact('Data', 'subject','units', 'posts'));
        }else{
            return redirect()->back()->with('failure', 'Data not found!');
        }
    }
    public function RegisterEmailVerification(Request $request){
        $data = Career::where('email', $request->email)->first();
        if($data){
            return response()->json(['status'=>400, 'message' => 'This email is already registered. Please try again with a different email address.']);
        }else{
            $data = EmailVerification($request->email, $request->name);
            if($data!=false){
                return response()->json(['status'=>200, 'message' => 'OTP has been sent successfully.', 'data'=>$data]);
            }else{
                return response()->json(['status'=>500, 'message' => 'Oops! Something went wrong.']);
            }
        }
    }
    public function RegisterFinalSubmit(Request $request){
        DB::beginTransaction();
        $lastCareer = Career::latest()->first();
        try {
        if ($lastCareer) {
            $lastRegistrationId = $lastCareer->registration_id;
            $lastSerial = (int) substr($lastRegistrationId, strrpos($lastRegistrationId, '-') + 1);
            $nextSerial = $lastSerial + 1;
            $newRegistrationId = 'TIGWS-' . str_pad($nextSerial, 5, '0', STR_PAD_LEFT);
        } else {
            // If no previous data exists, start with 1
            $newRegistrationId = 'TIGWS-00001';
        }
        // Step 1: Insert data into the career table
        $career = new Career();
        $career->name = $request->name;
        $career->job_id = $request->job_id;
        $career->registration_id = $newRegistrationId;
        $career->father_name = $request->father_name;
        $career->phone = $request->phone;
        $career->email = $request->email;
        $career->date_of_birth = $request->date_of_birth; // Corrected
        $career->gender = $request->gender; // Corrected
        $career->merital_status = $request->merital_status; // Corrected
        $career->address = $request->address;
        $career->landmark = $request->landmark;
        $career->pincode = $request->pincode;
        $career->city = $request->city;
        $career->dist = $request->dist;
        $career->state = $request->state;
        $career->country = $request->country;
        $career->x_school_name = $request->x_school_name;
        $career->x_board_name = $request->x_board_name;
        $career->x_percentage = $request->x_percentage;
        $career->x_passing_year = $request->x_passing_year;
        $career->xii_school_name = $request->xii_school_name;
        $career->xii_board_name = $request->xii_board_name;
        $career->xii_percentage = $request->xii_percentage;
        $career->xii_passing_year = $request->xii_passing_year;
        // $career->after_xii_qualification = $request->after_xii_qualification;
        // $career->after_xii_institute_name = $request->after_xii_institute_name;
        // $career->after_xii_institute_board = $request->after_xii_institute_board;
        // $career->after_xii_institute_stream = $request->after_xii_institute_stream;
        // $career->after_xii_institute_percentage = $request->after_xii_institute_percentage;
        // $career->after_xii_institute_passing_year = $request->after_xii_institute_passing_year;
        $career->present_salary = $request->present_salary;
        $career->expected_salasry = $request->expected_salasry; // Corrected
        $career->join_time = $request->join_time;
        $career->know_anyone_at_tigs = $request->knowanyone;
        $career->referrence_details = $request->knowanyone == "Yes" ? $request->referrence_details : ""; // Corrected
        $career->applied_post = $request->applied_post;
        $career->unit_name = $request->unit_name;
        $career->subject = $request->subject;

        // Add more fields as needed

        $career->save();

        // Step 2: Check and store image files
        $imageFields = [
            'aadhar_card_file',
            'pan_card_file',
            'signature',
            'x_admit_card',
            'resume_file',
            'image_file'
        ];

        $baseUploadPath = 'uploads/form';
        foreach ($imageFields as $field) {
            if ($request->hasFile($field)) {
                $file = $request->file($field);
                // Generate a random 6-digit number
                $randomNumber = mt_rand(10000000, 99999999);
                // Get the current local time
                $localTime = now()->format('YmdHis'); // Format: YearMonthDayHourMinuteSecond

                // Concatenate the random number with the local time
                $uniqueIdentifier = $localTime . $randomNumber;
                // Get the original file extension
                $extension = $file->getClientOriginalExtension();
                // Generate the new filename with the original extension and random number
                $fileName = $uniqueIdentifier . '.' . $extension;
                // $filePath = $file->storeAs($baseUploadPath . $folder, $fileName); // Adjust the storage path as needed
                $filePath = $file->move($baseUploadPath, $fileName);
                // Store the file path in the database
                $career->$field = $filePath;
            }
        }

        // Save the career model again to update the file paths
        $career->save();


        // Step 3: Insert data into the CareerExperience table
        if ($request->has('experience_type') && $request->has('experience_duration')) {
            $experienceTypes = $request->experience_type;
            $experienceDurations = $request->experience_duration;

            foreach ($experienceTypes as $key => $type) {
                // Create a new CareerExperience instance
                $careerExperience = new CareerExperience();
                // Set attributes
                $careerExperience->career_id = $career->id;
                $careerExperience->experience_type = $type;
                $careerExperience->experience_duration = $experienceDurations[$key];
                $careerExperience->save(); // Assuming the relationship method is named 'experiences'
            }
        }
        

        if ($request->has('after_xii_qualification')) { 
            $after_xii_Qualifications = $request->after_xii_qualification;
            $after_xii_Institute_names = $request->after_xii_institute_name;
            $after_xii_Institute_boards = $request->after_xii_institute_board;
            $after_xii_Institute_streams = $request->after_xii_institute_stream;
            $after_xii_Institute_percentages = $request->after_xii_institute_percentage;
            $after_xii_Institute_passing_years = $request->after_xii_institute_passing_year;
        
            foreach ($after_xii_Qualifications as $key => $qualification) {
                // Create a new CarrerHigherStudies instance
                $carrerHigherStudies = new CarrerHigherStudies();
                // Set attributes
                $carrerHigherStudies->career_id = $career->id;
                $carrerHigherStudies->after_xii_qualification = $qualification;
                $carrerHigherStudies->after_xii_institute_name = $after_xii_Institute_names[$key];
                $carrerHigherStudies->after_xii_institute_board = $after_xii_Institute_boards[$key];
                $carrerHigherStudies->after_xii_institute_stream = $after_xii_Institute_streams[$key];
                $carrerHigherStudies->after_xii_institute_percentage = $after_xii_Institute_percentages[$key];
                $carrerHigherStudies->after_xii_institute_passing_year = $after_xii_Institute_passing_years[$key];
                $carrerHigherStudies->save(); 
              
            }
        }
   



        // Commit the transaction if all steps succeed
            DB::commit();

            // Return a success response or redirect
            FinalFormSubmitMail($career->id);
            session(['registration_id' => $career->registration_id]); 
            return response()->json(['status'=>200, 'message' => 'Data inserted successfully', 'data'=>$career->registration_id]);
        } catch (\Exception $e) {
            // If an exception occurs, rollback the transaction
            DB::rollBack();
            // Log the error or handle it accordingly
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }


   
    // Event
    public function EventData(Request $request){
        $content = PageContent::where('id', 9)->first();
        $seo = SeoPage::where('page', 'EVENTS')->first();
        $category = isset($request->category) && $request->category != "All" ? $request->category : 'All';

        $allCategories = Event::select('event_category')->where('status', 1)->where('deleted_at', 1)->groupBy('event_category')->get();

        $startDate = Carbon::now()->subDays(7); // Calculate start date as 7 days ago
        $endDate = Carbon::now(); // End date is current date
        $categoryCondition = ($category == 'All') ? [] : ['event_category' => $category];
        $ThisWeekEvents = Event::latest()
            ->where('status', 1) // Assuming 'status' is a boolean column
            ->where('deleted_at', 1) // Assuming 'deleted_at' is a nullable timestamp field
            ->whereBetween('created_at', [$startDate, $endDate])
            ->where($categoryCondition)
            ->get();

        $latestEventData = Event::latest()
            ->where('status', 1) // Assuming 'status' is a boolean column
            ->where('deleted_at', 1) // Assuming 'deleted_at' is a nullable timestamp field
            ->where($categoryCondition)
            ->limit(7)
            ->get();
        
        return view('front.content.event-list', compact('content', 'latestEventData', 'seo', 'ThisWeekEvents', 'allCategories'));
    }

    public function EventBySlug($slug){
        $seo = SeoPage::where('page', 'EVENTS')->first();
        $data = Event::where('slug', $slug)->first();
        if($data){
            $relatedData = Event::latest()
            ->where('status', 1) // Assuming 'status' is a boolean column
            ->where('deleted_at', 1) // Assuming 'deleted_at' is a nullable timestamp field
            ->where('event_category', $data->event_category)
            ->where('id', '!=', $data->id)
            ->limit(7)
            ->get();
          
            return view('front.content.event-details', compact('data', 'relatedData', 'seo'));
        }else{
            return view('front.error.404');
        }
    }
}
