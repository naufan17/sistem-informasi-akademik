<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>SIAKAD MDNU</title>

    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}"/>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/fontawesome.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" />


    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script> <!-- Nav Dropdown -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        function menuIcon() {
        var x = document.getElementById("sidebar");
        x.classList.toggle("hidden");
    }
    </script>
</head>
<body class="work-sans leading-normal text-base tracking-normal font-family-karla ">
    <div id="app">
        <main>
            <!-- HEADER -->
            <nav id="header" class="w-full z-30 top-0 bg-white border-b-2">
                <div class="w-full mx-auto flex flex-wrap items-center justify-between">
                    <div class="flex sm:space-x-4 space-x-1 py-2">
                        <!--LOGO-->
                        <div class="object-left">
                            <a href="/"><img src="{{ URL::to('/') }}/images/logo.png" class="sm:w-24 w-16"></a>
                        </div>
                        <!--NAME-->
                        <div class="text-center font-bold font-sans text-yellow-800 mt-2">
                            <p class="sm:text-base text-sm sm:tracking-normal tracking-tighter">MADRASAH DINIYYAH</p>
                            <p class="sm:text-xl text-base font-bold sm:tracking-normal tracking-tighter">NURUL UMMAH</p>
                            <p class="sm:text-base text-sm tracking-tight sm:tracking-wide">YOGYAKARTA</p>
                        </div>
                    </div>
                    <div class="font-bold text-yellow-600 text-right">
                        <p class="sm:text-lg text-sm sm:tracking-normal tracking-tighter">SISTEM INFORMASI AKADEMIK</p>
                        <p class="sm:text-base text-sm tracking-tight sm:tracking-wide">M D N U</p>
                    </div>
                </div>
            </nav>
            <!-- MENU -->
            <div class="bg-gray-100 font-family-karla flex">
                <aside class="relative bg-gray-100 bg-sidebar sm:w-64 w-32 hidden sm:block" id="sidebar">
                    <nav class="font-semibold pt-3 text-base">
                        <div class="text-gray-900">
                            <div class="pt-6 px-6 mb-8">
                                <div class="text-center bg-white rounded-lg shadow-xl">
                                    <div class="px-6 py-6">
                                        @if(!empty(Auth::guard('santri')->user()->photo))
                                        <img src="{{ URL::to('/') }}/foto_santri/{{Auth::guard('santri')->user()->photo}}" class="object-center rounded-full">
                                        @else
                                        <img src="{{ URL::to('/') }}/images/default-profile-picture.jpg" class="object-center rounded-full">
                                        @endif
                                    </div>
                                    <h4 class="py-6 text-l font-semibold sm:text-base text-sm leading-tight truncate">Hai {{ Auth::guard('santri')->user()->name }}</h4>
                                </div>
                            </div>
                        </div>
                        <div class="group border-indigo-500 hover:bg-blue-600 hover:shadow-lg hover:border-transparent">
                            <a href="{{ url('santri/data-diri') }}" class="text-gray-800 sm:text-base text-sm hover:text-white hover:no-underline flex items-center py-3 sm:pl-8 pl-6">
                                Data Diri
                            </a>
                        </div>
                        <div class="group border-indigo-500 hover:bg-blue-600 hover:shadow-lg hover:border-transparent">
                            <a href="{{ url('santri/kelas') }}" class="text-gray-800 sm:text-base text-sm hover:text-white hover:no-underline flex items-center py-3 sm:pl-8 pl-6">
                                Kelas
                            </a>
                        </div>
                        <!-- <div @click.away="open = false" class="group border-indigo-500 hover:bg-blue-600 hover:shadow-lg hover:border-transparent" x-data="{ open: false }">
                            <button @click="open = !open" class="flex flex-row text-gray-800 group-hover:text-white items-center py-3 sm:pl-8 pl-6">
                                <span class="w-full text-left font-bold">Nilai</span>
                                <svg fill="currentColor" viewBox="0 0 20 20" :class="{'rotate-180': open, 'rotate-0': !open}" class="object-right w-full h-4">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                </svg>
                            </button>
                            <div x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute right-0 w-full mt-2 origin-top-right rounded-md shadow-md">
                                <div class="px-2 py-2 bg-white rounded-md shadow">
                                    <a class="block px-4 py-3 mt-2 text-sm font-semibold rounded-lg hover:bg-blue-600 hover:text-white hover:shadow-lg hover:border-transparents hover:no-underline" href="{{ url('santri/nilai-semester') }}">Nilai Semester</a>
                                    <a class="block px-4 py-3 mt-2 text-sm font-semibold rounded-lg hover:bg-blue-600 hover:text-white hover:shadow-lg hover:border-transparent hover:no-underline" href="{{ url('santri/hasil-studi') }}">Hasil Studi</a>
                                </div>
                            </div>
                        </div> -->
                        <button class="w-full">
                            <div @click.away="open = false" class="flex justify-between group border-indigo-500 hover:bg-blue-600 hover:shadow-lg hover:border-transparent" x-data="{ open: false }">
                                <div @click="open = !open" class="w-full flex justify-between group border-indigo-500 hover:bg-blue-600 hover:shadow-lg hover:border-transparent">
                                    <a class="font-bold text-gray-800 sm:text-base text-sm group-hover:text-white hover:no-underline flex items-center py-3 sm:pl-8 pl-6">
                                        Nilai
                                    </a>
                                    <div class="items-center flex group-hover:text-white pr-8">
                                        <i class="fas fa-caret-down"></i>
                                    </div>
                                </div>
                                <div x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute w-full mt-2 origin-top-right rounded-md shadow-md">
                                    <div class="px-3 py-2 bg-white rounded-md shadow text-left">
                                        <a class="block sm:px-8 px-4 py-3 mt-2 sm:text-sm text-xs font-semibold rounded-md hover:bg-blue-600 hover:text-white hover:no-underline hover:shadow-lg hover:border-transparent" href="{{ url('santri/nilai-semester') }}">Nilai Semester</a>
                                        <a class="block sm:px-8 px-4 py-3 mt-2 sm:text-sm text-xs font-semibold rounded-md hover:bg-blue-600 hover:text-white hover:no-underline hover:shadow-lg hover:border-transparent" href="{{ url('santri/hasil-studi') }}">Hasil Studi</a>
                                    </div>
                                </div>
                            </div>
                        </button>
                        <!-- <div @click.away="open = false" class="group border-indigo-500 hover:bg-blue-600 hover:shadow-lg hover:border-transparent" x-data="{ open: false }">
                            <button @click="open = !open" class="flex flex-row text-gray-800 group-hover:text-white items-center py-3 sm:pl-8 pl-6">
                                <span class="w-full text-left font-bold">List Data</span>
                                <svg fill="currentColor" viewBox="0 0 20 20" :class="{'rotate-180': open, 'rotate-0': !open}" class="object-right w-full h-4">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                </svg>
                            </button>
                            <div x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute right-0 w-full mt-2 origin-top-right rounded-md shadow-md">
                                <div class="px-2 py-2 bg-white rounded-md shadow">
                                    <a class="block px-4 py-3 mt-2 text-sm font-semibold rounded-lg hover:bg-blue-600 hover:text-white hover:shadow-lg hover:border-transparent hover:no-underline" href="{{ url('santri/ustadz') }}">Ustadz</a>
                                    <a class="block px-4 py-3 mt-2 text-sm font-semibold rounded-lg hover:bg-blue-600 hover:text-white hover:shadow-lg hover:border-transparent hover:no-underline" href="{{ url('santri/santri') }}">Santri</a>
                                </div>
                            </div>
                        </div> -->
                        <button class="w-full">
                            <div @click.away="open = false" class="flex justify-between group border-indigo-500 hover:bg-blue-600 hover:shadow-lg hover:border-transparent" x-data="{ open: false }">
                                <div @click="open = !open" class="w-full flex justify-between group border-indigo-500 hover:bg-blue-600 hover:shadow-lg hover:border-transparent">
                                    <a class="font-bold text-gray-800 sm:text-base text-sm group-hover:text-white hover:no-underline flex items-center py-3 sm:pl-8 pl-6">
                                        List Data
                                    </a>
                                    <div class="items-center flex group-hover:text-white pr-8">
                                        <i class="fas fa-caret-down"></i>
                                    </div>
                                </div>
                                <div x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute w-full mt-2 origin-top-right rounded-md shadow-md">
                                    <div class="px-3 py-2 bg-white rounded-md shadow text-left">
                                        <a class="block sm:px-8 px-4 py-3 mt-2 sm:text-sm text-xs font-semibold rounded-md hover:bg-blue-600 hover:text-white hover:no-underline hover:shadow-lg hover:border-transparent" href="{{ url('santri/ustadz') }}">Ustadz</a>
                                        <a class="block sm:px-8 px-4 py-3 mt-2 sm:text-sm text-xs font-semibold rounded-md hover:bg-blue-600 hover:text-white hover:no-underline hover:shadow-lg hover:border-transparent" href="{{ url('santri/santri') }}">Santri</a>
                                    </div>
                                </div>
                            </div>
                        </button>
                        <!--
                        <div class="group border-indigo-500 hover:bg-blue-600 hover:shadow-lg hover:border-transparent">
                            <a href="{{ url('santri/ustadz') }}" class="text-gray-800 group-hover:text-white flex items-center py-3 sm:pl-8 pl-6">
                                Ustadz
                            </a>
                        </div>
                        <div class="group border-indigo-500 hover:bg-blue-600 hover:shadow-lg hover:border-transparent">
                            <a href="{{ url('santri/santri') }}" class="text-gray-800 group-hover:text-white flex items-center py-3 sm:pl-8 pl-6">
                                Santri
                            </a>
                        </div>
                        -->
                        <button class="w-full hover:bg-blue-600 cta-btn sm:text-base text-sm font-semibold justify-center ">
                            <a class="text-gray-800 hover:text-white hover:no-underline items-center py-3 sm:pl-8 pl-6 flex item-center" href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">{{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </button>
                    </nav>
                </aside>
                <!-- Page Content -->
                <div class="w-full flex flex-col h-screen overflow-y-hidden">
                    <div class="overflow-x-hidden">
                        <div class="pl-4 pt-4 sm:hidden inline-block">
                            <a href="javascript:void(0);" class="icon px-3 py-2 bg-white p-8 shadow-lg rounded text-base" id="menu-icon" onclick="menuIcon()">
                                <i class="fa fa-bars"></i>
                            </a>
                        </div>
                        @yield('content')
                    </div>
                </div>
            </div>
            <!-- FOOTER -->
            <footer class="w-full bg-white p-8 border-t border-gray-400">
                <div class="px-3">
                    <h3 class="text-center font-medium sm:text-base text-sm text-gray-900">Madrasah Diniyyah Pondok Pesantren Nurul Ummah Yogyakarta - 2021</h3>
                </div>
            </footer>
        </main>
    </div>
</body>
</html>