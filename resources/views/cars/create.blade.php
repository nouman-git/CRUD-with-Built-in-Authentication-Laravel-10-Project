@extends('cars/car_layouts/layout')

@section('content')



<div id="addEmployeeModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="{{ route('cars.store') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title"><strong> Add Record </strong></h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="owner"><strong> Owner's Name </strong></label>
                        <input placeholder="Owner's Name" type="text" class="form-control {{ $errors->has('owner') ? 'is-invalid' : '' }}" name="owner" value="{{ old('owner') }}">
                        @if($errors->has('owner'))
                            <div class="invalid-feedback">
                                {{ $errors->first('owner') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="manufacturer"><strong> Manufacturer </strong></label>
                        <select name="manufacturer" class="form-control {{ $errors->has('manufacturer') ? 'is-invalid' : '' }}">
                            <option value="" selected disabled>Select Manufacturer</option>
                            @foreach ($manufacturerNames as $manufacturerName)
                                <option value="{{ $manufacturerName }}">{{ $manufacturerName }}</option>
                            @endforeach
                        </select>


                        @if($errors->has('manufacturer'))
                            <div class="invalid-feedback">
                                {{ $errors->first('manufacturer') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="type"><strong> Vehicle Type </strong></label>

                        <select name="type" class="form-control {{ $errors->has('type') ? 'is-invalid' : '' }}">
                            <option value="" selected disabled>Select Vehicle Type</option>
                            @foreach ($vehicleNames as $vehicleName)
                                <option value="{{ $vehicleName }}">{{ $vehicleName }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('type'))
                            <div class="invalid-feedback">
                                {{ $errors->first('type') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="price"><strong> Price </strong></label>
                        <input placeholder="Price" type="number" class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}" name="price" value="{{ old('price') }}">
                        @if($errors->has('price'))
                            <div class="invalid-feedback">
                                {{ $errors->first('price') }}
                            </div>
                        @endif
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="{{ route('cars.index') }}" class="btn btn-default">Cancel</a>
                    <input type="submit" class="btn btn-success" value="Add">
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
