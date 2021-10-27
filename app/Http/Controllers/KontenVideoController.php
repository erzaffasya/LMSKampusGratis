<?php

namespace App\Http\Controllers;
use App\Models\KontenVideo;
use Illuminate\Http\Request;
use App\Models\Kelas;

class KontenVideoController extends Controller
{
    public function index()
    {
        
        $kontenVideo = KontenVideo::all();
        $nama = Kelas::get();
        return view('admin.kontenVideo.index',['nama'=>$nama], compact('kontenVideo','nama'));
    }

    public function create()
    {
        $kelas = Kelas::all();
        return view('admin.kontenVideo.tambah',compact('kelas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'link' => 'required',
            'bab' => 'required',
            'kelas_id' => 'required',
        ]);
        KontenVideo::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'link' => $request->link,
            'bab' => $request->bab,
            'kelas_id' => $request->kelas_id,
        ]);
        return redirect()->route('kontenVideo.index')
            ->with('success', 'Konten Video Berhasil Ditambahkan');
    }

    public function show($id)
    {
        $kontenVideos = KontenVideo::where('id', $id)->first();
        return view('admin.kontenVideo.show', compact('kontenVideo'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }


    public function edit($id)
    {
        $kontenVideo = KontenVideo::find($id);
        $kelas = Kelas::all();
        return view('admin.kontenVideo.edit', compact('kontenVideo','kelas'));
    }

    public function update(Request $request, $id)
    {
        $kontenVideo = KontenVideo::findOrFail($id);
        $kontenVideo->judul = $request->judul;
        $kontenVideo->deskripsi = $request->deskripsi;
        $kontenVideo->link = $request->link;
        $kontenVideo->bab = $request->bab;
        $kontenVideo->kelas_id = $request->kelas_id;
        $kontenVideo->save();

        return redirect()->route('kontenVideo.index')
        ->with('edit', 'Konten Video Berhasil Diedit');
    }

    public function destroy($id)
    {
        KontenVideo::where('id', $id)->delete();

        return redirect()->route('kontenVideo.index')
            ->with('delete', 'Konten Video Berhasil Dihapus');
    }
}