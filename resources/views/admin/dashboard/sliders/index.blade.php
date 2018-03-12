@extends('admin.dashboard.app')

@section('content')
    <div class="panel panel-primary">
        <div class="panel-heading">
            All sliders
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Image</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($sliders as $slider)
                        <tr>
                            <td>{{ $slider->id }}</td>
                            <td>
                                <img style="width: 100px; height: 70px;" src="{{ asset('/sliders/' . $slider->image) }}" alt="">
                            </td>
                            <td>
                                <span class="btn-group" style="margin-top: 5px">
                                    <button class="btn btn-warning btn-xs" data-toggle="modal"
                                            data-target="#item_edit" data-id="{{ $slider->id }}">
                                        <i class="glyphicon glyphicon-edit"></i>
                                    </button>
                                    <button class="btn btn-danger btn-xs" ; data-toggle="modal"
                                            data-target="#item_remove">
                                        <i class="glyphicon glyphicon-remove"></i>
                                    </button>
                                </span>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection