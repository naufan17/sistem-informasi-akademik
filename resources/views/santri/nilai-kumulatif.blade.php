@extends('layouts.santri')

@section('content')

<div class="w-full flex flex-col h-screen overflow-y-hidden">
    <!-- NILAI -->
    <div class="overflow-x-hidden">
        <main class="pt-6 px-6">
            <h1 class="text-3xl text-black pb-2 mt-2">Nilai Kumulatif</h1>
            <div class="bg-white rounded-lg shadow-md p-8 my-8">
                <!-- OPTION -->
                <div class="flex space-x-4 items-center pb-4">
                    <div class="flex-none w-36">
                        <a class="self-center">Semester</a>
                    </div>
                    <div class="flex-none md:w-1/5">
                        <div class="relative">
                            <div
                                class="pointer-events-none absolute inset-y-0 right-3 flex items-center text-grey-darker">
                                <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                </svg>
                            </div>
                            <select class="block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded" id="grid-state">
                                <option>1</option>
                                <option>2</option>
                            </select>
                        </div>
                    </div>
                    <!--FLEX 3-->
                    <div class="object-left text-center text-white text-base">
                        <button class="bg-blue-600 hover:bg-blue-800 rounded shadow-lg py-3 px-8" href="#">Lihat Laporan</button>
                    </div>
                </div>
                <p class="text-xl py-4 flex items-center">
                    Laporan Kumulatif Hasil Studi MDNU
                </p>
                <!-- LAPORAN KUMULATIF -->
                <div class="bg-white overflow-auto pb-8">
                    <table class="table-auto bg-white">
                        <thead class="bg-gray-800 text-white">
                            <tr>
                                <th class="text-center py-3 px-4 uppercase font-semibold text-sm">No</th>
                                <th class="text-center w-1/6 py-3 px-4 uppercase font-semibold text-sm">Semester</th>
                                <th class="text-center w-1/6 py-3 px-4 uppercase font-semibold text-sm">Jumlah Nilai</th>
                                <th class="text-center w-1/6 py-3 px-4 uppercase font-semibold text-sm">Nilai Rata-rata</th>
                                <th class="text-center w-1/6 py-3 px-4 uppercase font-semibold text-sm">Absensi MDNU (%)</th>
                                <th class="text-center w-1/6 py-3 px-4 uppercase font-semibold text-sm">Absensi Asrama (%)</th>
                                <th class="text-center w-1/6 py-3 px-4 uppercase font-semibold text-sm">Keterangan</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-700">
                        @foreach($attendances as $attendance)
                            <tr>
                                <td class="text-center py-3 px-4">{{ $loop->iteration }}</td>
                                <td class="text-center py-3 px-4">{{ $semester }}</td>
                                <td class="text-center py-3 px-4">{{ $totalNilai }}</td>
                                <td class="text-center py-3 px-4">{{ $rataRata }}</td>
                                <td class="text-center py-3 px-4">{{ $attendance->attendance_mdnu }}%</td>
                                <td class="text-center py-3 px-4">{{ $attendance->attendance_asrama }}%</td>
                                <td class="text-center py-3 px-4">{{ $keterangan }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!--
                <div class="bg-white overflow-auto py-4">
                    <table class="table-auto bg-white">
                        <tbody class="text-gray-700">
                            <tr class="bg-gray-200">
                                <td class="text-left font-semibold py-3 px-4">Jumlah Nilai</td>
                                <td class="text-left w-1/2 py-3 px-4">: {{ $totalNilai }}</td>
                            </tr>
                            <tr>
                                <td class="text-left font-semibold py-3 px-4">Nilai Rata-rata</td>
                                <td class="text-left w-1/2 py-3 px-4">: {{ $rataRata }}</td>
                            </tr>
                             <tr class="bg-gray-200">
                                <td class="text-left font-semibold py-3 px-4">Rangking</td>
                                <td class="text-left w-1/2 py-3 px-4">: 5 dari 25 santri</td>
                            </tr> 
                            @foreach($attendances as $attendance)
                            <tr>
                                <td class="text-left font-semibold py-3 px-4">Presentase Absensi MDNU</td>
                                <td class="text-left w-1/2 py-3 px-4">: {{ $attendance->attendance_mdnu }}%</td>
                            </tr>
                            <tr class="bg-gray-200">
                                <td class="text-left font-semibold py-3 px-4">Presentase Absensi Asrama</td>
                                <td class="text-left w-1/2 py-3 px-4">: {{ $attendance->attendance_asrama }}%</td>
                            </tr>
                            <tr>
                                <td class="text-left font-semibold py-3 px-4">Keterangan</td>
                                <td class="text-left w-1/2 py-3 px-4">: {{ $keterangan }}</td>
                                <td class="text-left w-1/2 py-3 px-4">: Tidak Naik Kelas</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>


                <div class="flex object-left text-center text-white text-base pt-4">
                    <button class="bg-blue-600 hover:bg-blue-800 rounded shadow-lg py-3 px-8" href="#">Cetak
                        Nilai</button>
                </div>
-->
            </div>
        </main>
    </div>
</div>

@endsection