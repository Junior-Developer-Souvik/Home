<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('page-title')</title>
    <meta name="title" content="@yield('meta-title')">
    <meta name="description" content="@yield('meta-description')"/>
    <meta name="keywords" content="@yield('meta-keywords')">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/x-icon" href="{{asset('frontend-assets/assets/icons/favicon.ico')}}">
    <link rel="stylesheet" href="{{asset('frontend-assets/assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend-assets/assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('frontend-assets/assets/css/responsive.css')}}">
    <!--<link rel="stylesheet" href="{{asset('master/css/font-awesome.min.css')}}">-->
    <!--<link rel="stylesheet" href="{{asset('master/css/bootstrap.min.css')}}">-->
    <!--<link rel="stylesheet" href="{{asset('master/css/demo.css')}}">-->
    <!--<link rel="stylesheet" href="{{asset('master/css/webslidemenu.css')}}">-->
    <!--<link rel="stylesheet" href="{{asset('master/css/owl.carousel.min.css')}}">-->
    <!--<link rel="stylesheet" href="{{asset('master/css/owl.theme.default.min.css')}}">-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700;800&family=Poppins:wght@100;200;300;400;500;600;700;800&family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('master/plugins/fresco-master/fresco-master/dist/css/fresco.css')}}">
    <!-- <link rel="stylesheet" href="css/fresco.css" /> -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <!--<link rel="stylesheet" href="{{asset('master/css/style.css')}}">-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css">
</head>
<body>
    <div class="main">
        <header id="header">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-6 col-9">
                        <a href="{{asset('')}}"><img src="{{asset('master/images/logo.png')}}" class="img-fluid" alt="logo"></a>
                    </div>

                    <div class="col-md-6 col-3 text-right home_icon">
                        <span style="font-size:30px;cursor:pointer" onclick="openNav()" class="humber_icon1">&#9776;</span>
                    <div id="myNav" class="overlay">
                        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">
                            <button type="button" class="close" aria-label="Close">
                                <span aria-hidden="true"><img src="{{asset('master/images/closeicon.png')}}" class="img-fluid closeicon" alt=""></span>
                            </button>
                        </a>
                        <div class="overlay-content desktopmenu">
                            <div class="row">
                                <div class="col-lg-4 col-md-12 text-left mt-lg-4 mt-md-5 pr-lg-5 order-lg-1 order-md-2 order-2">
                                    <div class="others_cont">
                                        <a href="{{asset('')}}"><img src="{{asset('master/images/logo2.png')}}" class="img-fluid menu_logo" alt="logo"></a>
                                        <p class="text-white mt-lg-5 mt-md-3 pr-lg-5">Under the banner of unity and excellence, we forge paths of innovation. Our all-girls school is a cradle for creativity, character, and courage.</p>
                                        <div class="social_media mt-3">
                                            <ul class="ml-0 pl-0">
                                                @foreach ($social_media as $item)
                                                <li>
                                                    <a href="{{$item->link}}">
                                                        <img src="{{asset($item->image)}}" alt="{{$item->title}}" width="100%">
                                                    </a>
                                                </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-8 col-md-12 order-lg-2 order-md-1 order-1">
                                    <div class="row">
                                        <!-- <div class="col-lg-3 col-md-4 mt-4 text-left">
                                            <h6 class="text-uppercase list_title"><a href="#">Home</a></h6>
                                        </div> -->
                                        <div class="col-lg-3 col-md-4 mt-4 text-left">
                                            <h6 class="text-uppercase list_title">About</h6>
                                            <ul class="navbox pl-0 mb-0">
                                                <li><a href="{{route('front.about.index')}}">About School</a></li>
                                                <li><a href="">Director's Message</a></li>
                                                <li><a href="">Principal's Message</a></li>
                                                <li><a href="{{route('front.faculty.index')}}">Faculty</a></li>
                                                <li><a href="{{route('front.extra_curricular.index')}}">Affiliation & Curriculum</a></li>
                                                <li><a href="">FAQ's</a></li>
                                            </ul>
                                        </div>
                                        <div class="col-lg-3 col-md-4 mt-4 text-left">
                                            <h6 class="text-uppercase list_title">The School</h6>
                                            <ul class="navbox pl-0 mb-0">
                                                <li><a href="{{route('front.academic.index')}}">Academic Features</a></li>
                                                <li><a href="">Pastoral Features</a></li>
                                                <li><a href="">Day-Boarding</a></li>
                                                <li><a href="">C.B.S.E</a></li>
                                                <li><a href="">Boarding School</a></li>
                                                <li><a href="">Darjeeling Schools</a></li>
                                            </ul>
                                        </div>
                                        <div class="col-lg-3 col-md-4 mt-4 text-left">
                                            <h6 class="text-uppercase list_title">Admission</h6>
                                            <ul class="navbox pl-0 mb-0">
                                                <li><a href="">Admission Guidelines</a></li>
                                                <li><a href="">Online Registration</a></li>
                                                <li><a href="">Make an Enquiry</a></li>
                                            </ul>
                                        </div>
                                        <div class="col-lg-3 col-md-4 mt-4 text-left">
                                            <h6 class="text-uppercase list_title">Beyond Academics</h6>
                                            <ul class="navbox pl-0 mb-0">
                                                <li><a href="">Sports</a></li>
                                                <li><a href="">Co-Curricular Activities</a></li>
                                                <li><a href="">Expeditions & Study Tours</a></li>
                                                <li><a href="">Youth Movement & Leadership Training</a></li>
                                                <li><a href="">Scouts & Guides</a></li>
                                                <li><a href="">Clubs & Hobbies</a></li>
                                            </ul>
                                        </div>
                                        <div class="col-lg-3 col-md-4 mt-4 text-left">
                                            <h6 class="text-uppercase list_title">Facilities</h6>
                                            <ul class="navbox pl-0 mb-0">
                                                <li><a href="{{route('front.facility.index')}}">Campus</a></li>
                                                <li><a href="">Policies</a></li>
                                            </ul>
                                        </div>
                                        <div class="col-lg-3 col-md-4 mt-4 text-left">
                                            <h6 class="text-uppercase list_title">Gallery</h6>
                                            <ul class="navbox pl-0 mb-0">
                                                <li><a href="">Photo Gallery</a></li>
                                                <li><a href="">Video Gallery</a></li>
                                            </ul>
                                        </div>
                                        <div class="col-lg-3 col-md-4 mt-4 text-left">
                                            <h6 class="text-uppercase list_title"><a href="{{route('front.contact.index')}}">Contact</a></h6>
                                        </div>
                                    </div>
                                </div> 
                            </div>
                        </div>
                        <div class="overlay-content mobilemenu">
                            <div id="panel">
                                <ul class="mobile-sub wsmenu-list">
                                    <!-- <li><a href="javascript:void(0)" class="active">Home</a></li> -->
                                    <li><a href="javascript:void(0)"><i class="wsmenu-arrow fa fa-angle-left"></i> About</a>
                                        <ul class="wsmenu-submenu amp">
                                            <li><a href="{{route('front.about.index')}}">About School</a></li>
                                            <li><a href="javascript:void(0)">Director's Message</a></li>
                                            <li><a href="javascript:void(0)">Principal's Message</a></li>
                                            <li><a href="{{route('front.faculty.index')}}">Faculty</a></li>
                                            <li><a href="{{route('front.extra_curricular.index')}}">Affiliation & Curriculum</a></li>
                                            <li><a href="javascript:void(0)">FAQ's</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="javascript:void(0)"><i class="wsmenu-arrow fa fa-angle-left"></i> The School</a>
                                        <ul class="wsmenu-submenu amp">
                                            <li><a href="{{route('front.academic.index')}}">Academic Features</a></li>
                                            <li><a href="javascript:void(0)">Pastoral Features</a></li>
                                            <li><a href="javascript:void(0)">Day-Boarding</a></li>
                                            <li><a href="javascript:void(0)">C.B.S.E</a></li>
                                            <li><a href="javascript:void(0)">Boarding School</a></li>
                                            <li><a href="javascript:void(0)">Darjeeling Schools</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="javascript:void(0)"><i class="wsmenu-arrow fa fa-angle-left"></i> Admission</a>
                                        <ul class="wsmenu-submenu amp">
                                            <li><a href="javascript:void(0)">Admission Guidelines</a></li>
                                            <li><a href="javascript:void(0)">Online Registration</a></li>
                                            <li><a href="javascript:void(0)">Make an Enquiry</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="javascript:void(0)"><i class="wsmenu-arrow fa fa-angle-left"></i> Beyond Academics</a>
                                        <ul class="wsmenu-submenu amp">
                                            <li><a href="javascript:void(0)">Sports</a></li>
                                            <li><a href="javascript:void(0)">Co-Curricular Activities</a></li>
                                            <li><a href="javascript:void(0)">Expeditions & Study Tours</a></li>
                                            <li><a href="javascript:void(0)">Youth Movement & Leadership Training</a></li>
                                            <li><a href="javascript:void(0)">Scouts & Guides</a></li>
                                            <li><a href="javascript:void(0)">Clubs & Hobbies</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="javascript:void(0)"><i class="wsmenu-arrow fa fa-angle-left"></i> Facilities</a>
                                        <ul class="wsmenu-submenu amp">
                                            <li><a href="{{route('front.facility.index')}}">Campus</a></li>
                                            <li><a href="javascript:void(0)">Policies</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="javascript:void(0)"><i class="wsmenu-arrow fa fa-angle-left"></i> Gallery</a>
                                        <ul class="wsmenu-submenu amp">
                                            <li><a href="javascript:void(0)">Photo Gallery</a></li>
                                            <li><a href="javascript:void(0)">Video Gallery</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="{{route('front.contact.index')}}">Contact</a></li>
                                </ul>
                            </div>
                            <div class="others_nav_cont">
                                <div class="address_cont mt-5">
                                    <img src="{{asset('master/images/logo2.png')}}" class="img-fluid menu_logo" alt="logo">
                                    <p class="mt-3 text-white pl-0">Under the banner of unity and excellence, we forge paths of innovation. Our all-girls school is a cradle for creativity, character, and courage.</p>
                                    <ul class="social_link mb-0 pl-0 mt-lg-4 mt-md-3 mt-2">
                                        @foreach ($social_media as $item)
                                        <li>
                                            <a href="{{$item->link}}">
                                                <img src="{{asset($item->image)}}" alt="{{$item->title}}" width="100%">
                                            </a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </header>
        <div id="loader-container">
            <div class="loader-holder">
                <div id="loader"></div>
            </div>
        </div>
        @yield('section')

        <section class="footer">
            <div class="container">
                <div class="row pt-5 pb-4">
                    <div class="col-lg-6 col-md-12 pr-lg-5">
                        <img src="{{asset('master/images/logo2.png')}}" class="img-fluid mb-4 footer_logo" alt="">
                        <p class="text-white">Under the banner of unity and excellence, we forge paths of innovation. Our all-girls school is a cradle for creativity, character, and courage.</p>
                        <div class="address_box" id="location_box">
                            <div class="row location_cont">
                                <div class="col-md-2 col-2 pr-0"><span><i class="fa fa-map-marker" aria-hidden="true"></i></span></div>
                                <div class="col-md-10 col-10 pl-0"><p class="mb-0 pl-0">{{ $settings[6]->content }}</p></div>
                            </div>
                            <p class="mb-1 contact_box"><span><i class="fa fa-phone" aria-hidden="true"></i></span> <a href="Tel:{{ $settings[0]->content }}">{{ $settings[0]->content }}</a></p>
                            <p class="mb-1 contact_box"><span><i class="fa fa-envelope" aria-hidden="true"></i></span> <a href="mailto:{{ $settings[2]->content }}">{{ $settings[2]->content }}</a></p>
                            <p class="mb-1 contact_box"><span><i class="fa fa-globe" aria-hidden="true"></i></span> <a href="mailto:{{ $settings[8]->content }}">{{ $settings[8]->content }}</a></p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 mt-lg-0 mt-md-4 mt-4">
                        <h6>Quick Links</h6>
                        <ul class="mb-0 pl-0">
                            <li><a href="{{route('front.about.index')}}">About</a></li>
                            <li><a href="{{route('front.career.index')}}">Career</a></li>
                            <li><a href="{{route('front.about.index')}}">The School</a></li>
                            <li><a href="{{route('front.contact.index')}}">Contact Us</a></li>
                            <li><a href="#">Admission</a></li>
                            <li><a href="#">Beyond Academics</a></li>
                            <li><a href="{{route('front.facility.index')}}">Facilities</a></li>
                            <li><a href="#">Gallery</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-3 col-md-4 mt-lg-0 mt-md-4 mt-3">
                        <h6>Important Links</h6>
                        <ul class="mb-0 pl-0">
                            <li><a href="#">Parent portal login</a></li>
                            <li><a href="#">Student portal</a></li>
                            <li><a href="#">Online Fee payment portal</a></li>
                        </ul>
                    </div>
                    <div class="col-md-12 text-center footer_bottom">
                        <span class="border_bottom mt-lg-5 mt-md-5 mt-4 mb-4"></span>
                        <p class="mb-0">Copyright @ {{date('Y')}}. All Rights Reserved</p>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script src="{{asset('frontend-assets/assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('frontend-assets/assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('master/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('frontend-assets/assets/js/custom.js')}}"></script>
        <script src="{{asset('master/js/webslidemenu.js')}}"></script>
        <script src="{{asset('master/js/owl.carousel.min.js')}}"></script>
        <script src="{{asset('master/plugins/fresco-master/fresco-master/dist/js/fresco.js')}}"></script>
        <script src='https://www.google.com/recaptcha/api.js'></script>
    {{-- <script src="{{ asset('frontend-assets/js/custom.js') }}"></script> --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            @if(Session::get('success'))
                toastFire('success', '{{Session::get("success")}}');
            @endif
    
            @if(Session::get('failure'))
                toastFire('error', '{{Session::get("failure")}}');
            @endif
        </script>
        @yield('script')

        <script>
            $(window).on("scroll", function () {
                if ($(window).scrollTop() > 50) {
                    $("#header").addClass("active");
                } else {
                    //remove the background property so it comes transparent again (defined in your css)
                    $("#header").removeClass("active");
                }
            });
        </script>
        <script>
            $('.gallery_slide').owlCarousel({
                loop: true,
                margin: 10,
                dots: false,
                nav: true,
                navText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>',
                    '<i class="fa fa-angle-right" aria-hidden="true"></i>'
                ],
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 3
                    },
                    1000: {
                        items: 3
                    }
                }
            })
        
            $('.Event_slide').owlCarousel({
                loop: true,
                margin: 10,
                dots: false,
                nav: true,
                navText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>',
                    '<i class="fa fa-angle-right" aria-hidden="true"></i>'
                ],
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 1
                    },
                    1000: {
                        items: 1
                    }
                }
            })
        </script>
        
        <script>
            jQuery(document).ready(function ($) {
                "use strict";
                //  TESTIMONIALS CAROUSEL HOOK
                $('#customers-testimonials').owlCarousel({
                    loop: true,
                    center: true,
                    items: 3,
                    margin: 0,
                    autoplay: true,
                    dots: true,
                    autoplayTimeout: 5000,
                    smartSpeed: 450,
                    responsive: {
                        0: {
                            items: 1
                        },
                        768: {
                            items: 2
                        },
                        1170: {
                            items: 3
                        }
                    }
                });
            });
        </script>
        
        <script>
            function openNav() {
                document.getElementById("myNav").style.height = "100%";
            }
        
            function closeNav() {
                document.getElementById("myNav").style.height = "0%";
            }
        
            $("#panel a").click(function () {
                $('.amp').css("display", "none");
            });
        </script>
        
        <script>
            $(document).ready(function () {
                // Add minus icon for collapse element which is open by default
                $(".collapse.show").each(function () {
                    $(this).siblings(".card-header").find(".btn i").html("remove");
                    $(this).prev(".card-header").addClass("highlight");
                });
        
                // Toggle plus minus icon on show hide of collapse element
                $(".collapse").on('show.bs.collapse', function () {
                    $(this).parent().find(".card-header .btn i").html("remove");
                }).on('hide.bs.collapse', function () {
                    $(this).parent().find(".card-header .btn i").html("add");
                });
        
                // Highlight open collapsed element 
                $(".card-header .btn").click(function () {
                    $(".card-header").not($(this).parents()).removeClass("highlight");
                    $(this).parents(".card-header").toggleClass("highlight");
                });
            });
        </script>
    </body>
</html>