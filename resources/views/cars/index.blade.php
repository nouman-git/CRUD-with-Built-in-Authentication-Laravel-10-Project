@extends('cars/car_layouts/layout')

@section('title')
Cars
@endsection

@section('content')
    <div class="container-xl">
        <!-- FILTER MODEL -->

        <div id="filterModal" class="modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"><strong>Apply Filters</strong></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Add your filter options here -->
                        <form id="filterForm">
                            <div class="row">
                                <!-- First Column - Manufacturers -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label><strong>Manufacturer</strong></label>
                                        @foreach ($manufacturers as $manufacturer)
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" name="manufacturers[]"
                                                    value="{{ $manufacturer->id }}"
                                                    id="manufacturer_{{ $manufacturer->id }}">
                                                <label class="form-check-label" for="manufacturer_{{ $manufacturer->id }}">
                                                    {{ $manufacturer->manufacturer_name }}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <!-- Second Column - Vehicle Types -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label><strong>Vehicle Type</strong></label>
                                        @foreach ($types as $type)
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" name="types[]"
                                                    value="{{ $type->id }}" id="type_{{ $type->id }}">
                                                <label class="form-check-label" for="type_{{ $type->id }}">
                                                    {{ $type->vehicle_name }}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
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
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="applyFilters">Apply</button>
                    </div>
                    </form>


                </div>
            </div>
        </div>
        <!-- END OF FILTER MODEL -->



        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-4">
                            <h2><b>Car Detaills</b></h2>
                        </div>
                        <div class="col-sm-8">

                            <a href="#" class="btn btn-danger"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="material-icons">&#xe9ba;</i> <span>Logout</span>

                            </a>

                            <!-- Hidden form for logout -->
                            <form id="logout-form" method="POST" action="{{ route('logout') }}" style="display: none;">
                                @csrf
                            </form>

                            <a href="{{ route('cars.create') }}" class="btn btn-success"><i
                                    class="material-icons">&#xE147;</i>
                                <span>Add New Vehicle</span></a>

                            {{-- <a href="{{ route('cars.filterpage') }}" class="btn btn-info">
                                <i class="material-icons">&#xef4f;</i> <span>Filters</span>
                            </a> --}}
                            <!-- Add a button to open the filter modal -->
                            <a href="#" class="btn btn-info" data-toggle="modal" data-target="#filterModal">
                                <i class="material-icons">&#xef4f;</i> <span>Apply Filters</span>
                            </a>


                            {{-- if filters are applied then show clear filter elso no --}}
                            @if (session()->has('manufacturersFilter') || session()->has('typesFilter'))
                                <a href="{{ route('cars.clearfilter') }}" class="btn btn-secondary">
                                    <i class="material-icons">&#xeb32;</i> <span>Clear Filters</span>
                                </a>
                            @endif



                        </div>
                    </div>
                </div>
                <table class="table table-striped table-hover">

                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Owner</th>
                            <th>Manufacturer</th>
                            <th>Vehicle Type</th>
                            <th>Price</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($cars as $car)
                            <tr>
                                <td>{{ $cars->perPage() * $cars->currentPage() - $cars->perPage() + $loop->iteration }}
                                </td>
                                <td>{{ Str::ucfirst($car->owner) }}</td>
                                <td>{{ Str::ucfirst($car->manufacturer->manufacturer_name) }}</td>
                                <td>{{ Str::ucfirst($car->type->vehicle_name) }}</td>
                                <td>${{ $car->price }}</td>
                                <td>
                                    <a href="{{ route('cars.edit', $car->id) }}" class="edit"><i class="material-icons"
                                            data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                                    <a href="{{ route('cars.deletepage', $car->id) }}" class="delete"><i
                                            class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div style="margin-top: 5px">
                    {{ $cars->links('pagination::bootstrap-5') }}
                </div>
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


