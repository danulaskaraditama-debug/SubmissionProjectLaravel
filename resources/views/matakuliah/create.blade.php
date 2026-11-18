<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Mata Kuliah</title>
</head>
<body>

    <h1>Tambah Mata Kuliah</h1>

    <form action="{{ route('matakuliah.store') }}" method="POST">
        @csrf

        <label>Kode Mata Kuliah</label><br>
        <input type="text" name="kode_matakuliah"
            value="{{ old('kode_matakuliah') }}">
        @error('kode_matakuliah')
            <p style="color:red">{{ $message }}</p>
        @enderror

        <br><br>

        <label>Nama Mata Kuliah</label><br>
        <input type="text" name="nama_matakuliah"
            value="{{ old('nama_matakuliah') }}">
        @error('nama_matakuliah')
            <p style="color:red">{{ $message }}</p>
        @enderror

        <br><br>

        <label>SKS</label><br>
        <input type="number" name="sks"
            value="{{ old('sks') }}">
        @error('sks')
            <p style="color:red">{{ $message }}</p>
        @enderror

        <br><br>

        <button type="submit">Simpan</button>
    </form>

    <br>

    <a href="{{ route('matakuliah.index') }}">Kembali</a>

</body>
</html>

