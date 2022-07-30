@extends('layouts.santri')

@section('content')

<div class="w-full flex flex-col h-screen overflow-y-hidden">
    <!-- NILAI -->
    <div class="overflow-x-hidden">
        <main class="pt-6 px-6">
            <h1 class="sm:text-3xl text-2xl text-black pb-2 mt-2">Hasil Studi</h1>
            <div class="bg-white rounded-lg shadow-md p-8 my-8">
                @if(empty($scores))
                <div class="flex-1 text-center">
                    <h1 class="sm:text-lg text-base text-black pb-6">Hasil Studi Anda Masih Kosong</h1>
                </div>
                @else
                <!-- OPTION -->
                <form method="POST" action="{{ url('santri/hasil-studi') }}">
                    @csrf
                    <div class="flex space-x-4 items-center pb-8">
                        <div class="flex-none sm:w-36 w-12">
                            <a class="self-center sm:text-base text-sm hover:no-underline">Semester</a>
                        </div>
                        <div class="flex-none md:w-1/5">
                            <div class="relative">
                                <div class="pointer-events-none absolute inset-y-0 right-3 flex items-center text-grey-darker">
                                    <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                    </svg>
                                </div>
                                <select type="text" name="semester" value="" class="block sm:text-base text-sm appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-2.5 px-4 pr-8 rounded" id="grid-state">
                                    <option selected value="{{ $scores['semester'] }}">{{ $scores['semester'] }}</option>
                                    @foreach($filter_semesters as $filter)    
                                    <option value="{{ $filter->semester }}">{{ $filter->semester }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="flex space-x-4 items-center pb-8">
                        <div class="flex-none sm:w-36 w-12">
                            <a class="self-center sm:text-base text-sm hover:no-underline">Tahun Ajaran</a>
                        </div>
                        <div class="flex-none md:w-1/5">
                            <div class="relative">
                                <div class="pointer-events-none absolute inset-y-0 right-3 flex items-center text-grey-darker">
                                    <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                    </svg>
                                </div>
                                <select type="text" name="year" value="" class="block sm:text-base text-sm appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-2.5 px-4 pr-8 rounded" id="grid-state">
                                    <option selected value="{{ $scores['year'] }}">{{ $scores['year'] }}</option>
                                    @foreach($filter_years as $filter)    
                                    <option value="{{ $filter->year }}">{{ $filter->year }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="object-left text-center text-white sm:text-base text-sm">
                            <button class="bg-blue-600 hover:bg-blue-800 rounded shadow-lg py-2.5 sm:px-6 px-3.5">Lihat</button>
                        </div>
                    </div>
                </form>
                <p class="sm:text-xl text-lg py-4 flex items-center">
                    Laporan Hasil Studi MDNU
                </p>
                <!-- LAPORAN KUMULATIF -->
                <div class="bg-white overflow-auto pb-8">
                    <table class="table-auto bg-white">
                        <thead class="bg-gray-800 text-white">
                            <tr>
                                <th class="text-center py-3 px-4 uppercase font-semibold sm:text-sm text-xs">No</th>
                                <th class="text-center w-1/7 py-3 px-4 uppercase font-semibold sm:text-sm text-xs">Semester</th>
                                <th class="text-center w-1/7 py-3 px-4 uppercase font-semibold sm:text-sm text-xs">Tahun Akademik</th>
                                <th class="text-center w-1/7 py-3 px-4 uppercase font-semibold sm:text-sm text-xs">Jumlah Nilai</th>
                                <th class="text-center w-1/7 py-3 px-4 uppercase font-semibold sm:text-sm text-xs">Nilai Rata-rata</th>
                                <th class="text-center w-1/7 py-3 px-4 uppercase font-semibold sm:text-sm text-xs">Absensi MDNU (%)</th>
                                <th class="text-center w-1/7 py-3 px-4 uppercase font-semibold sm:text-sm text-xs">Absensi Asrama (%)</th>
                                <th class="text-center w-1/7 py-3 px-4 uppercase font-semibold sm:text-sm text-xs">Keterangan</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-700">
                            <tr>
                                <td class="text-center sm:text-base text-sm py-3 px-4">1</td>
                                <td class="text-center sm:text-base text-sm py-3 px-4">{{ $scores['semester'] }}</td>
                                <td class="text-center sm:text-base text-sm py-3 px-4">{{ $scores['year'] }}</td>
                                <td class="text-center sm:text-base text-sm py-3 px-4">{{ $scores['total_nilai'] }}</td>
                                <td class="text-center sm:text-base text-sm py-3 px-4">{{ $scores['nilai_rata'] }}</td>
                                <td class="text-center sm:text-base text-sm py-3 px-4">{{ $scores['attendance_mdnu'] }}%</td>
                                <td class="text-center sm:text-base text-sm py-3 px-4">{{ $scores['attendance_asrama'] }}%</td>
                                @if($scores['keterangan'] === 'Naik Kelas')
                                <td class="text-center sm:text-base text-sm text-green-600 font-bold py-3 px-4">{{ $scores['keterangan'] }}</td>
                                @elseif($scores['keterangan'] === 'Tidak Naik Kelas')
                                <td class="text-center sm:text-base text-sm text-red-600 font-bold py-3 px-4">{{ $scores['keterangan'] }}</td>
                                @endif
                            </tr>
                        </tbody>
                    </table>
                </div>
                <form method="POST" action="{{ url('santri/hasil-studi/cetak') }}">
                    @csrf
                    <div class="flex space-x-4 items-center pb-8">
                        <input type="hidden" name="semester" placeholder=" " value="{{ $scores['semester'] }}" required class="self-center w-full bg-transparent border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200" />
                        <input type="hidden" name="year" placeholder=" " value="{{ $scores['year'] }}" required class="self-center w-full bg-transparent border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200" />
                    </div>
                    <div class="flex space-x-4 items-center pb-8">
                        <div class="object-left text-center text-white sm:text-base text-sm">
                            <button type="submit" class="bg-blue-600 hover:bg-blue-800 rounded shadow-lg py-2.5 sm:px-6 px-3.5">Cetak</button>
                        </div>
                    </div>
                </form>
                @endif
            </div>
        </main>
    </div>
</div>

@endsection