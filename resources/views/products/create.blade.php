<!DOCTYPE html>
<html>
<head>
    <title>Tambah Product</title>
</head>
<body>
    <h1>Tambah Product</h1>

    <form action="{{ route('products.store') }}" method="POST">
        @csrf

        <div>
            <label>Nama</label><br>
            <input type="text" name="name" value="{{ old('name') }}">
        </div>

        <div>
            <label>Deskripsi</label><br>
            <textarea name="description">{{ old('description') }}</textarea>
        </div>

        <div>
            <label>Harga</label><br>
            <input type="number" step="0.01" name="price" value="{{ old('price') }}">
        </div>

        <div>
            <label>Stok</label><br>
            <input type="number" name="stock" value="{{ old('stock') }}">
        </div>

        <br>
        <button type="submit">Simpan</button>
    </form>

    <br>
    <a href="{{ route('products.index') }}">Kembali</a>
</body>
</html>