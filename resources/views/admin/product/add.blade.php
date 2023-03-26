@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Add Product</h4>
    </div>
    <div class="card-body">
        <form action="{{url('insert-product')}}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <div class="col-md-12 mb-3">
                    <select class="form-select" name="category_id">
                        <option value="" style="color: black">Select Product</option>
                        @foreach($category as $item)
                        <option value="{{$item->id}}" style="color: black">{{$item->title}}</option>
                        @endforeach
                    </select>

                    <label for="">title</label>
                    <input type="text" class="form-control" name="title" id="title" style="border: 1px solid black">
                </div>

                <div class="col-md-6">
                    <label for="">description</label>
                    <input type="text" class="form-control" name="description" id="description" style="border: 1px solid black">
                </div>
                <div class="col-md-6">
                    <label for="">image</label>
                    <input type="file" class="form-control" name="ProductImg" id="image" style="border: 1px solid black">
                </div>
                <div class="col-md-6">
                    <label for="">Price</label>
                    <input type="number" class="form-control" name="price" id="price" style="border: 1px solid black">
                </div>
                <div class="col-md-6">
                    <label for="">Quantity</label>
                    <input type="number" class="form-control" name="quantity" id="quantity" style="border: 1px solid black">
                </div>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary mt-3">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection