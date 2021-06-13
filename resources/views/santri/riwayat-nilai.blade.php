@extends('layouts.app')

@section('content')

<div class="w-full flex flex-col h-screen overflow-y-hidden">
    <!-- RIWAYAT NILAI -->
    <div class="overflow-x-hidden">
        <main class="pt-6 px-6">
            <h1 class="text-3xl text-black pb-2 mt-2">Riwayat Nilai</h1>
            <div class="bg-white rounded-lg shadow-md p-8 my-8">
                <p class="text-xl pb-4 flex items-center">
                    Riwayat Nilai Kumulatif Santri
                </p>
                <!--TABEL RIWAYAT NILAI-->
                <div class="bg-white overflow-auto pb-8">
                    <table class="table-auto bg-white">
                        <thead class="bg-gray-800 text-white">
                            <tr>
                                <th class="text-left py-3 px-4 uppercase font-semibold text-sm">No</th>
                                <th class="text-left w-1/4 py-3 px-4 uppercase font-semibold text-sm">Tahun
                                    Akademik</th>
                                <th class="text-left w-1/4 py-3 px-4 uppercase font-semibold text-sm">Semester
                                </th>
                                <th class="text-left w-1/4 py-3 px-4 uppercase font-semibold text-sm">Jumlah MP
                                </th>
                                <th class="text-left w-1/4 py-3 px-4 uppercase font-semibold text-sm">Nilai
                                    Kumulatif</td>
                            </tr>
                        </thead>
                        <tbody class="text-gray-700">
                            <tr>
                                <td class="text-left py-3 px-4">1</td>
                                <td class="text-left py-3 px-4"><a></a>2020/2021</a></td>
                                <td class="text-left py-3 px-4"><a>Ganjil</a></td>
                                <td class="text-left py-3 px-4">8</td>
                                <td class="text-left py-3 px-4">660</td>
                            </tr>
                            <tr class="bg-gray-200">
                                <td class="text-left py-3 px-4">2</td>
                                <td class="text-left py-3 px-4"><a>2020/2021</a></td>
                                <td class="text-left py-3 px-4"><a>Genap</a></td>
                                <td class="text-left py-3 px-4">8</td>
                                <td class="text-left py-3 px-4">686</td>
                            </tr>
                            <tr>
                                <td class="text-left py-3 px-4">3</td>
                                <td class="text-left py-3 px-4"><a>2021/2022</a></td>
                                <td class="text-left py-3 px-4"><a>Ganjil</a></td>
                                <td class="text-left py-3 px-4">9</td>
                                <td class="text-left py-3 px-4">689</td>
                            </tr>
                            <tr class="bg-gray-200">
                                <td class="text-left py-3 px-4">4</td>
                                <td class="text-left py-3 px-4"><a>2021/2022</a></td>
                                <td class="text-left py-3 px-4"><a>Genap</a></td>
                                <td class="text-left py-3 px-4">9</td>
                                <td class="text-left py-3 px-4">700</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!--Graph Card-->
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
            </div>
        </main>
        <!-- FOOTER -->
        <footer class="container mx-auto bg-white py-8 border-t border-gray-400">
            <div class="container flex px-6 py-8 ">
                <div class="w-full mx-auto flex flex-wrap">
                    <div class="text-left flex w-full lg:w-1/2 ">
                        <div class="px-3 md:px-0">
                            <h3 class="font-bold text-gray-900">Madrasah Diniyyah Pondok Pesantren Nurul
                                Ummah Yogyakarta</h3>
                            <a class="inline-block no-underline hover:text-black hover:underline pt-5"
                                href="tel:+62 857 2565 5593">Telp. 0857 2565 5593</a><br>
                            <a class="inline-block no-underline hover:text-black hover:underline"
                                href="https://web.whatsapp.com/send?phone=6285725655593&text=Assalamualaikum%20Admin">WhatsApp.
                                0857 2565 5593</a><br>
                            <a class="inline-block no-underline hover:text-black hover:underline"
                                href="mailto:admisi.nurma@gmail.com">E-mail. admisi.nurma@gmail.com</a>
                        </div>
                    </div>
                    <div class="flex w-full lg:w-1/2 lg:justify-end lg:text-right">
                        <div class="px-3 md:px-0">
                            <h3 class="font-bold text-gray-900">Media Sosial</h3>
                            <ul class="list-reset items-center pt-3">
                                <li>
                                    <a class="inline-block no-underline hover:text-black hover:underline py-1"
                                        href="https://instagram.com/nurulummahyk?igshid=1m74irp80dl0v">Instagram</a>
                                    <a class="inline-block no-underline hover:text-black hover:underline"
                                        href="https://www.youtube.com/channel/UCYQ8dFPzAkFF0WbS0r-IDaw">YouTube</a>
                                    <a class="inline-block no-underline hover:text-black hover:underline"
                                        href="https://nurulummah.com/">Website</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>

@endsection