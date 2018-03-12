@extends('app')
@section('content')
    <div class="container">
        <h2>Search Result</h2>
        <div class="row">
            @forelse ($gigs as $gig)
                <div class="col-md-3">
                    <div class="thumbnail">
                        <a href="{{ route('gigs.show', $gig->id) }}">
                            <img src="{{asset('/gigs/img/' . $gig->image)}}">
                        </a>
                        <div class="caption">
                            <p><a href="{{ route('gigs.show', $gig->id) }}">{{ $gig->title }}</a></p>
                            <p><span>by <a href="">{{ $gig->user->name }}</a></span>
                                <b class="green pull-right">STARTING AT ${{ $gig->price }}</b>
                            </p>
                        </div>
                    </div>
                </div>
            @empty
                <h4>No result found with your search</h4>
            @endforelse
        </div>
    </div>
@endsection