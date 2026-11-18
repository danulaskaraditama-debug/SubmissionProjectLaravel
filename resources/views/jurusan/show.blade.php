<!DOCTYPE html>
<html>
<head>
    <title>Detail Jurusan</title>
</head>
<body>

    <h1>Detail Jurusan</h1>

    <p><strong>Kode Jurusan:</strong> {{ $jurusan->kode }}</p>

    <p><strong>Nama Jurusan:</strong> {{ $jurusan->nama }}</p>

    <p><strong>Waktu Dibuat:</strong>
        {{ $jurusan->created_at->format('d-m-Y H:i') }}
    </p>

    <a href="{{ url('/jurusan') }}">Kembali ke Daftar Jurusan</a>

</body>
</html>
