<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Models\Artikel;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Artikel::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $validator = Validator::make($request->all(),
              [
                'judul' => 'required',
                'gambar' => 'required|mimes:jpg,png|max:2048',
                'deskripsi' => 'required',
             ]);
        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
        }

        if ($gambar = $request->file('gambar')) {

            //store file into document folder
            $extention = $request->file->extension();
            $file_name = time() . '.' . $extention;
            $txt = 'storage/images/'. $file_name;
            $request->gambar->storeAs('public/images', $file_name);

            //store your file into database
            $artikel = new Artikel();
            $artikel->judul = $request->judul;
            $artikel->gambar = $txt;
            $artikel->deskripsi = $request->deskripsi;


            return response()->json([
                "success" => true,
                "message" => "File successfully uploaded",
                "file" => $txt
            ]);

        }
        return Artikel::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return Artikel::find($id);
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
        $artikel = Artikel::find($id);
        $artikel ->update($request->all());
        return $artikel;
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
        return Artikel::destroy($id);
    }

    /**
     * Search for a name
     *
     * @param  str  $name
     * @return \Illuminate\Http\Response
     */
    public function search($judul)
    {
        return Artikel::where(strtolower('judul'), 'like', '%'.$judul.'%')->get();
    }

}
