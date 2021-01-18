<?php

namespace App\Http\Controllers;
use DB;
use App\Models\Tintuc;
use Illuminate\Http\Request;

class TinTucController extends Controller
{
    public function tintuc(){
        $tintuc= Tintuc::all();
        return view('TinTuc.tintuc',['tintuc'=>$tintuc]);
    }
}
