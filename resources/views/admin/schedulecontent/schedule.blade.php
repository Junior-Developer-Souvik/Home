@extends('admin.layout.app')
@section('page-title', $DailySchedule->ClassData->name.'->'.$DailySchedule->day)
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
                                <button class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal"> <i class="fa fa-plus"></i> Add Schedule</button>
                                <a href="{{ route('admin.schedulecontent.view') }}" class="btn btn-sm btn-secondary"> <i class="fa fa-chevron-left"></i> Back</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">

                        <table class="table table-sm table-hover">
                            <thead>
                                <tr>
                                    <th width="5%">#</th>
                                    <th width="25%">Time</th>
                                    <th width="25%">Description</th>
                                    <th width="10%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @forelse ($data as $index => $item)
                                <tr class="text-left align-middle">
                                    <td>{{ $index+1}}</td>
                                    <td>{{ $item->time }}</td>
                                    <td>{{ $item->desc }}</td>
                                    <td class="d-flex text-right">
                                            <button data-bs-toggle="modal" data-bs-target="#exampleModal{{$item->id}}" class="btn btn-sm btn-dark" data-toggle="tooltip" title="Edit">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                            <a href="javascript:void(0);" class="btn btn-sm btn-danger delete-btn" data-toggle="tooltip" title="Delete" data-id="{{ $item->id }}">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </div>
                                        <div class="modal fade" id="exampleModal{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel{{$item->id}}">Update Schedule</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{route('admin.schedule.update')}}" method="post" enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="form-group" style="text-align: justify;">
                                                                <label for="">Time*</label>
                                                                <input type="text" class="form-control" name="time" value="{{$item->time}}" required>
                                                                @error('time') <p class="small text-danger">{{ $message }}</p> @enderror
                                                            </div>
                                        
                                                            <div class="form-group" style="text-align: justify;">
                                                                <label for="desc">Description *</label>
                                                                <textarea name="desc" rows="3" class="form-control">{{$item->desc}}</textarea>
                                                                @error('desc') <p class="small text-danger">{{ $message }}</p> @enderror
                                                            </div>
                                                            
                                                            <input type="hidden" name="id" value="{{$item->id}}">
                                                            <input type="hidden" name="daily_schedule_id" value="{{$DailySchedule->id}}">
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
                <h5 class="modal-title" id="exampleModalLabel">New Schedule</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('admin.schedule.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group" style="text-align: justify;">
                        <label for="">Time*</label>
                        <input type="text" class="form-control" name="time" required>
                        @error('time') <p class="small text-danger">{{ $message }}</p> @enderror
                    </div>

                    <div class="form-group" style="text-align: justify;">
                        <label for="desc">Description *</label>
                        <textarea name="desc" rows="3" class="form-control"></textarea>
                        @error('desc') <p class="small text-danger">{{ $message }}</p> @enderror
                    </div>
                    <input type="hidden" name="daily_schedule_id" value="{{$DailySchedule->id}}">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button class="btn btn-primary">Save</button>
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
                    window.location.href = '../../schedule/delete/' + itemId; // Replace '/delete/' with your actual delete route
                }
            });
        });
    });

</script>

@endsection