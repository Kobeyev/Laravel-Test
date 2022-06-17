<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use App\Models\Producer;
use App\Models\Products;
use App\Services\FindRelatedProduct;
use Illuminate\Http\Request;

class OffersController extends Controller
{
    public function index()
    {
        $user = null;
        if(auth()->user()){
            $user = auth()->user();
        }
        $producers = Producer::all();
        $products = Products::all();
        $offers = Offer::where('user_id', auth()->user()->id)->get();

        $data = compact('producers', 'products', 'offers', 'user');
        return view('pages.offers.index', $data);
    }

    public function store(Request $request)
    {
        $offer = new Offer();
        $request->merge(['user_id' => auth()->user()->id]);
        $offer->fill($request->all());
        $offer->save();

        $sendEmail = new FindRelatedProduct();
        $sendEmail->handle($offer);

        return back();
    }
}
