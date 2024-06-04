@extends('front.layout.app')

@section('page-title', $seo->page_title)
@section('meta-title', $seo->meta_title)
@section('meta-description', $seo->meta_desc)
@section('meta-keywords', $seo->meta_keyword)

@section('section')


<section class="innerbanner" style="background-image: url('master/images/innerbanner1.jpg')">
    <div class="container">
        <div class="inner_bannercont">
            <h1 class="mb-0 text-uppercase">About</h1>
        </div>
    </div>
</section>

<section class="school_walkthrough">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <h1 class="text_blue">{{$data->tilte}}</h1>
                <span class="line_border"></span>
                <p class="text-white">{!!$data->desc!!}</p>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-12 text-center">
                <div class="video">
                    <a href="{{$data->about_videos}}" class="fresco"><img src="{{asset('master/images/techno.jpg')}}" class="img-fluid w-100"></a>
                    <span class="blob"><a href="{{$data->about_videos}}" class="fresco"><img src="{{asset('master/images/video_icon.png')}}" class="img-fluid video_icon"></a></span>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="founder_message" style="background-image: url({{asset('master/images/founders_bg.jpg')}})">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <div class="founder_messagecont">
                    <h2 class="text_blue">Founder’s <br>Message</h2>
                    <span class="line_border"></span>
                    <p>{{$data->about_founder_msg}}</p>
                </div>
            </div>
            <div class="col-md-5">
                <div class="founders_cont">
                    <img src="{{asset('master/images/menbg.png')}}" class="img-fluid menbg" alt="">
                    <div class="founders_content">
                        <h5>SRI SATYAM ROYCHOWDHURY</h5>
                        <p class="text-white mb-0">Founder & Managing Director<br>
                        Techno India Group</p>
                        <p class="text-white mb-0 mt-2"><span>Chancellor</span></p>
                        <p class="text-white mb-0">Sister Nivedita University</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="principal_message" style="background-image: url('master/images/principal_bg.jpg')">
    <div class="container">
        <div class="row">
            <div class="col-md-5 order-md-1 order-2">
                <div class="founders_cont">
                    <img src="{{asset('master/images/menbg.png')}}" class="img-fluid menbg" alt="">
                    <div class="founders_content">
                        <h5>SRI Akash ROYCHOWDHURY</h5>
                        <p class="text-white mb-0">Managing Director<br>
                        Techno India Group</p>
                        <p class="text-white mb-0 mt-2"><span>Chancellor</span></p>
                        <p class="text-white mb-0">Sister Nivedita University</p>
                    </div>
                </div>
            </div>
            <div class="col-md-7 order-md-2 order-1">
                <div class="principal_messagecont">
                    <h2 class="text_blue">Principal's <br>Message</h2>
                    <span class="line_border"></span>
                    <p>{{$data->about_principal_msg}}</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="project" style="background-image: url('./master/images/projectbg.jpg')">
    <div class="container">
        <div class="row">
            <div class="col-md-6 py-lg-0 py-md-0 py-2">
                <div class="form_btn">
                    <a href="{{route('front.home')}}" class="w-100">Admisions Open</a>
                </div>
            </div>
            {{-- <div class="col-md-4 py-lg-0 py-md-0 py-2">
                <div class="form_btn">
                    <a href="{{route('front.facility.index')}}" class="w-100">Facilities</a>
                </div>
            </div> --}}
            <div class="col-md-6 py-lg-0 py-md-0 py-2">
                <div class="form_btn">
                    <a href="{{route('front.academic.index')}}" class="w-100">Academics and Contact Us</a>
                </div>
            </div>
          
        </div>
    </div>
</section>
@endsection