<?php

namespace App\Http\Controllers;
use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function index()
    {
        $kelas = Kelas::all();
        return view('admin.kelas.index', compact('kelas'));
    }

    public function create()
    {
        return view('admin.kelas.tambah');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
        ]);
        Kelas::create([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
        ]);
        return redirect()->route('kelas.index')
            ->with('success', 'kelas Berhasil Ditambahkan');
    }

    // public function show($id)
    // {
    //     $kelas = Kelas::where('id', $id)->first();
    //     return view('admin.kelas.show', compact('kelas'))
    //         ->with('i', (request()->input('page', 1) - 1) * 5);
    // }


    public function edit($id)
    {
        $kelas = Kelas::find($id);

        return view('admin.kelas.edit', compact('kelas'));
    }

    public function update(Request $request, $id)
    {
        $kelas = Kelas::findOrFail($id);
        $kelas->nama = $request->nama;
        $kelas->deskripsi = $request->deskripsi;
        $kelas->save();

        return redirect()->route('kelas.index')
        ->with('edit', 'Kelas Berhasil Diedit');
    }

    public function destroy($id)
    {
        Kelas::where('id', $id)->delete();

        return redirect()->route('kelas.index')
            ->with('delete', 'kelas Berhasil Dihapus');
    }
}
