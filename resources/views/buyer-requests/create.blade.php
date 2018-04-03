@extends('app')
@section('content')
    <div class="panel panel-danger">
        <div class="panel-body">
            <form class="form-horizontal" action="{{ route('store.request', Auth::user()->name ) }}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="request" class="col-sm-2 control-label">Request Description</label>
                    <div class="col-sm-10">
                        <textarea rows="3" id="request" class="form-control" name="request"></textarea>
                    </div>
                </div>
                <div class="form-group">
                        <label class="col-sm-2 control-label">Duration</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" name="duration">
                        </div>
                    </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Budget ($)</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" name="budget">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-success">Create</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection