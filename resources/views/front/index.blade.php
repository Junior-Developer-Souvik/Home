@extends('front.layout.app')

@section('page-title', $seo->page_title)
@section('meta-title', $seo->meta_title)
@section('meta-description', $seo->meta_desc)
@section('meta-keywords', $seo->meta_keyword)
@php
    $previousYear = date("Y");
    // Get the previous year
    $currentYear = date("Y", strtotime("+1 year"));
@endphp
@section('section')
<style>
    .homebanner .row {
        /*align-items: flex-start;*/
    } 
    .academic_session_cont{
        width: 75%;
    }
    .form_box {
        /*background: #293b8d;*/
        background: rgba(41, 59, 141, 0.75);
        padding: 20px 30px 25px 30px;
        border-radius: 6px;
    }
    .form_box h2 {
        color: #fce013;
        text-transform: uppercase;
        font-weight: 600;
        font-size: 40px;
    }
    .form_box p {
        font-family: 'Poppins', sans-serif;
        font-weight: 200;
    }
    .form-group {
        margin-bottom: 17px;
    }
    .form_box .form-control {
        font-size: 15px !important;
        border-radius: 6px !important;
        font-family: 'Poppins', sans-serif;
        font-weight: 300 !important;
        height: 30px !important;
        background-color: #fff !important;
        padding: 4px 10px !important;
        color: #293b8c;
    }
    .form_box input.form-control::placeholder {
        color: #adb5ca !important;
    }
    .form_box .form-control[type="date"] {
        -webkit-appearance: none !important;
        -moz-appearance: none !important;
        appearance: none !important;
    }
    .form_box select.form-control {
        background-size: 10px;
    }
    .form_box form input[type="date"]::-webkit-calendar-picker-indicator { 
        background-image: none;
    }
    .submitbtn {
        padding: 8px 15px;
        color: #293b8d;
        background: #fce013;
        font-weight: 600;
        font-size: 14px;
        letter-spacing: 1px;
        border-radius: 6px;
        transition: 0.4s;
    }
    .submitbtn:hover {
        border: 1px solid #fce013;
        color: #fce013;
        background: none;
    }
    .error{
        color: #fff;
        font-family: 'Poppins', sans-serif;
        font-size: 12px;
    }
    .form_box .more-space {
            padding-left: 81px !important;
    }
    /*.founders_cont {*/
    /*    height: 100%;*/
    /*}*/
    .form_box .iti__selected-flag {
        height: 30px !important;
    }
    .form_box .error {
        color: #f34949; !important;
    }
    
    
    /* /Sydney W.A.C.E. curriculum_sec start / */
.curriculum_sec {
  height: 450px;
  background-size: cover;
  background-position: center center;
  background-repeat: no-repeat;
}
.curriculum_box{
  position: relative;
  height:450px;
}
.sydney_img_text{
  background-color: #293B8C;
  padding: 35px;
  position: absolute;
  content: "";
  width: 510px;
  top: 50%;
  left: 0;
  transform: translateY(-50%);
}
.sydney_img_text h2{
  font-size: 48px;
  font-weight: 700;
  color: #fff;
  margin-bottom: 10px;
  font-family: "Poppins", sans-serif;
  position: relative;
}
.sydney_img_text h2::before{
  position: absolute;
  content: "";
  background-color: #FFC107;
  width: 200px;
  height: 2px;
  left: 0;
  bottom: 0;
}
.sydney_img_text p{
  font-family: "Open Sans", sans-serif;
  font-size: 14px;
  font-weight: 400;
  color: #fff;
  margin-bottom: 40px;
  max-width: 430px;
}
.sydney_img_text_btn{
  font-family: "Open Sans", sans-serif;
  border: 1px solid #FFC107;
  border-radius: 4px;
  font-size: 12px;
  font-weight: bold;
  padding: 10px 20px;
  color: #FFC107;
} 
.sydney_img_text_btn:hover{
  background-color: #FFC107;
  color: #000;
  transition: all .3s ease-in-out;

}

/* /Sydney W.A.C.E. curriculum_sec end / */
/* /Responsive Sydney W.A.C.E. curriculum_sec start / */

@media (max-width: 575px) {
  .sydney_img_text h2 {
    font-size: 35px;
}
    .sydney_img_text p {
      margin-bottom: 30px;
      max-width: 310px;
  }
  .sydney_img_text {
    padding: 25px;
    width: 460px;
}
}
@media (max-width: 479px) {
  .sydney_img_text {
    padding: 15px;
    width: 265px;
}
.sydney_img_text h2 {
  font-size: 30px;
}
}
/* /Responsive Sydney W.A.C.E. curriculum_sec start / */
</style>
@php
$utm_source = $_GET['utm_source'] ?? "web";
$utm_medium = $_GET['utm_medium'] ?? "web";
$utm_campaign = $_GET['utm_campaign'] ?? "web";
$utm_term = $_GET['utm_term'] ?? "web";
$utm_content = $_GET['utm_content'] ?? "web";

@endphp
<section class="homebanner" style="background-image: url('master/images/homebanner1.jpg')">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12 text-right">
                <div class="banner_content">
                    <h1>THE WORLD IS <br>HER PLAYGROUND</h1>
                    {{-- <a href="#" type="submit" class="apply_now mt-4">Apply Now</a> --}}
                </div>
            </div>
            <div class="col-lg-6 col-md-12 desktop_form">
                <div class="form_box">
                    <form class="row" id="admissionsForm" method="POST" action="{{route('front.admission.form.submit')}}">
                        @csrf
                        <input type="hidden" name="utm_source" value="{{$utm_source}}">
                        <input type="hidden" name="utm_medium" value="{{$utm_medium}}">
                        <input type="hidden" name="utm_campaign" value="{{$utm_campaign}}">
                        <input type="hidden" name="utm_term" value="{{$utm_term}}">
                        <input type="hidden" name="utm_content" value="{{$utm_content}}">
                        <input type="hidden" id="cc" name="country_code" value="">
                        <h2 class="text-center w-100">ADMISSIONS OPEN</h2>
                        <p class="mb-0 text-center w-100 text-white">For the year {{$previousYear}}-{{$currentYear}} across classes </p>
                        <p class="mb-0 text-center w-100 text-white mb-3"> Nursery to Class IX and Class XI</p>
                        
                        <div class="form-group col-md-6 col-6">
                            <input type="text" class="form-control" id="student_first_name" name="student_first_name" placeholder="Student First Name*">
                            <label id="student_first_name-error" class="error" for="student_first_name"></label>
                        </div>
                        
                        <div class="form-group col-md-6 col-6">
                            <input type="text" class="form-control" id="student_last_name" name="student_last_name" placeholder="Student Last Name*">
                            <label id="student_last_name-error" class="error" for="student_last_name"></label>
                        </div>
                        
                        <div class="form-group col-md-5 col-6">
                            <!--<input type="date" class="form-control" id="dob" name="dob" placeholder="DOB*">-->
                            <input type="date" class="form-control" id="dob" name="dob" placeholder="Date of Birth*" pattern="\d{4}-\d{2}-\d{2}">
                            <label id="dob-error" class="error" for="dob"></label>
                        </div>
                        
                        <div class="form-group col-md-7 col-6">
                            <select class="form-control w-100" id="class" name="class">
                                <option selected disabled hidden>Class*</option>
                                @foreach ($ClassData as $item)
                                    <option value="{{$item->name}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                             <label id="class-error" class="error" for="class"></label>
                        </div>
                        
                        <div class="form-group col-md-6 col-6">
                            <input type="text" class="form-control" id="parent_first_name" name="parent_first_name" placeholder="Parent First Name*">
                             <label id="parent_first_name-error" class="error" for="parent_first_name"></label>
                        </div>
                        
                        <div class="form-group col-md-6 col-6">
                            <input type="text" class="form-control" id="parent_last_name" name="parent_last_name" placeholder="Parent Last Name*">
                             <label id="parent_last_name-error" class="error" for="parent_last_name"></label>
                        </div>
                        
                        <div class="form-group col-md-6 col-6 pr-lg-0 pr-md-0 pr-0">
                            <input id="mobile" type="tel" name="mobile" class="form-control more-space" placeholder="Enter mobile*" autofocus>
                             <label id="mobile-error" class="error" for="mobile"></label>
                        </div>
                        <div class="form-group col-md-2 col-3 px-lg-1 pl-md-1 pl-1">
                            <button type="button" class="btn otpbtn w-100" id="get_phone_otp">GET OTP</button>
                        </div>
                        <div class="form-group col-md-4 col-3 phone_otp_div">
                            <input type="text" class="form-control" id="otp" name="otp" placeholder="Enter OTP*">
                            <label id="otp-error" class="error" for="otp"></label>
                        </div>
                        
                        <div class="form-group col-md-7 col-6">
                            <input type="text" class="form-control" id="email" name="email" placeholder="Email*">
                             <label id="email-error" class="error" for="email"></label>
                        </div>
                        
                        <div class="form-group col-md-5 col-6">
                            <input type="text" class="form-control" id="pincode" name="pincode" placeholder="Residential Pin Code">
                             <label id="pincode-error" class="error" for="pincode"></label>
                        </div>
                        <div id="alertData"></div>
                        <div class="col-md-6 form-group">
                            <div class="g-recaptcha" data-sitekey="6Lfr-GApAAAAAPRmNChpaQxtH1EtihN-7OiDjOKt"></div>
                        </div>
                        
                        <div class="col-md-6 text-lg-right text-md-right text-center mt-lg-0 mt-md-0 mt-3">
                            <button type="submit" class="btn submitbtn" id="application_submit" disabled>Apply Now</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- {{dd($data->home->page)}} --}}
<section class="about">
    <div class="container">
        <div class="row card-group border-0 no-gutters">
          <div class="card col-lg-4 col-12 border-0 mt-lg-0 mt-md-0 mt-4">
            <h3 class="card-title mb-0 text-center curriculum">CURRICULUM</h3>
            <div class="card-body p-0">
                <div class="img_box">
                <img src="{{asset($data->home->curriculum_image)}}" class="img-fluid" alt="...">
              </div>
              <p class="card-text mt-lg-4 mt-md-4 mt-3">{!!$data->home->curriculum_desc!!}</p>
            </div>
            {{-- <div class="card-footer mt-3 border-0 p-0">
              <a href="#" class="more_link">Learn More <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
            </div> --}}
          </div>
          <div class="card col-lg-4 col-12 border-0 mt-lg-0 mt-md-0 mt-4">
            <h3 class="card-title mb-0 text-center ba">BEYOND ACADEMICS</h3>
            <div class="card-body p-0">
                <div class="img_box">
              <img src="{{asset($data->home->beyond_image)}}" class="img-fluid" alt="...">
              </div>
              <p class="card-text mt-lg-4 mt-md-4 mt-3">{!!$data->home->beyond_desc!!}</p>
            </div>
            {{-- <div class="card-footer mt-3 border-0 p-0">
              <a href="#" class="more_link">Learn More <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
            </div> --}}
          </div>
          <div class="card col-lg-4 col-12 border-0 mt-lg-0 mt-md-0 mt-4">
            <h3 class="card-title mb-0 text-center admis">ADMISSIONS</h3>
            <div class="card-body p-0">
                <div class="img_box">
              <img src="{{asset($data->home->admission_image)}}" class="img-fluid" alt="...">
              </div>
              <p class="card-text mt-lg-4 mt-md-4 mt-3">{!!$data->home->admission_desc!!}</p>
            </div>
            {{-- <div class="card-footer mt-3 border-0 p-0">
              <a href="#" class="more_link">Learn More <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
            </div> --}}
          </div>
        </div>
    </div>
</section>

{{-- Wace Section --}}
<section class="curriculum_sec" style="background-image: url('{{asset($data->home->background_image)}}');">
    <div class="container">
        <div class="curriculum_box">
            <div class="sydney_img_text">
                <h2>{{$data->home->tilte}}</h2>
                <p>{{$data->home->desc}}</p>
                <a href="{{$data->home->btn_link}}" class="sydney_img_text_btn">{{$data->home->btn_text}}</a>
            </div>
        </div>
    </div>
</section>
{{-- Wace Section --}}

<section class="school_walkthrough">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-9 col-md-12 text-center">
                <h1 class="text_blue">School Walkthrough</h1>
                <span class="line_border"></span>
                <p class="text-white">{{$data->home->walkthrough_desc}}</p>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-12 text-center">
                <div class="video">
                    <a href="{{$data->home->walkthrough_video}}" class="fresco"><img src="{{asset('master/images/video_bg.jpg')}}" class="img-fluid w-100"></a>
                    <span class="blob"><a href="{{$data->home->walkthrough_video}}" class="fresco"><img src="{{asset('master/images/video_icon.png')}}" class="img-fluid video_icon"></a></span>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="tiwss">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-7">
                <div class="tiwss_cont pr-lg-5">
                    <h1>TECHNO INDIA <br>WORLD SCHOOL SILIGURI</h1>
                    <p class="mt-4">Techno India Group Public School, Siliguri, inaugurated on March 17, 2006, stands as a beacon of quality education in the region. This co-educational English-medium institution, affiliated with CBSE, blends academic excellence with holistic development, catering to the diverse educational needs of students.</p>
                    {{-- <a href="#" class="more_link mt-3">Continue Reading <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a> --}}
                </div>
            </div>
            <div class="col-lg-4 col-md-5 mt-lg-0 mt-md-0 mt-4">
                <div class="important_announements">
                    <h5>Important Announements</h5>
                    <span class="mt-lg-4 mt-md-4 mt-2"> Admissions Open at our All-Girls' Day Boarding School
                    </span>
                    <p class="mt-3 mb-0">Admission Open for Academic Session 2024-25 for Nursery to Class 9 and Class 11
                    </p>
                    <div class="mt-3">
                        <a href="{{route('front.home')}}" class="btn btn-warning">Apply Now</a>
                    </div>
                 </div>
            </div>
        </div>
    </div>
</section>

<section class="choose_us">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7 text-center">
                <h1 class="text_blue">Why Choose Us</h1>
                <span class="line_border"></span>
            </div>
        </div>
        <div class="row mt-4">
            @foreach ($data->WhyChooseUs as $item)
                <div class="col-lg-3 col-md-6 mt-4">
                    <div class="choose_us_cont">
                        <span>
                            <img src="{{asset($item->image)}}" class="img-fluid" alt="">
                        </span>
                        <h5 class="">{{$item->title}}</h5>
                        <p class="">{{$item->desc}}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<section class="core_values">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-12 text-center">
                <h1 class="text_blue text-white">SCHOOL CORE VALUES</h1>
                <span class="line_border"></span>
                <p class="text-white">{{$data->home->core_value_desc}}</p>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-4 text-center mt-4">
                <div class="core_values_cont">
                    <img src="{{asset($data->home->core_value_image_1)}}" class="img-fluid mb-4" alt="">
                    <span>{{$data->home->core_value_title_1}}</span>
                </div>
            </div>
            <div class="col-md-4 text-center mt-4">
                <div class="core_values_cont">
                    <img src="{{asset($data->home->core_value_image_2)}}" class="img-fluid mb-4" alt="">
                    <span>{{$data->home->core_value_title_2}}</span>
                </div>
            </div>
            <div class="col-md-4 text-center mt-4">
                <div class="core_values_cont">
                    <img src="{{asset($data->home->core_value_image_3)}}" class="img-fluid mb-4" alt="">
                    <span>{{$data->home->core_value_title_3}}</span>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="founders" style="background-image: url('master/images/founders_bg.jpg')">
    <div class="container">
        <div class="row">
            <div class="col-md-7 order-lg-1 order-md-1 order-2">
                <div class="founders_cont">
                    <img src="{{asset('master/images/menbg.png')}}" class="img-fluid menbg" alt="">
                    <div class="founders_content">
                        <span class="text-white">"Together, we embark on a journey of transformation"</span>
                        <h5 class="mt-3">SRI SATYAM ROYCHOWDHURY</h5>
                        <p class="text-white mb-0"><span>Founder & Managing Director</span><br>Techno India Group</p>
                        <p class="text-white mb-0"><span>Chancellor</span><br> Sister Nivedita University<p>
                    </div>
                </div>
            </div>
            <div class="col-md-5 order-lg-2 order-md-2 order-1">
                <div class="founders_perspective">
                    <h1 class="mb-lg-5 mb-4">Founder’s Perspective</h1>
                    <p>{{$data->home->founder_perspective}}</p>
                    <!--<a href="#" class="more_link">Continue Reading <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>-->
                </div>
            </div>
        </div>
    </div>
</section>

{{-- <section class="notice_board" style="background-image: url('master/images/n_boardbg.jpg')">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text_blue mb-1">Notice Board</h1>
                <div class="notice_board_cont mt-4">
                <h3 class="text_blue">Day-Boarding & Residential Facilities Available</h3>
                <p class="text-right mb-0 mt-4">Post on; Tuesday, 21st March 2023</p>
                </div>
                <!-- <div class="col-md-12 text-center mt-4">
                    <a href="#" class="more_link">View More <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                </div> -->
            </div>
        </div>
    </div>
</section> --}}


<section class="gallery">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h1 class="text_blue text-uppercase">Gallery</h1>
                <span class="line_border"></span>
                <div class="owl-carousel owl-theme gallery_slide mt-lg-5 mt-4">
                    @foreach ($data->Gallery as $item)
                    @if($item->image)
                        <div class="item">
                            <a href="{{asset($item->image)}}" class="fresco" data-fresco-caption="Title 1" data-fresco-group="shared_options" data-fresco-group-options="ui: 'inside',overlay: { close: false }"><img src="{{asset($item->image)}}" class="img-fluid w-100"></a>
                        </div>
                    @else
                        <div class="item">
                            <div class="video">
                                <a href="{{ asset($item->video) }}" class="fresco" data-fresco-caption="Title 1" data-fresco-group="shared_options" data-fresco-group-options="ui: 'inside',overlay: { close: false }">
                                    
                                    <img src="{{asset('master/images/gallerybg1.jpg')}}" class="img-fluid w-100">
                                </a>
                                <span class="blob">
                                    <a href="{{ asset($item->video) }}" class="fresco">
                                        <img src="{{asset('master/images/video_icon.png')}}" class="img-fluid video_icon">
                                    </a>
                                </span>
                            </div>
                        </div>
                    @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
{{-- 
<section class="our_shool">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h1 class="text_blue text-uppercase">Blog</h1>
                <span class="line_border"></span>
            </div>
            <div class="col-lg-4 col-md-12 mt-4">
                <div class="school_tour">
                    <h5>School Video Tour</h5>
                    <span class="bottom_line"></span>
                </div>
                <div class="school_tour_cont mt-4">
                    <div class="video">
                        <a href="{{$data->home->walkthrough_video}}" class="fresco"><img src="{{asset('master/images/video_bg.jpg')}}" class="img-fluid w-100"></a>
                        <span class="blob"><a href="{{$data->home->walkthrough_video}}" class="fresco"><img src="{{asset('master/images/video_icon.png')}}" class="img-fluid video_icon"></a></span>
                    </div>
                    <p class="mt-3">{{Str::limit($data->home->walkthrough_desc, 200)}}</p>
                </div>
            </div>
            <div class="col-lg-8 col-md-12 mt-4">
                    <h5>School News & Updates</h5>
                    <span class="bottom_line"></span>
                    <div class="row mt-4">
                        @foreach ($data->blog as $item)
                            @php
                                $timestamp = strtotime($item->created_at);
                                $formattedDate = date("F j, Y", $timestamp);
                            @endphp
                            <div class="col-md-6 mb-2">
                                <div class="news_cont">
                                    <div class="row mb-4">
                                        <div class="col-md-3 col-3">
                                            <img src="{{asset($item->image)}}" class="img-fluid news_contbg" alt="">
                                        </div>
                                        <div class="col-md-9 col-9 pl-0">
                                            <div class="undates">
                                                <span>{{$formattedDate}} / BY {{$item->Auther?$item->Auther->name:""}}</span>
                                                <p class="mb-0 mt-2"><a href="{{route('front.blog.detail', $item->slug)}}">{{Str::limit($item->title, 100)}}</a></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="col-md-12">
                            <a href="#" class="more_link mt-2">Read More <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</section> --}}

<section class="academic_session">
    <div class="container">
        <div class="row">
            <div class="col-md-6"></div>
            <div class="col-md-6 pl-lg-5 pl-md-5">
                <div class="academic_session_cont">
                    <h2>Academic Session {{$previousYear}}-{{$currentYear}}</h2>
                    <h4 class="mt-lg-4 mt-md-4 mt-2">Admissions Open</h4>
                    <p class="text-white">Admissions are now open at our Techno India Group World School, where we nurture brilliance and foster a spirit of independence.</p>
                    <a href="#" type="submit" class="apply_now mt-4">Apply Now</a>
                </div>
            </div>
        </div>
    </div>
</section>


<!--<section class="testimonials py-5">-->
<!--    <div class="container">-->
<!--        <div class="row justify-content-center">-->
<!--            <div class="col-lg-8 col-md-12 text-center">-->
<!--                <h1 class="text_blue">Testimonials</h1>-->
<!--                <span class="line_border"></span>-->
<!--                {{-- <p>Document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available</p> --}}-->
<!--            </div>-->
<!--        </div>-->
<!--      <div class="row">-->
<!--        <div class="col-sm-12">-->
<!--          <div id="customers-testimonials" class="owl-carousel">-->
<!--            @foreach ($data->Testimonial as $item)-->
                <!--TESTIMONIAL 1 -->
<!--                <div class="item">-->
<!--                    <div class="shadow-lg p-4 bg-white rounded">-->
<!--                        <img src="{{$item->image}}" class="img-fluid" alt="">-->
<!--                        <h5 class="pt-2">{{$item->name}}</h5>-->
<!--                        <span>{{$item->designation}}</span>-->
<!--                        <p class="mb-0 text-muted">{{$item->desc}}</p>-->
<!--                    </div>             -->
<!--                </div>-->
<!--            @endforeach-->
<!--          </div>-->
<!--        </div>-->
<!--      </div>-->
<!--    </div>-->
<!--  </section>-->



<section class="counting" style="background-image: url('master/images/counting_bg.jpg')">
    <div class="container">
        <div class="row py-5">
            <div class="col-md-4 text-center">
                <div class="counting_cont">
                    <h2>{{$data->home->teacher_student_mentorship}}</h2>
                    <p>Teacher-Student mentorship</p>
                </div>
            </div>
            <div class="col-md-4 text-center">
                <div class="counting_cont">
                    <h2>{{$data->home->staff_only}}</h2>
                    <p>staff only</p>
                </div>
            </div>
            <div class="col-md-4 text-center">
                <div class="counting_cont">
                    <h2>{{$data->home->board_curriculum}}</h2>
                    <p>Board curriculum</p>
                </div>
            </div>
            <div class="col-md-6 text-center">
                <div class="counting_cont">
                    <h2>{{$data->home->a_pioneer_in_eastern_india}}</h2>
                    <p>A pioneer in Eastern India</p>
                </div>
            </div>
            <div class="col-md-6 text-center">
                <div class="counting_cont">
                    <h2>{{$data->home->area_of_school}}</h2>
                    <p>area of school</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>


