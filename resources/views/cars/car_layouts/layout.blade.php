<html lang="en">


@include('cars/car_layouts/header')




<body class="img js-fullheight" style="background-image: url('{{ asset('login_frontend/images/bg.jpg') }}');">

    <div id="app">
        <div>



            <!-- Include the sidebar partial -->
            @include('cars/car_layouts/sidebar')


            <div id="content">
                <div>
                    <button id="sidebarToggle" class="btn btn-dark">
                        <i class="material-icons">&#xe5d2;</i>
                    </button>

                </div>


                <div style="display: flex; align-items: center; justify-content: center;">

                    <img src="{{ asset('login_frontend/images/logo.png') }}" width="45px" id="welcome_img" alt="logo_img"
                        style="margin-right: 10px; padding-top: 10px;">
                    <h2 style="color: #000; text-align: center; padding-top: 15px; margin: 0;"><strong>CRUD
                            OPERATIONS</strong></h2>

                </div>

                <!-- Main content goes here -->
                @yield('content')
            </div>

        </div>
    </div>







</body>

</html>
