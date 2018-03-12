<?php

namespace App\Http\Controllers;

use App\Category;
use App\Gig;
use App\Http\Requests\GigCreateRequest;
use Illuminate\Http\Request;
use Image;
use Auth;

class GigController extends Controller
{
    protected $gig;

    function __construct(Gig $gig)
    {
        $this->gig = $gig;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gigs = Auth::user()->gigs;
        return view('gig.index', compact('gigs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('gig.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(GigCreateRequest $request)
    {
        $this->gig->user_id = Auth::user()->id;
        $this->gig->title = $request->title;
        $this->gig->slug = str_slug($request->title);
        $this->gig->category = $request->category;
        $this->gig->description = $request->description;
        $this->gig->price = $request->price;
        $this->gig->status = $request->status;

        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('gigs/img/' . $filename);
            Image::make($image)->resize(800, 400)->save($location);
            $this->gig->image = $filename;
        }

        $this->gig->save();

        return redirect()->route('my_gigs');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Gig $gig
     * @return \Illuminate\Http\Response
     */
    public function show($gig)
    {
        $gig = Gig::find($gig);
        return view('gig.details')->withGig($gig);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Gig $gig
     * @return \Illuminate\Http\Response
     */
    public function edit(Gig $gig)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Gig $gig
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gig $gig)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Gig $gig
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gig $gig)
    {
        //
    }
}
