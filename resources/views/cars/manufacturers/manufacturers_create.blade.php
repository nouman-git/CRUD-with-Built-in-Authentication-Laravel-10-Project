@extends('cars/car_layouts/layout')

@section('content')




<div id="addEmployeeModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="{{ route('manufacturers.store') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title"><strong> Add Manufacturer </strong></h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="manufacturer_name"><strong> Name </strong></label>
                        <input placeholder="Mnaufacturer Name" type="text" class="form-control {{ $errors->has('manufacturer_name') ? 'is-invalid' : '' }}" name="manufacturer_name" value="{{ old('manufacturer_name') }}">
                        @if($errors->has('manufacturer_name'))
                            <div class="invalid-feedback">
                                {{ $errors->first('manufacturer_name') }}
                            </div>
                        @endif
                    </div>


                </div>
                <div class="modal-footer">
                    <a href="{{ route('manufacturers.index') }}" class="btn btn-default">Cancel</a>
                    <input type="submit" class="btn btn-success" value="Add">
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
