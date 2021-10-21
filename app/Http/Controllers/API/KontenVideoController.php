<?php

namespace App\Http\Controllers\API;

use App\Models\KontenVideo;
use App\Models\Kelas;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KontenVideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return KontenVideo::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'judul' => 'required',
    //         'deskripsi' => 'required',
    //         'link' => 'required',
    //         'bab' => 'required',
    //         'kelas_id' => 'required',
    //     ]);
    //     return KontenVideo::create($request->all());
    // }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return KontenVideo::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $video = KontenVideo::find($id);
        $video ->update($request->all());
        return $video;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        return KontenVideo::destroy($id);
    }

    /**
     * Search for a name
     *
     * @param  str  $name
     * @return \Illuminate\Http\Response
     */
    public function search($name)
    {
        return KontenVideo::where(strtolower('judul'), 'like', '%'.$name.'%')->get();
    }

    public function store(Request $request, $id)
    {
        $kelas = Kelas::find($id);
        $video = KontenVideo::create($request->all());
        $video->kelas_id = $kelas->id;
        $kelas->get_video()->save($video);
        return response()->json([
            "success" => true,
            "message" => "Video is successfully added",
        ]);
    }
}

