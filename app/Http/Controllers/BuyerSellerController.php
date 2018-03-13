<?php

namespace App\Http\Controllers;

use App\Purchase;
use Illuminate\Http\Request;
use Auth;

class BuyerSellerController extends Controller
{
    public function my_buyer()
    {
        $buyers = Purchase::where('to_user_id', Auth::user()->id)->get();

        return view('my-buyers', compact('buyers'));
    }
}
