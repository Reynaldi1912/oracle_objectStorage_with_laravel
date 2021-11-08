<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;

class ImageController extends Controller
{
    public function create()
    {
        return view('uploadimage');
    }
    public function imageUpload(Request $request)
    {
        $this->validate($request, ['image' => 'required|image']);
        if($request->hasfile('image'))
         {
            $file = $request->file('image');
            $name=time().$file->getClientOriginalName();
            $filePath =  $name;
            Storage::disk('oci')->put($filePath, file_get_contents($file));
            return back()->with('success','Image Uploaded successfully');
         }
    }
}