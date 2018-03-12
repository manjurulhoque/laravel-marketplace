@extends('admin.dashboard.app')

@section('content')
    <div class="panel panel-primary">
        <div class="panel-heading">
            Create Category
        </div>
        <div class="panel-body">
            <form role="form" method="post" action="{{route('admin.categories.store')}}">
                {{ csrf_field() }}
                <div class="form-group">
                    <label>Category Name</label>
                    <input class="form-control" name="title" placeholder="Enter Category name">
                </div>
                <button type="submit" name="submit" class="btn btn-success">Create</button>
            </form>
        </div>
    </div>
@endsection