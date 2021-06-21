@extends('layouts.santri')

@section('content')

<div class="w-full flex flex-col h-screen overflow-y-hidden">
    <!-- USTADZ -->
    <div class="overflow-x-hidden">
        <main class="pt-6 px-6">
            <h1 class="text-3xl text-black pb-2 mt-2">Ustadz</h1>
            <div class="bg-white rounded-lg shadow-md p-8 my-8">
                <!-- OPTION -->
                <div class="flex space-x-4 items-center pb-8">
                    <div class="flex-none w-36">
                        <a class="self-center">Status</a>
                    </div>

                    <div class="flex-none md:w-1/5">
                        <div class="relative">
                            <div class="pointer-events-none absolute inset-y-0 right-3 flex items-center text-grey-darker">
                                <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                </svg>
                            </div>
                            <select class="block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded" id="grid-state">
                                <option>Semua</option>
                                <option>Aktif Mengajar</option>
                                <option>Tidak Aktif Mengajar</option>
                            </select>
                        </div>
                    </div>
                    <!--FLEX 3-->
                    <div class="object-left text-center text-white text-base">
                        <button class="bg-blue-600 hover:bg-blue-800 rounded shadow-lg py-3 px-8" href="#">Lihat
                            Ustadz</button>
                    </div>
                </div>
                <p class="text-xl py-4 flex items-center">
                    Daftar Ustadz Pengampu
                </p>
                <!--TABEL NILAI-->
                <div class="bg-white overflow-auto pb-8">
                    <table class="table-auto bg-white">
                        <thead class="bg-gray-800 text-white">
                            <tr>
                                <th class="text-left py-3 px-4 uppercase font-semibold text-sm">No</th>
                                <th class="text-left w-1/3 py-3 px-4 uppercase font-semibold text-sm">Id</th>
                                <th class="text-left w-1/3 py-3 px-4 uppercase font-semibold text-sm">Nama Ustadz</th>
                                <th class="text-left w-1/3 py-3 px-4 uppercase font-semibold text-sm">Status</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-700">
                            <tr>
                                <td class="text-left py-3 px-4">1</td>
                                <td class="text-left py-3 px-4"><a></a>0001</a></td>
                                <td class="text-left py-3 px-4"><a>si A</a></td>
                                <td class="text-left py-3 px-4">Aktif Mengajar</td>
                            </tr>
                            <tr class="bg-gray-200">
                                <td class="text-left py-3 px-4">2</td>
                                <td class="text-left py-3 px-4"><a>0002</a></td>
                                <td class="text-left py-3 px-4"><a>si B</a></td>
                                <td class="text-left py-3 px-4">Aktif Mengajar</td>
                            </tr>
                            <tr>
                                <td class="text-left py-3 px-4">3</td>
                                <td class="text-left py-3 px-4"><a>0003</a></td>
                                <td class="text-left py-3 px-4"><a>si C</a></td>
                                <td class="text-left py-3 px-4">Aktif Mengajar</td>
                            </tr>
                            <tr class="bg-gray-200">
                                <td class="text-left py-3 px-4">4</td>
                                <td class="text-left py-3 px-4"><a>0004</a></td>
                                <td class="text-left py-3 px-4"><a>si D</a></td>
                                <td class="text-left py-3 px-4">Aktif Mengajar</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
        <!-- FOOTER -->
        <footer class="container mx-auto bg-white py-8 border-t border-gray-400">
            <div class="container flex px-6 py-8 ">
                <div class="w-full mx-auto flex flex-wrap">
                    <div class="text-left flex w-full lg:w-1/2 ">
                        <div class="px-3 md:px-0">
                            <h3 class="font-bold text-gray-900">Madrasah Diniyyah Pondok Pesantren Nurul Ummah Yogyakarta</h3>
                            <a class="inline-block no-underline hover:text-black hover:underline pt-4" href="tel:+62 857 2565 5593">Telp. 0857 2565 5593</a><br>
                            <a class="inline-block no-underline hover:text-black hover:underline" href="https://web.whatsapp.com/send?phone=6285725655593&text=Assalamualaikum%20Admin">WhatsApp. 0857 2565 5593</a><br>
                            <a class="inline-block no-underline hover:text-black hover:underline" href="mailto:admisi.nurma@gmail.com">E-mail. admisi.nurma@gmail.com</a>
                        </div>
                    </div>
                    <div class="flex w-full lg:w-1/2 lg:justify-end lg:text-right">
                        <div class="px-3 md:px-0">
                            <h3 class="font-bold text-gray-900">Media Sosial</h3>
                            <ul class="list-reset items-center pt-4">
                                <li>
                                    <a class="inline-block no-underline hover:text-black hover:underline py-1" href="https://instagram.com/nurulummahyk?igshid=1m74irp80dl0v">Instagram</a>
                                    <a class="inline-block no-underline hover:text-black hover:underline" href="https://www.youtube.com/channel/UCYQ8dFPzAkFF0WbS0r-IDaw">YouTube</a>
                                    <a class="inline-block no-underline hover:text-black hover:underline" href="https://www.youtube.com/channel/UCYQ8dFPzAkFF0WbS0r-IDaw">Facebook</a><br>
                                    <a class="inline-block no-underline hover:text-black hover:underline" href="https://nurulummah.com/">Twitter</a>
                                    <a class="inline-block no-underline hover:text-black hover:underline" href="https://nurulummah.com/">Website</a>  
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