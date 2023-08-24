@extends('cars/car_layouts/layout')


@section('content')

<div id="editCarModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('vehicles.update', $vehicle->id) }}" method="POST">
                @csrf

                {{-- cars.update uses the PUT method --}}
                @method('PUT')

                <div class="modal-header">
                    <h4 class="modal-title">Edit vehicle Record</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>vehicle Name</label>
                        <input type="text" class="form-control {{ $errors->has('vehicle_name') ? 'is-invalid' : '' }}"
                            name="vehicle_name" value="{{ $vehicle->vehicle_name }}">
                        @if ($errors->has('vehicle_name'))
                        <div class="invalid-feedback">{{ $errors->first('vehicle_name') }}</div>
                        @endif

                </div>
                <div class="modal-footer">
                    <a href="{{ route('vehicles.index') }}" class="btn btn-default">Cancel</a>
                    <input type="submit" class="btn btn-success" value="Save">
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
