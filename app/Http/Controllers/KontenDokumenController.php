<?php

namespace App\Http\Controllers;
use App\Models\KontenDokumen;
use Illuminate\Http\Request;
use App\Models\Kelas;

class KontenDokumenController extends Controller
{
    public function index()
    {
        $kontenDokumen = KontenDokumen::all();
        return view('admin.kontenDokumen.index', compact('kontenDokumen'));
    }

    public function create()
    {
        $kelas = Kelas::all();
        return view('admin.kontenDokumen.tambah',compact('kelas'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'file' => 'required',
            'bab' => 'required',
            'kelas_id' => 'required',
        ]);

        $upload = $request->file;
        if (isset($request->file)) {
            $extention = $request->file->extension();
            $file_name = time() . '.' . $extention;
            $request->file->storeAs('public/documents', $file_name);
        } else {
            $file_name = null;
        }

        KontenDokumen::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'file' => $file_name,
            'bab' => $request->bab,
            'kelas_id' => $request->kelas_id,
        ]);
        return redirect()->route('kontenDokumen.index')
            ->with('success', 'kontenDokumen Berhasil Ditambahkan');
    }

    public function show($id)
    {
        $kontenDokumens = KontenDokumen::where('id', $id)->first();
        return view('admin.kontenDokumen.show', compact('kontenDokumen'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }


    public function edit($id)
    {
        $kelas = Kelas::all();
        $kontenDokumen = KontenDokumen::find($id);

        return view('admin.kontenDokumen.edit', compact('kontenDokumen','kelas'));
    }

    public function update(Request $request, $id)
    {


        $kontenDokumen = KontenDokumen::findOrFail($id);
        $kontenDokumen->judul = $request->judul;
        $kontenDokumen->deskripsi = $request->deskripsi;  
        $kontenDokumen->bab = $request->bab;
        $kontenDokumen->kelas_id = $request->kelas_id;

        if (isset($request->file)){
            $extention = $request->file->extension();
            $file_name = time().'.'.$extention;
            $request->file->storeAs('public/documents', $file_name);
            $kontenDokumen->file = $file_name;
        }else{}

        $kontenDokumen->save();

        return redirect()->route('kontenDokumen.index')
        ->with('edit', 'pengumuman Berhasil Diedit');
    }

    public function destroy($id)
    {
        KontenDokumen::where('id', $id)->delete();

        return redirect()->route('kontenDokumen.index')
            ->with('delete', 'kontenDokumen Berhasil Dihapus');
    }
}