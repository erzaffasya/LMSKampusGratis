<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Models\JobChannel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class JobChannelController extends Controller
{
    public function index()
    {
        $jobChannel = JobChannel::all();
        return response()->json([
            "message" => "success",
            "data" => $jobChannel
        ], 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),
              [
                'posisi_pekerjaan' => 'required',
                'nama_perusahaan' => 'required',
                'gaji' => 'required',
                'bidang' => 'required',
                'tipe' => 'required',
                'pengalaman' => 'required',
                'foto' => 'required',
             ]);
        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
        }

        if ($files = $request->file('foto')) {

            //store file into document folder
            $extention = $request->foto->extension();
            $file_name = time().'.'.$extention;
            $txt = 'storage/job-channel/'. $file_name;
            $request->foto->storeAs('public/job-channel', $file_name);

            //store your file into database
            $jobChannel = new JobChannel();
            $jobChannel->posisi_pekerjaan = $request->posisi_pekerjaan;
            $jobChannel->nama_perusahaan = $request->nama_perusahaan;
            $jobChannel->gaji = $request->gaji;
            $jobChannel->bidang = $request->bidang;
            $jobChannel->tipe = $request->tipe;
            $jobChannel->pengalaman = $request->pengalaman;
            $jobChannel->foto = $file_name;
            $jobChannel->save();

            return response()->json([
                "success" => true,
                "message" => "Images successfully uploaded",
                "file" => $txt
            ]);

        }
        return JobChannel::create($request->all());
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
        return JobChannel::find($id);
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
        $jobChannel = JobChannel::find($id);
        $jobChannel ->update($request->all());
        return $jobChannel;
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
        return JobChannel::destroy($id);
    }

    public function download($id)
    {
        $jobChannel = JobChannel::find($id);
        $lst = explode('/', $jobChannel->foto);
        $txt = 'api/view2/'.$lst[2];
        return redirect($txt);
    }

    public function view($id)
    {
        $jobChannel = JobChannel::find($id);
        $lst = explode('/', $jobChannel->foto);
        //$txt = 'api/view2/'.$lst[0];
        $filename = $lst[2];
        $txt = '/storage/job-channel/'. $filename;
        return redirect($txt);
    }


}
