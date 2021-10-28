<?php

namespace App\Http\Controllers;
use App\Models\KontenDokumen;
use Illuminate\Http\Request;
use App\Models\Kelas;

class KontenDokumenController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $kontenDokumen = KontenDokumen::all();
        $nama = Kelas::get();
        return view('admin.kontenDokumen.index', ['nama'=>$nama], compact('kontenDokumen', 'nama'));
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
            $txt = "storage/documents/". $file_name;
            $request->file->storeAs('public/documents', $file_name);
        } else {
            $file_name = null;
        }

        KontenDokumen::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'file' => $txt,
            'bab' => $request->bab,
            'kelas_id' => $request->kelas_id,
        ]);
        //notify()->success('Konten Dokumen berhasil ditambahkan!');
        return redirect()->route('kontenDokumen.index')
            ->with('success', 'Konten Dokumen Berhasil Ditambahkan');
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
            $txt = "storage/documents/". $file_name;
            $request->file->storeAs('public/documents', $file_name);
            $kontenDokumen->file = $txt;
        }else{}

        $kontenDokumen->save();
        //notify()->success('Konten Dokumen berhasil diedit!');
        return redirect()->route('kontenDokumen.index')
        ->with('edit', 'Konten Dokumen Berhasil Diedit');
    }

    public function destroy($id)
    {
        KontenDokumen::where('id', $id)->delete();
        //notify()->success('Konten Dokumen berhasil dihapus!');
        return redirect()->route('kontenDokumen.index')
            ->with('delete', 'Konten Dokumen Berhasil Dihapus');
    }
}