<div id="sidebar" class="closed">
   
    <div class="sidebar-heading text-white"> {{ auth()->user()->name }}</div>

    <ul class="list-group list-group-flush">

        <li class="list-group-item">
            <a href="{{ route('cars.index') }}" class="text-dark d-flex align-items-center">
                <i class="material-icons mr-2">&#xe531;</i>
                <span><strong>Cars</strong></span>
            </a>
        </li>

        {{-- <li class="list-group-item">
            <a href="{{ route('cars.create') }}" class="text-dark d-flex align-items-center">
                <i class="material-icons mr-2">&#xE147;</i>
                <span>Add New Vehicle</span>
            </a>
        </li> --}}

        <li class="list-group-item">
            <a href="{{route('manufacturers.index')}}" class="text-dark d-flex align-items-center">
                <i class="material-icons mr-2">&#xea3c;</i>
                <span><strong>Manufacturers</strong></span>
            </a>
        </li>

        <li class="list-group-item">
            <a href="{{route('vehicles.index')}}" class="text-dark d-flex align-items-center">
                <i class="material-icons mr-2">&#xe940;</i>
                <span><strong>Vehicles Types</strong></span>
            </a>
        </li>

        <li class="list-group-item">
            <a href="#" class="text-dark d-flex align-items-center" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="material-icons mr-2">&#xe9ba;</i>
                <span><strong>Logout</strong></span>
            </a>

            <!-- Hidden form for logout -->
            <form id="logout-form" method="POST" action="{{ route('logout') }}" style="display: none;">
                @csrf
            </form>
        </li>

    </ul>
</div>


