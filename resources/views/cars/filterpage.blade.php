@extends('cars/car_layouts/layout')


{{-- this page was created for filters but now we are dealing filters on index page within index method --}}

@section('content')
<div id="">
    <div class="modal-dialog">
        <div class="modal-content">

            <form action="{{route('cars.applyfilter')}}" method="POST">
                @csrf

                <div class="modal-header">
                    <h4 class="modal-title">Apply Filters</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">

                        <label class="mb-2"><strong  style="font-size: 16px;">Manufacturers</strong> </label><br>
                        <div class="checkbox-grid">
                            @foreach ($manufacturers as $manufacturer)
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="manufacturer_{{ $manufacturer }}"
                                    name="manufacturers[]" value="{{ $manufacturer }}">
                                <label class="form-check-label" for="manufacturer_{{ $manufacturer }}">{{ $manufacturer }}</label>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="mb-2"><strong  style="font-size: 16px;"> Vehicle Types</strong></label><br>
                        <div class="checkbox-grid">
                            @foreach ($vehicleTypes as $type)
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="vehicleType_{{ $type }}"
                                    name="vehicleTypes[]" value="{{ $type }}">
                                <label class="form-check-label" for="vehicleType_{{ $type }}">{{ $type }}</label>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="mb-2"><strong  style="font-size: 16px;"> Price Range</strong></label>
                        <div class="form-row">
                            <div class="col">
                                <label for="minPriceRange">Min</label>
                                <input type="range" class="form-control" id="minPriceRange" name="minPriceRange" min="0" max="10000" step="100">
                                <span id="minRangeValue">0</span> <!-- Display min value here -->
                            </div>
                            <div class="col">
                                <label for="maxPriceRange">Max</label>
                                <input type="range" class="form-control" id="maxPriceRange" name="maxPriceRange" min="0" max="500000" step="100">
                                <span id="maxRangeValue">10000</span> <!-- Display max value here -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="{{ route('cars.index') }}" class="btn btn-default">Cancel</a>
                    <input type="submit" class="btn btn-success" value="Show Results">
                </div>
            </form>

        </div>
    </div>
</div>

<script>
    const minPriceRange = document.getElementById('minPriceRange');
    const maxPriceRange = document.getElementById('maxPriceRange');
    const minRangeValue = document.getElementById('minRangeValue');
    const maxRangeValue = document.getElementById('maxRangeValue');

    minPriceRange.addEventListener('input', () => {
        if (parseInt(minPriceRange.value) > parseInt(maxPriceRange.value)) {
            minPriceRange.value = maxPriceRange.value;
        }
        minRangeValue.innerText = minPriceRange.value;
    });

    maxPriceRange.addEventListener('input', () => {
        if (parseInt(maxPriceRange.value) < parseInt(minPriceRange.value)) {
            maxPriceRange.value = minPriceRange.value;
        }
        maxRangeValue.innerText = maxPriceRange.value;
    });
</script>
@endsection
