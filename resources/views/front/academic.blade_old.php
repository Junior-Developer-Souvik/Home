@extends('front.layout.app')

@section('page-title', $seo->page_title)
@section('meta-title', $seo->meta_title)
@section('meta-description', $seo->meta_desc)
@section('meta-keywords', $seo->meta_keyword)

@section('section')

<section class="innerbanner" style="background-image: url('master/images/innerbanner1.jpg')">
    <div class="container">
        <div class="inner_bannercont">
            <h1 class="mb-0 text-uppercase">Academics</h1>
        </div>
    </div>
</section>

{{-- <section class="innerpage_firstcont">
    <div class="container">
        <div class="row py-5 justify-content-center">
            <div class="col-lg-12 col-md-12">
                <h1 class="text_blue">{{$data->tilte}}</h1>
                <span class="line_border"></span>
                <p>{!!$data->desc!!}</p>
            </div>
        </div>
    </div>
</section>

<section class="t_process py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-4">
                <h1 class="text_blue">Teaching Process</h1>
                <span class="line_border"></span>
            </div>
            @foreach ($TeachingProcess as $item)
                <div class="col-lg-3 col-md-6 py-lg-3 py-md-2 py-1">
                    <div class="process_cont">
                        <img src="{{$item->image}}" class="img-fluid" alt="">
                        <h5 class="mt-3">{{$item->title}}</h5>
                        <p class="">{{Str::limit($item->desc, 200)}}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>


<section class="ila" style="background-image: url('master/images/ilabg.jpg')">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-4">
                <h1 class="">Insightful <span>Literary Activities</span></h1>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-md-9 order-lg-1 order-md-1 order-2">
                <p class="text-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            </div>
            <div class="col-md-3 order-lg-2 order-md-2 order-1">
                <p class="textimg1"><img src="{{asset('master/images/ila_contbg1.jpg')}}" class="img-fluid w-100" alt=""><span></span></p>
            </div>
        </div>
        <div class="row align-items-center py-3">
            <div class="col-md-3 order-lg-1 order-md-1 order-1">
                <p class="textimg2"><img src="{{asset('master/images/ila_contbg2.jpg')}}" class="img-fluid w-100" alt=""><span></span></p>
            </div>
            <div class="col-md-9 order-lg-2 order-md-2 order-2">
                <p class="text-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-md-9 order-lg-1 order-md-1 order-2">
                <p class="text-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            </div>
            <div class="col-md-3 order-lg-2 order-md-2 order-1">
                <p class="textimg3"><img src="{{asset('master/images/ila_contbg3.jpg')}}" class="img-fluid w-100" alt=""><span></span></p>
            </div>
        </div>
    </div>
</section> --}}

<section class="digital_edge">
    <div class="container-fluid p-lg-0">
        <div class="row py-4 align-items-center">
            <div class="col-md-6 order-lg-1 order-md-1 order-1">
                <img src="{{asset('master/images/digital_edgebg1.webp')}}" class="img-fluid w-100 digital_contimg1" alt="">
            </div>
            <div class="col-lg-4 col-md-6 mt-lg-0 mt-md-0 mt-4 order-lg-2 order-md-2 order-2">
                <div class="digital_cont">
                    <h1 class="text_blue">The <br class="d-lg-block d-none">Digital Edge</h1>
                    <span class="line_border"></span>
                    <p>The Classrooms of Techno India Group World School are too good to resist. They are digital classrooms with multiple display systems such as digital panels, audio visual aids, digital display systems etc that make learning and teaching an enjoyable experience. Trained faculties will use digital contents on a daily basis making every topics of the curriculum vibrant with graphics, animations and video. A state-of-the-art Learning Management System based on the pedagogy of blended hybrid teaching–learning is the new normal. Right from Grade I, the students of Techno India Group World School will have the option of learning coding from experts from different domain.</p>
                </div>
            </div>
            <div class="col-lg-2 order-lg-3 order-md-3 order-3"></div>
        </div>
        <div class="row py-4 align-items-center">
            <div class="col-lg-2 order-lg-1 order-md-1 order-1"></div>
            <div class="col-lg-4 col-md-6 mt-lg-0 mt-md-0 mt-4 text-lg-right text-md-right order-lg-2 order-md-2 order-2">
                <div class="digital_cont float-lg-right float-md-right" id="digital_cont">
                    <h1 class="text_blue">Techno <br  class="d-lg-block d-none">Ace</h1>
                    <span class="line_border"></span>
                    <p>Integrated classroom coaching for competitive examinations like JEE (Main and Advance), NEET (UG), ICAR, NDA, CUET, NID/NIFT, CLAT and other entrance exams for UG study programs. The Program runs parallelly with the School Academic Year Planner. The coaching is held in the school right from standard six to standard twelve. during the school hours by specialised subject experts hired by Techno India Group. Regular Academic Mapping is done through scientifically designed mock tests and composite tests.</p>
                </div>
            </div>
            <div class="col-md-6 order-lg-3 order-md-3 order-1">
                <img src="{{asset('master/images/digital_edgebg2.jpg')}}" class="img-fluid w-100 digital_contimg2" alt="">
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
                    <a href="{{route('front.academic.index')}}" class="w-100">Academics</a>
                </div>
            </div>
          
        </div>
    </div>
</section>
@endsection