<script>
   
   $(function(){
        var currentDate = new Date();
        var month = currentDate.getMonth() + 1;  
        // Note that getMonth() method returns a zero-based value (0 for January, 1 for February, and so on), so we add 1 to get the correct month number.
        var date = currentDate.getDate();
        var year = currentDate.getFullYear()-2;    //substract the year  by two to get a more recent result, you can change this number for your needs.
        
        if(month < 10){
            month = '0' + month.toString();   //if the value is less than 10 then add zero in front of it
        }

        if(date < 10){
            date = '0' + date.toString();      //if the date value less than 10 then add zero in front of it
        }

        var format  = year + '-' + month + '-' + date;   //date format YYYY-MM-DD
        $('#dob').attr('max',format);      // By max attribute , we can limit the range of date that user get can't choose the out of range dob


    });


    //
    $(document).ready(function() {
        $('#otp').keyup(function() {
            // Retrieve the value from the input field
            var inputValue = $(this).val();
            var mobile = $("#mobile").val();
            
            // Perform AJAX request if OTP length is sufficient
            if (inputValue.length >= 6) {
                $.ajax({
                    url: "{{ route('front.admission.check.otp') }}",
                    type: 'POST',
                    data: { 'otp': inputValue, 'mobile': mobile, '_token': '{{ csrf_token() }}'},
                    success: function(response) {
                        // Show the error message container
                        $("#otp-error").show();
                        
                        // Handle successful response
                        if (response.status == 200) {
                            // Display success message in green
                            $('#otp-error').text(response.message).css('color', 'white');
                            // Make OTP field read-only after successful verification
                            $('#otp').attr('readonly', true);
                            setTimeout(function() {
                                $("#otp-error").hide();
                                $("#get_phone_otp").hide();
                            }, 5000);
                        } else {
                            // Display error message in red
                            $('#otp-error').text(response.message).css('color', 'red');
                                setTimeout(function() {
                                $("#otp-error").hide();
                            }, 1000);
                        }
                        
                        // Hide the error message container after 1 second
                        
                    },
                    error: function(xhr, status, error) {
                        // Show the error message container
                        $("#otp-error").show();
                        // Display error message in red
                        $('#otp-error').text("OTP does not match.").css('color', 'red');
                        // Hide the error message container after 1 second
                        setTimeout(function() {
                            $("#otp-error").hide();
                        }, 1000);
                    }
                });
            }

        });
    });

    $(document).ready(function() {
                // Define the custom validation method
                $.validator.addMethod("lettersOnly", function(value, element) {
            return this.optional(element) || /^[a-zA-Z\s]+$/.test(value);
        }, "Letters only please");

        $('#admissionsForm').validate({
            rules: {
                student_first_name: "required",
                student_last_name: "required",
                dob: "required",
                class: "required",
                parent_first_name: {
                    required: true,
                    lettersOnly: true
                },
                parent_last_name:{
                    required: true,
                    lettersOnly: true
                },
                mobile: {
                    required: true,
                    digits: true,
                    minlength: 10,
                    maxlength: 10
                },
                pincode: {
                    required: true,
                    digits: true,
                    minlength: 6,
                    maxlength: 6
                },
                email: {
                    required: true,
                    email: true
                },
            
            },
            messages: {
                pincode: {
                    minlength: "Pincode must be at least 6 digits",
                    maxlength: "Pincode must not exceed 6 digits"
                },
                mobile: {
                    minlength: "Mobile number must be at least 10 digits",
                    maxlength: "Mobile number must not exceed 10 digits"
                },
                email: {
                    email: "Please enter a valid email address"
                },
                parent_first_name: {
                     lettersOnly: "Parent's first name must contain only letters"
                },
                parent_last_name: {
                      lettersOnly: "Parent's last name must contain only letters"
                }
            },
            submitHandler: function(form) {
                // Submit the form via AJAX
                 var country_code = $('.iti__selected-dial-code').text();
                  $('#application_submit').attr('disabled', true);
                $.ajax({
                    url: $(form).attr('action'),
                    type: $(form).attr('method'),
                    data: $(form).serialize() + "&country_code=" + country_code,
                    success: function(response) {
                        var alertClass = (response.status == 200) ? 'alert-success' : 'alert-danger';
                        var message = response.message;
                        var alertHtml = '<div class="alert ' + alertClass + '" role="alert">' + message + '</div>';
                        $('#alertData').append(alertHtml);
                       if (response.status == 500 && response.code==0) {
                            $(form)[0].reset(); // Reset the form
                       }
                        $('.alert').delay(5000).fadeOut('slow', function() {
                            $(this).remove();
                        });
                         $('#application_submit').attr('disabled', false);
                         if (response.status == 200) {
                              $(".error").hide();
                              $(form)[0].reset(); // Reset the form
                            setTimeout(function() {
                                window.location.href = response.route; 
                                $('#application_submit').attr('disabled', false);
                            }, 1000); // 1000 milliseconds = 1 second
                        }
                    },
                    error: function (xhr, status, error) {
                        // Handle error response
                        var errors = xhr.responseJSON.errors;
                        $.each(errors, function (key, value) {
                            $("#" + key + "-error").text(value[0]); // Assuming only the first error message needs to be displayed
                            $("#" + key + "-error").show(); // Show the error message block
                            
                            // Hide the error message block after 5 seconds
                            setTimeout(function() {
                                $("#" + key + "-error").hide();
                                 $('#application_submit').attr('disabled', false);
                            }, 3000);
                        });
                    }
                });
                return false; // Prevent default form submission
            }
        });

    });
    </script>
    <script>
         $(document).ready(function(){
            $('#datetimepicker2').datetimepicker({
                format: 'MM-DD-YYYY' // Set the desired date format
            });
            // $('#dob').datetimepicker({
            //     format: 'YYYY-MM-DD' // Set the desired date format
            // });
        });
        
        $('#get_phone_otp').click(function(){
            var phno = $('#mobile').val();
            $('#otp').attr('readonly', false);
            $('#otp').val("");
            var filter = /^\d*(?:\.\d{1,2})?$/;
            $("#mobile-error").hide(); // Hide error message initially
        
            if (!filter.test(phno)) {
                $('#mobile-error').html('Please enter a valid mobile number');
                $("#mobile-error").show(); // Show error message
            } else if (phno == '') {
                $('#mobile-error').html('Please enter mobile number');
                $("#mobile-error").show(); // Show error message
            } else if (phno.length != 10) {
                $('#mobile-error').html('Please enter a 10-digit mobile number');
                $("#mobile-error").show(); // Show error message
            } else {
                // Valid phone number
                $("#mobile-error").hide(); // Hide error message
                $('#get_phone_otp').prop('disabled', true);
                $('#mobile').prop('readonly', true);
                $('#get_phone_otp').html('OTP SENT');
                $('.phone_otp_div').show("slow");
                $.ajax({
                    url: "{{ route('front.admission.send.otp') }}",
                    type: "POST",
                    data: {
                        'phno': phno,
                        '_token': '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        if (response.status == 0) {
                            var alertHtml = '<div class="alert alert-danger" role="alert">Failed to send OTP. Please try again later.</div>';
                            $('#alertData').append(alertHtml);
                            // Remove the alert after 3 seconds
                            $('#application_submit').attr('disabled', true);
                            setTimeout(function() {
                                $('#alertData').empty();
                            }, 5000);
                        }else{
                            var alertHtml = '<div class="alert alert-success" role="alert">OTP sent successfully.</div>';
                            $('#alertData').append(alertHtml);
                            // Remove the alert after 3 seconds
                            $('#application_submit').attr('disabled', false);
                            setTimeout(function() {
                                $('#alertData').empty();
                            }, 5000);
                        }
                    },
                    error: function(xhr, status, error) {
                        var alertHtml = '<div class="alert alert-danger" role="alert">Failed to send OTP. Please try again later.</div>';
                        $('#alertData').append(alertHtml);
                        // Remove the alert after 3 seconds
                        setTimeout(function() {
                            $('#alertData').empty();
                            $('#get_phone_otp').prop('disabled', false);
                        }, 5000);
                    }
                });
                
                // Enable the button and change text back to "RESEND" after 30 seconds
                setTimeout(function() {
                    $('#get_phone_otp').prop('disabled', false);
                    $('#mobile').prop('readonly', false);
                    $('#get_phone_otp').html('RESEND');
                }, 60000);
            }
        });

        
        
        // -----Country Code Selection
        $("#mobile").intlTelInput({
          initialCountry: "in",
          separateDialCode: true
          // utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.4/js/utils.js"
        });

    </script>
    
@endsection