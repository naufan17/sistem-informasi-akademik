@extends('layouts.santri')

@section('content')

<div class="w-full flex flex-col h-screen overflow-y-hidden">
    <!-- DATA DIRI -->
    <div class="overflow-x-hidden">
        <main class="pt-6 px-6">
            <h1 class="sm:text-3xl text-2xl text-black pb-2 mt-2">Data Diri</h1>
            <div class="bg-white rounded-lg shadow-md p-8 my-8">
                <!-- BACK BUTTON -->
                <div class="p-4">
                    <a href="{{ url('santri/data-diri') }}" class="button flex items-center border sm:text-base text-sm text-black-500 rounded-sm py-2.5 sm:px-6 px-3.5 sm:w-36 w-28 hover:bg-blue-700 hover:text-white hover:no-underline">
                        <svg class="h-5 w-5 mr-3 fill-current" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="-49 141 512 512" style="enable-background:new -49 141 512 512;" xml:space="preserve">
                            <path id="XMLID_10_" d="M438,372H36.355l72.822-72.822c9.763-9.763,9.763-25.592,0-35.355c-9.763-9.764-25.593-9.762-35.355,0 l-115.5,115.5C-46.366,384.01-49,390.369-49,397s2.634,12.989,7.322,17.678l115.5,115.5c9.763,9.762,25.593,9.763,35.355,0 c9.763-9.763,9.763-25.592,0-35.355L36.355,422H438c13.808,0,25-11.193,25-25S451.808,372,438,372z"></path>
                        </svg>
                        Kembali
                    </a>
                </div>
                <div class="p-4">
                    <h2 class="sm:text-2xl text-xl">Perbarui Informasi Data Diri</h2>
                </div>
                <!-- FORM UPDATE DATA DIRI -->
                <form method="POST" action="{{ url('santri/data-diri/update-profile') }}">
                    @csrf
                    @foreach($santris as $santri)
                    <div>
                        <div class="pt-4">
                            <p class="sm:text-base text-sm bg-gray-50 py-4 px-4">Identitas Diri</p>
                        </div>
                        <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 px-4 py-4 space-y-1">
                            <p class="sm:text-base text-sm text-gray-00">Nama Lengkap</p>
                            <div class="relative z-0 w-full">
                                <input type="text" name="name" value="{{ $santri->name }}" required class="sm:text-base text-sm w-full bg-transparent border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200" />
                            </div>
                        </div>
                        <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 px-4 py-4 space-y-1">
                            <p class="sm:text-base text-sm text-gray-600"> Tempat Lahir</p>
                            <div class="relative z-0 w-full">
                                <input type="text" name="place_born" value="{{ $santri->place_born }}" required class="sm:text-base text-sm w-full bg-transparent border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200" />
                            </div>
                        </div>
                        <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 px-4 py-4 space-y-1">
                            <p class="sm:text-base text-sm text-gray-600"> Tanggal Lahir</p>
                            <div class="relative z-0 w-full">
                                <input type="date" name="birthday" value="{{ $santri->birthday }}" onclick="this.setAttribute('type', 'date');" class="sm:text-base text-sm w-full bg-transparent border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200" />
                            </div>
                        </div>
                        <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 px-4 py-4 space-y-1">
                            <p class="sm:text-base text-sm text-gray-600">Jenis Kelamin</p>
                            <div class="relative z-0 w-full">
                                <select type="text" name="gender" value="{{ $santri->gender }}" required class="sm:text-base text-sm w-full bg-transparent border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200" id="grid-state">
                                    <option>Laki-laki</option>
                                    <option>Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 px-4 py-4 space-y-1">
                            <p class="sm:text-base text-sm text-gray-600">Nomor Induk Kependudukan / Passport</p>
                            <div class="relative z-0 w-full">
                                <input type="number" name="id_number" value="{{ $santri->id_number }}" required class="sm:text-base text-sm w-full bg-transparent border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200" />
                            </div>
                        </div>
                        <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 px-4 py-4 space-y-1">
                            <p class="sm:text-base text-sm text-gray-600"> Golongan Darah</p>
                            <div class="relative z-0 w-full">
                                <input type="text" name="blood" value="{{ $santri->blood }}" required class="sm:text-base text-sm w-full bg-transparent border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200" />
                            </div>
                        </div>
                        <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 px-4 py-4 space-y-1">
                            <p class="sm:text-base text-sm text-gray-600"> Nomor Telepon / Handphone </p>
                            <div class="relative z-0 w-full">
                                <input type="tel" name="phone_number" value="{{ $santri->phone_number }}" required class="sm:text-base text-sm w-full bg-transparent border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200" />
                            </div>
                        </div>
                        <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 px-4 py-4 space-y-1">
                            <p class="sm:text-base text-sm text-gray-600"> Email </p>
                            <div class="relative z-0 w-full">
                                <input type="email" name="email" value="{{ $santri->email }}" required class="sm:text-base text-sm w-full bg-transparent border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200" />
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="pt-8">
                            <p class="sm:text-base text-sm bg-gray-50 py-4 px-4">Keterangan Tempat Tinggal Asal</p>
                        </div>
                        <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 px-4 py-4 space-y-1">
                            <p class="sm:text-base text-sm text-gray-600">Alamat Rumah</p>
                            <div class="relative z-0 w-full">
                                <input type="text" name="address" value="{{ $santri->address }}" required class="sm:text-base text-sm w-full bg-transparent border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200" />
                            </div>
                        </div>
                        <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 px-4 py-4 space-y-1">
                            <p class="sm:text-base text-sm text-gray-600">RT</p>
                            <div class="relative z-0 w-full">
                                <input type="text" name="RT" value="{{ $santri->RT }}" required class="sm:text-base text-sm w-full bg-transparent border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200" />
                            </div>
                        </div>
                        <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 px-4 py-4 space-y-1">
                            <p class="sm:text-base text-sm text-gray-600">RW</p>
                            <div class="relative z-0 w-full">
                                <input type="text" name="RW" value="{{ $santri->RW }}" required class="sm:text-base text-sm w-full bg-transparent border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200" />
                            </div>
                        </div>
                        <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 px-4 py-4 space-y-1">
                            <p class="sm:text-base text-sm text-gray-600">Kelurahan / Desa</p>
                            <div class="relative z-0 w-full">
                                <input type="text" name="village" value="{{ $santri->village }}" required class="sm:text-base text-sm w-full bg-transparent border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200" />
                            </div>
                        </div>
                        <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 px-4 py-4 space-y-1">
                            <p class="sm:text-base text-sm text-gray-600">Kecamatan</p>
                            <div class="relative z-0 w-full">
                                <input type="text" name="districs" value="{{ $santri->districs }}" required class="sm:text-base text-sm w-full bg-transparent border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200" />
                            </div>
                        </div>
                        <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 px-4 py-4 space-y-1">
                            <p class="sm:text-base text-sm text-gray-600">Kabupaten</p>
                            <div class="relative z-0 w-full">
                                <input type="text" name="regency" value="{{ $santri->regency }}" required class="sm:text-base text-sm w-full bg-transparent border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200" />
                            </div>
                        </div>
                        <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 px-4 py-4 space-y-1">
                            <p class="sm:text-base text-sm text-gray-600">Provinsi</p>
                            <div class="relative z-0 w-full">
                                <input type="text" name="province" value="{{ $santri->province }}" required class="sm:text-base text-sm w-full bg-transparent border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200" />
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="pt-8">
                            <p class="sm:text-base text-sm bg-gray-50 py-4 px-4">Keterangan Orang Tua</p>
                        </div>
                        <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 px-4 py-4 space-y-1">
                            <p class="sm:text-base text-sm text-gray-600">Nama Ayah</p>
                            <div class="relative z-0 w-full">
                                <input type="text" name="father_name" value="{{ $santri->father_name }}" required class="sm:text-base text-sm w-full bg-transparent border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200" />
                            </div>
                        </div>
                        <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 px-4 py-4 space-y-1">
                            <p class="sm:text-base text-sm text-gray-600">Tempat Lahir Ayah</p>
                            <div class="relative z-0 w-full">
                                <input type="text" name="place_born_father" value="{{ $santri->place_born_father }}" required class="sm:text-base text-sm w-full bg-transparent border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200" />
                            </div>
                        </div>
                        <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 px-4 py-4 space-y-1">
                            <p class="sm:text-base text-sm text-gray-600">Tanggal Lahir Ayah</p>
                            <div class="relative z-0 w-full">
                                <input type="date" name="birthday_father" value="{{ $santri->birthday_father }}" onclick="this.setAttribute('type', 'date');" required class="sm:text-base text-sm w-full bg-transparent border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200" />
                            </div>
                        </div>
                        <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 px-4 py-4 space-y-1">
                            <p class="sm:text-base text-sm text-gray-600">Nama Ibu</p>
                            <div class="relative z-0 w-full">
                                <input type="text" name="mother_name" value="{{ $santri->mother_name }}" required class="sm:text-base text-sm w-full bg-transparent border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200" />
                            </div>
                        </div>
                        <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 px-4 py-4 space-y-1">
                            <p class="sm:text-base text-sm text-gray-600">Tempat Lahir Ibu</p>
                            <div class="relative z-0 w-full">
                                <input type="text" name="place_born_mother" value="{{ $santri->place_born_mother }}" required class="sm:text-base text-sm w-full bg-transparent border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200" />
                            </div>
                        </div>
                        <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 px-4 py-4 space-y-1">
                            <p class="sm:text-base text-sm text-gray-600">Tanggal Lahir Ibu</p>
                            <div class="relative z-0 w-full">
                                <input type="date" name="birthday_mother" value="{{ $santri->birthday_mother }}" onclick="this.setAttribute('type', 'date');" required class="sm:text-base text-sm w-full bg-transparent border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200" />
                            </div>
                        </div>
                        <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 px-4 py-4 space-y-1">
                            <p class="sm:text-base text-sm text-gray-600">Alamat Orang Tua</p>
                            <div class="relative z-0 w-full">
                                <input type="text" name="parent_address" value="{{ $santri->parent_address }}" required class="sm:text-base text-sm w-full bg-transparent border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200" />
                            </div>
                        </div>
                        <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 px-4 py-4 space-y-1">
                            <p class="sm:text-base text-sm text-gray-600">No. Telp/Handphone</p>
                            <div class="relative z-0 w-full">
                                <input type="tel" name="phone_number_parent" value="{{ $santri->phone_number_parent }}" required class="sm:text-base text-sm w-full bg-transparent border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200" />
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-row-reverse object-left text-center text-white sm:text-base text-sm pt-8 px-3">
                        <button type="submit" class="bg-blue-600 hover:bg-blue-800 rounded shadow-lg py-2.5 sm:px-6 px-3.5">Simpan</button>
                    </div>
                    @endforeach
                </form>
                <form method="POST" action="{{ url('santri/data-diri/update-foto') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="pb-4">
                        <div class="pt-8">
                            <p class="sm:text-base text-sm bg-gray-50 py-4 px-4">Foto Profil</p>
                        </div>
                        <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 px-4 py-2 space-y-1">
                            <p class="self-center sm:text-base text-sm text-gray-600">File Foto</p>
                            <div class="relative z-0 w-full mb-2 mt-2">
                                <input class="form-control block appearance-none w-full bg-grey-lighter border border-grey-lighter text-sm text-grey-darker py-1 px-4 pr-8 rounded" type="file" name="image" required="required">
                            </div>
                        </div>
                        <div class="flex flex-row-reverse object-left text-center text-white sm:text-base text-sm pt-8 px-3">
                            <button type="submit" class="bg-blue-600 hover:bg-blue-800 rounded shadow-lg py-2.5 sm:px-6 px-3.5">Simpan</button>
                        </div>
                    </div>
                </form>
                <form method="POST" action="{{ url('santri/data-diri/update-password') }}">
                    @csrf
                    <div class="pb-4">
                        <div class="pt-8">
                            <p class="sm:text-base text-sm bg-gray-50 py-4 px-4">Password</p>
                        </div>
                        @foreach($santris as $santri)
                        <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 px-4 py-4 space-y-1">
                            <p class="self-center sm:text-base text-sm text-gray-600">Password Baru</p>
                            <div class="relative z-0 w-full">
                                <input type="password" name="password" placeholder="" required autocomplete="new-password" required class="sm:text-base text-sm w-full bg-transparent border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200" />
                                @error('password')
                                    <span class="invalid-feedback text-red-500" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 px-4 py-4 space-y-1">
                            <p class="self-center sm:text-base text-sm text-gray-600">Konfirmasi Password</p>
                            <div class="relative z-0 w-full">
                                <input type="password" name="password_confirmation" placeholder="" required autocomplete="new-password" required class="self-center sm:text-base text-sm w-full bg-transparent border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200" />
                            </div>
                        </div>
                        @endforeach
                        <div class="flex flex-row-reverse object-left text-center text-white sm:text-base text-sm pt-8 px-3">
                            <button type="submit" class="bg-blue-600 hover:bg-blue-800 rounded shadow-lg py-2.5 sm:px-6 px-3.5">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </main>
    </div>
</div>

@endsection