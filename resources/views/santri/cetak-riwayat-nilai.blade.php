@extends('layouts.cetak')

@section('content')

<center>
    <h5>Riwayat Nilai Kumulatif Santri</h4>
</center>	
<table class='table table-bordered'>
    <thead>
        <tr>
            <th>No</th>
            <th>Semester</th>
            <th>Tahun Akademik</th>
            <th>Jumlah MP</th>
            <th>Nilai Kumulatif</td>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>1.</td>
            <td>{{ $scores['semester'] }}</td>
            <td>{{ $scores['year'] }}</td>
            <td>{{ $scores['total_mp'] }}</td>
            <td>{{ $scores['total_nilai'] }}</td>
        </tr>
    </tbody>
</table>

@endsection