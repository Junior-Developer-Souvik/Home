@extends('front.layout.app')

{{-- @section('page-title', $seo->page_title)
@section('meta-title', $seo->meta_title)
@section('meta-description', $seo->meta_desc)
@section('meta-keywords', $seo->meta_keyword) --}}

@section('section')
<section class="innerbanner" style="background-image: url('./images/innerbanner1.jpg')">
    <div class="container">
        <div class="inner_bannercont">
            <h1 class="mb-0 text-uppercase">Facilities</h1>
        </div>
    </div>
</section>

<section class="innerpage_firstcont">
    <div class="container">
        <div class="row py-5 justify-content-center">
            <div class="col-lg-12 col-md-12">
                <h1 class="text_blue">Page Description</h1>
                <span class="line_border"></span>
                <p>Techno India Group World School is conceived not just as a school but as a platform to nurture excellence in each child under its umbrella and to cultivate the nation’s dream. The origin of this can be traced back to the launch of Techno India Group Public School, more than one and a half decades ago. Our proven model speaks volumes about our passion and acceptability among Generation Y and their parents.</p>
            </div>
        </div>
    </div>
</section>

<section class="campus_security" style="background-image: url('./images/campus_securitybg.jpg')">
    <div class="container">
        <div class="row">
            <div class="col-md-7 pr-lg-5">
                <h2 class="text_blue mb-3">Campus Security</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                <img src="images/as_bg.jpg" class="img-fluid" alt="">
                <div class="facility_qa mt-4">
                    <div class="accordion" id="accordionExample">
                    <div class="card mb-2 border-0">
                        <div class="card-header p-0 m-0" id="headingOne">
                            <h2 class="clearfix mb-0">
                                <a class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Dapibus ac facilisis in <i class="material-icons">add</i></a>                                  
                            </h2>
                        </div>
                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                            <div class="card-body">
                                <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-2 border-0">
                        <div class="card-header p-0 m-0" id="headingTwo">
                            <h2 class="mb-0">
                                <a class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Morbi leo risus <i class="material-icons">add</i></a>
                            </h2>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                            <div class="card-body">
                                <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-2 border-0">
                        <div class="card-header p-0 m-0" id="headingThree">
                            <h2 class="mb-0">
                                <a class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">Porta ac consectetur ac <i class="material-icons">add</i></a>                     
                            </h2>
                        </div>
                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                            <div class="card-body">
                                <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-2 border-0">
                        <div class="card-header p-0 m-0" id="headingFour">
                            <h2 class="mb-0">
                                <a class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">Vestibulum at eros <i class="material-icons">add</i></a>                               
                            </h2>
                        </div>
                        <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
                            <div class="card-body">
                                <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
            <div class="col-md-5 pl-lg-5 mt-lg-0 mt-md-0 mt-5">
                <h2 class="text_blue mb-3">Other Facilities</h2>

                <div class="media cs_box">
                  <img src="images/cs_box_cont_icon2.png" class="align-self-center mr-3" alt="...">
                  <div class="media-body pl-5">
                    <p class="mb-0">School Bus Security</p>
                  </div>
                </div>
                <div class="media cs_box">
                  <img src="images/cs_box_cont_icon2.png" class="align-self-center mr-3" alt="...">
                  <div class="media-body pl-5">
                    <p class="mb-0">School Bus Security</p>
                  </div>
                </div>
                <div class="media cs_box">
                  <img src="images/cs_box_cont_icon2.png" class="align-self-center mr-3" alt="...">
                  <div class="media-body pl-5">
                    <p class="mb-0">School Bus Security</p>
                  </div>
                </div>
                <div class="media cs_box">
                  <img src="images/cs_box_cont_icon2.png" class="align-self-center mr-3" alt="...">
                  <div class="media-body pl-5">
                    <p class="mb-0">School Bus Security</p>
                  </div>
                </div>
                <div class="media cs_box">
                  <img src="images/cs_box_cont_icon2.png" class="align-self-center mr-3" alt="...">
                  <div class="media-body pl-5">
                    <p class="mb-0">School Bus Security</p>
                  </div>
                </div>
                <div class="media cs_box">
                  <img src="images/cs_box_cont_icon2.png" class="align-self-center mr-3" alt="...">
                  <div class="media-body pl-5">
                    <p class="mb-0">School Bus Security</p>
                  </div>
                </div>
                <div class="media cs_box">
                  <img src="images/cs_box_cont_icon2.png" class="align-self-center mr-3" alt="...">
                  <div class="media-body pl-5">
                    <p class="mb-0">School Bus Security</p>
                  </div>
                </div>
                <div class="media cs_box">
                  <img src="images/cs_box_cont_icon2.png" class="align-self-center mr-3" alt="...">
                  <div class="media-body pl-5">
                    <p class="mb-0">School Bus Security</p>
                  </div>
                </div>
                <div class="media cs_box">
                  <img src="images/cs_box_cont_icon2.png" class="align-self-center mr-3" alt="...">
                  <div class="media-body pl-5">
                    <p class="mb-0">School Bus Security</p>
                  </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="project" style="background-image: url('./images/projectbg.jpg')">
    <div class="container">
        <div class="row">
            <div class="col-md-4 py-lg-0 py-md-0 py-2">
                <div class="form_btn">
                    <a href="#" class="w-100">Facilities</a>
                </div>
            </div>
            <div class="col-md-4 py-lg-0 py-md-0 py-2">
                <div class="form_btn">
                    <a href="#" class="w-100">Academics</a>
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