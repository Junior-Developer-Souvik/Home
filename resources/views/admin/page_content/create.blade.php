@extends('admin.layout.app')
@section('page-title', 'Create New Page')

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
                        <form action="{{ route('admin.page_content.store') }}" method="post" enctype="multipart/form-data">@csrf
                            <div class="form-group">
                                <input type="hidden" name="custom_field"  id="custom_field" />
                                <label for="">New Page Name</label>
                                <input type="text" class="form-control" name="page" id="page"  placeholder="Enter new page name" value="{{old('page')}}">
                                @error('page')
                                  <p class="small text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="tilte">New Page Title *</label>
                                <input type="text" class="form-control" name="tilte" id="tilte" placeholder="Enter tilte.." value="{{ old('tilte') }}">
                                @error('tilte') <p class="small text-danger">{{ $message }}</p> @enderror
                            </div>

                            <div class="form-group">
                                <label for="">New Page Location*</label>
                                <select name="location" id="location" class="form-control" >
                                    <option selected hidden>--Select Options--</option>
                                    <option value="header">Header</option>
                                    <option value="footer">Footer</option> 
                                </select>
                                @error('location')
                                  <p class="small text-danger">{{$message}}</p>
                                    
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Description*</label>
                                <textarea name="desc" id="desc" cols="4" rows="5" class="form-control" placeholder="">{{old('desc')}}</textarea>
                                @error('desc')
                                    <p class="small text-danger">{{$message}}</p>
                                @enderror
                            </div>
                          
                            </div>
                            <div class="mb-4 ml-4">

                                <button type="submit" class="btn btn-primary">Upload</button>
                            </div>
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
   CKEDITOR.replace( 'desc' ); 
    // Loop through each editor element and initialize ClassicEditor
    
</script>
@endsection
