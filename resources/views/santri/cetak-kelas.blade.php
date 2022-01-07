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
            <th>Kelas</th>
            <th>Jadwal</th>
        </tr>
    </thead>
    <tbody>
        @foreach($cumulative_studies as $cumulative_study)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $cumulative_study->course }}</td>
            <td>{{ $cumulative_study->book }}</td>
            <td>{{ $cumulative_study->grade_number }} {{ $cumulative_study->grade_name }}</td>
            <td>{{ $cumulative_study->day }}, {{ $cumulative_study->time_begin }} - {{ $cumulative_study->time_end }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection