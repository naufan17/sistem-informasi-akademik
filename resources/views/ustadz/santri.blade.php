@extends('layouts.ustadz')

@section('content')

<div class="w-full flex flex-col h-screen overflow-y-hidden">
    <!-- SANTRI -->
    <div class="overflow-x-hidden">
        <main class="pt-6 px-6">
            <h1 class="text-3xl text-black pb-2 mt-2">Santri</h1>
            <div class="bg-white rounded-lg shadow-md p-8 my-8">
                <!-- OPTION -->
                <div class="flex space-x-4 items-center pb-8">
                    <div class="flex-none w-36">
                        <a class="self-center">Kelas</a>
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
                                <option>Awaliyah</option>
                                <option>1 Wustho</option>
                                <option>2 Wustho</option>
                                <option>1 Ulya</option>
                                <option>2 Ulya</option>
                            </select>
                        </div>
                    </div>
                </div>
                <!-- OPTION -->
                <form method="GET" action="{{ url('ustadz/filter-santri') }}">
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
                                <select type="text" name="status" value="" class="block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker py-3 px-4 pr-8 rounded" id="grid-state">
                                    <option value="Aktif">Aktif</option>
                                    <option value="Tidak Aktif">Tidak Aktif</option>
                                </select>
                            </div>
                        </div>
                        <div class="object-left text-center text-white text-base">
                            <button type="submit" class="bg-blue-600 hover:bg-blue-800 rounded shadow-lg py-3 px-8">Lihat Santri</button>
                        </div>
                    </div>
                </form>
                <p class="text-xl py-4 flex items-center">Daftar Santri</p>
                <!--TABEL NILAI-->
                <div class="bg-white overflow-auto pb-8">
                    <table class="table-auto bg-white">
                        <thead class="bg-gray-800 text-white">
                            <tr>
                                <th class="text-left py-3 px-4 uppercase font-semibold text-sm">No</th>
                                <th class="text-left w-1/3 py-3 px-4 uppercase font-semibold text-sm">NIS</th>
                                <th class="text-left w-1/3 py-3 px-4 uppercase font-semibold text-sm">Nama Santri</th>
                                <th class="text-left w-1/3 py-3 px-4 uppercase font-semibold text-sm">Status</th>
                                <th class="text-left w-1/3 py-3 px-4 uppercase font-semibold text-sm">Nilai</th>
                                <th class="text-left w-1/3 py-3 px-4 uppercase font-semibold text-sm">Absensi</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-700">
                            @foreach($santris as $santri)
                            <tr>
                                <td class="text-left py-3 px-4">{{ $loop->iteration }}</td>
                                <td class="text-left py-3 px-4">{{ $santri->id }}</td>
                                <td class="text-left py-3 px-4">{{ $santri->name }}</td>
                                <td class="text-left py-3 px-4">{{ $santri->status }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>
</div>

@endsection