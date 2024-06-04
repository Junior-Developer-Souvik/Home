@extends('admin.layout.app')
@section('page-title', 'Create blog')

@section('section')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row mb-3">
                            <div class="col-md-12 text-right">
                                <a href="{{ route('admin.blog.list.all') }}" class="btn btn-sm btn-primary"> <i class="fa fa-chevron-left"></i> Back</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.blog.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="title">Title <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="title" id="title" placeholder="Enter title" value="{{ old('title') }}">
                                @error('title') <p class="small text-danger">{{ $message }}</p> @enderror
                            </div>
                            <div class="form-group">
                                <label for="short_desc">Short Description <span class="text-danger">*</span></label>
                                <textarea name="short_desc" id="short_desc" class="form-control" cols="10" rows="2">{{ old('short_desc') }}</textarea>
                                @error('short_desc') <p class="small text-danger">{{ $message }}</p> @enderror
                            </div>
                            <div class="form-group">
                                <label for="title">Long Description<span class="text-danger">*</span></label>
                                <textarea class="form-control" name="description" id="description" placeholder="Enter Description Here">{{ old('description') }}</textarea>
                                @error('description') <p class="small text-danger">{{ $message }}</p> @enderror
                            </div>
                            
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="title">Category <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="event_category" id="event_category" placeholder="Enter category" value="{{ old('event_category') }}">
                                        @error('event_category') <p class="small text-danger">{{ $message }}</p> @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="title">Auther(Faculty) <span class="text-danger">*</span></label>
                                            <select name="faculty" id="faculty" class="form-control">
                                                <option value="" selected hidden>select auther..</option>
                                                @foreach ($auther as $item)
                                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                                @endforeach
                                            </select>
                                        @error('event_category') <p class="small text-danger">{{ $message }}</p> @enderror
                                    </div>
                               </div>
                            </div>
                            <div class="form-group">
                                <label for="pic">Image<span class="text-danger">*</span></label>
                                <input type="file" class="form-control" name="pic" id="pic">
                                @error('pic') <p class="small text-danger">{{ $message }}</p> @enderror
                                
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <p>SEO (Optional)</p>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="page_title">Page Title <span class="text-danger">*</span></label>
                                        <textarea name="page_title" id="page_title" class="form-control" cols="10" rows="1">{{ old('page_title') }}</textarea>
                                        @error('page_title') <p class="small text-danger">{{ $message }}</p> @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="meta_title">Meta Title <span class="text-danger">*</span></label>
                                        <textarea name="meta_title" id="meta_title" class="form-control" cols="10" rows="1">{{ old('meta_title') }}</textarea>
                                        @error('meta_title') <p class="small text-danger">{{ $message }}</p> @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="meta_description">Meta Description <span class="text-danger">*</span></label>
                                        <textarea name="meta_description" id="meta_description" class="form-control" cols="10" rows="2">{{ old('meta_description') }}</textarea>
                                        @error('meta_description') <p class="small text-danger">{{ $message }}</p> @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="meta_keyword">Meta Keyword <span class="text-danger">*</span></label>
                                        <textarea name="meta_keyword" id="meta_keyword" class="form-control" cols="10" rows="1">{{ old('meta_keyword') }}</textarea>
                                        @error('meta_keyword') <p class="small text-danger">{{ $message }}</p> @enderror
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
    <script>
        // Initialize CKEditor
        ClassicEditor
            .create( document.querySelector( '#description' ) )
            .then( editor => {
                console.log( 'Editor was initialized', editor );
            } )
            .catch( error => {
                console.error( 'There was a problem initializing the editor:', error );
            } );
    </script>
@endsection