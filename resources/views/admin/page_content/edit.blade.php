@extends('admin.layout.app')
@section('page-title', 'Edit Page Details')
    {{-- {{dd($waceNewData)}} --}}
 
@section('section')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row mb-3">
                            <div class="col-md-12 text-right">
                                <a href="{{ route('admin.page_content.list.all') }}" class="btn btn-sm btn-primary"> <i class="fa fa-chevron-left"></i> Back</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.page_content.update') }}" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="wace_id" value="">
                            @csrf
                            <div class="form-group">
                                <h5><strong class="text-danger">{{ strtoupper($data->page) }}</strong></h5>
                            </div>
                            @if($data->id!=1)

                            @if ($data->custom_field==1)
                            <div class="form-group">
                                <input type="hidden" name="custom_field"  id="custom_field" />
                                <label for="">New Page Name</label>
                                <input type="text" class="form-control" name="page" id="page"  placeholder="Enter new page name"   value="{{$data->page}}">
                            </div>
                            <div class="form-group">
                                <label for="">New Page Location*</label>
                                <select name="location" id="location" class="form-control">
                                    <option selected hidden>--Select Options--</option>
                                    <option value="header" {{$data->location == 'header'? "selected":""}} >Header</option>
                                    <option value="footer" {{$data->location == 'footer'? "selected":""}}>Footer</option> 
                                </select>
                            </div>
                            @endif
                               
                             
                            
                                @if($data->page == "ACADEMICS")
                                    <div class="form-group">
                                        <label for="">Title 1</label>
                                        <input type="text" name="title1" id="title1" class="form-control" value="{{$data->title1}}" placeholder="Enter title here">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Image 1</label>
                                        <input type="file" name="img1" id="img1" class="form-control" value="{{$data->img1}}" >
                                        <img src="{{$data->img1?asset($data->img1):asset('backend-assets/images/placeholder.jpg')}}" alt="" width="15%">

                                    </div>
                                    <div class="form-group">
                                        <label for="">Description 1</label>
                                        <textarea type="text" name="desc1" id="desc1" class="form-control" placeholder="Enter description here">{{old('desc1') ? old('desc1') : $data->desc1}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Button text 1</label>
                                        <input type="text" name="btn_text_1" value="{{$data->btn_text_1}}" placeholder="Enter button text here" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Button link 1</label>
                                        <input type="text" name="btn_link_1" value="{{$data->btn_link_1}}" placeholder="Enter button link here" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Title 2</label>
                                        <input type="text" name="title2" id="title2" class="form-control" value="{{$data->title2}}" placeholder="Enter title here">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Image 2</label>
                                        <input type="file" name="img2" id="img2" class="form-control" value="{{$data->img2}}">
                                        <img src="{{$data->img2?asset($data->img2):asset('backend-assets/images/placeholder.jpg')}}" alt="" width="15%">

                                    </div>
                                    <div class="form-group">
                                        <label for="">Description 2</label>
                                        <textarea type="text" name="desc2" id="desc2" class="form-control" placeholder="Enter description here">{{ old('desc2') ? old('desc2') : $data->desc2}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Button text 2</label>
                                        <input type="text" name="btn_text_2" value="{{$data->btn_text_2}}" placeholder="Enter button text here" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Button link 2</label>
                                        <input type="text" name="btn_link_2" value="{{$data->btn_link_2}}" placeholder="Enter button link here" class="form-control">
                                    </div>
                                    @elseif ($data->page == 'Wace')
                                        <input type="hidden" name="wace_id" value="{{$waceData->id}}">
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="title">Title</label>                            
                                                    <input type="text" name="wace_title" id="title" class="form-control"  value="{{$waceData->title}}">
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group">
                                                    <label for="">Image </label>
                                                    <input type="file" name="wace_image" id="image" class="form-control" >
                                                    <img src="{{asset($waceData->image)}}" alt="no-img" width="40%">
                                                </div>
                                            </div>
                                        </div>       
                                        <div class="form-group">
                                            <label for="">Description</label>
                                            <textarea name="description" id="description" class="form-control">{{$waceData->description}}</textarea>    
                                        </div>         
                                      <div class="card p-3">
                                        <label for=""><strong class="text-danger">Fields</strong></label>
                                        <div class="col-md-12 text-right">
                                            <a href="#" data-toggle="modal" data-target="#exampleModalCenter" class="btn btn-sm btn-primary"> <i class="fa fa-plus"></i> Add New Section</a>
                                        </div>
                                        <table class="table">
                                            <tr>
                                                <th>Title</th>
                                                <th>Description</th>
                                                <th>Image</th>
                                                <th>Action</th>
                                            </tr>
                                            @foreach ($waceNewData as $index => $item)
                                                <tr>
                                                    <td>{{$item->title}}</td>
                                                    <td>{!!$item->wace_tab_desc!!}</td>
                                                    <td><img src="{{asset($item->image)}}" alt="no-image" width="225px"></td>
                                                    <td width="15%">
                                                        <div class="btn-group">
                                                            <a href="" data-toggle="modal" data-target="#exampleModalCenterEdit{{$item->id}}" class="btn btn-sm btn-dark" data-toggle="tooltip" title="" data-original-title="Edit"><i class="fa fa-edit"></i></a>
                                                            <a href="javascript:void(0);" class="btn btn-sm btn-danger delete-btn" data-toggle="tooltip" title="" data-id="{{$item->id}}" data-original-title="Delete">
                                                                <i class="fa fa-trash"></i></a>
                                                                <a href=""  data-toggle="modal" data-target="#exampleModalCenterNew{{$item->id}}" class="btn btn-sm btn-success" data-toggle="tooltip" title="" data-original-title="Edit"><i class="fa fa-plus">New Tab</i></a>
                                                        </div>
                                                        {{-- Edit Wace edit modal --}}
                                                        <div class="modal fade" id="exampleModalCenterEdit{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                                                <form  id="{{$index+1}}wace_tab_update{{$item->id}}" action="{{route('admin.wace.tab.Update')}}" method="post" enctype="multipart/form-data">
                                                                    @csrf
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="exampleModalCenterEdit">Edit W.A.C.E Details</h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <div class="form-group">
                                                                                <label for="">Title</label>
                                                                                <input type="text" name="title" id="edit_title{{$item->id}}" class="form-control" placeholder="Enter the title here" value="{{$item->title}}">
                                                                                <div class="invalid-feedback" id="edit-title-error{{$item->id}}"></div>

                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="">Description</label>
                                                                                <textarea name="wace_tab_desc" class="form-control" id="edit_tab_desc{{$item->id}}" cols="30" rows="2" placeholder="Enter the description here">{{$item->wace_tab_desc}}</textarea>                                                                       
                                                                                <div class="invalid-feedback" id="edit-desc-error{{$item->id}}"></div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="">Image</label>
                                                                                <input type="file" name="image" class="form-control" id="edit_tab_image{{$item->id}}" >
                                                                                <img src="{{asset($item->image)}}" alt="no-img" width="25%">   
                                                                                <div class="invalid-feedback" id="edit-image-error{{$item->id}}"></div>                                     
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">                   
                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                            <button type="button" class="btn btn-primary" onclick="editWace({{$item->id}},{{$index+1}})">Save changes</button>
                                                                        </div>
                                                                        <input type="hidden" name="page_content_id" id="page_content_id{{$data->id}}" value="{{ $data->id }}">
                                                                        <input type="hidden" name="wace_tab_id" id="wace_tab_id{{$item->id}}" value="{{ $item->id }}">       
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                        <!--Wace Tab Modal -->
                                                            <div class="modal fade" id="exampleModalCenterNew{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLongTitle">New Tab</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                    </div>
                                                                    <form action="{{route('admin.wace.new.tab.store')}}" method="post" id="wace_tab{{$item->id}}">
                                                                        @csrf
                                                                        <div class="modal-body">
                                                                            <div class="form-group">
                                                                                <label for="">Title</label>
                                                                                <input type="text"  name="title" class="form-control" placeholder="Enter the Tab title here">
                                                                                <div class="invalid-feedback" id="error-title-{{ $item->id }}"></div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="">Description</label>
                                                                                <textarea name="tab_desc" class="form-control" cols="30" rows="2" placeholder="Enter the Tab description here"></textarea>
                                                                                <div class="invalid-feedback" id="error-desc-{{ $item->id }}"></div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                        <button type="button" class="btn btn-primary" onclick="waceNewTab({{$item->id}})">Save changes</button>
                                                                        </div>
                                                                    <input type="hidden" name="page_content_id" value="{{ $data->id }}">
                                                                        <input type="hidden" name="wace_new_id" value="{{$item->id}}">
                                                                </form>
                                                                </div>
                                                                </div>
                                                            </div>
                                                    </td>
                                                </tr>
                                                @php
                                                    $Sub_tabs = App\Models\WaceNewTab::where('wace_new_id', $item->id)->get();
                                                @endphp
                                                @if(count($Sub_tabs)>0)
                                                    <tr>
                                                        <th colspan="4">
                                                            <table class="table">
                                                                <tr>
                                                                    <th>Sub Title</th>
                                                                    <th>Sub Description</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                                @foreach($Sub_tabs as $value)
                                                                    <tr>
                                                                        <td>{{$value->title}}</td>
                                                                        <td>{{$value->tab_desc}}</td>
                                                                        <td>
                                                                            <div class="btn-group">
                                                                                <a href="" data-toggle="modal" data-target="#exampleModalNewTabEdit{{$value->id}}" class="btn btn-sm btn-dark" data-toggle="tooltip" title="" data-original-title="Edit"><i class="fa fa-edit"></i></a>
                                                                                <a href="javascript:void(0);" class="btn btn-sm btn-danger delete-btn delete-btn-sub" data-toggle="tooltip" title="" data-id="{{$value->id}}" data-original-title="Delete">
                                                                                    <i class="fa fa-trash"></i></a>
                                                                            </div>                                
                                                                            <!-- Modal -->
                                                                            <div class="modal fade" id="exampleModalNewTabEdit{{$value->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                                <div class="modal-dialog" role="document">
                                                                                <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                    <h5 class="modal-title" id="exampleModalLabel">Edit New Tab</h5>
                                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                        <span aria-hidden="true">&times;</span>
                                                                                    </button>
                                                                                    </div>
                                                                                    <div class="modal-body">
                                                                                        <form action="{{route('admin.wace.new.tab.update')}}" method="post" id="wace_new_tab{{$value->id}}">
                                                                                            @csrf
                                                                                        <div class="form-group">
                                                                                            <label for="">Title</label>
                                                                                            <input type="text" value="{{$value->title}}" id="new_tab_title{{$value->id}}" name="title" class="form-control" placeholder="Enter the Tab title here">
                                                                                            <div class="invalid-feedback" id="edit-new-title-{{ $item->id }}"></div>
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <label for="">Description</label>
                                                                                            <textarea name="tab_desc" id="new_tab_desc{{$value->id}}" class="form-control" cols="30" rows="2" placeholder="Enter the Tab description here">{{$value->tab_desc}}</textarea>
                                                                                            <div class="invalid-feedback" id="edit-new-desc-{{ $item->id }}"></div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="modal-footer">
                                                                                        <input type="hidden" name="wace_new_id" value="{{$value->wace_new_id}}">
                                                                                        <input type="hidden" name="wace_new_tab_id" value="{{$value->id}}">
                                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                                        <button type="button" class="btn btn-primary" onclick="editWaceNewTab({{$value->id}})">Save changes</button>
                                                                                    </div>
                                                                                </form>
                                                                                </div>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            </table>
                                                        </th>
                                                    </tr>
                                                @endif
                                            @endforeach
                                            
                                        </table>
                                        {{-- <div class="row justify-content-right">
                                            <div class="mt-3 pt-3">
                                                <div class="form-group">
                                                    <label for=""></label>
                                                    <button id="addmore" type="button" class="add_input btn btn-secondary">Add New Section</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="append_dynamic_fields">

                                        </div> --}}
                                      </div>
                                    @else
                                        <div class="form-group">
                                            <label for="">Title</label>
                                            <input type="text" class="form-control" name="tilte" value="{{$data->tilte}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Description</label>
                                            <textarea name="desc" id="desc" class="form-control" placeholder="Enter description" >{{ old('desc') ? old('desc') : $data->desc }}</textarea>
                                        </div>
                                @endif

                               
                                    
                               

                                @if ( $data->page=="About us")
                                <div class="form-group">
                                    <label for="">About Videos*</label>                            
                                    <input type="text" name="about_videos" id="about_videos" class="form-control"  value="{{$data->about_videos}}">
                                </div>

                                <div class="form-group">
                                    <label for="">Founder's Message</label>
                                    <textarea name="about_founder_msg" id="about_founder_msg" class="form-control" placeholder="Enter Founder's Message" >{{ old('about_founder_msg') ? old('about_founder_msg') : $data->about_founder_msg }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="">Principal's Message</label>
                                    <textarea name="about_principal_msg" id="about_principal_msg" class="form-control" placeholder="Enter Principal's Message" >{{ old('about_principal_msg') ? old('about_principal_msg') : $data->about_principal_msg }}</textarea>
                                </div>
                                <input type="hidden" name="old_vdo_path" value="{{$data->about_videos}}">
                                @endif
                              

                           @endif
                            {{-- HomePage --}}
                            @if($data->id==1)
                              {{-- <div class="row">
                                 <div class="col-md-4">
                                    <label for=""><strong>WACE</strong></label>
                                    <p for="background_image">Image</p>
                                    <div class="form-group">
                                        <input type="file" name="background_image" value="{{$data->background_image}}"  accept="image/*">
                                        <img src="{{$data->background_image?asset($data->background_image):asset('backend-assets/images/placeholder.jpg')}}" alt="" width="25%">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Title</label>
                                        <input type="text" name="tilte" value="{{$data->tilte}}" placeholder="Enter wace title here" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Description</label>
                                        <textarea name="descr" value="" class="form-control"></texarea>
                                    </div>
                                 </div>

                              </div> --}}
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for=""><strong>CURRICULUM</strong></label>
                                        <p for="curriculum_image">Image</p>
                                        <div class="form-group">
                                            <input type="file" name="curriculum_image" value="{{$data->curriculum_image}}" accept="image/*" >
                                            <img src="{{$data->curriculum_image?asset($data->curriculum_image):asset('backend-assets/images/placeholder.jpg')}}" alt="" width="25%">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Description</label>
                                            <textarea name="curriculum_desc" id="curriculum_desc" class="form-control" placeholder="Enter description" >{{ old('curriculum_desc') ? old('curriculum_desc') : $data->curriculum_desc }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for=""><strong>BEYOND ACADEMICS</strong></label>
                                        <p for="beyond_image">Image</p>
                                        <div class="form-group">
                                            <input type="file" name="beyond_image" value="{{$data->beyond_image}}" accept="image/*" >
                                            <img src="{{$data->beyond_image?asset($data->beyond_image):asset('backend-assets/images/placeholder.jpg')}}" alt="" width="25%">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Description</label>
                                            <textarea name="beyond_desc" id="beyond_desc" class="form-control" placeholder="Enter description" >{{ old('beyond_desc') ? old('beyond_desc') : $data->beyond_desc }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for=""><strong>ADMISSIONS</strong></label>
                                        <p for="admission_image">Image</p>
                                        <div class="form-group">
                                            <input type="file" name="admission_image" value="{{$data->admission_image}}" accept="image/*" >
                                            <img src="{{$data->admission_image?asset($data->admission_image):asset('backend-assets/images/placeholder.jpg')}}" alt="" width="25%">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Description</label>
                                            <textarea name="admission_desc" id="admission_desc" class="form-control" placeholder="Enter description" >{{ old('admission_desc') ? old('admission_desc') : $data->admission_desc }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <label for="">BANNER</label>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Background Image</label>
                                            <input type="file" name="background_image" value="{{$data->background_image}}"  accept="image/*">
                                            <img src="{{$data->background_image?asset($data->background_image):asset('backend-assets/images/placeholder.jpg')}}" alt="" width="25%">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Title</label>
                                            <input type="text" name="tilte" value="{{$data->tilte}}" placeholder="Enter title here" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Description</label>
                                            <textarea name="desc" class="form-control" rows="2" cols="3">{{$data->desc}}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Button text</label>
                                            <input type="text" name="btn_text" value="{{$data->btn_text}}" placeholder="Enter button text here" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Button link</label>
                                            <input type="text" name="btn_link" value="{{$data->btn_link}}" placeholder="Enter button link here" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <label for=""><strong>School Walkthrough</strong></label>       
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Description</label>
                                            <textarea name="walkthrough_desc" id="walkthrough_desc" class="form-control" placeholder="Enter description" >{{ old('walkthrough_desc') ? old('walkthrough_desc') : $data->walkthrough_desc }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Video</label>
                                            <input type="text" class="form-control" name="walkthrough_video" value="{{$data->walkthrough_video}}" placeholder="Enter video path here" >
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <label for=""><strong>SCHOOL CORE VALUES</strong></label>
                                <div class="form-group">
                                    <label for="">Description</label>
                                    <textarea name="core_value_desc" id="core_value_desc" class="form-control" placeholder="Enter description" >{{ old('core_value_desc') ? old('core_value_desc') : $data->core_value_desc }}</textarea>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Image 1</label>
                                            <input type="file" class="form-control" name="core_value_image_1" accept="image/*" >
                                            <img src="{{$data->core_value_image_1?asset($data->core_value_image_1):asset('backend-assets/images/placeholder.jpg')}}" alt="" width="25%" style="background-color:#293b8c;">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Title 1</label>
                                            <input type="text" class="form-control" name="core_value_title_1" value="{{$data->core_value_title_1}}" placeholder="Enter title here">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Image 2</label>
                                            <input type="file" class="form-control" name="core_value_image_2" accept="image/*" >
                                            <img src="{{$data->core_value_image_2?asset($data->core_value_image_2):asset('backend-assets/images/placeholder.jpg')}}" alt="" width="25%" style="background-color:#293b8c;">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Title 2</label>
                                            <input type="text" class="form-control" name="core_value_title_2" value="{{$data->core_value_title_2}}" placeholder="Enter title here">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Image 3</label>
                                            <input type="file" class="form-control" name="core_value_image_3" accept="image/*" >
                                            <img src="{{$data->core_value_image_3?asset($data->core_value_image_3):asset('backend-assets/images/placeholder.jpg')}}" alt="" width="25%" style="background-color:#293b8c;">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Title 3</label>
                                            <input type="text" class="form-control" name="core_value_title_3" value="{{$data->core_value_title_3}}" placeholder="Enter title here">
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <label for=""><strong>Founder’s Perspective</strong></label>
                                <div class="form-group">
                                    <textarea name="founder_perspective" id="founder_perspective" class="form-control" placeholder="Enter description" >{{ old('founder_perspective') ? old('founder_perspective') : $data->founder_perspective }}</textarea>
                                </div>
                                <hr>
                                <div class="row mb-4">
                                    <div class="col-md-3">
                                        <label for=""><strong>Teacher-Student mentorship</strong></label>
                                        <input type="text" name="teacher_student_mentorship" class="form-control"  value="{{$data->teacher_student_mentorship}}">
                                    </div>
                                    <div class="col-md-3">
                                        <label for=""><strong>Staff Only</strong></label>
                                        <input type="text" name="staff_only" class="form-control" value="{{$data->staff_only}}"  >
                                    </div>
                                    <div class="col-md-3">
                                        <label for=""><strong>Board curriculum</strong></label>
                                        <input type="text" name="board_curriculum" class="form-control" value="{{$data->board_curriculum}}" >
                                    </div>
                                    <div class="col-md-3">
                                        <label for=""><strong>A pioneer in Eastern India</strong></label>
                                        <input type="text" name="a_pioneer_in_eastern_india" value="{{$data->a_pioneer_in_eastern_india}}" class="form-control" >
                                    </div>
                                    <div class="col-md-3">
                                        <label for=""><strong>Area of School</strong></label>
                                        <input type="text" name="area_of_school" value="{{$data->area_of_school}}" class="form-control" >
                                    </div>
                                </div>
                            @endif
                            <input type="hidden" name="id" value="{{ $data->id }}">
                            
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

  {{-- New tab section modal --}}
  <!-- Button trigger modal -->
{{-- <button type="button" class="btn btn-primary">
    Launch demo modal
  </button> --}}
  
  

  <!--Add new section Modal -->
  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">W.A.C.E </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
            <form action="{{route('admin.wace.tab.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Title</label>
                        <input type="text" name="title" class="form-control" placeholder="Enter the title here">
                        @error('title')
                            <p class="text-danger small">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Description</label>
                        <textarea name="wace_tab_desc" id="wace_tab_desc" class="form-control" cols="30" rows="2" placeholder="Enter the description here"></textarea>
                        @error('wace_tab_desc')
                        <p class="text-danger small">{{$message}}</p>
                    @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Image</label>
                        <input type="file" name="image" class="form-control" onchange="imgUpload(event)">
                        @error('image')
                        <p class="text-danger small">{{$message}}</p>
                       @enderror
                        <div id="imgPreview"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                <input type="hidden" name="page_content_id" value="{{ $data->id }}">

            </form>
      </div>
    </div>
  </div>
  

@section('script')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- jQuery and Bootstrap JS -->
{{-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script> --}}
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        var editor;
        // $(document).ready(function() {
        $('#exampleModalCenter').on('shown.bs.modal', function () {
            if(!editor){
                 ClassicEditor
                .create(document.querySelector('#wace_tab_desc'))
                .then(newEditor => {
                    editor = newEditor;
                })
                .catch(error => {
                    console.error(error);
                });
            }        
        });
        // });

        var editors = {};
    $(document).ready(function() {
    // When any modal with class '.edit-modal' is shown
    $('.modal').on('shown.bs.modal', function () {
        var modalId = $(this).attr('id');
        var textareaId = 'edit_tab_desc' + modalId.replace('exampleModalCenterEdit', '');
    if(!editors[textareaId])
        ClassicEditor
            .create(document.querySelector('#' + textareaId))
            .then(newEditor => {
                editors[textareaId] = newEditor;  // Store the editor instance in a variable for later use if needed
            })
            .catch(error => {
                console.error(error);
            });
    });
});
     
        checkCatParentLevel();
        document.addEventListener('DOMContentLoaded', function () {
        ClassicEditor
        .create( document.querySelector( '#description' ) )
        .catch( error => {
            console.error( error );
        });
        ClassicEditor
        .create( document.querySelector( '#desc' ) )
        .catch( error => {
            console.error( error );
        });
        ClassicEditor
        .create( document.querySelector( '#desc1' ) )
        .catch( error => {
            console.error( error );
        });
        ClassicEditor
        .create( document.querySelector( '#desc2' ) )
        .catch( error => {
            console.error( error );
        });
        ClassicEditor
        .create( document.querySelector( '#curriculum_desc' ) )
        .catch( error => {
            console.error( error );
        });
        ClassicEditor
        .create( document.querySelector( '#beyond_desc' ) )
        .catch( error => {
            console.error( error );
        });
           
        ClassicEditor
        .create( document.querySelector( '#admission_desc' ) )
        .catch( error => {
            console.error( error );
        });
        ClassicEditor
        .create( document.querySelector( '#walkthrough_desc' ) )
        .catch( error => {
            console.error( error );
        });
        ClassicEditor
        .create( document.querySelector( '#core_value_desc' ) )
        .catch( error => {
            console.error( error );
        });
        // ClassicEditor
        // .create( document.querySelector( '#admission_desc' ) )
        // .catch( error => {
        //     console.error( error );
        // });
    });
      

    $(document).ready(function() {
        $('.delete-btn').click(function() {
            var itemId = $(this).data('id');
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '../../delete/' + itemId; // Replace '/delete/' with your actual delete route
                }
            });
        });
    });

    $(document).ready(function() {
        $('.delete-btn-sub').click(function() {
            var itemId = $(this).data('id');
            alert(itemId);
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '../../wace-new-tab-delete/' + itemId; // Replace '/delete/' with your actual delete route
                }
            });
        });
    });

     function waceNewTab(id){
        // alert(id);
        const title = $('#wace_tab'+id).find('input[name="title"]').val();
        const description = $('#wace_tab'+id).find('textarea[name="tab_desc"]').val();
       
        let isValid = true;
    if (!title) {
        isValid = false;
        $('#error-title-' + id).text('Title is required.').show();
    } else {
        $('#error-title-' + id).hide();
    }

    if (!description) {
        isValid = false;
        $('#error-desc-' + id).text('Description is required.').show();
    } else {
        $('#error-desc-' + id).hide();
    }

    if (isValid) {
        $('#wace_tab'+id).submit();
    }
    //    .submit();
     }

    function editWace(id,sl){
    const title = $('#edit_title'+id).val();
 // Retrieve the CKEditor instance and get its data
    const edit_description = editors['edit_tab_desc' + id].getData();    
    const imageInput = $('#edit_tab_image'+id).val();
    const image = $('#edit_tab_image' + id)[0].files[0]; // Get the file input
    const wace_tab_id = $('#wace_tab_id'+id).val();
    const page_content_id = '{{$data->id}}';
    // alert(edit_description);
    
    // $('#edit-title-error' + id).text('');
    // $('#edit-desc-error' + id).text('');
    // $('#edit-image-error' + id).text('');


    let isValid = true;

    // Validation checks
    if (!title) {
         $('#edit-title-error' + id).text('Title is required.').show();
        isValid = false;
    }
    
    if (!edit_description) {
        $('#edit-desc-error' + id).text('Description is required.').show();
        isValid = false;
    }

    // if (!imageInput) {
    //     $('#edit-image-error' + id).text('Image is required.').show();
    //     isValid = false;
    // } 
    if (isValid) {
        if(sl==1){
            var formData = new FormData();
            formData.append('title', title);
            formData.append('wace_tab_desc', edit_description);
            formData.append('image', image);
            formData.append('wace_tab_id', wace_tab_id);
            formData.append('page_content_id', page_content_id);
            formData.append('_token', '{{ csrf_token() }}');
            $.ajax({
                url: "{{route('admin.wace.tab.Update1')}}", // The action attribute of the form
                type: 'POST',
                data: formData,
                processData: false, // Tell jQuery not to process the data
                contentType: false, // Tell jQuery not to set content type
                success: function(response) {
                    // Handle success response
                    toastFire('success', 'Form submitted successfully');
                    location.reload();
                    // Optionally, close the modal or provide feedback to the user
                },
                error: function(xhr, status, error) {
                    // Handle error response
                    console.error('Form submission failed:', error);
                    // Optionally, display error messages or handle the error appropriately
                }
            });
        }else{
            $('#'+sl+'wace_tab_update'+id).submit();
        }
        
    }

}

function editWaceNewTab(id){
    // alert(id);
    const title = $('#new_tab_title'+id).val();
    const description = $('#new_tab_desc'+id).val();
    
    $('#edit-new-title-' + id).text('');
    $('#edit-new-desc-' + id).text('');

    let isValid = true;

    if(!title){
        $('#edit-new-title-'+id).text('Title is required').show();
        isValid = false;
    }

    if(!description){
        $('#edit-new-desc-'+id).text('Description is required').show();
        isValid = false;
    }

    if(isValid){
        $('#wace_new_tab'+id).submit();
    }

}

    

    


    </script>
    
@endsection