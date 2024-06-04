@extends('front.layout.app')


@section('section')
<section class="innerbanner" style="background-image: url('{{asset('master/images/innerbanner1.jpg')}}')">
  <div class="container">
      <div class="inner_bannercont">
          <h1 class="mb-0 text-uppercase">Founder Message</h1>
      </div>
  </div>
</section>

{{-- <section class="campus_security" style="background-image: url('master/images/campus_securitybg.jpg')">
  <div class="container">
      <div class="row">
          <div class="col-md-7 pr-lg-5">
              <h2 class="text_blue mb-3"></h2>
              <p></p>
              <img src="" class="img-fluid" alt="">
              <div class="facility_qa mt-4">
              </div>
          </div>
          <div class="col-md-5 pl-lg-5 mt-lg-0 mt-md-0 mt-5">
              <h2 class="text_blue mb-3">Founder Message</h2>
          </div>
      </div>
  </div>
</section> --}}

<section class="founder_message" style="background-image: url('master/images/founders_bg.jpg')">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <div class="founder_messagecont">
                    <h2 class="text_blue">Founder’s <br>Message</h2>
                    <span class="line_border"></span>
                    <p>I envision a future where our students not only excel academically but also grow into compassionate, visionary, and resilient individuals who will make a positive impact on their communities and beyond. Together, we embark on a journey of transformation-- nurturing brilliance, and fostering a world of strong and empowered women who will shape the future not only in India, but throughout the world! Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
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

<section class="project" style="background-image: url('./master/images/projectbg.jpg')">
  <div class="container">
      <div class="row">
            <div class="col-md-4 py-lg-0 py-md-0 py-2">
              <div class="form_btn">
                  <a href="{{route('front.facility.index')}}" class="w-100">Facilities</a>
              </div>
          </div>
          <div class="col-md-4 py-lg-0 py-md-0 py-2">
              <div class="form_btn">
                  <a href="{{route('front.academic.index')}}" class="w-100">Academics</a>
              </div>
          </div>
          <div class="col-md-4 py-lg-0 py-md-0 py-2">
              <div class="form_btn">
                  <a href="#" class="w-100">Admisions Open</a>
              </div>
          </div>
      </div>
  </div>
</section>
@endsection