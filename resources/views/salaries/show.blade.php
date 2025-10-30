<!DOCTYPE html>
<html>
<head>
    <title>Detail Position</title>
</head>
<body>
    <h1>Detail Position</h1>

    <table border="1" cellpadding="8" cellspacing="0">
        <tr>
            <th>Nama Position</th>
            <td>{{ $position->nama_jabatan}}</td>
            <th>Gaji Pokok</th>
            <td>{{ $position->gaji_pokok }}</td>
        </tr>
    </table>

    <br>
    <a href="{{ route('positions.index') }}">Kembali ke Daftar Position</a>
</body>
</html>
