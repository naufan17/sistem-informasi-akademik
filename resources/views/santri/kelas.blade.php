@extends('layouts.santri')

@section('content')

<div class="w-full flex flex-col h-screen overflow-y-hidden">
    <div class="overflow-x-hidden">
        <main class="pt-6 px-6">
            <h1 class="sm:text-3xl text-2xl text-black pb-2 mt-2">Kelas</h1>
            <div class="bg-white rounded-lg shadow-md p-8 my-8">
                @if($cumulative_studies->isEmpty())
                @if(date('m') == 01 || date('m') == 07)
                <div class="flex-1 text-center">
                    <h1 class="sm:text-lg text-base text-black pb-6">Anda Belum Mengikuti Kelas</h1>
                    <a href="{{ url('santri/kelas/form-create') }}" class="button bg-blue-600 hover:bg-blue-800 text-white hover:no-underline rounded shadow-lg py-2.5 px-6">
                        Tambah
                    </a>
                </div>
                @else
                <p class="text-xl pb-4 flex items-center">Daftar MP Diikuti</p>
                @endif
                @else
                <!-- OPTION -->
                <form method="POST" action="{{ url('santri/kelas') }}">
                    @csrf
                    <div class="flex space-x-4 items-center pb-8">
                        <div class="flex-none sm:w-36 w-12">
                            <a class="self-center sm:text-base text-sm hover:no-underline">Semester</a>
                        </div>
                        <input type="hidden" name="id" value="{{ Auth::user()->id }}" class="self-center w-full bg-transparent border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200" />
                        <div class="flex-none sm:w-1/5 w-1/3">
                            <div class="relative">
                                <div class="pointer-events-none absolute inset-y-0 right-3 flex items-center text-grey-darker">
                                    <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                    </svg>
                                </div>
                                <select type="text" name="semester" value=""  class="block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker sm:text-base text-sm py-2.5 px-4 pr-8 rounded" id="grid-state">
                                    @foreach($semesters as $filter)    
                                    <option value="{{ $filter->semester }}">{{ $filter->semester }}</option>
                                    @endforeach
                                    @foreach($filter_semesters as $filter)    
                                    <option value="{{ $filter->semester }}">{{ $filter->semester }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="flex space-x-4 items-center pb-8">
                        <div class="flex-none sm:w-36 w-12">
                            <a class="self-center sm:text-base text-sm hover:no-underline">Tahun Ajaran</a>
                        </div>
                        <div class="flex-none sm:w-1/5 w-1/3">
                            <div class="relative">
                                <div class="pointer-events-none absolute inset-y-0 right-3 flex items-center text-grey-darker">
                                    <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                    </svg>
                                </div>
                                <select type="text" name="tahun_ajaran" value=""  class="block appearance-none w-full bg-grey-lighter border border-grey-lighter text-grey-darker sm:text-base text-sm py-2.5 px-4 pr-8 rounded" id="grid-state">
                                    @foreach($years as $filter)    
                                    <option value="{{ $filter->year }}">{{ $filter->year }}</option>
                                    @endforeach
                                    @foreach($filter_years as $filter)    
                                    <option value="{{ $filter->year }}">{{ $filter->year }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="object-left text-center text-white sm:text-base text-sm">
                            <button class="bg-blue-600 hover:bg-blue-800 rounded shadow-lg py-2.5 sm:px-6 px-3.5">Lihat</button>
                        </div>
                    </div>
                </form>
                @if(date('m') == 01 || date('m') == 07)
                <p class="sm:text-xl text-lg pt-4 flex items-center border-b-2">Daftar MP Diikuti</p>
                <div class="flex flex-row-reverse object-left text-center text-white sm:text-base text-sm py-4">
                    <a href="{{ url('santri/kelas/form-create') }}" class="button bg-blue-600 hover:bg-blue-800 hover:no-underline rounded shadow-lg py-2.5 sm:px-6 px-3.5">
                        Tambah
                    </a>
                </div>
                @else
                <p class="sm:text-xl text-lg pb-4 flex  items-center">Daftar MP Diikuti</p>
                @endif
                <div class="bg-white overflow-auto pb-8">
                    <table class="table-auto bg-white">
                        <thead class="bg-gray-800 text-white">
                            <tr>
                                <th class="text-center py-3 px-4 uppercase font-semibold sm:text-sm text-xs">No</th>
                                <th class="text-center w-1/5 py-3 px-4 uppercase font-semibold sm:text-sm text-xs">Mata pelajaran</th>
                                <th class="text-center w-1/5 py-3 px-4 uppercase font-semibold sm:text-sm text-xs">Kitab</th>
                                <th class="text-center w-1/5 py-3 px-4 uppercase font-semibold sm:text-sm text-xs">Kelas</th>
                                <th class="text-center w-1/5 py-3 px-4 uppercase font-semibold sm:text-sm text-xs">Jadwal</th>
                                <th class="text-center w-1/5 py-3 px-4 uppercase font-semibold sm:text-sm text-xs">Ustadz</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-700">
                            @foreach($cumulative_studies as $cumulative_study)
                            <tr>
                                <td class="text-center sm:text-base text-sm py-3 px-4">{{ $loop->iteration }}</td>
                                <td class="text-center sm:text-base text-sm py-3 px-4">{{ $cumulative_study->course }}</td>
                                <td class="text-center sm:text-base text-sm py-3 px-4">{{ $cumulative_study->book }}</td>
                                <td class="text-center sm:text-base text-sm py-3 px-4">{{ $cumulative_study->grade_number }} {{ $cumulative_study->grade_name }}</td>
                                <td class="text-center sm:text-base text-sm py-3 px-4">{{ $cumulative_study->day }}, {{ $cumulative_study->time_begin }} - {{ $cumulative_study->time_end }}</td>
                                <td class="text-center sm:text-base text-sm py-3 px-4">{{ $cumulative_study->name }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <form method="POST" action="{{ url('santri/kelas/cetak') }}">
                    @csrf
                    <div class="flex space-x-4 items-center pb-8">
                        @foreach($cumulative_studies as $cumulative_study)
                        <input type="hidden" name="semester" placeholder=" " value="{{ $cumulative_study->semester}}" required class="self-center w-full bg-transparent border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200" />
                        <input type="hidden" name="year" placeholder=" " value="{{ $cumulative_study->year }}" required class="self-center w-full bg-transparent border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200" />
                        @endforeach
                    </div>
                    <div class="flex space-x-4 items-center pb-8">
                        <div class="object-left text-center text-white sm:text-base text-sm">
                            <button type="submit" class="bg-blue-600 hover:bg-blue-800 rounded shadow-lg py-2.5 sm:px-6 px-3.5">Cetak</button>
                        </div>
                    </div>
                </form>
                @endif
            </div>
        </main>
    </div>
</div>

@endsection