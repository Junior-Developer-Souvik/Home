@extends('front.layout.app')

@section('page-title', $seo->page_title)
@section('meta-title', $seo->meta_title)
@section('meta-description', $seo->meta_desc)
@section('meta-keywords', $seo->meta_keyword)

@section('section')

<section class="innerbanner" style="background-image: url('{{asset('master/images/innerbanner1.jpg')}}')">
    <div class="container">
        <div class="inner_bannercont">
            <h1 class="mb-0 text-uppercase">DAILE SCHEDULE</h1>
        </div>
    </div>
</section>

<section class="innerpage_firstcont">
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


<section class="acc pb-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="accordion" id="accordionExample">
                    @foreach($classData as $key=>$item)
                        <div class="card mb-2 border-0">
                            <div class="card-header p-0 m-0" id="headingOne">
                                <h2 class="clearfix mb-0">
                                    <a class="btn btn-link" data-toggle="collapse" data-target="#collapseOne{{$item->id}}" aria-expanded="true" aria-controls="collapseOne{{$item->id}}">{{$item->name}} <i class="material-icons">add</i></a>                                  
                                </h2>
                            </div>
                            <div id="collapseOne{{$item->id}}" class="collapse {{$key==0?
                            "show":""}}" aria-labelledby="headingOne" data-parent="#accordionExample">
                                <div class="card-body mt-3 mb-2 p-0">
                                    @foreach ($DailySchedule as $key=>$Subitem)
                                        @if($Subitem->class_id==$item->id)
                                            <div class="table-responsive">
                                                <table class="table mb-0">
                                                    <h5 class="mb-0">{{$Subitem->day}}</h5>
                                                <tbody>
                                                    @if(count($Subitem->ScheduleData)>0)
                                                        @foreach ($Subitem->ScheduleData as $item)
                                                        <tr>
                                                            <td width="40%">{{$item->time}}</td>
                                                            <td width="60%" >{{$item->desc}}</td>
                                                        </tr>
                                                        @endforeach
                                                    @endif
                                                </tbody>
                                                </table>
                                            </div>
                                        @endif
                                    @endforeach
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