<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTugasRequest;
use App\Models\Tugas;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class TugasController extends Controller
{
    public function index(): View
    {
        $tugas = Tugas::orderBy('deadline')->paginate(10);

        return view('tugas.index', compact('tugas'));
    }

    public function create(): View
    {
        return view('tugas.create');
    }

    public function store(StoreTugasRequest $request): RedirectResponse
    {
        Tugas::create($request->validated());

        return redirect()
            ->route('tugas.index')
            ->with('success', 'Tugas berhasil ditambahkan.');
    }

    public function update(Tugas $tugas): RedirectResponse
    {
        $tugas->update(['selesai' => !$tugas->selesai]);

        return redirect()
            ->route('tugas.index')
            ->with('success', 'Status tugas diperbarui.');
    }

    public function destroy(Tugas $tugas): RedirectResponse
    {
        $tugas->delete();

        return redirect()
            ->route('tugas.index')
            ->with('success', 'Tugas dihapus.');
    }
}