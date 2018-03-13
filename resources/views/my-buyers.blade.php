@extends('app')

@section('content')

    <div class="container">
        <div class="row">
            <h1 style="margin-bottom: 30px">My Buyers</h1>
            <div class="panel panel-success">
                <table class="table table-bordered table-striped">
                    <thead class="bg-success">
                    <tr>
                        <th>BUYER NAME</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($buyers as $buyer)
                        <tr>
                            <td>
                                <div class="pull-left">
                                    <img src="{{ asset('/img/avatar.png') }}" alt="" style="height: 50px; width: 50px;" class="img-circle">
                                    <a href="">{{ $buyer->my_buyer->name }}</a><br>
                                    <a href="" style="margin-left: 40%; color: #ff40f8;">User profile</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection