<?php

namespace App\Http\Controllers;
use App\Models\Kelas;
use App\Models\KontenDokumen;
use App\Models\KontenVideo;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
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
        notify()->success('Kelas berhasil ditambahkan!');
        return redirect()->route('kelas.index');
            //->with('success', 'Kelas Berhasil Ditambahkan');
    }

    public function show($id)
    {
        $kelas = Kelas::where('id', $id)->first();
        $kontenDokumen = kontenDokumen::where('kelas_id', $id)->get();
        $kontenVideo = kontenVideo::where('kelas_id', $id)->get();
        $kelasselect = Kelas::all();
        // dd($kontenVideo);
        return view('admin.kelas.show', compact('kelas','kontenDokumen','kontenVideo','kelasselect'));
    }


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
        notify()->success('Kelas berhasil diedit!');
        return redirect()->route('kelas.index');
        //->with('edit', 'Kelas Berhasil Diedit');
    }

    public function destroy($id)
    {
        Kelas::where('id', $id)->delete();
        notify()->success('Kelas berhasil dihapus!');
        return redirect()->route('kelas.index');
            //->with('delete', 'Kelas Berhasil Dihapus');
    }
}
