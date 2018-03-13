<?php

namespace App\Http\Controllers;

use App\Gig;
use App\Http\Requests\CreatePurchaseRequest;
use App\Notifications\OrderCreated;
use App\Purchase;
use App\User;
use Illuminate\Http\Request;
use Auth;

class PurchaseController extends Controller
{
    protected $purchase;
    protected $gig;
    function __construct(Purchase $purchase, Gig $gig)
    {
        $this->purchase = $purchase;
        $this->gig = $gig;
    }

    public function store(CreatePurchaseRequest $request)
    {
        $user = User::find($request->to_user_id);
        $g = $this->gig::find($request->gig_id);
        $p = new Purchase();
        $p->price = $request->price;
        $p->user_id = Auth::user()->id;
        $p->to_user_id = $request->to_user_id;
        $p->gig_id = $request->gig_id;
        $p->days = $request->days;
        $p->save();

        $user->notify(new OrderCreated($p, Auth::user(), $g));

        return redirect()->route('home');
    }
}
