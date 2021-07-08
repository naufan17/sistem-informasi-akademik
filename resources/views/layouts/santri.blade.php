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
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <!-- Tailwind -->
    <link href="https://unpkg.com/tailwindcss/dist/tailwind.min.css" rel="stylesheet">

</head>

<body class="work-sans leading-normal text-base tracking-normal font-family-karla ">
    <div id="app">

        <!-- HEADER -->
        <nav id="header" class="w-full bg-white border-b-2">
            <div class="w-full container flex items-center justify-between">
                <div class="flex space-x-4 lg:py-6">
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

        <main>
            <!-- MENU -->
            <div class="bg-gray-100 font-family-karla flex ">
                <aside class="relative bg-gray-100 bg-sidebar h-screen w-64 hidden sm:block">
                    <nav class="font-semibold pt-3 text-base">
                        <div class="text-gray-900">
                            <div class="pt-6 px-6 mb-8">
                                <div class="text-center bg-white rounded-lg shadow-xl">
                                    <!--
                                    <div class="px-6 py-6">
                                        <img src="https://source.unsplash.com/random/350x350" alt="random image" class="object-center rounded-full">
                                    </div>
                                    -->
                                    <h4 class="py-6 text-l font-semibold leading-tight truncate">Hai {{ Auth::user()->name }}</h4>
                                </div>
                            </div>
                        </div>
                        <div class="group border-indigo-500 hover:bg-blue-600 hover:shadow-lg hover:border-transparent">
                            <a href="{{ url('santri/data-diri') }}/{{ Auth::user()->id }}" class="text-gray-800 hover:text-white flex items-center py-3 pl-8">
                                Data Pribadi
                            </a>
                        </div>
                        <div class="group border-indigo-500 hover:bg-blue-600 hover:shadow-lg hover:border-transparent">
                            <a href="{{ url('santri/kelas') }}/{{ Auth::user()->id }}" class="text-gray-800 hover:text-white flex items-center py-3 pl-8">
                                Kelas
                            </a>
                        </div>
                        <div class="group border-indigo-500 hover:bg-blue-600 hover:shadow-lg hover:border-transparent">
                            <a href="{{ url('santri/nilai') }}/{{ Auth::user()->id }}" class="text-gray-800 hover:text-white flex items-center py-3 pl-8">
                                Nilai
                            </a>
                        </div>
                        <div class="group border-indigo-500 hover:bg-blue-600 hover:shadow-lg hover:border-transparent">
                            <a href="{{ url('santri/riwayat-nilai') }}/{{ Auth::user()->id }}" class="text-gray-800 hover:text-white flex items-center py-3 pl-8">
                                Riwayat Nilai
                            </a>
                        </div>
                        <div class="group border-indigo-500 hover:bg-blue-600 hover:shadow-lg hover:border-transparent">
                            <a href="{{ url('santri/nilai-kumulatif') }}/{{ Auth::user()->id }}" class="text-gray-800 hover:text-white flex items-center py-3 pl-8">
                                Nilai Kumulatif
                            </a>
                        </div>
                        <div class="group border-indigo-500 hover:bg-blue-600 hover:shadow-lg hover:border-transparent">
                            <a href="{{ url('santri/ustadz') }}" class="text-gray-800 group-hover:text-white flex items-center py-3 pl-8">
                                Ustadz
                            </a>
                        </div>
                        <div class="group border-indigo-500 hover:bg-blue-600 hover:shadow-lg hover:border-transparent">
                            <a href="{{ url('santri/santri') }}" class="text-gray-800 group-hover:text-white flex items-center py-3 pl-8">
                                Santri
                            </a>
                        </div>

                        <button class="w-full hover:bg-blue-600 cta-btn font-semibold justify-center ">
                            <a class="text-gray-800 hover:text-white items-center py-3 pl-8 flex item-center" href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">{{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </button>

                    </nav>
                </aside>

                <!-- Page Content -->
                <div class="w-full overflow-y-hidden mb-auto">
                    <div class="overflow-x-hidden h-screen">
                        @yield('content')
                    </div>
                </div>
            </div>

            <!-- FOOTER -->
            <footer class="w-full bg-white p-8 border-t border-gray-400">
                <div class="px-3">
                    <h3 class="text-center font-medium text-gray-900">Madrasah Diniyyah Pondok Pesantren Nurul Ummah Yogyakarta - 2021</h3>
                </div>
            </footer>
        </main>
    </div>
</body>

</html>