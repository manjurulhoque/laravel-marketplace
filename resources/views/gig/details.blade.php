@extends('app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h3>{{ $gig->title }}</h3><br>
                        <hr/>
                        <img style="width: 100%" src="{{asset('/gigs/img/' . $gig->image)}}"
                             class="img-responsive center-block">
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4>About This Gig</h4>
                    </div>
                    <div class="panel-body">
                        <p>{{ $gig->description }}</p>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4>Reviews</h4>
                    </div>
                    <div class="panel-body">
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-body">
                    @if(Auth::check())
                            <div id="myModal" class="modal fade" role="dialog">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header" style="background-color: #1b6d85; color: white">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Order Gig</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('create.order') }}" method="post">
                                                {{ csrf_field() }}
                                                <input type="hidden" value="{{ $gig->user->id }}" name="to_user_id">
                                                <input type="hidden" value="{{ $gig->id }}" name="gig_id">
                                                <div class="form-group">
                                                    <label for="price">Price</label>
                                                    <input type="number" min="5" required value="5" name="price" class="form-control" id="price">
                                                </div>
                                                <div class="form-group">
                                                    <label for="price">Days</label>
                                                    <input type="number" min="1" required value="1" name="days" class="form-control" id="price">
                                                </div>
                                                <input type="submit" value="Order!" class="btn btn-success">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="button" class="btn btn-info btn-lg" data-toggle="modal"
                                    data-target="#myModal">
                                Order Now (${{ $gig->price }})
                            </button>
                        @else
                            You need to login to order this gig!
                        @endif

                        <div style="margin-top: 30px">
                            @if($gig->user->profile->avater == null)
                                <img src="/img/avatar.png" class="img-circle center-block" height="100" width="100">
                            @else
                                <img src="{{asset('/gigs/img/' . $gig->user->profile->avater)}}"
                                     class="img-circle center-block" height="100" width="100">
                            @endif
                        </div>
                        <a href="#">
                            <h4 class="text-center">{{ $gig->user->name }}</h4>
                        </a>
                        <hr/>
                        @if($gig->user->profile->about)
                            <p>{{ $gig->user->profile->about }}</p>
                        @else
                            <p>New seller</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection