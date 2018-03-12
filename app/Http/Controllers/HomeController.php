<?php

namespace App\Http\Controllers;

use App\Gig;
use App\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $slider;
    protected $gig;

    public function __construct(Slider $slider, Gig $gig)
    {
        $this->slider = $slider;
        $this->gig = $gig;
    }

    public function index()
    {
        $sliders = $this->slider::all();
        $gigs = $this->gig::where('status', 1)->get();

        return view('index', compact(['sliders', 'gigs']));
    }

    public function search(Request $request)
    {
        $q = $request->q;
        $gigs = $this->gig::where('title','like','%'.$q.'%')->get();

        return view('search', compact('gigs'));
    }
}
