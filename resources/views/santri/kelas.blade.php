@extends('layouts.santri')

@section('content')

<div class="w-full flex flex-col h-screen overflow-y-hidden">
    <div class="overflow-x-hidden">
        <main class="pt-6 px-6">
            <h1 class="text-3xl text-black pb-2 mt-2">Kelas</h1>
            <div class="bg-white rounded-lg shadow-md p-8 my-8">
                <!-- OPTION -->
                <form method="GET" action="{{ url('santri/filter-semester') }}">
                    <div class="flex space-x-4 items-center pb-8">
                        <div class="flex-none w-36">
                            <a class="self-center">Semester</a>
                        </div>
                        <input type="hidden" name="id" placeholder=" " value="{{ Auth::user()->id }}" required class="self-center w-full bg-transparent border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200" />
                        <div class="flex-none md:w-1/5">
                            <div class="relative">
                                <div class="pointer-events-none absolute inset-y-0 right-3 flex items-center text-grey-darker">
                                    <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                    </svg>
                                </div>
                                <select type="number" name="semester" value=""  class="block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded" id="grid-state">
                                    <option value="Ganjil">Ganjil</option>
                                    <option value="Genap">Genap</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="flex space-x-4 items-center pb-8">
                        <div class="flex-none w-36">
                            <a class="self-center">Tahun Ajaran</a>
                        </div>
                        <input type="hidden" name="id" placeholder=" " value="{{ Auth::user()->id }}" required class="self-center w-full bg-transparent border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200" />
                        <div class="flex-none md:w-1/5">
                            <div class="relative">
                                <div class="pointer-events-none absolute inset-y-0 right-3 flex items-center text-grey-darker">
                                    <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                    </svg>
                                </div>
                                <select type="text" name="tahun_ajaran" value=""  class="block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded" id="grid-state">
                                    <option value="2020/2021">2020/2021</option>
                                    <option value="2021/2022">2021/2022</option>
                                </select>
                            </div>
                        </div>
                        <div class="object-left text-center text-white text-base">
                            <button class="bg-blue-600 hover:bg-blue-800 rounded shadow-lg py-3 px-8" href="#">Lihat Kelas</button>
                        </div>
                    </div>
                </form>
                <p class="text-xl pb-4 flex items-center">Daftar MP Diikuti</p>
                <div class="bg-white overflow-auto pb-8">
                    <table class="table-auto bg-white">
                        <thead class="bg-gray-800 text-white">
                            <tr>
                                <th class="text-center py-3 px-4 uppercase font-semibold text-sm">No</th>
                                <!-- <th class="text-center w-1/4 py-3 px-4 uppercase font-semibold text-sm">Kode MP</th> -->
                                <th class="text-center w-1/3 py-3 px-4 uppercase font-semibold text-sm">Mata pelajaran</th>
                                <th class="text-center w-1/3 py-3 px-4 uppercase font-semibold text-sm">Kitab</th>
                                <th class="text-center w-1/3 py-3 px-4 uppercase font-semibold text-sm">Detail</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-700">
                            @foreach($cumulative_studies as $cumulative_study)
                            <tr>
                                <td class="text-center py-3 px-4">{{ $loop->iteration }}</td>
                                <!-- <td class="text-center py-3 px-4">{{ $cumulative_study->id_course }}</td> -->
                                <td class="text-center py-3 px-4">{{ $cumulative_study->course }}</td>
                                <td class="text-center py-3 px-4">{{ $cumulative_study->book }}</td>
                                <td class="text-center py-3 px-4">
                                    <a href="{{ url('santri/kelas/detail') }}/{{ $cumulative_study->id_course }}" class="button bg-blue-600 hover:bg-blue-800 hover:text-white text-white rounded shadow-md py-2 px-6">Detail</a>
                                </td>  
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="flex object-left text-center text-white text-base pt-6">
                    <button class="bg-blue-600 hover:bg-blue-800 shadow-lg rounded py-3 px-8" href="#">Cetak MP</button>
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