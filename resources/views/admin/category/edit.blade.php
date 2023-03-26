@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Edit/Update Category</h4>
    </div>
    <div class="card-body">
        <form action="{{url('update-category/'.$category->id)}}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            @method('POST')

            <div class="row">
                <div class="col-md-6">
                    <label for="">title</label>
                    <input type="text" class="form-control" value="{{ $category->title }}" name="title" id="title" style="border: 1px solid black">
                </div>
                @if($category->image)
                <img src="{{asset('assets/uploads/Category/'.$category->image)}}" alt="category image">
                @endif
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