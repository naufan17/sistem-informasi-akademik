@extends('layouts.santri')

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
                                <th class="text-left w-1/5 py-3 px-4 uppercase font-semibold text-sm">Nama MP</th>
                                <th class="text-left w-1/4 py-3 px-4 uppercase font-semibold text-sm">Nama Kitab</th>
                                <th class="text-left w-1/5 py-3 px-4 uppercase font-semibold text-sm">Jadwal</th>
                                <th class="text-left w-1/4 py-3 px-4 uppercase font-semibold text-sm">Nama Ustadz</td>
                            </tr>
                        </thead>
                        <tbody class="text-gray-700">
                            <tr>
                                <td class="text-left py-3 px-4">1</td>
                                <td class="text-left py-3 px-4">MP-01</td>
                                <td class="text-left py-3 px-4"><a class="hover:text-blue-500" >Tafsir</a></td>
                                <td class="text-left py-3 px-4"><a class="hover:text-blue-500 italic" >Tafsir Ayyat Al-Ahkam Juz 1</a></td>
                                <td class="text-left py-3 px-4">Selasa, 19.00-19.45</td>
                                <td class="text-left py-3 px-4">Salman Hadi</td>
                            </tr>
                            <tr class="bg-gray-200">
                                <td class="text-left py-3 px-4">2</td>
                                <td class="text-left py-3 px-4">MP-02</td>
                                <td class="text-left py-3 px-4"><a class="hover:text-blue-500">Fiqih</a></td>
                                <td class="text-left py-3 px-4"><a class="hover:text-blue-500 italic">Fath Al-Mu'in</a></td>
                                <td class="text-left py-3 px-4">Selasa, 19.00-19.45</td>
                                <td class="text-left py-3 px-4">Muhammad Roudak</td>
                            </tr>
                            <tr>
                                <td class="text-left py-3 px-4">3</td>
                                <td class="text-left py-3 px-4">MP-03</td>
                                <td class="text-left py-3 px-4"><a class="hover:text-blue-500">Nahwu</a></td>
                                <td class="text-left py-3 px-4"><a class="hover:text-blue-500 italic">Al-Qawa'id Al-Asasiyyah fi 'Al-Lughoh Al-'Arabiyyah</a></td>
                                <td class="text-left py-3 px-4">Selasa, 19.00-19.45</td>
                                <td class="text-left py-3 px-4">Ainun Najib</td>
                            </tr>
                            <tr class="bg-gray-200">
                                <td class="text-left py-3 px-4">4</td>
                                <td class="text-left py-3 px-4">MP-04</td>
                                <td class="text-left py-3 px-4"><a class="hover:text-blue-500">Hadits</a></td>
                                <td class="text-left py-3 px-4"><a class="hover:text-blue-500 italic">Nail Al-Maram Juz 1</a></td>
                                <td class="text-left py-3 px-4">Selasa, 19.00-19.45</td>
                                <td class="text-left py-3 px-4">Mufti. M</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <p class="text-xl py-4 flex items-center">
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