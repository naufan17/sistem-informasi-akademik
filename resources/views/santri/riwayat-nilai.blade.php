@extends('layouts.santri')

@section('content')

<div class="w-full flex flex-col h-screen overflow-y-hidden">
    <!-- RIWAYAT NILAI -->
    <div class="overflow-x-hidden">
        <main class="pt-6 px-6">
            <h1 class="text-3xl text-black pb-2 mt-2">Riwayat Nilai</h1>
            <div class="bg-white rounded-lg shadow-md p-8 my-8">
                <!-- OPTION -->
                <form method="GET" action="{{ url('santri/filter-riwayat-nilai') }}">
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
                            <a class="self-center">Tahun Ajaran</a>
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
                                <td class="text-center py-3 px-4">1.</td>
                                <td class="text-center py-3 px-4">{{ $scores['semester'] }}</td>
                                <td class="text-center py-3 px-4">{{ $scores['year'] }}</td>
                                <td class="text-center py-3 px-4">{{ $scores['total_mp'] }}</td>
                                <td class="text-center py-3 px-4">{{ $scores['total_nilai'] }}</td>
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