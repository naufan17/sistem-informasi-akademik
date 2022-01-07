<!DOCTYPE html>
<html>
<head>
	<title>Laporan Hasil Studi MDNU</title>
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
		<h5>Laporan Hasil Studi MDNU</h4>
	</center>	
    <table class='table table-bordered'>
        <thead>
            <tr>
                <th>No</th>
                <th>Mata Pelajaran</th>
                <th>KKM</th>
                <th>Nilai Hasil Belajar</th>
            </tr>
        </thead>
        <tbody>
            @foreach($scores as $score)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $score->course }}</td>
                <td>{{ $score->minimum_score }}</td>
                <td>{{ $score->score }}</td>
            </tr>
            @endforeach
        </tbody>
	</table>
</body>
</html>