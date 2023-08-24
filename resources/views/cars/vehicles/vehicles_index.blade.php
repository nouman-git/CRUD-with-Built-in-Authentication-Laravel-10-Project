@extends('cars/car_layouts/layout')

@section('title')
    Vehicles
@endsection
@section('content')
    <div class="container-xl">




        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-4">
                            <h2><b>All Vehicles Types</b></h2>
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

                            <a href="{{ route('vehicles.create') }}" class="btn btn-success"><i
                                    class="material-icons">&#xE147;</i>
                                <span>Add New Type</span></a>




                        </div>
                    </div>
                </div>
                <table class="table table-striped table-hover">

                    <thead>
                        <tr>
                            <th>#</th>

                            <th>Vehicle Name</th>
                            <th>Actions</th>

                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($vehicles as $vehicle)
                            <tr>
                                <td>{{ $vehicles->perPage() * $vehicles->currentPage() - $vehicles->perPage() + $loop->iteration }}
                                </td>

                                <td>{{ Str::ucfirst($vehicle->vehicle_name) }}</td>
                                <td>
                                    <a href="{{ route('vehicles.edit', $vehicle->id) }}" class="edit"><i
                                            class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                                    <a href="{{ route('vehicles.deletepage', $vehicle->id) }}" class="delete"><i
                                            class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div style="margin-top: 5px">
                    {{ $vehicles->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
@endsection
