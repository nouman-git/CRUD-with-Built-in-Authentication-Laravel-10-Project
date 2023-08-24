{{--
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <form method="POST" action="{{ route('password.store') }}">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Reset Password') }}
            </x-primary-button>
        </div>
    </form>

</body>
</html> --}}



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Reset Password</title>
    <link href="https://fonts.googleapis.com/css?family=Assistant:400,700" rel="stylesheet">
    {{-- <link rel="stylesheet" href="./style.css"> --}}
    <style>
        body {
            background: #7c96af;
            font-family: Assistant, sans-serif;
            display: flex;
            min-height: 90vh;
        }

        .login {
            color: white;
            background: background: #136a8a;
            background:
                -webkit-linear-gradient(to right, #267871, #136a8a);
            background:
                linear-gradient(to right, #267871, #136a8a);
            margin: auto;
            box-shadow:
                0px 2px 10px rgba(0, 0, 0, 0.2),
                0px 10px 20px rgba(0, 0, 0, 0.3),
                0px 30px 60px 1px rgba(0, 0, 0, 0.5);
            border-radius: 8px;
            padding: 50px;
        }

        .login .head {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login .head .company {
            font-size: 2.2em;
        }

        .login .msg {
            text-align: center;
        }

        .login .form input[type=text].text {
            border: none;
            background: none;
            box-shadow: 0px 2px 0px 0px white;
            width: 100%;
            color: white;
            font-size: 1em;
            outline: none;
        }

        .login .form .text::placeholder {
            color: #D3D3D3;
        }

        .login .form input[type=password].password {
            border: none;
            background: none;
            box-shadow: 0px 2px 0px 0px white;
            width: 100%;
            color: white;
            font-size: 1em;
            outline: none;
            margin-bottom: 20px;
            margin-top: 20px;
        }

        .login .form .password::placeholder {
            color: #D3D3D3;
        }

        .login .form .btn-login {
            background: none;
            text-decoration: none;
            color: white;
            box-shadow: 0px 0px 0px 2px white;
            border-radius: 3px;
            padding: 5px 2em;
            transition: 0.5s;
        }

        .login .form .btn-login:hover {
            background: white;
            color: dimgray;
            transition: 0.5s;
        }

        .login .forgot {
            text-decoration: none;
            color: white;
            float: right;
        }

        footer {
            position: absolute;
            color: #136a8a;
            bottom: 10px;
            padding-left: 20px;
        }

        footer p {
            display: inline;
        }

        footer a {
            color: green;
            text-decoration: none;
        }

        footer a:hover {
            text-decoration: underline;
        }

        footer .heart {
            color: #B22222;
            font-size: 1.5em
        }
    </style>

</head>

<body>

    <section class="login" id="login">
        <div class="head">
            <h2 class="company">Reset Password </h2>



        </div>


        <h3><p class="msg">Using Mailtrap</p></h3>
        <div class="form">

            <form method="POST" action="{{ route('password.store') }}">
                @csrf

                <!-- Password Reset Token -->
                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <!-- Email Address -->
                <div style="margin-bottom: 10px;">
                    <input placeholder="Username" type="text" id="email"
                           type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username"
                           style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 5px; ">
                </div>

                <!-- Password -->
                <div style="margin-bottom: 10px;">
                    <input placeholder="Password" id="password"
                           type="password" name="password" required autocomplete="new-password"
                           style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 5px; ">
                </div>

                <!-- Confirm Password -->
                <div style="margin-bottom: 10px;">
                    <input placeholder="Confirm Password" id="password_confirmation"
                           type="password" name="password_confirmation" required autocomplete="new-password"
                           style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 5px ">
                </div>

                <div    >
                    <button style="margin-top: 15px; padding: 8px 20px;   border: none; border-radius: 5px; cursor: pointer; " type="submit" class="btn-login">Reset</button>
                    <a style="color: white; margin-left: 150px; text-decoration: none; display: inline-block margin-right:none;" href="{{ route('login') }}">
                        Back to Login
                    </a>
                </div>
            </form>



        </div>
    </section>


</body>

</html>


