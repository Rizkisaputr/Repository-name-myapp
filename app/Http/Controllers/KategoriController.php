<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Inertia\Inertia;

class KategoriController extends Controller
{
    
    public function index(Request $request)
{
    $search = $request->input('search');

    $kategori = Kategori::query()
        ->when($search, function ($query) use ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('nama_kategori', 'like', '%' . $search . '%')
                    ->orWhere('slug', 'like', '%' . $search . '%')
                    ->orWhere('deskripsi', 'like', '%' . $search . '%');
            });
        })
        ->latest()
        ->paginate(10)
        ->withQueryString();

    return Inertia::render('Kategori/Index', [
        'kategori' => $kategori,
        'filters' => [
            'search' => $search,
        ],
    ]);
}

    public function create()
    {
        return Inertia::render('Kategori/Create');
    }

    public function show(Kategori $kategori)
    {
        $kategori->load([
            'subkategori' => function ($query) {
                $query->latest();
            }
        ]);

        return Inertia::render('Kategori/Show', [
            'kategori' => $kategori,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_kategori' => ['required', 'string', 'max:255', 'unique:kategori,nama_kategori'],
            'deskripsi' => ['nullable', 'string'],
            'is_active' => ['required', 'boolean'],
        ]);

        $validated['slug'] = Str::slug($validated['nama_kategori']);

        Kategori::create($validated);

        return redirect()
            ->route('kategori.index')
            ->with('success', 'Kategori berhasil ditambahkan.');
    }

    public function edit(Kategori $kategori)
    {
        return Inertia::render('Kategori/Edit', [
            'kategori' => $kategori,
        ]);
    }

    public function update(Request $request, Kategori $kategori)
    {
        $validated = $request->validate([
            'nama_kategori' => ['required', 'string', 'max:255', 'unique:kategori,nama_kategori,' . $kategori->id],
            'deskripsi' => ['nullable', 'string'],
            'is_active' => ['required', 'boolean'],
        ]);

        $validated['slug'] = Str::slug($validated['nama_kategori']);

        $kategori->update($validated);

        return redirect()
            ->route('kategori.index')
            ->with('success', 'Kategori berhasil diperbarui.');
    }

    public function destroy(Kategori $kategori)
    {
        $kategori->delete();

        return redirect()
            ->route('kategori.index')
            ->with('success', 'Kategori berhasil dihapus.');
    }
}