<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Artisan;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;
class CkImageUploadController extends Controller
{
    //
    public function upload(Request $request)
    {
        if($request->hasFile('upload')) {
     
            //get file extension
            $extension = $request->file('upload')->getClientOriginalExtension();
       
            //filename to store
            $filenametostore = strtoupper(uniqid()).'.'.$extension;
       
            //Upload File
            $request->file('upload')->storeAs('public/uploads', $filenametostore);
     
            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('storage/uploads/'.$filenametostore); 
            // $msg = 'Image successfully uploaded'; 
            $re = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url')</script>";
              
            // Render HTML output 
            @header('Content-type: text/html; charset=utf-8'); 
            echo $re;
        }
    }
    public function showGitStatus(){
        try {
            $process = new Process(['git', 'status']);
            $process->run();
    
            $gitStatus = $process->getOutput();
    
            return view('giterror', compact('gitStatus'));
        } catch (ProcessFailedException $exception) {
            return view('git.error');
        }
    }
}



