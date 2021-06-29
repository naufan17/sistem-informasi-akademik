@extends('layouts.santri')

@section('content')

<div class="w-full flex flex-col h-screen overflow-y-hidden">
    <!-- DATA DIRI -->
    <div class="overflow-x-hidden">
        <main class="pt-6 px-6">
            <h1 class="text-3xl text-black pb-2 mt-2">Data Diri</h1>
            <div class="bg-white rounded-lg shadow-md p-8 my-8">
                <div class="p-4">
                    <a href="{{ url('santri/data-diri') }}/{{ Auth::user()->name }}" class="button flex items-center border border-teal-500 text-teal-500 block rounded-sm py-3 px-6 w-32 hover:bg-blue-700 hover:text-white">
                        <svg class="h-5 w-5 mr-3 fill-current" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="-49 141 512 512" style="enable-background:new -49 141 512 512;" xml:space="preserve">
                            <path id="XMLID_10_" d="M438,372H36.355l72.822-72.822c9.763-9.763,9.763-25.592,0-35.355c-9.763-9.764-25.593-9.762-35.355,0 l-115.5,115.5C-46.366,384.01-49,390.369-49,397s2.634,12.989,7.322,17.678l115.5,115.5c9.763,9.762,25.593,9.763,35.355,0 c9.763-9.763,9.763-25.592,0-35.355L36.355,422H438c13.808,0,25-11.193,25-25S451.808,372,438,372z"></path>
                        </svg>
                        Back
                    </a>
                </div>
                <div class="p-4">
                    <h2 class="text-2xl ">Update Informasi Data Diri</h2>
                </div>
                <form method="GET" action="">
                    @foreach($users as $user)
                    <div>
                        <div class="pt-8">
                            <p class="self-center bg-gray-50 py-4 px-4">Identitas Diri</p>
                        </div>
                        <div class="grid justify-items-stretch py-8">
                            <div class="justify-self-center object-center text-center text-white text-base px-4">
                                <div class="py-8 self-center">
                                    <img id="showImage" class="w-52 rounded-full" src="https://source.unsplash.com/random/350x350" alt="random image">
                                </div>
                                <div class="">
                                <button class="bg-blue-600 hover:bg-blue-800 rounded shadow-lg py-3 px-8" href="#">Ganti Foto</button>
                                </div>
                            </div>
                        </div>
                        <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 px-4 py-2 space-y-1">
                            <p class="self-center text-gray-600">Nama Lengkap</p>
                            <div class="relative z-0 w-full mb-5">
                                <input type="text" name="name" placeholder=" " value="{{ $user->name }}" required class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200" />
                            </div>
                        </div>
                        <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 px-4 py-2 space-y-1">
                            <p class="self-center text-gray-600"> Tempat Lahir</p>
                            <div class="relative z-0 w-full mb-5">
                                <input type="text" name="name" placeholder=" " value="{{ $user->place_born }}" required class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200" />
                            </div>
                        </div>
                        <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 px-4 py-2 space-y-1">
                            <p class="self-center text-gray-600"> Tanggal Lahir</p>
                            <div class="relative z-0 w-full mb-5">
                                <input type="text" name="date" placeholder=" " value="{{ $user->birthday }}" onclick="this.setAttribute('type', 'date');" class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200" />
                            </div>
                        </div>
                        <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 px-4 py-2 space-y-1">
                            <p class="self-center text-gray-600">Jenis Kelamin</p>
                            <fieldset class="relative z-0 w-full p-px mb-5">
                                <div class="block pt-3 pb-2 space-x-4">
                                    <label>
                                        <input type="radio" name="radio" value="1"class="mr-2 text-black border-2 border-gray-300 focus:border-gray-300 focus:ring-black"/>Laki-laki
                                    </label>
                                    <label>
                                        <input type="radio" name="radio" value="2" class="mr-2 text-black border-2 border-gray-300 focus:border-gray-300 focus:ring-black"/>Perempuan
                                    </label>
                                </div>
                            </fieldset>
                        </div>
                        <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 px-4 py-2 space-y-1">
                            <p class="self-center text-gray-600">Nomor Induk Kependudukan / Passport</p>
                            <div class="relative z-0 w-full mb-5">
                                <input type="text" name="name" placeholder=" " value="{{ $user->id_number }}" required class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200" />
                            </div>
                        </div>
                        <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 px-4 py-2 space-y-1">
                            <p class="self-center text-gray-600"> Golongan Darah</p>
                            <div class="relative z-0 w-full mb-5">
                                <input type="text" name="name" placeholder=" " value="{{ $user->blood }}" required class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200" />
                            </div>
                        </div>
                        <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 px-4 py-2 space-y-1">
                            <p class="self-center text-gray-600"> Nomor Telepon / Handphone </p>
                            <div class="relative z-0 w-full mb-5">
                                <input type="text" name="name" placeholder=" " value="{{ $user->phone_number }}" required class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200" />
                            </div>
                        </div>
                        <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 px-4 py-2 space-y-1">
                            <p class="self-center text-gray-600"> Email </p>
                            <div class="relative z-0 w-full mb-5">
                                <input type="text" name="name" placeholder=" " value="{{ $user->email }}" required class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200" />
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="pt-8">
                            <p class="self-center bg-gray-50 py-4 px-4">Keterangan Tempat Tinggal Asal</p>
                        </div>
                        <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 px-4 py-2 space-y-1">
                            <p class="self-center text-gray-600">Alamat Rumah</p>
                            <div class="relative z-0 w-full mb-5">
                                <input type="text" name="name" placeholder=" " value="{{ $user->address }}" required class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200" />
                            </div>
                        </div>
                        <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 px-4 py-2 space-y-1">
                            <p class="self-center text-gray-600">RT</p>
                            <div class="relative z-0 w-full mb-5">
                                <input type="text" name="name" placeholder=" " value="{{ $user->RT }}" required class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200" />
                            </div>
                        </div>
                        <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 px-4 py-2 space-y-1">
                            <p class="self-center text-gray-600">RW</p>
                            <div class="relative z-0 w-full mb-5">
                                <input type="text" name="name" placeholder=" " value="{{ $user->RW }}" required class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200" />
                            </div>
                        </div>
                        <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 px-4 py-2 space-y-1">
                            <p class="self-center text-gray-600">Kelurahan / Desa</p>
                            <div class="relative z-0 w-full mb-5">
                                <input type="text" name="name" placeholder=" " value="{{ $user->village }}" required class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200" />
                            </div>
                        </div>
                        <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 px-4 py-2 space-y-1">
                            <p class="self-center text-gray-600">Kapanewon</p>
                            <div class="relative z-0 w-full mb-5">
                                <input type="text" name="name" placeholder=" " value="{{ $user->districs }}" required class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200" />
                            </div>
                        </div>
                        <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 px-4 py-2 space-y-1">
                            <p class="self-center text-gray-600">Kabupaten</p>
                            <div class="relative z-0 w-full mb-5">
                                <input type="text" name="name" placeholder=" " value="{{ $user->regency }}" required class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200" />
                            </div>
                        </div>
                        <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 px-4 py-2 space-y-1">
                            <p class="self-center text-gray-600">Provinsi</p>
                            <div class="relative z-0 w-full mb-5">
                                <input type="text" name="name" placeholder=" " value="{{ $user->province }}" required class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200" />
                            </div>
                        </div>
                        <div class="flex flex-row-reverse object-left text-center text-white text-base pt-8 px-3">
                            <button type="submit" class="bg-blue-600 hover:bg-blue-800 rounded shadow-lg py-3 px-8" >Simpan</button>
                        </div>
                    @endforeach
                </form>
            </div>
        </main>
    </div>
</div>
