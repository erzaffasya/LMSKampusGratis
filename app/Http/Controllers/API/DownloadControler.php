<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;

class DownloadControler extends Controller
{
    public function index($filename)
    {
        // Check if file exists in app/storage/file folder
        $file_path = storage_path() .'/app/public/documents/'. $filename;
        if (file_exists($file_path))
        {
            // Send Download
            return Response::download($file_path, $filename, [
                'Content-Length: '. filesize($file_path)
            ]);
        }
        else
        {
            // Error
            exit('Requested file does not exist on our server!');
        }
    }
    // ->where('filename', '[A-Za-z0-9\-\_\.]+');
}
