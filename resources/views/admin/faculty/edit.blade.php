@extends('admin.layout.app')
@section('page-title', 'Edit Faculty')

@section('section')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row mb-3">
                            <div class="col-md-12 text-right">
                                <a href="{{ route('admin.faculty.list.all') }}" class="btn btn-sm btn-primary"> <i class="fa fa-chevron-left"></i> Back</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.faculty.update') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="title">Faculty Name *</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name" value="{{ $data->name }}">
                                @error('name') <p class="small text-danger">{{ $message }}</p> @enderror
                            </div>
                            <div class="form-group">
                                <label for="title">Designation *</label>
                                <input type="text" class="form-control" name="designation" id="designation" placeholder="Enter Designation" value="{{ $data->designation }}">
                                @error('designation') <p class="small text-danger">{{ $message }}</p> @enderror
                            </div>
                            <div class="form-group">
                                <label for="class_name">Class</label>
                                <select name="class_name" class="form-control">
                                    <option value="" selected>Select class</option>
                                    @foreach ($StudentClass as $item)
                                       <option value="{{$item->name}}" {{$data->class_name==$item->name?"selected":""}}>{{$item->name}}</option> 
                                    @endforeach
                                </select>
                                @error('class_name') <p class="small text-danger">{{ $message }}</p> @enderror
                            </div>
                            <div class="form-group">
                                <label for="title">Description *</label>
                                <textarea class="form-control" name="description" id="description" placeholder="Enter Description Here">{{ $data->desc }}</textarea>
                                @error('description') <p class="small text-danger">{{ $message }}</p> @enderror
                            </div>
                            <div class="form-group">
                                <label for="title">Profile Picture *</label>
                                <img src="{{asset($data->image)}}" alt="No-Image" srcset="" height="100px" width="100px" class="img-thumbnail" title="{{$data->name}}">
                                <br>
                                <input type="file" class="form-control" name="pic" id="pic">
                                @error('pic') <p class="small text-danger">{{ $message }}</p> @enderror
                            </div>
                            <input type="hidden" name="id" value="{{$data->id}}">
                            <input type="hidden" name="old_faculty_img" value="{{ $data->image }}">
                            <label for="title">Social Media Link</label>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="facebook_link">Facebook link</label>
                                        <input type="text" class="form-control" name="facebook_link" id="facebook_link" placeholder="" value="{{ $data->facebook_link }}">
                                        @error('facebook_link') <p class="small text-danger">{{ $message }}</p> @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="twitter_link">Twitter link</label>
                                        <input type="text" class="form-control" name="twitter_link" id="twitter_link" placeholder="" value="{{ $data->twitter_link }}">
                                        @error('twitter_link') <p class="small text-danger">{{ $message }}</p> @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="instagram_link">Linkedin link</label>
                                        <input type="text" class="form-control" name="instagram_link" id="instagram_link" placeholder="" value="{{ $data->instagram_link }}">
                                        @error('instagram_link') <p class="small text-danger">{{ $message }}</p> @enderror
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Upload</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('script')
    <script>
        checkCatParentLevel();
    </script>
@endsection