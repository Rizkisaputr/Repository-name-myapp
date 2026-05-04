<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Kategori;
use App\Models\Subkategori;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Inertia\Inertia;

class ItemController extends Controller
{
   public function index(Request $request)
{
    $kategori = null;
    $subkategori = null;
    $search = $request->input('search');

    if ($request->kategori_id) {
        $kategori = Kategori::find($request->kategori_id);
    }

    if ($request->subkategori_id) {
        $subkategori = Subkategori::find($request->subkategori_id);
    }

    $item = Item::with(['kategori', 'subkategori'])
        ->when($request->kategori_id, function ($query) use ($request) {
            $query->where('kategori_id', $request->kategori_id);
        })
        ->when($request->subkategori_id, function ($query) use ($request) {
            $query->where('subkategori_id', $request->subkategori_id);
        })
        ->when($search, function ($query) use ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('nama_item', 'like', '%' . $search . '%')
                    ->orWhere('slug', 'like', '%' . $search . '%')
                    ->orWhere('deskripsi', 'like', '%' . $search . '%');
            });
        })
        ->latest()
        ->paginate(10)
        ->withQueryString();

    return Inertia::render('Item/Index', [
        'item' => $item,
        'kategori' => $kategori,
        'subkategori' => $subkategori,
        'kategori_id' => $request->kategori_id,
        'subkategori_id' => $request->subkategori_id,
        'filters' => [
            'search' => $search,
            'kategori_id' => $request->kategori_id,
            'subkategori_id' => $request->subkategori_id,
        ],
    ]);
}

    public function create()
    {
        return Inertia::render('Item/Create', [
            'kategori' => Kategori::where('is_active', true)->orderBy('nama_kategori')->get(),
            'subkategori' => Subkategori::where('is_active', true)->orderBy('nama_subkategori')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kategori_id' => ['required', 'exists:kategori,id'],
            'subkategori_id' => ['required', 'exists:subkategori,id'],
            'nama_item' => ['required', 'string', 'max:255'],
            'deskripsi' => ['nullable', 'string'],
            'durasi_menit' => ['required', 'integer', 'min:0'],
            'jumlah_soal' => ['required', 'integer', 'min:0'],
            'harga' => ['required', 'numeric', 'min:0'],
            'is_active' => ['required', 'boolean'],
        ]);

        $validated['slug'] = Str::slug($validated['nama_item']);

        Item::create($validated);

        return redirect('/item')->with('success', 'Item berhasil ditambahkan.');
    }

    public function edit(Item $item)
    {
        return Inertia::render('Item/Edit', [
            'item' => $item,
            'kategori' => Kategori::where('is_active', true)->orderBy('nama_kategori')->get(),
            'subkategori' => Subkategori::where('is_active', true)->orderBy('nama_subkategori')->get(),
        ]);
    }

  public function update(Request $request, Item $item)
{
    $validated = $request->validate([
        'kategori_id' => ['required', 'exists:kategori,id'],
        'subkategori_id' => ['required', 'exists:subkategori,id'],
        'nama_item' => ['required', 'string', 'max:255'],
        'deskripsi' => ['nullable', 'string'],
        'durasi_menit' => ['required', 'integer', 'min:0'],
        'jumlah_soal' => ['required', 'integer', 'min:0'],
        'harga' => ['required', 'numeric', 'min:0'],
        'is_active' => ['required', 'boolean'],
    ]);

    $validated['slug'] = \Illuminate\Support\Str::slug($validated['nama_item']);

    $item->update($validated);

    return redirect()
        ->route('item.index')
        ->with('success', 'Item berhasil diperbarui.');
}

    public function destroy(Item $item)
    {
        $item->delete();

        return redirect('/item')->with('success', 'Item berhasil dihapus.');
    }
}