<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Subkategori;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Inertia\Inertia;

class SubkategoriController extends Controller
{
    public function index(Request $request)
{
    $search = $request->input('search');
    $kategoriId = $request->input('kategori_id');

    $subkategori = Subkategori::query()
        ->with('kategori')
        ->when($kategoriId, function ($query) use ($kategoriId) {
            $query->where('kategori_id', $kategoriId);
        })
        ->when($search, function ($query) use ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('nama_subkategori', 'like', '%' . $search . '%')
                    ->orWhere('slug', 'like', '%' . $search . '%')
                    ->orWhere('deskripsi', 'like', '%' . $search . '%');
            });
        })
        ->latest()
        ->paginate(10)
        ->withQueryString();

    return Inertia::render('Subkategori/Index', [
        'subkategori' => $subkategori,
        'filters' => [
            'search' => $search,
            'kategori_id' => $kategoriId,
        ],
    ]);
}

    public function create(Request $request)
    {
        $kategori = Kategori::orderBy('nama_kategori')->get();

        $selectedKategori = null;

        if ($request->kategori_id) {
            $selectedKategori = Kategori::find($request->kategori_id);
        }

        return Inertia::render('Subkategori/Create', [
            'kategori' => $kategori,
            'kategori_id' => $request->kategori_id,
            'selectedKategori' => $selectedKategori,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kategori_id' => ['required', 'exists:kategori,id'],
            'nama_subkategori' => ['required', 'string', 'max:255'],
            'deskripsi' => ['nullable', 'string'],
            'is_active' => ['required', 'boolean'],
        ]);

        $validated['slug'] = Str::slug($validated['nama_subkategori']);

        Subkategori::create($validated);

        return redirect()
            ->route('subkategori.index', [
                'kategori_id' => $validated['kategori_id'],
            ])
            ->with('success', 'Subkategori berhasil ditambahkan.');
    }

   public function edit(Subkategori $subkategori)
{
    $kategori = Kategori::orderBy('nama_kategori')->get();

    $selectedKategori = Kategori::find($subkategori->kategori_id);

    return Inertia::render('Subkategori/Edit', [
        'subkategori' => $subkategori,
        'kategori' => $kategori,
        'kategori_id' => $subkategori->kategori_id,
        'selectedKategori' => $selectedKategori,
    ]);
}

public function update(Request $request, Subkategori $subkategori)
{
    $validated = $request->validate([
        'kategori_id' => ['required', 'exists:kategori,id'],
        'nama_subkategori' => ['required', 'string', 'max:255'],
        'deskripsi' => ['nullable', 'string'],
        'is_active' => ['required', 'boolean'],
    ]);

    $validated['slug'] = Str::slug($validated['nama_subkategori']);

    $subkategori->update($validated);

    return redirect()
        ->route('subkategori.index', [
            'kategori_id' => $validated['kategori_id'],
        ])
        ->with('success', 'Subkategori berhasil diperbarui.');
}

    public function destroy(Subkategori $subkategori)
    {
        $kategoriId = $subkategori->kategori_id;

        $subkategori->delete();

        return redirect()
            ->route('subkategori.index', [
                'kategori_id' => $kategoriId,
            ])
            ->with('success', 'Subkategori berhasil dihapus.');
    }
}