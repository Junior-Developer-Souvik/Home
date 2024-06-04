@extends('front.layout.app')

@section('page-title', $seo->page_title)
@section('meta-title', $seo->meta_title)
@section('meta-description', $seo->meta_desc)
@section('meta-keywords', $seo->meta_keyword)

@section('section')
<section class="innerbanner" style="background-image: url('{{asset('master/images/innerbanner1.jpg')}}')">
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
              <h1 class="text_blue">{{$content->tilte}}</h1>
              <span class="line_border"></span>
              <p>{!!$content->desc!!}</p>
          </div>
      </div>
  </div>
</section>

<section class="campus_security" style="background-image: url('master/images/campus_securitybg.jpg')">
  <div class="container">
      <div class="row">
          <div class="col-md-7 pr-lg-5">
              <h2 class="text_blue mb-3">{{$data->title}}</h2>
              <p>{{Str::limit($data->desc, 400)}}</p>
              <img src="{{$data->image}}" class="img-fluid" alt="">
              <div class="facility_qa mt-4">
               
                  <div class="accordion" id="accordionExample">
                      @if(count($data->SubFacilityData))
                        @foreach ($data->SubFacilityData as $key=>$item)
                          <div class="card mb-2 border-0">
                            <div class="card-header p-0 m-0" id="headingOne">
                                <h2 class="clearfix mb-0">
                                    <a class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">{{$item->title}} <i class="material-icons">add</i></a>                                  
                                </h2>
                            </div>
                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                <div class="card-body">
                                    <p class="mb-0">{{Str::limit($item->desc, 400)}}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                      @endif
                  </div>
              </div>
          </div>
          <div class="col-md-5 pl-lg-5 mt-lg-0 mt-md-0 mt-5">
              <h2 class="text_blue mb-3">Other Facilities</h2>
              @foreach($relatedData as $key =>$item)
              <div class="media cs_box">
                <img src="{{asset($item->logo)}}" class="align-self-center mr-3" alt="...">
                <a href="{{route('front.facility.details', $item->slug)}}">
                  <div class="media-body pl-5">
                    <p class="mb-0">{{$item->title}}</p>
                  </div>
                </a>
              </div>
              @endforeach
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