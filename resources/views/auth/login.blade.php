<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tailwind Login Template</title>
    <meta name="author" content="David Grzyb">
    <meta name="description" content="">

    <!-- Tailwind -->
    <link href="https://unpkg.com/tailwindcss/dist/tailwind.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css?family=Karla:400,700&display=swap');

        .font-family-karla {
            font-family: karla;
        }
    </style>
</head>

<body class="bg-white font-family-karla h-screen">
    <form method="POST" action="{{ route('login') }}">
        <div class="w-full flex flex-wrap">

            <!-- Login Section -->
            <div class="w-full md:w-1/2 flex flex-col">

                <!--<div class="flex justify-center md:justify-start pt-12 md:pl-12 md:-mb-24">
                <img src="{{ ('images/logo.png ') }}" class="w-24">Logo</a>
            </div> -->

                <div class="flex flex-col justify-center md:justify-start my-auto pt-8 md:pt-0 px-8 md:px-24 lg:px-32">
                    <p class="text-center text-3xl">Selamat Datang di Siakad PPNU</p>
                    <form class="flex flex-col pt-3 md:pt-8" onsubmit="event.preventDefault();">
                        <div class="flex flex-col pt-4">
                            <label for="email" class="text-lg">Username</label>
                            <input type="email" id="email" placeholder="ex 18106050033" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:shadow-outline">
                        </div>

                        <div class="flex flex-col pt-4">
                            <label for="password" class="text-lg">Password</label>
                            <input type="password" id="password" placeholder="Password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:shadow-outline">
                        </div>

                        <input type="submit" value="Log In" class="bg-blue-500 hover:bg-blue-700 text-white font-bold text-lg p-2 mt-8">
                    </form>
                    <div class="text-center pt-12 pb-12">
                        <p>Tidak bisa masuk? <a href="register.html" class="text-blue-800 underline font-semibold">Hubungi Admisi.</a></p>
                    </div>
                </div>

            </div>

            <!-- Image Section -->
            <div class="w-1/2 shadow-2xl">
                <img class="object-cover w-full h-screen hidden md:block" src="https://source.unsplash.com/IXUM4cJynP0">
            </div>
        </div>
    </form>
</body>

<!--
</html>
<x-guest-layout>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div>
            <label for="email" :value="__('Email')" />

            <input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
        </div>
    -->

        <!-- Password -->
    <!--    <div class="mt-4">
            <label for="password" :value="__('Password')" />

            <input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
        </div>
    -->
        <!-- Remember Me -->
    <!--    <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                {{ __('Forgot your password?') }}
            </a>
            @endif
            <button class="ml-3">
                {{ __('Login') }}
            </button>
        </div>
    </form>
</x-guest-layout>
-->