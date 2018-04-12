<?php

namespace App\Http\Controllers;

use App\BuyerRequest;
use Illuminate\Http\Request;
use App\Http\Requests\CreateBuyerRequest;
use Auth;

class BuyerRequestController extends Controller
{
    public function __constructor()
    {

    }
	
    public function index()
    {
        $requests = BuyerRequest::all();
        return view('buyer-requests.index', compact('requests'));
    }

    public function create()
    {
        return view('buyer-requests.create');
    }

    public function store(CreateBuyerRequest $request)
    {
        $br = new BuyerRequest;

        $br->user_id = Auth::user()->id;
        $br->request = $request->description;
        $br->duration = $request->duration;
        $br->budget = $request->budget;

        $br->save();

        return redirect()->route('users.requests', Auth::user()->name);
    }

    public function show(BuyerRequest $buyerRequest)
    {
        //
    }

    public function edit(BuyerRequest $buyerRequest)
    {
        //
    }

    public function update(Request $request, BuyerRequest $buyerRequest)
    {
        //
    }

    public function destroy(BuyerRequest $buyerRequest)
    {
        //
    }
}
