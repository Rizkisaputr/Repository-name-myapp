<!DOCTYPE html>
<html>
<head>
    <title>Tambah Admin</title>
</head>
<body>
    <h1>Tambah Admin</h1>

    @if($errors->any())
        <div style="color:red;">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admins.store') }}" method="POST">
        @csrf

        <div>
            <label>Nama</label><br>
            <input type="text" name="name" value="{{ old('name') }}">
        </div>

        <div>
            <label>Email</label><br>
            <input type="email" name="email" value="{{ old('email') }}">
        </div>

        <div>
            <label>Password</label><br>
            <input type="password" name="password">
        </div>

        <div>
            <label>Jenis Kelamin</label><br>
            <select name="jenis_kelamin">
                <option value="">Pilih Jenis Kelamin</option>
                <option value="L" {{ old('jenis_kelamin') == 'L' ? 'selected' : '' }}>Laki-laki</option>
                <option value="P" {{ old('jenis_kelamin') == 'P' ? 'selected' : '' }}>Perempuan</option>
            </select>
        </div>

        <div>
            <label>No Telepon</label><br>
            <input type="text" name="no_telepon" value="{{ old('no_telepon') }}">
        </div>

        <div>
            <label>Alamat</label><br>
            <textarea name="alamat">{{ old('alamat') }}</textarea>
        </div>

        <br>
        <button type="submit">Simpan</button>
    </form>

    <br>
    <a href="{{ route('admins.index') }}">Kembali</a>
</body>
</html>