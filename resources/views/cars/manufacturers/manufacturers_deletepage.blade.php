@extends('cars/car_layouts/layout')


@section('content')
 <!-- Delete Modal HTML -->
    <div id="deleteEmployeeModal" >
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{route('manufacturers.destroy' , $id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <div class="modal-header">
                        <h4 class="modal-title">Delete Record</h4>

                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to delete this Record?</p>
                        <p class="text-warning"><small>This action cannot be undone.</small></p>
                    </div>
                    <div class="modal-footer">
                        {{-- <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel"> --}}
                        <a href="{{route('manufacturers.index')}}" class="btn btn-default">Cancel</a>
                        <input type="submit" class="btn btn-danger" value="Delete">
                    </div>
                </form>
            </div>
        </div>
    </div>




@endsection
