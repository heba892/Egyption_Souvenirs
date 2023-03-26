@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Ediy/Update Product</h4>
    </div>
    <div class="card-body">
        <form action="{{url('update-product/'.$product->id)}}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            @method('POST')


            <div class="row">
                <div class="col-md-12 mb-3">
                    <select class="form-select" name="" id="">
                        <option value="" style="color: black">{{ $product->category->title}}</option>
                       
                    </select>
                    <label for="">title</label>
                    <input type="text" class="form-control" value="{{$product->title}}" name="title" id="title" style="border: 1px solid black">
                </div>

                <div class="col-md-6">
                    <label for="">description</label>
                    <input type="text" class="form-control" value="{{$product->description}}" name="description" id="description" style="border: 1px solid black">
                </div>
                @if($product->image)
                    <img src="{{ asset('assets/uploads/products/'.$product->image) }}" alt="Product image">
                @endif
                
                <div class="col-md-6">
                    <label for="">image</label>
                    <input type="file" class="form-control" name="ProductImg" id="image" style="border: 1px solid black">
                </div>
                <div class="col-md-6">
                    <label for="">Price</label>
                    <input type="number" class="form-control" value="{{$product->price}}" name="price" id="price" style="border: 1px solid black">
                </div>
                <div class="col-md-6">
                    <label for="">Quantity</label>
                    <input type="number" class="form-control" value="{{$product->quantity}}" name="quantity" id="quantity" style="border: 1px solid black">
                </div>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary mt-3">Update</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection