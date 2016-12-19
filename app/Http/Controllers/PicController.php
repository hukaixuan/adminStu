<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Storage;

class PicController extends Controller
{
    //
    public function upload(Request $request)
    {
    	$files = $request->file('file');
	    if (!empty($files)) {
	        foreach ($files as $file) {
	            Storage::put($file->getClientOriginalName(), file_get_contents($file));
	        }
	    }
	 
	    return redirect('excel')->witherrors('上传图片成功');
    }
}
