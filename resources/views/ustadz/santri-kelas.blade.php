@extends('layouts.ustadz')

@section('content')

<div class="w-full flex flex-col h-screen overflow-y-hidden">
    <!-- SANTRI -->
    <div class="overflow-x-hidden">
        <main class="pt-6 px-6">
            <h1 class="sm:text-3xl text-2xl text-black pb-2 mt-2">Santri</h1>
            <div class="bg-white rounded-lg shadow-md p-8 my-8">
                <!-- BACK BUTTON -->
                    <div class="p-4">
                    <a href="{{ url('ustadz/kelas') }}" class="button flex items-center border sm:text-base text-sm text-black-500 rounded-sm py-2.5 sm:px-6 px-3.5 sm:w-36 w-28 hover:bg-blue-700 hover:text-white hover:no-underline">
                        <svg class="h-5 w-5 mr-3 fill-current" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="-49 141 512 512" style="enable-background:new -49 141 512 512;" xml:space="preserve">
                            <path id="XMLID_10_" d="M438,372H36.355l72.822-72.822c9.763-9.763,9.763-25.592,0-35.355c-9.763-9.764-25.593-9.762-35.355,0 l-115.5,115.5C-46.366,384.01-49,390.369-49,397s2.634,12.989,7.322,17.678l115.5,115.5c9.763,9.762,25.593,9.763,35.355,0 c9.763-9.763,9.763-25.592,0-35.355L36.355,422H438c13.808,0,25-11.193,25-25S451.808,372,438,372z"></path>
                        </svg>
                        Kembali
                    </a>
                </div>
                <p class="sm:text-xl text-lg py-4 flex items-center">Daftar Santri</p>
                <form method="POST" action="{{ url('ustadz/kelas/detail-santri/create') }}">
                    @csrf
                    <div class="bg-white overflow-auto pb-8">
                        <table class="table-auto bg-white">
                            <thead class="bg-gray-800 text-white">
                                <tr>
                                    <th class="text-center py-3 px-4 uppercase font-semibold sm:text-sm text-xs">No</th>
                                    <th class="text-center w-1/3 py-3 px-4 uppercase font-semibold sm:text-sm text-xs">NIS</th>
                                    <th class="text-center w-1/3 py-3 px-4 uppercase font-semibold sm:text-sm text-xs">Nama Santri</th>
                                    <th class="text-center w-1/3 py-3 px-4 uppercase font-semibold sm:text-sm text-xs">Nilai</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-700">
                                @foreach($santris as $santri)
                                <tr>
                                    <td class="text-center sm:text-base text-sm py-3 px-4">{{ $loop->iteration }}</td>
                                    <td class="text-center sm:text-base text-sm py-3 px-4">{{ $santri->id }}</td>
                                    <td class="text-center sm:text-base text-sm py-3 px-4">{{ $santri->name }}</td>
                                    <td class="text-center sm:text-base text-sm py-3 px-4">
                                        <div class="relative z-0 w-full">
                                            <input type="hidden" name="id_cumulative_study[{{ $loop->iteration }}]" value="{{ $santri->id_cumulative_study }}"  required class="py-2 px-3 block w-full bg-transparent border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-300" />
                                            <input type="number" name="score[{{ $loop->iteration }}]" placeholder="1-100" min="0" max="100" value="{{ $santri->score }}" required autocomplete="nilai" required class="py-2 px-3 block w-full bg-transparent border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-300" />
                                            <input type="hidden" name="id_course" value="{{ $santri->id_course }}"  required class="py-2 px-3 block w-full bg-transparent border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-300" />
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @if(empty($santri))
                        @else
                        <div class="flex flex-row-reverse object-left text-center text-white sm:text-base text-sm pt-8 px-3">
                            <button type="submit" class="bg-blue-600 hover:bg-blue-800 rounded shadow-lg py-2.5 sm:px-6 px-3.5">Simpan</button>
                        </div>
                        @endif
                    </div>
                </form>
            </div>
        </main>
    </div>
</div>

@endsection