@extends('front.layout.app')

{{-- @section('page-title', $data->page_title)
@section('meta-title', $data->meta_title)
@section('meta-description', $data->meta_description)
@section('meta-keywords', $data->meta_keyword) --}}
<style>
    .latest_event a{
        color: #293b8c !important;
    }
    .latest_event select.form-control {
        color: #2a3a8f !important;
        height: 38px !important;
        line-height: 1.5 !important;
        border: none !important;
        border-radius: 0.25rem !important;
        background-color: #efefef !important;
        background-size: 10px !important;
        padding: .375rem .75rem !important;
    } 
</style>
@php
$category = isset($_GET['category']) ? $_GET['category'] : 'All';
@endphp
@section('section')
<section class="innerbanner" style="background-image: url('master/images/innerbanner1.jpg')">
    <div class="container">
        <div class="inner_bannercont">
            <h1 class="mb-0 text-uppercase">Blog</h1>
        </div>
    </div>
</section>

<section class="innerpage_firstcont">
    <div class="container">
        <div class="row py-5 justify-content-center">
            <div class="col-lg-12 col-md-12">
                <h1 class="text_blue">{{$blog_data->tilte}}</h1>
                <span class="line_border"></span>
                <p>{!!$blog_data->desc!!}</p>
            </div>
        </div>
    </div>
</section>


<section class="latest_event">
    <div class="container">
        <div class="row pb-5">
            <div class="col-lg-8 col-md-12">
                @foreach ($data as $item)
                    <div class="blog_list mb-lg-5 mb-md-5 mb-4">
                        <div class="blogimg">
                            <img src="{{asset($item->image)}}" class="img-fluid" alt="{{$item->title}}">
                            <p class="blog_name">@if($item->Auther)<img src="{{asset($item->Auther->image)}}" class="img-fluid mr-3" alt="{{$item->Auther->name}}">@endif {{$item->Auther->name}}<span></span></p>
                        </div>
                        <div class="blog_listcont">
                            <h3 class="text_blue mt-5 mb-3"><a href="{{route('front.blog.detail', $item->slug)}}">{{$item->title}}</a></h3>
                            <p>{{Str::limit($item->short_desc, 100)}}</p>
                            <p class="vies_text mt-4"><span class="text1"><i class="fa fa-eye" aria-hidden="true"></i> {{$item->view_counter}} Views</span> | <span class="text3"><i class="fa fa-calendar mr-1" aria-hidden="true"></i> {{date('jS M Y', strtotime($item->created_at))}}</span></p>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="col-lg-4 col-md-12 pl-lg-5">
                <h5 class="mb-3">Filter by Category</h5>
                <form id="myForm">
                    <select class="form-control w-100" id="categoryData" name="category">
                        <option value="All" {{$category=="All"?"selected":""}}>All</option>
                        @foreach ($allCategories as $item)
                            <option value="{{$item->event_category}}" {{$category==$item->event_category?"selected":""}}>{{$item->event_category}}</option>
                        @endforeach
                    </select>
                </form>
                <br>
                <div class="row">
                    @foreach ($data as $item)
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
                    <div class="col-md-12 mt-4"><h5 class="mb-2">Popular Blogs</h5><hr class="mt-0"></div>
                    @foreach ($PopularBlogs as $item)
                        <div class="col-lg-12 col-md-6">
                            <div class="row event_c mt-lg-4 mt-md-4 mt-2">
                                <div class="col-md-5 col-4">
                                    <img src="{{$item->image}}" class="img-fluid w-100" alt="">
                                </div>
                                <div class="col-md-7 col-8 pl-0">
                                    <h6><a href="{{route('front.blog.detail', $item->slug)}}">{{$item->title}}</a></h6>
                                    <p class="mb-0"><i class="fa fa-calendar mr-1" aria-hidden="true"></i>{{date('jS M Y', strtotime($item->created_at))}}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
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
@section('script')
<script>
    $(document).ready(function(){
            $('#categoryData').change(function(){
                $('#myForm').submit(); // Submit the form when selection changes
            });
        });
</script>
@endsection