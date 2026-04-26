<!DOCTYPE html>
<html>
<head>
    <title>Data Karyawan</title>
</head>
<body>
    <h1>Data Karyawan</h1>

    <a href="{{ route('karyawans.create') }}">Tambah Karyawan</a>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <table border="1" cellpadding="8" cellspacing="0">
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Jabatan</th>
            <th>Gaji</th>
            <th>Aksi</th>
        </tr>

        @forelse($karyawans as $karyawan)
            <tr>
                <td>{{ $karyawan->id }}</td>
                <td>{{ $karyawan->nama }}</td>
                <td>{{ $karyawan->email }}</td>
                <td>{{ $karyawan->jabatan }}</td>
                <td >{{ $karyawan->gaji }}</td>
                <td>
                    <a href="{{ route('karyawans.edit', $karyawan->id) }}">Edit</a>

                    <form action="{{ route('karyawans.destroy', $karyawan->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Yakin hapus data ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6">Belum ada data karyawan.</td>
            </tr>
        @endforelse
    </table>
</body>
</html>