<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href={{ asset('css/login.css') }}>

</head>

<body>

    <x-auth-card>


        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                    required autofocus />
            </div>
            <div>
                <x-label for="username" :value="__('Username')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="username" :value="old('username')"
                    required autofocus />
            </div>


            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full" type="password"
                    name="password_confirmation" required />
            </div>
            {{-- User Type --}}

            <div class="mt-4">
                <x-label for="User Type" :value="__('Select User Type')" />

                <label for="doctor">Doctor</label>
                <input type="radio" name="usertype" value="doctor">
                <label for="doctor">Super Admin</label>
                <input type="radio" name="usertype" value="super">

            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('dashboard') }}">
                    {{ __('Dashboard') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>

    </x-auth-card>

</body>

</html>
