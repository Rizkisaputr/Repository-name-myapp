<!DOCTYPE html>
<html>
<head>
    <title>Edit Product</title>
</head>
<body>
    <h1>Edit Product</h1>

    <form action="{{ route('products.update', $product->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label>Nama</label><br>
            <input type="text" name="name" value="{{ old('name', $product->name) }}">
        </div>

        <div>
            <label>Deskripsi</label><br>
            <textarea name="description">{{ old('description', $product->description) }}</textarea>
        </div>

        <div>
            <label>Harga</label><br>
            <input type="number" step="0.01" name="price" value="{{ old('price', $product->price) }}">
        </div>

        <div>
            <label>Stok</label><br>
            <input type="number" name="stock" value="{{ old('stock', $product->stock) }}">
        </div>

        <br>
        <button type="submit">Update</button>
    </form>

    <br>
    <a href="{{ route('products.index') }}">Kembali</a>
</body>
</html>