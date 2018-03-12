@extends('admin.dashboard.app')

@section('content')
    <div class="panel panel-primary">
        <div class="panel-heading">
            Add Slider
        </div>
        <div class="panel-body">
            <form role="form" method="post" action="{{route('admin.sliders.store')}}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label>Input slider image</label>
                    <input type="file" name="image" class="form-control">
                </div>
                <button type="submit" name="submit" class="btn btn-danger">Create</button>
            </form>
        </div>
    </div>
@endsection