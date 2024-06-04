@extends('front.layout.app')

{{-- @section('page-title', $seo->page_title)
@section('meta-title', $seo->meta_title)
@section('meta-description', $seo->meta_desc)
@section('meta-keywords', $seo->meta_keyword) --}}
<style>
.db_btn {
    border: 1px solid #293b8d;
    padding: 8px 25px;
    display: inline-block;
    color: #293b8d;
}
</style>
@section('section')

<section class="innerbanner" style="background-image: url('master/images/innerbg.jpg')">
    <div class="container">
        <div class="inner_bannercont">
            <h1 class="mb-0 text-uppercase">SUCCESS</h1>
        </div>
    </div>
</section>

<section class="textarea_box">
    <div class="container">
        <div class="row py-5 justify-content-center">
            <div class="col-lg-8 col-md-12 text-center">
                <p class="mb-0">We appreciate the interest you have shown in considering the Techno India Group World School for your ward. Allow us to reach out to you shortly.</p>
            </div>
        </div>
    </div>
</section>
<section class="thank_you">
    <div class="container">
        <div class="row pb-5">
            <div class="col-md-12 text-center">
                <div class="thank_youcont">
                    <h1>Thank You!</h1>
                    <p>You application form has been received successfully.</p>
                    <a href="{{asset('/pdf/Brochure.pdf')}}" class="db_btn mt-4 db_btn" target="_blank" attributes-list="" download="Brochure">Download Brochure <i class="fa fa-download pl-2" aria-hidden="true"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection