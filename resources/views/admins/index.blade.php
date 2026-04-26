<!DOCTYPE html>
<html>
<head>
    <title>Data Admin</title>
</head>
<body>
    <h1>Data Admin</h1>

    <a href="{{ route('admins.create') }}">Tambah Admin</a>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <table border="1" cellpadding="8" cellspacing="0">
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Jenis Kelamin</th>
            <th>No Telepon</th>
            <th>Alamat</th>
            <th>Aksi</th>
        </tr>

        @forelse($admins as $admin)
            <tr>
                <td>{{ $admin->id }}</td>
                <td>{{ $admin->name }}</td>
                <td>{{ $admin->email }}</td>
                <td>
                    {{ $admin->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}
                </td>
                <td>{{ $admin->no_telepon }}</td>
                <td>{{ $admin->alamat }}</td>
                <td>
                    <a href="{{ route('admins.edit', $admin->id) }}">Edit</a>

                    <form action="{{ route('admins.destroy', $admin->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Yakin hapus data ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="7">Belum ada data admin.</td>
            </tr>
        @endforelse
    </table>
</body>
</html>