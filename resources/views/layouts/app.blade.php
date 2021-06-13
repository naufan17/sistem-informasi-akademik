<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Tailwind -->
    <link href="https://unpkg.com/tailwindcss/dist/tailwind.min.css" rel="stylesheet">

    <style>
        @import url('https://fonts.googleapis.com/css?family=Karla:400,700&display=swap');
        .font-family-karla {
            font-family: karla;
        }
        .bg-sidebar {
            background: #3d68ff;
        }
        .cta-btn {
            color: #3d68ff;
        }
        .upgrade-btn {
            background: #1947ee;
        }
        .upgrade-btn:hover {
            background: #0038fd;
        }
        .active-nav-link {
            background: #1947ee;
        }
        .nav-item:hover {
            background: #1947ee;
        }
        .account-link:hover {
            background: #3d68ff;
        }
    </style>
    
</head>
<body class="work-sans leading-normal text-base tracking-normal">
    <!-- HEADER -->
    <nav id="header" class="w-full z-30 top-0 bg-white border-b-2">
        <div class="w-full container mx-auto flex flex-wrap items-center justify-between">
            <div class="flex space-x-4 py-5">
                <!--LOGO-->
                <div class="object-left">
                    <img src="images/logo.png" class="w-24">
                </div>
                <!--NAME-->
                <div class="text-center font-bold font-sans text-yellow-800 mt-2">
                    <a class="text-base">MADRASAH DINIYYAH</a><br>
                    <a class="text-2xl font-bold">NURUL UMMAH</a><br>
                    <a class="text-base tracking-widest">YOGYAKARTA</a>
                </div>
            </div>
            <div class="font-bold text-yellow-600 text-right">
                <a class="text-xl">SISTEM INFORMASI AKADEMIK <br></a>
                <a class="text-base tracking-widest">M D N U</a>
            </div>
        </div>
    </nav>
    <div id="app">
        <!-- <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container"> -->
                <!-- <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button> -->
                <!-- <div class="collapse navbar-collapse" id="navbarSupportedContent"> -->
                    <!-- Left Side Of Navbar -->
                    <!-- <ul class="navbar-nav mr-auto">
                    </ul> -->
                    <!-- Right Side Of Navbar -->
                    <!-- <ul class="navbar-nav ml-auto"> -->
                        <!-- Authentication Links -->
                        <!-- @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div> -->
            <!-- </div>
        </nav> -->
        <main class="py-4">
            <!-- MENU -->
            <div class="bg-gray-100 font-family-karla flex">
                <aside class="relative bg-gray-100 h-screen w-64 hidden sm:block ">
                    <nav class="font-semibold pt-3">
                        <div class="text-gray-900">
                            <div class="pt-6 px-6 mb-8">
                                <div class="text-center bg-white rounded-lg shadow-xl">
                                    <div class="px-6 py-6">
                                        <img src="https://source.unsplash.com/random/350x350" alt="random image" class="object-center rounded-full">
                                    </div>
                                    <h4 class="pb-6 text-l font-semibold leading-tight truncate">Hai There!</h4>
                                </div>
                            </div>
                        </div>
                        <div class="group border-indigo-500 hover:bg-blue-600 hover:shadow-lg hover:border-transparent">
                            <a href="data-diri.html" class="text-gray-800 group-hover:text-white flex items-center py-4 pl-6">
                                <i class="fas fa-id-card-alt mr-3"></i>
                                Data Pribadi
                            </a>
                        </div>
                        <div class="group border-indigo-500 hover:bg-blue-600 hover:shadow-lg hover:border-transparent">
                            <a href="mapel.html" class="text-gray-800 group-hover:text-white flex items-center py-4 pl-6">
                                <i class="fas fa-book-open mr-3"></i>
                                Mata Pelajaran
                            </a>
                        </div>
                        <div class="group border-indigo-500 hover:bg-blue-600 hover:shadow-lg hover:border-transparent">
                            <a href="nilai.html" class="text-gray-800 group-hover:text-white flex items-center py-4 pl-6">
                                <i class="fas fa-star-half-alt mr-3"></i>
                                Nilai
                            </a>
                        </div>
                        <div class="group border-indigo-500 hover:bg-blue-600 hover:shadow-lg hover:border-transparent">
                            <a href="riwayat-nilai.html" class="text-gray-800 group-hover:text-white flex items-center py-4 pl-6">
                                <i class="fas fa-star mr-3"></i>
                                Riwayat Nilai
                            </a>
                        </div>
                        <div class="group border-indigo-500 hover:bg-blue-600 hover:shadow-lg hover:border-transparent">
                            <a href="ustadz.html" class="text-gray-800 group-hover:text-white flex items-center py-4 pl-6">
                                <i class="fas fa-address-book mr-3"></i>
                                Ustadz
                            </a>
                        </div>
                        <div class="group border-indigo-500 hover:bg-blue-600 hover:shadow-lg hover:border-transparent">
                            <a href="santri.html" class="text-gray-800 group-hover:text-white flex items-center py-4 pl-6">
                                <i class="fas fa-address-book mr-3"></i>
                                Santri
                            </a>
                        </div>
                        <div class="group border-indigo-500 hover:bg-blue-600 hover:shadow-lg hover:border-transparent">
                            <a href="{{ route('logout') }}" method="POST" class="text-gray-800 group-hover:text-white flex items-center py-4 pl-6">
                                <i class="fas fa-address-book mr-3"></i>
                                Log Out
                            </a>
                        </div>
                    </nav>
                </aside>
                <div class="w-full flex flex-col h-screen overflow-y-hidden">
                    <div class="overflow-x-hidden">
                        @yield('content')
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
