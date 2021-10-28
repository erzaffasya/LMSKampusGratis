<?php

namespace App\Http\Controllers;
use App\Models\JobChannel;
use Illuminate\Http\Request;

class JobChannelController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $jobChannel = JobChannel::all();
        return view('admin.jobChannel.index', compact('jobChannel'));
    }

    public function create()
    {
        return view('admin.jobChannel.tambah');
    }

    public function store(Request $request)
    {
        $request->validate([
            'posisi_pekerjaan' => 'required',
            'nama_perusahaan' => 'required',
            'gaji' => 'required',
            'bidang' => 'required',
            'tipe' => 'required',
            'pengalaman' => 'required',
            'foto' => 'required',
        ]);
        $upload = $request->foto;
        if (isset($request->foto)) {
            $extention = $request->foto->extension();
            $file_name = time() . '.' . $extention;
            $txt = "storage/job-channel/". $file_name;
            $request->foto->storeAs('public/job-channel', $file_name);
        } else {
            $file_name = null;
        }
        JobChannel::create([
            'posisi_pekerjaan' => $request->posisi_pekerjaan,
            'nama_perusahaan' => $request->nama_perusahaan,
            'gaji' => $request->gaji,
            'bidang' => $request->bidang,
            'tipe' => $request->tipe,
            'pengalaman' => $request->pengalaman,
            'foto' => $file_name,

        ]);
        //notify()->success('Job Channel berhasil ditambahkan!');
        return redirect()->route('jobChannel.index')
            ->with('success', 'Job Channel Berhasil Ditambahkan');
    }

    public function show($id)
    {
        $jobChannel = JobChannel::where('id', $id)->first();
        // dd($kontenVideo);
        return view('admin.jobChannel.show', compact('jobChannel'));
    }


    public function edit($id)
    {
        $jobChannel = JobChannel::find($id);
 
        return view('admin.jobChannel.edit', compact('jobChannel'));
    }

    public function update(Request $request, $id)
    {
        $jobChannel = JobChannel::findOrFail($id);
        $jobChannel->posisi_pekerjaan = $request->posisi_pekerjaan;
        $jobChannel->nama_perusahaan = $request->nama_perusahaan;
        $jobChannel->gaji = $request->gaji;
        $jobChannel->bidang = $request->bidang;
        $jobChannel->tipe = $request->tipe;
        $jobChannel->pengalaman = $request->pengalaman;

        if (isset($request->foto)){
            $extention = $request->foto->extension();
            $file_name = time().'.'.$extention;
            $txt = "storage/job-channel/". $file_name;
            $request->foto->storeAs('public/job-channel', $file_name);
            $jobChannel->foto = $txt;
        }else{}
        $jobChannel->save();
        //notify()->success('Job Channel berhasil diedit!');
        return redirect()->route('jobChannel.index')
        ->with('edit', 'Job Channel Berhasil Diedit');
    }

    public function destroy($id)
    {
        JobChannel::where('id', $id)->delete();
        //notify()->success('Job Channel berhasil dihapus!');
        return redirect()->route('jobChannel.index')
            ->with('delete', 'Job Channel Berhasil Dihapus');
    }
}
