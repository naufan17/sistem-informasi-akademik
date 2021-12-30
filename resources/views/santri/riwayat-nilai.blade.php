@extends('layouts.santri')

@section('content')

<div class="w-full flex flex-col h-screen overflow-y-hidden">
    <!-- RIWAYAT NILAI -->
    <div class="overflow-x-hidden">
        <main class="pt-6 px-6">
            <h1 class="text-3xl text-black pb-2 mt-2">Riwayat Nilai</h1>
            <div class="bg-white rounded-lg shadow-md p-8 my-8">
                <p class="text-xl pb-4 flex items-center">Riwayat Nilai Kumulatif Santri</p>
                <!--TABEL RIWAYAT NILAI-->
                <div class="bg-white overflow-auto pb-8">
                    <table class="table-auto bg-white">
                        <thead class="bg-gray-800 text-white">
                            <tr>
                                <th class="text-center py-3 px-4 uppercase font-semibold text-sm">No</th>
                                <th class="text-center w-1/4 py-3 px-4 uppercase font-semibold text-sm">Semester</th>
                                <th class="text-center w-1/4 py-3 px-4 uppercase font-semibold text-sm">Tahun Akademik</th>
                                <th class="text-center w-1/4 py-3 px-4 uppercase font-semibold text-sm">Jumlah MP</th>
                                <th class="text-center w-1/4 py-3 px-4 uppercase font-semibold text-sm">Nilai Kumulatif</td>
                            </tr>
                        </thead>
                        <tbody class="text-gray-700">
                            <tr>
                                <td class="text-center py-3 px-4">1</td>
                                <td class="text-center py-3 px-4">{{ $semester }}</td>
                                <td class="text-center py-3 px-4">{{ $tahunAkademik }}</td>
                                <td class="text-center py-3 px-4">{{ $totalMataPelajaran }}</td>
                                <td class="text-center py-3 px-4">{{ $totalNilai }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!--Graph Card-->
                <!--
                <div class="w-full md:w-1/2 py-4">
                    <div class="border-b-2 py-3">
                        <p class="text-xl">Grafik Riwayat</p>
                    </div>
                    <div class="py-5">
                        <canvas id="chartjs-0" class="chartjs w-1/2 h-96"></canvas>
                        <script>
                            new Chart(document.getElementById("chartjs-0"), {
                                "type": "line",
                                "data": {
                                    "labels": ["smt 1", "smt 2", "smt 3", "smt 4", "smt 5", "smt 6", "smt 7", "smt 8", "smt 9", "smt 10"],
                                    "datasets": [{
                                        "label": "Views",
                                        "data": [660, 686, 689, 700],
                                        "fill": false,
                                        "borderColor": "rgb(75, 192, 192)",
                                        "lineTension": 0.1
                                    }]
                                },
                                "options": {}
                            });
                        </script>
                    </div>
                </div>    
                <div class="flex object-left text-center text-white text-base pt-4">
                    <button class="bg-blue-600 hover:bg-blue-800 rounded shadow-lg py-3 px-8" href="#">Cetak
                        Riwayat Nilai</button>
                </div>
                -->
            </div>
        </main>
    </div>
</div>

@endsection