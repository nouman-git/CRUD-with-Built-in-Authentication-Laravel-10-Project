@extends('cars/car_layouts/layout')

@section('content')




<div id="addEmployeeModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="{{ route('vehicles.store') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title"><strong> Add Vehicle </strong></h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="vehicle_name"><strong> Name </strong></label>
                        <input placeholder="Vehicle Name" type="text" class="form-control {{ $errors->has('vehicle_name') ? 'is-invalid' : '' }}" name="vehicle_name" value="{{ old('vehicle_name') }}">
                        @if($errors->has('vehicle_name'))
                            <div class="invalid-feedback">
                                {{ $errors->first('vehicle_name') }}
                            </div>
                        @endif
                    </div>


                </div>
                <div class="modal-footer">
                    <a href="{{ route('vehicles.index') }}" class="btn btn-default">Cancel</a>
                    <input type="submit" class="btn btn-success" value="Add">
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
