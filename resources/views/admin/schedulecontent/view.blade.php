@extends('admin.layout.app')
@section('page-title', 'Class Wise Day')

@section('section')
<style>
</style>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row mb-3">
                            <div class="col-md-12 text-right">
                                <button class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal"> <i class="fa fa-plus"></i> Add Class wise day</button>

                                <a href="{{ route('admin.schedulecontent.list.all') }}" class="btn btn-sm btn-secondary"> <i class="fa fa-chevron-left"></i> Back</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">

                        <table class="table table-sm table-hover">
                            <thead>
                                <tr>
                                    <th style="width: 5px">#</th>
                                    <th width="25%">Class</th>
                                    <th width="25%">Day</th>
                                    <th>Status</th>
                                    <th width="10%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @forelse ($daily_schedule_data as $index => $item)
                                <tr class="text-left align-middle">
                                    <td>{{ $index+1}}</td>
                                    <td>{{ $item->ClassData?$item->ClassData->name:"" }}</td>
                                    <td>{{ $item->day }}</td>
                                    <td>
                                        <div class="custom-control custom-switch mt-1">
                                            <input type="checkbox" class="custom-control-input" id="customSwitch{{$item->id}}" {{ ($item->status == 1) ? 'checked' : '' }} onchange="statusToggle('{{ route('admin.dailyschedule.status', $item->id) }}')">
                                            <label class="custom-control-label" for="customSwitch{{$item->id}}"></label>
                                        </div>
                                    </td>
                                    <td class="d-flex text-right">
                                        <div class="btn-group">
                                            <a href="{{ route('admin.dailyschedule.list', $item->id) }}" class="btn btn-sm btn-info" data-toggle="tooltip" title="Schedule">
                                                Schedules
                                            </a>
                                            <button data-bs-toggle="modal" data-bs-target="#exampleModal{{$item->id}}" class="btn btn-sm btn-dark" data-toggle="tooltip" title="Edit">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                            <a href="javascript:void(0);"  class="btn btn-sm btn-danger delete-btn" data-toggle="tooltip" title="Delete" data-id="{{ $item->id }}">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </div>
                                        <div class="modal fade" id="exampleModal{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel{{$item->id}}">Update Class wise day</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{route('admin.dailyschedule.update')}}" method="post" enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="form-group" style="text-align: justify;">
                                                                <label for="">Class*</label>
                                                                <select name="class" class="form-control">
                                                                    @foreach ($Class as $index => $itemData)
                                                                    <option value="{{$itemData->id}}" {{$item->class_id==$itemData->id?"selected":""}}>{{$itemData->name}}</option>
                                                                    @endforeach
                                                                </select>
                                                                @error('class') <p class="small text-danger">{{ $message }}</p> @enderror
                                                            </div>
                                        
                                                            <div class="form-group" style="text-align: justify;">
                                                                <label for="title">Day *</label>
                                                                <input type="text" class="form-control text-left" name="day" placeholder="Enter Day Schedule" value="{{ $item->day }}">
                                                                @error('day') <p class="small text-danger">{{ $message }}</p> @enderror
                                                            </div>
                                                            <input type="hidden" name="id" value="{{$item->id}}">
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                <button class="btn btn-primary">Update</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="100%" class="text-center">No records found</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>


                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
<!--Add Scheduled Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New Class wise day</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('admin.dailyschedule.stored')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="title">Choose Class *</label>
                        <select name="class" id="class" class="form-control">
                            @foreach ($Class as $index => $item)
                            <option selected hidden>----Select----</option>
                            <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                        @error('class') <p class="small text-danger">{{ $message }}</p> @enderror
                    </div>

                    <div class="form-group">
                        <label for="title">Day *</label>
                        <input type="text" class="form-control" name="day" id="day" placeholder="Enter Day Schedule" value="{{ old('day') }}">
                        @error('day') <p class="small text-danger">{{ $message }}</p> @enderror
                    </div>
                
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button class="btn btn-primary">Upload</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<!-- end modal -->

@endsection
@section('script')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
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
                    window.location.href = 'dailyschedule/delete/' + itemId; // Replace '/delete/' with your actual delete route
                }
            });
        });
    });

</script>

@endsection