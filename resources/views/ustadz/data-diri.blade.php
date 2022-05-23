@extends('layouts.ustadz')

@section('content')

<div class="w-full flex flex-col h-screen overflow-y-hidden">
    <!-- DATA DIRI -->
    <div class="overflow-x-hidden">
        <main class="pt-6 px-6">
            <h1 class="text-3xl text-black pb-2 mt-2">Data Diri</h1>
            <div class="bg-white rounded-lg shadow-md p-8 my-8">
                <div class="flex object-left text-center text-white text-base p-4">
                    <a href="{{ url('ustadz/data-diri/form-update') }}" class="button bg-blue-600 hover:bg-blue-800 hover:text-white hover:no-underline rounded shadow-lg py-2.5 px-6">Perbarui</a>
                </div>
                @if($update = Session::get('update'))
                <div class="bg-orange-100 border border-orange-400 text-orange-700 px-4 py-3 rounded relative mb-2" role="alert">
                    <span class="block sm:inline">{{ $update }}</span>
                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3" onclick="this.parentElement.style.display='none';">
                        <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                    </span>
                </div>
                @endif
                <div class="p-4">
                    <h2 class="text-2xl ">Informasi Data Diri</h2>
                    <p class="text-sm text-gray-500">Detail Data Diri</p>
                </div>
                @foreach($ustadzs as $ustadz)
                <div>
                    <div class="pt-8">
                        <p class="self-center bg-gray-50 py-4 px-4">Identitas Diri</p>
                    </div>
                    <!--
                    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4">
                        <img id="showImage" class="w-32 rounded-full" src="https://source.unsplash.com/random/350x350" alt="random image">
                    </div>
                    -->
                    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                        <p class="text-gray-600">Nama Lengkap</p>
                        <p>: {{ $ustadz->name }}</p>
                    </div>
                    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                        <p class="text-gray-600">Tempat Lahir</p>
                        <p>: {{ $ustadz->place_born }}</p>
                    </div>
                    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                        <p class="text-gray-600">Tanggal Lahir</p>
                        <p>: {{ $ustadz->birthday }}</p>
                    </div>
                    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                        <p class="text-gray-600">Jenis Kelamin</p>
                        <p>: {{ $ustadz->gender }}</p>
                    </div>
                    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                        <p class="text-gray-600">Nomor Induk Kependudukan / Passport</p>
                        <p>: {{ $ustadz->id_number }}</p>
                    </div>
                    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                        <p class="text-gray-600">Golongan Darah</p>
                        <p>: {{ $ustadz->blood }}</p>
                    </div>
                    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                        <p class="text-gray-600">Nomor Telepon / Handphone</p>
                        <p>: {{ $ustadz->phone_number }}</p>
                    </div>
                    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                        <p class="text-gray-600">Email</p>
                        <p>: {{ $ustadz->email }}</p>
                    </div>
                </div>
                <div>
                    <div class="pt-8">
                        <p class="self-center bg-gray-50 py-4 px-4">Keterangan Tempat Tinggal Asal</p>
                    </div>
                    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                        <p class="text-gray-600">Alamat Rumah</p>
                        <p>: {{ $ustadz->address}}</p>
                    </div>
                    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                        <p class="text-gray-600">RT</p>
                        <p>: {{ $ustadz->RT }}</p>
                    </div>
                    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                        <p class="text-gray-600">RW</p>
                        <p>: {{ $ustadz->RW }}</p>
                    </div>
                    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                        <p class="text-gray-600">Kelurahan / Desa</p>
                        <p>: {{ $ustadz->village }}</p>
                    </div>
                    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                        <p class="text-gray-600">Kecamatan</p>
                        <p>: {{ $ustadz->districs }}</p>
                    </div>
                    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                        <p class="text-gray-600">Kabupaten</p>
                        <p>: {{ $ustadz->regency }}</p>
                    </div>
                    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                        <p class="text-gray-600">Provinsi</p>
                        <p>: {{ $ustadz->province }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </main>
    </div>
</div>

@endsection