@extends('layouts.santri')

@section('content')

<div class="w-full flex flex-col h-screen overflow-y-hidden">
    <!-- NILAI -->
    <div class="overflow-x-hidden">
        <main class="pt-6 px-6">
            <h1 class="text-3xl text-black pb-2 mt-2">Nilai Kumulatif</h1>
            <div class="bg-white rounded-lg shadow-md p-8 my-8">
                <!-- OPTION -->
                <form method="POST" action="{{ url('santri/rapor-nilai-semester') }}">
                    @csrf
                    <div class="flex space-x-4 items-center pb-8">
                        <div class="flex-none w-36">
                            <a class="self-center hover:no-underline">Semester</a>
                        </div>
                        <input type="hidden" name="id" placeholder=" " value="{{ Auth::user()->id }}" required class="self-center w-full bg-transparent border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200" />
                        <div class="flex-none md:w-1/5">
                            <div class="relative">
                                <div class="pointer-events-none absolute inset-y-0 right-3 flex items-center text-grey-darker">
                                    <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                    </svg>
                                </div>
                                <select type="text" name="semester" value=""  class="block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded" id="grid-state">
                                    @foreach($filter_semesters as $filter)    
                                    <option value="{{ $filter->semester }}">{{ $filter->semester }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="flex space-x-4 items-center pb-8">
                        <div class="flex-none w-36">
                            <a class="self-center hover:no-underline">Tahun Ajaran</a>
                        </div>
                        <div class="flex-none md:w-1/5">
                            <div class="relative">
                                <div class="pointer-events-none absolute inset-y-0 right-3 flex items-center text-grey-darker">
                                    <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                    </svg>
                                </div>
                                <select type="text" name="year" value=""  class="block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded" id="grid-state">
                                    @foreach($filter_years as $filter)    
                                    <option value="{{ $filter->year }}">{{ $filter->year }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="object-left text-center text-white text-base">
                            <button class="bg-blue-600 hover:bg-blue-800 rounded shadow-lg py-3 px-8">Lihat</button>
                        </div>
                    </div>
                </form>
                <p class="text-xl py-4 flex items-center">
                    Laporan Kumulatif Hasil Studi MDNU
                </p>
                <!-- LAPORAN KUMULATIF -->
                <div class="bg-white overflow-auto pb-8">
                    <table class="table-auto bg-white">
                        <thead class="bg-gray-800 text-white">
                            <tr>
                                <th class="text-center py-3 px-4 uppercase font-semibold text-sm">No</th>
                                <th class="text-center w-1/7 py-3 px-4 uppercase font-semibold text-sm">Semester</th>
                                <th class="text-center w-1/7 py-3 px-4 uppercase font-semibold text-sm">Tahun Akademik</th>
                                <th class="text-center w-1/7 py-3 px-4 uppercase font-semibold text-sm">Jumlah Nilai</th>
                                <th class="text-center w-1/7 py-3 px-4 uppercase font-semibold text-sm">Nilai Rata-rata</th>
                                <th class="text-center w-1/7 py-3 px-4 uppercase font-semibold text-sm">Absensi MDNU (%)</th>
                                <th class="text-center w-1/7 py-3 px-4 uppercase font-semibold text-sm">Absensi Asrama (%)</th>
                                <th class="text-center w-1/7 py-3 px-4 uppercase font-semibold text-sm">Keterangan</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-700">
                            <tr>
                                <td class="text-center py-3 px-4">1.</td>
                                <td class="text-center py-3 px-4">{{ $scores['semester'] }}</td>
                                <td class="text-center py-3 px-4">{{ $scores['year'] }}</td>
                                <td class="text-center py-3 px-4">{{ $scores['total_nilai'] }}</td>
                                <td class="text-center py-3 px-4">{{ $scores['nilai_rata'] }}</td>
                                <td class="text-center py-3 px-4">{{ $scores['attendance_mdnu'] }}%</td>
                                <td class="text-center py-3 px-4">{{ $scores['attendance_asrama'] }}%</td>
                                <td class="text-center py-3 px-4">{{ $scores['keterangan'] }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <form method="POST" action="{{ url('santri/rapor-nilai-semester/cetak') }}">
                    @csrf
                    <div class="flex space-x-4 items-center pb-8">
                        <input type="hidden" name="id" placeholder=" " value="{{ Auth::user()->id }}" required class="self-center w-full bg-transparent border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200" />
                        @foreach($filter_semesters as $filter)    
                        <input type="hidden" name="semester" placeholder=" " value="{{ $filter->semester }}" required class="self-center w-full bg-transparent border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200" />
                        @endforeach
                        @foreach($filter_years as $filter)    
                        <input type="hidden" name="year" placeholder=" " value="{{ $filter->year }}" required class="self-center w-full bg-transparent border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200" />
                        @endforeach
                    </div>
                    <div class="flex space-x-4 items-center pb-8">
                        <div class="object-left text-center text-white text-base">
                            <button type="submit" class="bg-blue-600 hover:bg-blue-800 rounded shadow-lg py-3 px-8">Cetak</button>
                        </div>
                    </div>
                </form>
            </div>
        </main>
    </div>
</div>

@endsection