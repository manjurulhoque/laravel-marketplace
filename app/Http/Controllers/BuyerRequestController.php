<?php

namespace App\Http\Controllers;

use App\BuyerRequest;
use Illuminate\Http\Request;

class BuyerRequestController extends Controller
{
    public function index()
    {
        $requests = BuyerRequest::all();
        return view('buyer-requests.index', compact('requests'));
    }

    public function create()
    {
        return view('buyer-requests.create');
    }

    public function store(Request $request)
    {
        //
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
