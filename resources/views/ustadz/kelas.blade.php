@extends('layouts.ustadz')

@section('content')

<div class="w-full flex flex-col h-screen overflow-y-hidden">
    <div class="overflow-x-hidden">
        <main class="pt-6 px-6">
            <h1 class="text-3xl text-black pb-2 mt-2">Kelas</h1>
            <div class="bg-white rounded-lg shadow-md p-8 my-8">
                @if($courses->isEmpty())
                <div class="flex-1 text-center">
                    <h1 class="text-lg text-black pb-6">Hasil Studi Anda Masih Kosong</h1>
                </div>
                @else
                <p class="text-xl pb-4 flex items-center">Daftar Kelas</p>
                <div class="bg-white overflow-auto pb-8">
                    <table class="table-auto bg-white">
                        <thead class="bg-gray-800 text-white">
                            <tr>
                                <th class="text-center py-3 px-4 uppercase font-semibold text-sm">No</th>
                                <th class="text-center w-1/5 py-3 px-4 uppercase font-semibold text-sm">Mata pelajaran</th>
                                <th class="text-center w-1/5 py-3 px-4 uppercase font-semibold text-sm">Kitab</th>
                                <th class="text-center w-1/5 py-3 px-4 uppercase font-semibold text-sm">Kelas</th>
                                <th class="text-center w-1/5 py-3 px-4 uppercase font-semibold text-sm">Jadwal</th>
                                <th class="text-center w-1/5 py-3 px-4 uppercase font-semibold text-sm">Daftar Santri</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-700">
                            @foreach($courses as $course)
                            <tr>
                                <td class="text-center py-3 px-4">{{ $loop->iteration }}</td>
                                <td class="text-center py-3 px-4">{{ $course->course }}</td>
                                <td class="text-center py-3 px-4">{{ $course->book }}</td>
                                <td class="text-center py-3 px-4">{{ $course->grade_number }} {{ $course->grade_name }}</td>
                                <td class="text-center py-3 px-4">{{ $course->day }}, {{ $course->time_begin }} - {{ $course->time_end }}</td>
                                <td>
                                    <form method="POST" action="{{ url('ustadz/kelas/detail-santri') }}">
                                        @csrf
                                        <div class="flex flex-row-reverse object-left text-center text-white text-base py-3 px-4">
                                            <input type="hidden" name="id_course" placeholder="" value="{{ $course->id_course }}" required autocomplete="name" required class="py-2 px-3 block w-full bg-transparent border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-300" />
                                            <button type="submit" class="bg-blue-600 hover:bg-blue-800 rounded shadow-lg py-2 px-4">Lihat</button>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <form method="POST" action="{{ url('ustadz/kelas/cetak') }}">
                    @csrf
                    <div class="flex space-x-4 items-center pb-8">
                        <input type="hidden" name="id_ustadz" placeholder=" " value="{{ Auth::user()->id }}" required class="self-center w-full bg-transparent border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200" />
                    </div>
                    <div class="flex space-x-4 items-center pb-8">
                        <div class="object-left text-center text-white text-base">
                            <button type="submit" class="bg-blue-600 hover:bg-blue-800 rounded shadow-lg py-3 px-8">Cetak</button>
                        </div>
                    </div>
                </form>
                @endif
            </div>
        </main>
    </div>
</div>

@endsection