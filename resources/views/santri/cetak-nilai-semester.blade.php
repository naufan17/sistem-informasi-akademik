@extends('layouts.cetak')

@section('content')

<center>
    <h5>Laporan Nilai Semester</h4>
</center>	
<table class='table table-bordered'>
    <thead>
        <tr>
            <th>No</th>
            <th>Mata Pelajaran</th>
            <th>Semester</th>
            <th>KKM</th>
            <th>Nilai Hasil Belajar</th>
        </tr>
    </thead>
    <tbody>
        @foreach($scores as $score)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $score->course }}</td>
            <td>{{ $score->sem }}</td>
            <td>{{ $score->minimum_score }}</td>
            <td>{{ $score->score }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection