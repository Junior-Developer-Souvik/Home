@extends('front.layout.app')

@section('page-title', $data->page_title)
@section('meta-title', $data->meta_title)
@section('meta-description', $data->meta_description)
@section('meta-keywords', $data->meta_keyword)
<style>
    .latest_event a{
        color: #293b8c !important;
    }
</style>
@section('section')
<section class="innerbanner" style="background-image: url({{asset('master/images/innerbanner1.jpg')}})">
    <div class="container">
        <div class="inner_bannercont">
            <h1 class="mb-0 text-uppercase">{{$data->title}}</h1>
        </div>
    </div>
</section>
<section class="innerpage_firstcont mt-4">
</section>
<section class="latest_event">
    <div class="container">
        <div class="row pb-5">
            <div class="col-lg-8 col-md-12">
                <div class="blog_list mb-lg-5 mb-md-5 mb-4">
                    <div class="blogimg">
                        <img src="{{asset($data->image)}}" class="img-fluid" alt="{{$data->title}}">
                        <p class="blog_name">@if($data->Auther)<img src="{{asset($data->Auther->image)}}" class="img-fluid mr-3" alt="{{$data->Auther->name}}">@endif {{$data->Auther->name}}<span></span></p>
                    </div>
                    <div class="blog_listcont">
                        <h3 class="text_blue mt-5 mb-3"><a href="{{route('front.blog.detail', $data->slug)}}">{{$data->title}}</a></h3>
                        <p>{!!$data->desc!!}</p>
                        <p class="vies_text mt-4"><span class="text1"><i class="fa fa-eye" aria-hidden="true"></i> {{$data->view_counter}} Views</span> | <span class="text3"><i class="fa fa-calendar mr-1" aria-hidden="true"></i> {{date('jS M Y', strtotime($data->created_at))}}</span></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 pl-lg-5">
                <h5 class="mb-3">Related Blogs</h5>
                <br>
                <div class="row">
                    @if($relatedBlogs->isEmpty())
                        <p>No related blogs found.</p>
                    @else
                        @foreach ($relatedBlogs as $item)
                            <div class="col-lg-12 col-md-6">
                                <div class="row event_c mt-lg-4 mt-md-4 mt-2">
                                    <div class="col-md-5 col-4">
                                        <img src="{{asset($item->image)}}" class="img-fluid w-100" alt="">
                                    </div>
                                    <div class="col-md-7 col-8 pl-0">
                                        <h6><a href="{{route('front.blog.detail', $item->slug)}}">{{$item->title}}</a></h6>
                                        <p class="mb-0"><i class="fa fa-calendar mr-1" aria-hidden="true"></i>{{date('jS M Y', strtotime($item->created_at))}}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
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