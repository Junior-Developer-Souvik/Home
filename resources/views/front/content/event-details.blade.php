@extends('front.layout.app')

@section('page-title', $seo->page_title)
@section('meta-title', $seo->meta_title)
@section('meta-description', $seo->meta_desc)
@section('meta-keywords', $seo->meta_keyword)
@php
$category = isset($_GET['category']) ? $_GET['category'] : 'All';
@endphp
@section('section')
<section class="innerbanner" style="background-image: url('{{asset('master/images/innerbanner1.jpg')}}')">
    <div class="container">
        <div class="inner_bannercont">
            <h1 class="mb-0 text-uppercase">{{$data->title}}</h1>
        </div>
    </div>
</section>


<section class="latest_event">
    <div class="container">
        <div class="row pb-5">
            <div class="col-lg-6 col-md-12">
                <h2 class="text_blue">{{$data->title}}</h2>
                <div class="owl-carousel owl-theme Event_slide mt-4 mb-5">
                    <div class="item">
                        <img src="{{asset($data->image)}}" class="img-fluid" alt="">
                        <p class="mt-3">{!!$data->desc!!}</p>
                        <a href="{{route('front.event.details', $data->slug)}}" class="know_more mt-2">Know More</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 mt-lg-0 mt-5">
                <h4>Related events</h4>
                @if($relatedData->isEmpty())
                    <p>No related events found.</p>
                @else
                    @foreach ($relatedData as $item)
                        <div class="row event_c mt-lg-4 mt-md-4 mt-2">
                            <div class="col-lg-5 col-md-4">
                                <img src="{{asset($item->image)}}" class="img-fluid w-100" alt="">
                            </div>
                            <div class="col-lg-7 col-md-8 mt-lg-0 mt-md-0 mt-2">
                                <h5>{{$item->title}}</h5>
                                <p class="mt-2">{{Str::limit($item->short_desc, 50)}}</p>
                                <a href="{{route('front.event.details', $item->slug)}}" class="know_more mt-0">Know More</a>
                            </div>
                        </div>
                    @endforeach
                @endif
                
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
@section('script')
<script>
    $(document).ready(function(){
            $('#categoryData').change(function(){
                $('#myForm').submit(); // Submit the form when selection changes
            });
        });
</script>
@endsection
