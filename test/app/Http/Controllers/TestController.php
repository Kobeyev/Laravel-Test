<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use App\Models\Producer;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        dd($user->isSaler());
    }
}
