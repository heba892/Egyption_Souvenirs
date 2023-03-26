@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Add Category</h4>
    </div>

    <div class="card-body">
        <form action="{{url('insert-category')}}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}

            <div class="row">
                <div class="col-md-6">
                    <label for="">title</label>
                    <input type="text" class="form-control" name="title" id="title" style="border: 1px solid black">
                </div>
                <div class="col-md-6">
                    <label for="">image</label>
                    <input type="file" class="form-control" name="CategoryImg" id="image" style="border: 1px solid black">
                </div>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection