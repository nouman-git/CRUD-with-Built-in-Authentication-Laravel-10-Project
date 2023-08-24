@extends('cars/car_layouts/layout')


@section('content')

<div id="editCarModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('manufacturers.update', $manufacturer->id) }}" method="POST">
                @csrf

                {{-- cars.update uses the PUT method --}}
                @method('PUT')

                <div class="modal-header">
                    <h4 class="modal-title">Edit Manufacturer Record</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Manufacturer Name</label>
                        <input type="text" class="form-control {{ $errors->has('manufacturer_name') ? 'is-invalid' : '' }}"
                            name="manufacturer_name" value="{{ $manufacturer->manufacturer_name }}">
                        @if ($errors->has('manufacturer_name'))
                        <div class="invalid-feedback">{{ $errors->first('manufacturer_name') }}</div>
                        @endif

                </div>
                <div class="modal-footer">
                    <a href="{{ route('manufacturers.index') }}" class="btn btn-default">Cancel</a>
                    <input type="submit" class="btn btn-success" value="Save">
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
