<?php

namespace App\Http\Controllers;
use App\Models\Profil;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $profil = Profil::all();
        return view ('admin.profil.index', compact ('profil'));
    }

    public function create()
    {
        return view ('admin.profil.tambah');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'no_hp' => 'required',
            'gambar' => 'required',
        ]);
        $upload = $request->gambar;
        if (isset($request->gambar)) {
            $extention = $request->gambar->extension();
            $file_name = time() . '.' . $extention;
            $request->gambar->move(public_path('assets/foto/profil'), $file_name);
        } else {
            $file_name = null;
        }

        Profil::create([
            'nama' => $request->nama,
            'no_hp' => $request->no_hp,
            'gambar' => $file_name,
        ]);
        notify()->success('Profil berhasil ditambahkan!');
        return redirect()->route('profil.index');
            //>with('success', 'Data Pengguna Berhasil Ditambahkan');
    }

    public function edit($id)
    {
        $profil = Profil::find($id);

        return view('admin.profil.edit', compact('profil'));
    }

    public function update(Request $request, $id)
    {


        $profil = Profil::findOrFail($id);
        $profil->nama = $request->nama;
        $profil->no_hp = $request->no_hp;  

        if (isset($request->gambar)){
            $extention = $request->gambar->extension();
            $file_name = time().'.'.$extention;
            $request->gambar->move(public_path('assets/foto/profil'),$file_name);
            $profil->gambar = $file_name;
        }else{}

        $profil->save();
        notify()->success('Profil berhasil diedit!');
        return redirect()->route('profil.index');
        //->with('edit', 'Profil Berhasil Diedit');
    }

    public function destroy($id)
    {
        Profil::where('id', $id)->delete();
        notify()->success('Profil berhasil dihapus!');
        return redirect()->route('profil.index');
            //->with('delete', 'Profil Berhasil Dihapus');
    }
}
