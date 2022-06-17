<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(){
        $user = null;
        if(auth()->user()){
            $user = auth()->user();
        }
        $data = compact('user');
        return view('pages.index', $data);
    }
}
