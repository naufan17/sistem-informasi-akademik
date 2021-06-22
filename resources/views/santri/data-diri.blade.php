@extends('layouts.santri')

@section('content')

<div class="w-full flex flex-col h-screen overflow-y-hidden">
    <!-- DATA DIRI -->
    <div class="overflow-x-hidden">
        <main class="pt-6 px-6">
            <h1 class="text-3xl text-black pb-2 mt-2">Data Diri</h1>
            <div class="bg-white rounded-lg shadow-md p-8 my-8">
                <div class="flex object-left text-center text-white text-base p-4">
                    <a href="{{ route('santri.update-data-diri') }}" class="button bg-blue-600 hover:bg-blue-800 rounded shadow-lg py-3 px-8">
                        Update Profile
                    </a>
                </div>
                <div class="p-4">
                    <h2 class="text-2xl ">
                        Informasi Data Diri
                    </h2>
                    <p class="text-sm text-gray-500">
                        Detail Data Diri
                    </p>
                </div>
                <div>
                    <div class="pt-8">
                        <p class="self-center bg-gray-50 py-4 px-4">
                            Identitas Diri
                        </p>
                    </div>
                    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4">
                        <img id="showImage" class="w-32 rounded-full" src="https://source.unsplash.com/random/350x350" alt="random image">
                    </div>
                    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                        <p class="text-gray-600">
                            Nama Lengkap
                        </p>
                        <p>
                            Jane Doe
                        </p>
                    </div>
                    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                        <p class="text-gray-600">
                            Tempat Lahir
                        </p>
                        <p>
                            Indonesia
                        </p>
                    </div>
                    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                        <p class="text-gray-600">
                            Tanggal Lahir
                        </p>
                        <p>
                            16/05/2021
                        </p>
                    </div>
                    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                        <p class="text-gray-600">
                            Jenis Kelamin
                        </p>
                        <p>
                            Laki-laki
                        </p>
                    </div>
                    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                        <p class="text-gray-600">
                            Nomor Induk Kependudukan / Passport
                        </p>
                        <p>
                            000000000000
                        </p>
                    </div>
                    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                        <p class="text-gray-600">
                            Golongan Darah
                        </p>
                        <p>
                            O
                        </p>
                    </div>
                    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                        <p class="text-gray-600">
                            Nomor Telepon / Handphone
                        </p>
                        <p>
                            081392566737
                        </p>
                    </div>
                    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                        <p class="text-gray-600">
                            Email
                        </p>
                        <p>
                            18106050033@student.uin-suka.ac.id
                        </p>
                    </div>
                    <!-- <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                        <p class="text-gray-600">
                            Website
                        </p>
                        <p>
                            -
                        </p>
                    </div>
                    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                        <p class="text-gray-600">
                            Blog
                        </p>
                        <p>
                            -
                        </p>
                    </div>
                    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                        <p class="text-gray-600">
                            Twitter
                        </p>
                        <p>
                            -
                        </p>
                    </div>
                    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                        <p class="text-gray-600">
                            Facebook
                        </p>
                        <p>
                            -
                        </p>
                    </div>
                    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                        <p class="text-gray-600">
                            Instagram
                        </p>
                        <p>
                            -
                        </p>
                    </div>
                    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                        <p class="text-gray-600">
                            Linkdin
                        </p>
                        <p>
                            -
                        </p>
                    </div>
                    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                        <p class="text-gray-600">
                            Scan Akta Kelahiran
                        </p>
                        <div class="space-y-2">
                            <div class="border-2 flex items-center p-2 rounded justify-between space-x-2">
                                <div class="space-x-2 truncate">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="fill-current inline text-gray-500" width="24" height="24" viewBox="0 0 24 24">
                                        <path d="M17 5v12c0 2.757-2.243 5-5 5s-5-2.243-5-5v-12c0-1.654 1.346-3 3-3s3 1.346 3 3v9c0 .551-.449 1-1 1s-1-.449-1-1v-8h-2v8c0 1.657 1.343 3 3 3s3-1.343 3-3v-9c0-2.761-2.239-5-5-5s-5 2.239-5 5v12c0 3.866 3.134 7 7 7s7-3.134 7-7v-12h-2z" />
                                    </svg>
                                    <span>
                                        scanner.pdf
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>
                <div>
                    <div class="pt-8">
                        <p class="self-center bg-gray-50 py-4 px-4">
                            Keterangan Tempat Tinggal Asal
                        </p>
                    </div>
                    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                        <p class="text-gray-600">
                            Alamat Rumah
                        </p>
                        <p>
                            Palembang
                        </p>
                    </div>
                    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                        <p class="text-gray-600">
                            RT
                        </p>
                        <p>
                            02
                        </p>
                    </div>
                    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                        <p class="text-gray-600">
                            RW
                        </p>
                        <p>
                            02
                        </p>
                    </div>
                    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                        <p class="text-gray-600">
                            Kelurahan / Desa
                        </p>
                        <p>
                            Timbul Jaya
                        </p>
                    </div>
                    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                        <p class="text-gray-600">
                            Kapanewon
                        </p>
                        <p>
                            Muara Sugihan
                        </p>
                    </div>
                    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                        <p class="text-gray-600">
                            Kabupaten
                        </p>
                        <p>
                            Banyuasin
                        </p>
                    </div>
                    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                        <p class="text-gray-600">
                            Provinsi
                        </p>
                        <p>
                            Sumatera Selatan
                        </p>
                    </div>
                    <!-- <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                        <p class="text-gray-600">
                            Negara
                        </p>
                        <p>
                            Indonesia
                        </p>
                    </div>
                    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                        <p class="text-gray-600">
                            Kode Pos
                        </p>
                        <p>
                            00000
                        </p>
                    </div> -->
                </div>
                <!-- <div>
                    <div class="pt-8">
                        <p class="self-center bg-gray-50 py-4 px-4">
                            Keterangan Pekerjaan
                        </p>
                    </div>
                    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                        <p class="text-gray-600">
                            Pekerjaan Santri
                        </p>
                        <p>
                            -
                        </p>
                    </div>
                    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                        <p class="text-gray-600">
                            Alamat Tempat Kerja
                        </p>
                        <p>
                            Palembang Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus
                            itaque, consequuntur sed quam natus laborum debitis in ullam! Quos deserunt, modi
                            fugit in nobis vitae officia vel ipsum obcaecati quasi.
                        </p>
                    </div>
                    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                        <p class="text-gray-600">
                            RT Tempat Kerja
                        </p>
                        <p>
                            02
                        </p>
                    </div>
                    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                        <p class="text-gray-600">
                            RW Tempat Kerja
                        </p>
                        <p>
                            02
                        </p>
                    </div>
                    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                        <p class="text-gray-600">
                            Kelurahan / Desa Tempat Kerja
                        </p>
                        <p>
                            Timbul Jaya
                        </p>
                    </div>
                    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                        <p class="text-gray-600">
                            Propinsi Tempat Kerja
                        </p>
                        <p>
                            Sumatera Selatan
                        </p>
                    </div>
                    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                        <p class="text-gray-600">
                            Kabupaten Tempat Kerja
                        </p>
                        <p>
                            Banyuasin
                        </p>
                    </div>
                    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                        <p class="text-gray-600">
                            Kecamatan Tempat Kerja
                        </p>
                        <p>
                            Muara Sugihan
                        </p>
                    </div>
                    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                        <p class="text-gray-600">
                            Negara Tempat Kerja
                        </p>
                        <p>
                            Indonesia
                        </p>
                    </div>
                    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                        <p class="text-gray-600">
                            Kode Pos Tempat Kerja
                        </p>
                        <p>
                            00000
                        </p>
                    </div>
                    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                        <p class="text-gray-600">
                            Nomor Telepon / Handphone Tempat Kerja
                        </p>
                        <p>
                            -
                        </p>
                    </div>
                    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                        <p class="text-gray-600">
                            Fax Tempat Kerja
                        </p>
                        <p>
                            -
                        </p>
                    </div>
                    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                        <p class="text-gray-600">
                            Email Tempat Kerja
                        </p>
                        <p>
                            -
                        </p>
                    </div>
                </div> -->
                <!-- <div>
                    <div class="pt-8">
                        <p class="self-center bg-gray-50 py-4 px-4">
                            Keterangan Orang Tua
                        </p>
                    </div>
                    <p class="self-center bg-gray-50 py-4 px-4">
                        Ayah
                    </p>
                    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                        <p class="text-gray-600">
                            Nama Lengkap
                        </p>
                        <p>
                            Jane Doe
                        </p>
                    </div>
                    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                        <p class="text-gray-600">
                            Tempat Lahir
                        </p>
                        <p>
                            Indonesia
                        </p>
                    </div>
                    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                        <p class="text-gray-600">
                            Tanggal Lahir
                        </p>
                        <p>
                            16/05/2021
                        </p>
                    </div>
                    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                        <p class="text-gray-600">
                            Pekerjaan
                        </p>
                        <p>
                            -
                        </p>
                    </div>
                    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                        <p class="text-gray-600">
                            Pendidikan Terakhir
                        </p>
                        <p>
                            S1
                        </p>
                    </div>
                    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                        <p class="text-gray-600">
                            Nomor Telepon / Handphone
                        </p>
                        <p>
                            081392566737
                        </p>
                    </div>
                    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                        <p class="text-gray-600">
                            E-mail
                        </p>
                        <p>
                            ajhdb@gmail.com
                        </p>
                    </div>
                    <div class="pt-8">
                        <p class="self-center bg-gray-50 py-4 px-4">
                            Ibu
                        </p>
                    </div>
                    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                        <p class="text-gray-600">
                            Nama Lengkap
                        </p>
                        <p>
                            Jane Doe
                        </p>
                    </div>
                    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                        <p class="text-gray-600">
                            Tempat Lahir
                        </p>
                        <p>
                            Indonesia
                        </p>
                    </div>
                    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                        <p class="text-gray-600">
                            Tanggal Lahir
                        </p>
                        <p>
                            16/05/2021
                        </p>
                    </div>
                    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                        <p class="text-gray-600">
                            Pekerjaan
                        </p>
                        <p>
                            -
                        </p>
                    </div>
                    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                        <p class="text-gray-600">
                            Pendidikan Terakhir
                        </p>
                        <p>
                            S1
                        </p>
                    </div>
                    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                        <p class="text-gray-600">
                            Nomor Telepon / Handphone
                        </p>
                        <p>
                            081392566737
                        </p>
                    </div>
                    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                        <p class="text-gray-600">
                            E-mail
                        </p>
                        <p>
                            ajhdb@gmail.com
                        </p>
                    </div>
                </div> -->
                <!-- <div>
                    <div class="pt-8">
                        <p class="self-center bg-gray-50 py-4 px-4">
                            Keterangan Tempat Tinggal Orang Tua
                        </p>
                    </div>
                    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                        <p class="text-gray-600">
                            Alamat Rumah
                        </p>
                        <p>
                            Palembang Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima
                            voluptates, saepe molestiae omnis eligendi culpa officiis fugit quae suscipit
                            laboriosam perspiciatis consequuntur in beatae quisquam? Nemo velit placeat
                            laudantium natus.
                        </p>
                    </div>
                    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                        <p class="text-gray-600">
                            RT
                        </p>
                        <p>
                            02
                        </p>
                    </div>
                    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                        <p class="text-gray-600">
                            RW
                        </p>
                        <p>
                            02
                        </p>
                    </div>
                    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                        <p class="text-gray-600">
                            Kelurahan / Desa
                        </p>
                        <p>
                            Timbul Jaya
                        </p>
                    </div>
                    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                        <p class="text-gray-600">
                            Propinsi
                        </p>
                        <p>
                            Sumatera Selatan
                        </p>
                    </div>
                    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                        <p class="text-gray-600">
                            Kabupaten
                        </p>
                        <p>
                            Banyuasin
                        </p>
                    </div>
                    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                        <p class="text-gray-600">
                            Kecamatan
                        </p>
                        <p>
                            Muara Sugihan
                        </p>
                    </div>
                    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                        <p class="text-gray-600">
                            Negara
                        </p>
                        <p>
                            Indonesia
                        </p>
                    </div>
                    <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                        <p class="text-gray-600">
                            Kode Pos
                        </p>
                        <p>
                            00000
                        </p>
                    </div>
                </div> -->
            </div>
        </main>
    </div>
</div>

@endsection