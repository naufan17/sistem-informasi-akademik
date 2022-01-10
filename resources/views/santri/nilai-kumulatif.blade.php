@extends('layouts.santri')

@section('content')

<div class="w-full flex flex-col h-screen overflow-y-hidden">
    <!-- NILAI -->
    <div class="overflow-x-hidden">
        <main class="pt-6 px-6">
            <h1 class="text-3xl text-black pb-2 mt-2">Nilai Kumulatif</h1>
            <div class="bg-white rounded-lg shadow-md p-8 my-8">
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
                                <td class="text-center py-3 px-4">{{ $scores_1['semester'] }}</td>
                                <td class="text-center py-3 px-4">{{ $scores_1['tahun'] }}</td>
                                <td class="text-center py-3 px-4">{{ $scores_1['total_nilai'] }}</td>
                                <td class="text-center py-3 px-4">{{ $scores_1['nilai_rata'] }}</td>
                                <td class="text-center py-3 px-4">{{ $scores_1['attendance_mdnu'] }}%</td>
                                <td class="text-center py-3 px-4">{{ $scores_1['attendance_asrama'] }}%</td>
                                <td class="text-center py-3 px-4">{{ $scores_1['keterangan'] }}</td>
                            </tr>
                            <tr>
                                <td class="text-center py-3 px-4">2.</td>
                                <td class="text-center py-3 px-4">{{ $scores_2['semester'] }}</td>
                                <td class="text-center py-3 px-4">{{ $scores_2['tahun'] }}</td>
                                <td class="text-center py-3 px-4">{{ $scores_2['total_nilai'] }}</td>
                                <td class="text-center py-3 px-4">{{ $scores_2['nilai_rata'] }}</td>
                                <td class="text-center py-3 px-4">{{ $scores_2['attendance_mdnu'] }}%</td>
                                <td class="text-center py-3 px-4">{{ $scores_2['attendance_asrama'] }}%</td>
                                <td class="text-center py-3 px-4">{{ $scores_2['keterangan'] }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>
</div>

@endsection