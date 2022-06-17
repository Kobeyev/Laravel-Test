<?php

namespace App\Http\Controllers;

use App\Models\Producer;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        $user = null;
        if(auth()->user()){
            $user = auth()->user();
        }
        $producers = Producer::query()->where('user_id', $user->id)->get();
        $data = compact('producers', 'user');
        return view('pages.shop.index', $data);
    }
}
