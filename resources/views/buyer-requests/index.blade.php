@extends('app')
@section('content')
    <div class="container">
        <h2 class="pull-left">BUYER REQUESTS</h2>
        <p class="pull-right">10 offers left today</p>
        <div class="row">
            <table class="table">
                <thead>
                <tr>
                    <th>DATE</th>
                    <th>BUYER</th>
                    <th>REQUEST</th>
                    <th>OFFERS</th>
                    <th>DURATION</th>
                    <th>BUDGET</th>
                </tr>
                </thead>
                <tbody>
                @foreach($requests as $request)
                    <tr>
                        <td>{{ date('d-m-Y', strtotime($request->created_at)) }}</td>
                        <td>{{ $request->user->name }}</td>
                        <td>{{ $request->request }}</td>
                        <td>{{ $request->offers }}</td>
                        <td>{{ $request->duration }} days</td>
                        <td>${{ $request->budget }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection