<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadFileController extends Controller
{
    //
    public function index(){
        return view('admin');
    }
    public function showUploadFile(Request $request){
        $file =  $request-> file('image');
        echo 'File Name: '.$file('image');
        echo '<br>';

        echo 'File Extension: '/$file->getClientOriginalExtension();
        echo '<br>';

        $destinationPath = 'uploads';
        $file->move($destinationPath,$file->getClientOriginalName());
    }
}
