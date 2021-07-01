@extends('layouts.ustadz')

@section('content')

<div class="w-full flex flex-col h-screen overflow-y-hidden">
    <!-- DATA DIRI -->
    <div class="overflow-x-hidden">
        <main class="pt-6 px-6">
            <h1 class="text-3xl text-black pb-2 mt-2">Profil</h1>
            <div class="bg-white rounded-lg shadow-md p-8 my-8">
                <div class="flex object-left text-center text-white text-base p-4">
                    <a href="{{ url('santri/data-diri/form-update') }}/{{ Auth::user()->name }}" class="button bg-blue-600 hover:bg-blue-800 hover:text-white rounded shadow-lg py-3 px-8">Update Profile</a>
                </div>
                <div class="p-4">
                    <h2 class="text-2xl ">Informasi Data Diri</h2>
                    <p class="text-sm text-gray-500">Detail Data Diri</p>
                </div>
                @foreach($users as $user)
                <div>
                    <div class="pt-8">
                        <p class="self-center bg-gray-50 py-4 px-4">Identitas Diri</p>
                    </div>
                    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4">
                        <img id="showImage" class="w-32 rounded-full" src="https://source.unsplash.com/random/350x350" alt="random image">
                    </div>
                    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                        <p class="text-gray-600">Nama Lengkap</p>
                        <p>: </p>
                    </div>
                    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                        <p class="text-gray-600">Tempat Lahir</p>
                        <p>: </p>
                    </div>
                    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                        <p class="text-gray-600">Tanggal Lahir</p>
                        <p>: </p>
                    </div>
                    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                        <p class="text-gray-600">Jenis Kelamin</p>
                        <p>: </p>
                    </div>
                    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                        <p class="text-gray-600">Nomor Induk Kependudukan / Passport</p>
                        <p>: </p>
                    </div>
                    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                        <p class="text-gray-600">Golongan Darah</p>
                        <p>: </p>
                    </div>
                    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                        <p class="text-gray-600">Nomor Telepon / Handphone</p>
                        <p>: </p>
                    </div>
                    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                        <p class="text-gray-600">Email</p>
                        <p>: </p>
                    </div>
                </div>

                <div>
                    <div class="pt-8">
                        <p class="self-center bg-gray-50 py-4 px-4">Keterangan Tempat Tinggal</p>
                    </div>
                    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                        <p class="text-gray-600">Alamat Rumah</p>
                        <p>: </p>
                    </div>
                    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                        <p class="text-gray-600">RT</p>
                        <p>: </p>
                    </div>
                    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                        <p class="text-gray-600">RW</p>
                        <p>: </p>
                    </div>
                    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                        <p class="text-gray-600">Kelurahan / Desa</p>
                        <p>: </p>
                    </div>
                    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                        <p class="text-gray-600">Kecamatan</p>
                        <p>: </p>
                    </div>
                    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                        <p class="text-gray-600">Kabupaten</p>
                        <p>: </p>
                    </div>
                    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                        <p class="text-gray-600">Provinsi</p>
                        <p>: </p>
                    </div>
                </div>
                @endforeach
            </div>
        </main>
    </div>
</div>

@endsection