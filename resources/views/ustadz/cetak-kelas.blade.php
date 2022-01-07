@extends('layouts.cetak')

@section('content')

<center>
    <h5>Daftar Kelas</h4>
</center>	
<table class='table table-bordered'>
    <thead>
        <tr>
            <th>No</th>
            <th>Mata pelajaran</th>
            <th>Kitab</th>
            <th>Tingkat</th>
            <th>Jadwal</th>
        </tr>
    </thead>
    <tbody>
        @foreach($courses as $course)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $course->course }}</td>
            <td>{{ $course->book }}</td>
            <td>{{ $course->grade_number }} {{ $course->grade_name }}</td>
            <td>{{ $course->day }}, {{ $course->time_begin }} - {{ $course->time_end }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
    
@endsection