@extends('layouts.frontend')

@section('title' , $product->title)

@section('content')
<div class="py-3 shadow-sm border-top">
    <div class="container">
        <h6 class="mb-0">Collection / {{$product->category->title}} / {{$product->title}}</h6>
    </div>
</div>

<div class="py-3">
    <div class="container">
        <div class="card-shadow product_data">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <img src="{{asset('assets/uploads/Product/'.$product->image)}}" class="w-100" alt="">
                    </div>
                    <div class="col-md-8">
                        <h2>
                            {{$product->title}}
                        </h2>
                        <hr>
                        <label>Price :{{ $product->price }} EGP</label>
                        <p class="mt-3">
                            {{ $product->description }}
                        </p>
                        <hr>
                        @if($product->quantity > 0)
                        <label style="color: green">in stock</label>
                        @else
                        <label style="color: red">out of stock</label>
                        @endif
                        <div class="row mt-2">
                            <div class="col-md-2">
                                <input type="hidden" value="{{ $product->id }}" class="prod_id">
                                <label for="Quantity"></label>
                                <div class="input-group text-center mb-3">
                                    <button class="input-group-text decrement-btn">-</button>
                                    <input type="text" name="quantity " value="1" class="form-control text-center qty-input">
                                    <button class="input-group-text increment-btn">+</button>
    
                                </div>
                            </div>
                            <div class="col-md-9">
                                <br/>
                                @if($product->quantity > 0)
                                <button type="button" style="background-color: #dbaa09 ; color:white" class="addToCartBtn btn me-3 float-start">Add To Cart <i class="fa fa-shopping-cart"></i></button>

                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
          </div>
        </div>
    </div>
</div>

@endsection

