@extends('cars/car_layouts/layout')


@section('content')

<div id="editCarModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('cars.update', $car->id) }}" method="POST">
                @csrf

                {{-- cars.update uses the PUT method --}}
                @method('PUT')

                <div class="modal-header">
                    <h4 class="modal-title">Edit Vehicle Record</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Owner's Name</label>
                        <input type="text" class="form-control {{ $errors->has('owner') ? 'is-invalid' : '' }}"
                            name="owner" value="{{ $car->owner }}">
                        @if ($errors->has('owner'))
                        <div class="invalid-feedback">{{ $errors->first('owner') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="manufacturer">Manufacturer</label>
                        <select name="manufacturer" class="form-control">
                            @foreach ($manufacturerNames as $manufacturerName)
                            <option value="{{ $manufacturerName }}" {{ $car->manufacturer->manufacturer_name === $manufacturerName ? 'selected' : '' }}>
                                {{ $manufacturerName }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="type">Vehicle Type</label>
                        <select name="type" class="form-control">
                            @foreach ($vehicleNames as $vehicleName)
                            <option value="{{ $vehicleName }}" {{ $car->type->vehicle_name === $vehicleName ? 'selected' : '' }}>
                                {{ $vehicleName }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Price</label>
                        <input type="number" class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}"
                             name="price" value="{{ $car->price }}">
                        @if ($errors->has('price'))
                        <div class="invalid-feedback">{{ $errors->first('price') }}</div>
                        @endif
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="{{ route('cars.index') }}" class="btn btn-default">Cancel</a>
                    <input type="submit" class="btn btn-success" value="Save">
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
