@extends('layouts.santri')

@section('content')
<!-- DATA DIRI -->
<div class="w-full flex flex-col overflow-y-hidden">
    <!-- DATA DIRI -->
    <div class="overflow-x-hidden">
        <main class="w-full flex-grow-0 pt-6 px-6">
            <h1 class="sm:text-3xl text-2xl text-black pb-2 mt-2">Data Diri</h1>
            <div class="bg-white rounded-lg shadow-md p-8 my-8">
                <div class="flex object-left text-center text-white text-base p-4">
                    <a href="{{ url('santri/data-diri/form-update') }}" class="button bg-blue-600 hover:bg-blue-800 sm:text-base text-sm hover:text-white hover:no-underline rounded shadow-lg py-2.5 sm:px-6 px-3.5">Perbarui</a>
                </div>
                @if($update = Session::get('update'))
                <div class="bg-orange-100 border border-orange-400 text-orange-700 sm:text-base text-sm px-4 py-3 rounded relative mb-2" role="alert">
                    <span class="block sm:inline">{{ $update }}</span>
                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3" onclick="this.parentElement.style.display='none';">
                        <svg class="fill-current h-6 w-6 text-orange-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                    </span>
                </div>
                @endif
                <div class="p-4">
                    <h2 class="sm:text-2xl text-xl">Informasi Data Diri</h2>
                    <p class="sm:text-base text-sm text-gray-500">Detail Data Diri</p>
                </div>
                @foreach($santris as $santri)
                <div>
                    <div class="pt-4">
                        <p class="self-center sm:text-base text-sm  bg-gray-50 py-4 px-4">Identitas Diri</p>
                    </div>
                    <!-- <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4">
                    @if(!empty(Auth::guard('santri')->user()->photo))
                        <img id="showImage" class="w-32 rounded-full" src="{{ URL::to('/') }}/foto_santri/{{Auth::guard('santri')->user()->photo}}" alt="random image">
                        @else
                        <img id="showImage" class="w-32 rounded-full" src="{{ URL::to('/') }}/images/default-profile-picture.jpg" alt="random image">
                        @endif
                    </div> -->
                    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                        <p class="text-gray-600 sm:text-base text-sm">Nama Lengkap</p>
                        <p>: {{ $santri->name }}</p>
                    </div>
                    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                        <p class="text-gray-600 sm:text-base text-sm">Tempat Lahir</p>
                        <p>: {{ $santri->place_born }}</p>
                    </div>
                    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                        <p class="text-gray-600 sm:text-base text-sm">Tanggal Lahir</p>
                        <p>: {{ $santri->birthday }}</p>
                    </div>
                    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                        <p class="text-gray-600 sm:text-base text-sm">Jenis Kelamin</p>
                        <p>: {{ $santri->gender }}</p>
                    </div>
                    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                        <p class="text-gray-600 sm:text-base text-sm">Nomor Induk Kependudukan / Passport</p>
                        <p>: {{ $santri->id_number }}</p>
                    </div>
                    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                        <p class="text-gray-600 sm:text-base text-sm">Golongan Darah</p>
                        <p>: {{ $santri->blood }}</p>
                    </div>
                    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                        <p class="text-gray-600 sm:text-base text-sm">Nomor Telepon / Handphone</p>
                        <p>: {{ $santri->phone_number }}</p>
                    </div>
                    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                        <p class="text-gray-600 sm:text-base text-sm">Email</p>
                        <p>: {{ $santri->email }}</p>
                    </div>
                </div>
                <div>
                    <div class="pt-8">
                        <p class="self-center sm:text-base text-sm  bg-gray-50 py-4 px-4">Keterangan Tempat Tinggal Asal</p>
                    </div>
                    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                        <p class="text-gray-600 sm:text-base text-sm">Alamat Rumah</p>
                        <p>: {{ $santri->address}}</p>
                    </div>
                    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                        <p class="text-gray-600 sm:text-base text-sm">RT</p>
                        <p>: {{ $santri->RT }}</p>
                    </div>
                    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                        <p class="text-gray-600 sm:text-base text-sm">RW</p>
                        <p>: {{ $santri->RW }}</p>
                    </div>
                    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                        <p class="text-gray-600 sm:text-base text-sm">Kelurahan / Desa</p>
                        <p>: {{ $santri->village }}</p>
                    </div>
                    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                        <p class="text-gray-600 sm:text-base text-sm">Kecamatan</p>
                        <p>: {{ $santri->districs }}</p>
                    </div>
                    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                        <p class="text-gray-600 sm:text-base text-sm">Kabupaten</p>
                        <p>: {{ $santri->regency }}</p>
                    </div>
                    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                        <p class="text-gray-600 sm:text-base text-sm">Provinsi</p>
                        <p>: {{ $santri->province }}</p>
                    </div>
                </div>
                <div class="pb-4">
                    <div class="pt-8">
                        <p class="self-center sm:text-base text-sm bg-gray-50 py-4 px-4">Keterangan Orang Tua</p>
                    </div>
                    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                        <p class="text-gray-600 sm:text-base text-sm">Nama Ayah</p>
                        <p>: {{ $santri->father_name }}</p>
                    </div>
                    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                        <p class="text-gray-600 sm:text-base text-sm">Tempat Lahir Ayah</p>
                        <p>: {{ $santri->place_born_father }}</p>
                    </div>
                    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                        <p class="text-gray-600 sm:text-base text-sm">Tanggal Lahir Ayah</p>
                        <p>: {{ $santri->birthday_father }}</p>
                    </div>
                    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                        <p class="text-gray-600 sm:text-base text-sm">Nama Ibu</p>
                        <p>: {{ $santri->mother_name }}</p>
                    </div>
                    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                        <p class="text-gray-600 sm:text-base text-sm">Tempat Lahir Ibu</p>
                        <p>: {{ $santri->place_born_mother }}</p>
                    </div>
                    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                        <p class="text-gray-600 sm:text-base text-sm">Tanggal Lahir Ibu</p>
                        <p>: {{ $santri->birthday_mother }}</p>
                    </div>
                    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                        <p class="text-gray-600 sm:text-base text-sm">Alamat Orang Tua</p>
                        <p>: {{ $santri->parent_address }}</p>
                    </div>
                    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                        <p class="text-gray-600 sm:text-base text-sm">No. Telp/Handphone</p>
                        <p>: {{ $santri->phone_number_parent }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </main>
    </div>
</div>


@endsection