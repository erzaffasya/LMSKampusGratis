<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Iklan;

class IklanController extends Controller
{
    //
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $iklan = Iklan::all();
        return response()->json([
            "status" => true,
            "message" => "Pengambilan indeks data berhasil",
            "data" => $iklan
            ], 200);
    }

}
