<!DOCTYPE html>
<html>
<head>
    <title>Edit Karyawan</title>
</head>
<body>
    <h1>Edit Karyawan</h1>

    @if($errors->any())
        <div style="color: red;">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('karyawans.update', $karyawan->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label>Nama</label><br>
            <input type="text" name="nama" value="{{ old('nama', $karyawan->nama) }}">
        </div>

        <div>
            <label>Email</label><br>
            <input type="email" name="email" value="{{ old('email', $karyawan->email) }}">
        </div>

        <div>
            <label>Jabatan</label><br>
            <input type="text" name="jabatan" value="{{ old('jabatan', $karyawan->jabatan) }}">
        </div>

        <div>
            <label>Gaji</label><br>
            <input type="number" step="0.01" name="gaji" value="{{ old('gaji', $karyawan->gaji) }}">
        </div>

        <br>
        <button type="submit">Update</button>
    </form>

    <br>
    <a href="{{ route('karyawans.index') }}">Kembali</a>
</body>
</html>