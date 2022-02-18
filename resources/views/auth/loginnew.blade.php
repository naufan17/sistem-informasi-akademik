@extends('layouts.app')

@section('content')

<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
    <div class="w-full sm:max-w-md px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
        <div class="text-center mb-2">
            <a class="text-lg font-bold hover:no-underline">{{ isset($url) ? ucwords($url) : ""}} {{ __('Login') }}</a><br>
        </div>
        @isset($url)
        <form method="POST" action='{{ url("login/$url") }}' aria-label="{{ __('Login') }}">
        @else
        <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
        @endisset
            @csrf
            <!-- Email Address -->
            <div>
            <label class="block font-medium text-sm text-gray-700" for="id">
                    {{ __('NIS/NIU') }}
                </label>
                <input id="id" type="number" class="form-control @error('id') is-invalid @enderror rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full" name="id" :value="old('id')" required autofocus>
                @error('id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <!-- Password -->
            <div class="mt-4">
                <label class="block font-medium text-sm text-gray-700" for="password">
                    {{ __('Password') }}
                </label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full" name="password" required autocomplete="current-password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <!-- Remember Me -->
            <!-- <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div> -->
            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <!-- <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a> -->
                @endif
                <button type="submit" class='inline-flex items-center px-4 py-2 ml-3 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150'>
                    {{ __('Masuk') }}
                </button>
            </div>
        </form>
    </div>
</div>

@endsection