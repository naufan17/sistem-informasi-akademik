@extends('layouts.ustadz')

@section('content')

<div class="w-full flex flex-col h-screen overflow-y-hidden">
    <div class="overflow-x-hidden">
        <main class="pt-6 px-6">
            <h1 class="text-3xl text-black pb-2 mt-2">Mata Pelajaran</h1>
            <div class="bg-white rounded-lg shadow-md p-8 my-8">
                <p class="text-xl pb-4 flex items-center">
                    Daftar Paket Mata Pelajaran
                </p>
                <div class="bg-white overflow-auto pb-8">
                    <table class="table-auto bg-white">
                        <thead class="bg-gray-800 text-white">
                            <tr>
                                <th class="text-left py-3 px-4 uppercase font-semibold text-sm">No</th>
                                <th class="text-left w-1/6 py-3 px-4 uppercase font-semibold text-sm">Kode MP</th>
                                <th class="text-left w-1/6 py-3 px-4 uppercase font-semibold text-sm">Mata pelajaran</th>
                                <th class="text-left w-1/6 py-3 px-4 uppercase font-semibold text-sm">Kitab</th>
                                <th class="text-left w-1/6 py-3 px-4 uppercase font-semibold text-sm">Kelas</th>
                                <th class="text-left w-1/5 py-3 px-4 uppercase font-semibold text-sm">Jadwal</th>
                                <th class="text-left w-1/5 py-3 px-4 uppercase font-semibold text-sm">Semester</th>
                                <th class="text-left w-1/4 py-3 px-4 uppercase font-semibold text-sm">Nama Ustadz</td>
                            </tr>
                        </thead>
                        <tbody class="text-gray-700">
                            @foreach($courses as $course)
                            <tr>
                                <td class="text-left py-3 px-4">{{ $loop->iteration }}</td>
                                <td class="text-left py-3 px-4">{{ $course->id }}</td>
                                <td class="text-left py-3 px-4">{{ $course->course }}</td>
                                <td class="text-left py-3 px-4">{{ $course->book }}</td>
                                <td class="text-left py-3 px-4">{{ $course->grade }}</td>
                                <td class="text-left py-3 px-4">{{ $course->schedule }}</td>
                                <td class="text-left py-3 px-4">{{ $course->semester }}</td>   
                                <td class="text-left py-3 px-4">{{ $course->name }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- <p class="text-xl py-4 flex items-center">
                    Catatan dari Ustadz
                </p>
                <div class="bg-white overflow-auto pb-8">
                    <table class="table-auto bg-white">
                        <thead class="bg-gray-800 text-white">
                            <tr>
                                <th class="text-left py-3 px-4 uppercase font-semibold text-sm">No</th>
                                <th class="text-left w-1/5 py-3 px-4 uppercase font-semibold text-sm">Nama MP</th>
                                <th class="text-left w-full py-3 px-4 uppercase font-semibold text-sm">Catatan</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-700">
                            <tr>
                                <td class="text-left py-3 px-4">1</td>
                                <td class="text-left py-3 px-4"><a >Tafsir</a></td>
                                <td class="text-left py-3 px-4"><a >-</a></td>
                            </tr>
                            <tr class="bg-gray-200">
                                <td class="text-left py-3 px-4">2</td>
                                <td class="text-left py-3 px-4"><a>Fiqih</a></td>
                                <td class="text-left py-3 px-4"><a >-</a></td>
                            </tr>
                            <tr>
                                <td class="text-left py-3 px-4">3</td>
                                <td class="text-left py-3 px-4"><a>Nahwu</a></td>
                                <td class="text-left py-3 px-4"><a >-</a></td>
                            </tr>
                            <tr class="bg-gray-200">
                                <td class="text-left py-3 px-4">4</td>
                                <td class="text-left py-3 px-4"><a>Hadits</a></td>
                                <td class="text-left py-3 px-4"><a >-</a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="flex object-left text-center text-white text-base pt-6">
                    <button class="bg-blue-600 hover:bg-blue-800 shadow-lg rounded py-3 px-8" href="#">Cetak MP</button>
                </div> -->
            </div>
        </main>
    </div>
</div>

@endsection