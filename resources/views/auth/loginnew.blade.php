@extends('layouts.app')

@section('content')

<div class="flex flex-col sm:justify-center items-center bg-gray-100 py-40">
    <div class="w-full sm:max-w-md px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
        <div class="text-center mb-2">
            <a class="text-lg font-bold hover:no-underline">{{ isset($url) ? ucwords($url) : ""}} {{ __('Login') }}</a><br>
        </div>
        @if($gagal = Session::get('gagal'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-2" role="alert">
            <span class="block sm:inline">{{ $gagal }}</span>
            <span class="absolute top-0 bottom-0 right-0 px-4 py-3" onclick="this.parentElement.style.display='none';">
                <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
            </span>
        </div>
        @endif
        @isset($url)
        <form method="POST" action='{{ url("login/$url") }}' aria-label="{{ __('Login') }}">
        @else
        <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
        @endisset
            @csrf
            <!-- NIS/NIU -->
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