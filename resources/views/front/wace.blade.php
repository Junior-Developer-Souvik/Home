@extends('front.layout.app')

@section('section')
<style>
    ul li{
        font-size: 15px;
        color: #293b8c;
    }
    .subtitle{
        max-width: 367px;
    }
    .wace_ul{
        padding-left: 17px;
    }
    .wace_tab .nav-tabs .nav-link {
        border: none;
        border-radius: 0px;
        padding: 0px 10px;
        background: none;
        margin: 0;
        color: #333;
        font-size: 18px;
        font-weight: 500;
        text-align: left;
        line-height: 1.3;
        border-bottom: 2px solid #fff;
        margin: 0px 50px;
        margin-left: 0px;
        padding-left: 0px; 
    }
    .wace_tab .nav-tabs .nav-link.active{
        color: #293b8c;
        border-bottom: 2px solid #fce013;
    }
    .wace_tab .nav-tabs {
        border: none;
    }
    .tab_box p span {
        color: #293b8c;
        font-weight: 600;
    }
    .t_boxs{
        background: #eaedfc;
        padding: 20px 30px;
        text-align: center;
        height: 100%;
    }
    .t_boxs span {
        color: #293b8c;
        font-weight: 500;
        margin-bottom: 15px;
        display: block;
        font-size: 16px;
    }
    .tab_box{
        margin-top: 20px;
    }
    #wace_cont .container-fluid .digital_contimg1 {
        padding-right: 60px;
    }
    @media screen and (max-width: 768px) {
    #wace_cont .container-fluid .digital_contimg1 {
        padding-right: 0px;
    }
    .wace_tab .nav-tabs .nav-link {
        padding: 0px 0px !important;
        font-size: 18px !important;
        margin: 0px 21px !important;
        margin-left: 0px !important;
    }
    }
    
    @media screen and (max-width: 575px) {
    #wace_cont .digital_cont h2{
        font-size: 27px;
    }
    .wace_tab .nav-tabs{
        display: flex;
        flex-wrap: nowrap;
        white-space: nowrap;
        overflow-x: auto;
        overflow-y: hidden;
    }
    .t_boxs {
        padding: 15px 15px;
    }
    .curriculum_ul{
        flex-direction: column;

     }
    }
    </style>

<section class="innerbanner" style="background-image: url('{{asset('frontend-assets/images/innerbanner1.jpg')}}');">
    <div class="container">
        <div class="inner_bannercont">
            <h1 class="mb-0 text-uppercase">WACE</h1>
        </div>
    </div>
</section>

<!-- <section class="innerpage_firstcont">
    <div class="container">
        <div class="row py-5 justify-content-center">
            <div class="col-lg-12 col-md-12">
                <h1 class="text_blue">School Education</h1>
                <span class="line_border"></span>
                <p>Techno India Group World School is conceived not just as a school but as a platform to nurture excellence in each child under its umbrella and to cultivate the nation’s dream. The origin of this can be traced back to the launch of Techno India Group Public School, more than one and a half decades ago. Our proven model speaks volumes about our passion and acceptability among Generation Y and their parents.</p>
            </div>
        </div>
    </div>
</section> -->


<section class="digital_edge" id="wace_cont">
    <div class="container-fluid p-lg-0">
        <div class="row py-4 align-items-center">
            <div class="col-lg-6 col-md-12">
                <img src="{{asset($waceData->image)}}" class="img-fluid w-100 digital_contimg1" alt="">
            </div>
            <div class="col-lg-4 col-md-12 mt-lg-0 mt-4">
                <div class="digital_cont text-left">
                    <h2 class="text_blue">{{$waceData->title}}</h2>
                    <span class="line_border"></span>
                    <p>{!!$waceData->description!!}</p>
                    {{-- <ul class="wace_ul">
                        <li>Western Australian K-10 International</li>
                        <li>Western Australian Certificate Education International</li>
                        <li>Western Australian Matriculation International</li>
                    </ul>
                    <p class="mb-0">Issued by School Curriculum and Standards Authority International, Government of Western Australia</p> --}}
                </div>
            </div>
            <div class="col-lg-2 order-lg-3 order-md-3 order-3"></div>
        </div>
    </div>
</section>

<section class="wace_tab">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="tab_cont">
                    <ul class="nav nav-tabs curriculum_ul" id="myTab" role="tablist">
                        @foreach ($wace_New_Data as $index => $item)
                            <li class="nav-item subtitle" role="presentation">
                                <button class="nav-link @if($index == 0) active @endif" id="curriculum" data-toggle="tab" data-target="#tab{{ $index + 1 }}" type="button" role="tab" aria-controls="tab{{ $index + 1 }}" aria-selected="{{ $index == 0 ? 'true' : 'false' }}">{{$item->title}}</button>
                            </li>
                        @endforeach
                     
                      {{-- <li class="nav-item subtitle" role="presentation">
                        <button class="nav-link" id="education" data-toggle="tab" data-target="#tab2" type="button" role="tab" aria-controls="tab2" aria-selected="false">{{$waceData->sub_title_2}}</button>
                      </li>
                      <li class="nav-item subtitle" role="presentation">
                        <button class="nav-link" id="program" data-toggle="tab" data-target="#tab3" type="button" role="tab" aria-controls="tab3" aria-selected="false">{{$waceData->sub_title_3}}</button>
                      </li> --}}
                    </ul>
                    <div class="tab-content" id="myTabContent">
                    @foreach ($wace_New_Data as $index => $wace_New)
                      <div class="tab-pane fade @if($index == 0) show active @endif" id="tab{{ $index+1 }}" role="tabpanel" aria-labelledby="curriculum">
                          <div class="tab_box">
                              <p>{!!$wace_New->wace_tab_desc!!}</p>                          
                              <div class="row">
                                  @foreach ($all_wace_New_Tab_Data[$wace_New->id] as $tabData)          
                                    <div class="col-md-6 mt-4">
                                        <div class="t_boxs">
                                          <span>{{$tabData->title}}</span>
                                          <p class="mb-0">{{$tabData->tab_desc}}</p>
                                        </div>
                                    </div>
                                  @endforeach
                                  {{-- <div class="col-md-6 mt-4">
                                      <div class="t_boxs">
                                          <span>{{$waceData->sub_title_1_tab_title_2}}</span>
                                          <p class="mb-0">{{$waceData->sub_title_1_tab_desc_2}}</p>
                                      </div>
                                  </div>
                                  <div class="col-md-6 mt-4">
                                      <div class="t_boxs">
                                          <span>{{$waceData->sub_title_1_tab_title_3}}</span>
                                          <p class="mb-0">{{$waceData->sub_title_1_tab_desc_3}}</p>
                                      </div>
                                  </div>
                                  <div class="col-md-6 mt-4">
                                      <div class="t_boxs">
                                          <span>{{$waceData->sub_title_1_tab_title_4}}</span>
                                          <p class="mb-0">{{$waceData->sub_title_1_tab_desc_4}}</p>
                                      </div>
                                  </div> --}}
                                  <div class="col-md-12">
                                      <img src="{{asset($wace_New->image)}}" class="img-fluid w-100 wace_tab_footerbg" alt="">
                                  </div>
                              </div>
                          </div>
                      </div>
                      {{-- <div class="tab-pane fade" id="tab2" role="tabpanel" aria-labelledby="education">
                          <div class="tab_box">
                              <p>{!!$waceData->sub_title_desc_2!!}</p>
                              <p class="mb-2"><span>Certification</span></p>
                              <ul class="wace_ul">
                                  <li>Internationally recognised two year program for students in Years 11 and 12</li>
                                  <li>Successful students will receive the Western Australian Certificate of Education (WACE) and the Western Australian Statement of Student Achievement (WASSA), issued by the SCSA on behalf of the Government of Western Australia</li>
                              </ul>
                              <div class="row">
                                  <div class="col-md-6 mt-4">
                                      <div class="t_boxs">
                                          <span>{{$waceData->sub_title_2_tab_title_1}}</span>
                                          <p class="mb-0">{{$waceData->sub_title_2_tab_desc_1}}</p>
                                      </div>
                                  </div>
                                  <div class="col-md-6 mt-4">
                                      <div class="t_boxs">
                                          <span>{{$waceData->sub_title_2_tab_title_2}}</span>
                                          <p class="mb-0">{{$waceData->sub_title_2_tab_desc_2}}</p>
                                      </div>
                                  </div>
                                  <div class="col-md-6 mt-4">
                                      <div class="t_boxs">
                                          <span>{{$waceData->sub_title_2_tab_title_3}}</span>
                                          <p class="mb-0">{{$waceData->sub_title_2_tab_desc_3}}</p>
                                      </div>
                                  </div>
                                  <div class="col-md-6 mt-4">
                                      <div class="t_boxs">
                                          <span>{{$waceData->sub_title_2_tab_title_4}}</span>
                                          <p class="mb-0">{{$waceData->sub_title_2_tab_desc_4}}</p>
                                      </div>
                                  </div>
                                  <div class="col-md-12">
                                      <img src="{{asset($waceData->sub_title_img_2)}}" class="img-fluid w-100 wace_tab_footerbg" alt="">
                                  </div>
                              </div>
                          </div>
                      </div> --}}
                      {{-- <div class="tab-pane fade" id="tab3" role="tabpanel" aria-labelledby="program">
                          <div class="tab_box">
                              <p>{!!$waceData->sub_title_desc_3!!}</p>
                              <p class="mb-2"><span>Certifications</span></p>
                              <ul class="wace_ul">
                                  <li>Internationally recognised one-year program</li>
                                  <li>Prepares students for university entry</li>
                                  <li>Successful students will receive the WACE and the Western Australian Statement of Student Achievement (WASSA), issued by the SCSA on behalf of the Government of Western Australia</li>
                              </ul>
                              <div class="row">
                                  <div class="col-md-6 mt-4">
                                      <div class="t_boxs">
                                          <span>{{$waceData->sub_title_3_tab_title_1}}</span>
                                          <p class="mb-0">{{$waceData->sub_title_3_tab_desc_1}}</p>
                                      </div>
                                  </div>
                                  <div class="col-md-6 mt-4">
                                      <div class="t_boxs">
                                          <span>{{$waceData->sub_title_3_tab_title_2}}</span>
                                          <p class="mb-0">{{$waceData->sub_title_3_tab_desc_2}}p>
                                      </div>
                                  </div>
                                  <div class="col-md-6 mt-4">
                                      <div class="t_boxs">
                                          <span>{{$waceData->sub_title_3_tab_title_3}}</span>
                                          <p class="mb-0">{{$waceData->sub_title_3_tab_desc_3}}</p>
                                      </div>
                                  </div>
                                  <div class="col-md-6 mt-4">
                                      <div class="t_boxs">
                                          <span>{{$waceData->sub_title_3_tab_title_4}}</span>
                                          <p class="mb-0">{{$waceData->sub_title_3_tab_desc_4}}</p>
                                      </div>
                                  </div>
                                  <div class="col-md-12">
                                      <img src="{{asset($waceData->sub_title_img_3)}}" class="img-fluid w-100 wace_tab_footerbg" alt="">
                                  </div>
                              </div>
                          </div>
                      </div> --}}
                    @endforeach
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
                    <a href="{{route('front.home')}}" class="w-100">Admisions Open</a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
@section('script')
    
@endsection