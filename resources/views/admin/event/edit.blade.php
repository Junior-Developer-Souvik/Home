@extends('admin.layout.app')
@section('page-title', 'Edit Event')

@section('section')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row mb-3">
                            <div class="col-md-12 text-right">
                                <a href="{{ route('admin.event.list.all') }}" class="btn btn-sm btn-primary"> <i class="fa fa-chevron-left"></i> Back</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.event.update') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="title">Title<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="title" id="title" placeholder="Enter Title" value="{{ $data->title }}">
                                @error('title') <p class="small text-danger">{{ $message }}</p> @enderror
                            </div>
                            <div class="form-group">
                                <label for="short_desc">Short Description<span class="text-danger">*</span></label>
                                <textarea name="short_desc" id="short_desc" class="form-control" cols="10" rows="2">{{ $data->short_desc}}</textarea>
                                @error('short_desc') <p class="small text-danger">{{ $message }}</p> @enderror
                            </div>
                            <div class="form-group">
                                <label for="title">Long Decription<span class="text-danger">*</span></label>
                                <textarea class="form-control" name="description" id="description" placeholder="Enter Decription Here"> {{ $data->desc }}</textarea>
                                @error('description') <p class="small text-danger">{{ $message }}</p> @enderror
                            </div>
                            <div class="form-group">
                                <label for="event_category">Category<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="event_category" id="event_category" placeholder="Enter category" value="{{ $data->event_category }}">
                                @error('event_category') <p class="small text-danger">{{ $message }}</p> @enderror
                            </div>
                            <div class="form-group">
                                <label for="title">Image<span class="text-danger">*</span></label>
                                <img src="{{asset($data->image)}}" alt="No-Image" srcset="" height="100px" width="100px" class="img-thumbnail" title="{{$data->title}}">
                                <br>
                                <input type="file" class="form-control" name="pic" id="pic">
                                @error('pic') <p class="small text-danger">{{ $message }}</p> @enderror
                            </div>
                            <input type="hidden" name="id" value="{{$data->id}}">
                            <input type="hidden" name="old_event_img" value="{{ $data->image }}">
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
        CKEDITOR.replace('description');
       
    </script>
     {{-- <script>
        // Initialize CKEditor
        ClassicEditor
            .create( document.querySelector( '#description' ) )
            .then( editor => {
                console.log( 'Editor was initialized', editor );
            } )
            .catch( error => {
                console.error( 'There was a problem initializing the editor:', error );
            } );
    </script> --}}
@endsection