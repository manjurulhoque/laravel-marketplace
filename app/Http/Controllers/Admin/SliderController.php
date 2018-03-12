<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Slider;
use Illuminate\Http\Request;
use Image;

class SliderController extends Controller
{
    protected $slider;

    function __construct(Slider $slider)
    {
        $this->slider = $slider;
    }

    public function index()
    {
        $sliders = $this->slider::all();

        return view('admin.dashboard.sliders.index', compact('sliders'));
    }

    public function create()
    {
        return view('admin.dashboard.sliders.create');
    }

    public function store(Request $request)
    {
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('sliders/' . $filename);
            Image::make($image)->resize(800, 400)->save($location);
            $this->slider->image = $filename;

            $this->slider->save();
        }

        return redirect()->route('admin.sliders.index');
    }
}
