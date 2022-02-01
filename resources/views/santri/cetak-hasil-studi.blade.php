@extends('layouts.cetak')

@section('content')

<center>
    <h5>Laporan Hasil Studi MDNU</h4>
</center>	
<table class='table table-bordered'>
    <thead>
        <tr>
            <th>No</th>
            <th>Semester</th>
            <th>Tahun Akademik</th>
            <th>Jumlah Nilai</th>
            <th>Nilai Rata-rata</th>
            <th>Absensi MDNU (%)</th>
            <th>Absensi Asrama (%)</th>
            <th>Keterangan</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>1.</td>
            <td>{{ $scores['semester'] }}</td>
            <td>{{ $scores['year'] }}</td>
            <td>{{ $scores['total_nilai'] }}</td>
            <td>{{ $scores['nilai_rata'] }}</td>
            <td>{{ $scores['attendance_mdnu'] }}%</td>
            <td>{{ $scores['attendance_asrama'] }}%</td>
            <td>{{ $scores['keterangan'] }}</td>
        </tr>
    </tbody>
</table>

@endsection