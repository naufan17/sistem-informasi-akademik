<!DOCTYPE html>
<html>
<head>
	<title>Daftar Kelas</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
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
</body>
</html>