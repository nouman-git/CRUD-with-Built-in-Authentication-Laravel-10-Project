<x-guest-layout>
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                    <h2 class="heading-section"><strong>Register here</strong></h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-4">
                    <div class="login-wrap p-0">
                        <form method="POST" class="signin-form" action="{{ route('register') }}" autocomplete="off">
                            @csrf
                            <!-- Name -->
                            <div class="form-group">
                                <input id="name" type="text" class="form-control" name="name" required
                                    autofocus placeholder="Name" autocomplete="new-password">
                            </div>
                            <!-- Email Address -->
                            <div class="form-group">
                                <input id="email" type="email" class="form-control" name="email" required
                                    placeholder="Email">
                            </div>
                            <!-- Password -->
                            <div class="form-group">
                                <input name="password" id="password" type="password" class="form-control"
                                    placeholder="Password" required autocomplete="new-password">
                                <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                            </div>


                            <!-- Confirm Password -->

                            <div class="form-group">
                                <input class="form-control" id="password_confirmation" class="block mt-1 w-full" placeholder="Confirm Password"
                                    type="password" name="password_confirmation" required autocomplete="new-password">
                                <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                            </div>
                            <div class="form-group">
                                <button type="submit"
                                    class="form-control btn btn-primary submit px-3">Register</button>
                            </div>



                            <div class="form-group text-center">
                                <a href="{{ route('login') }}">
                                    {{ __('Already have an account?') }}
                                </a>
                            </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-guest-layout>





{{-- <html lang="en">
   <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
   </head>
   <body>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

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
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>



   </body>
   </html> --}}
