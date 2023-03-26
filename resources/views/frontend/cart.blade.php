@extends('layouts.frontend')

@section('title')
  My Cart
@endsection

@section('content')
<div class="py-3 shadow-sm border-top">
    <div class="container">
        <h6 class="mb-0"><a  style="text-decoration: none ; color:#dbaa09" href="{{ url('/') }}">Home</a> /<a style="text-decoration: none ; color:#dbaa09" href="{{ url('cart') }}">Cart</a>/</h6>
    </div>
</div>


    <div class="container my-5">
        <div class="card-shadow">
            @if($cartitems->count() > 0)
            <div class="card-body">
                @php $total = 0; @endphp
                @foreach($cartitems as $item)
                <div class="row product_data">
                    <div class="col-md-2">
                        <img src="{{asset('assets/uploads/Product/'.$item->products?->image)}}" class="w-50 mb-2" alt="">
                    </div>
                    <div class="col-md-3 auto">
                        <h2>
                           <h6>{{ $item->products?->title }}</h6>
                        </h2>
                    </div>
                    <div class="col-md-3 auto">
                           <h6>{{ $item->products?->price }} EGP</h6>
                    </div>

                        
                            <div class="col-md-2 auto">
                                <input type="hidden" class="prod_id" value="{{ $item->product_id }}">
                                @if( $item->products?->quantity >= $item->quantity)
                                <label for="Quantity" class="mb-2">Quantity</label>
                                <div class="input-group text-center mb-3" style="width: 130px">
                                    <button class="input-group-text changeQuantity decrement-btn">-</button>
                                    <input type="text" name="quantity " value="{{$item->quantity}}" class="form-control text-center qty-input">
                                    <button class="input-group-text changeQuantity increment-btn">+</button>
    
                                </div>
                                @php $total += $item->products->price * $item->quantity; @endphp
                                @else
                                <h6>Out of stock</h6>
                                @endif
                            </div>
                            <div class="col-md-2 auto">
                                <button class="btn btn delete-cart-item mb-2">remove</button>
                            
                    </div>
                </div>
                <hr>

                @endforeach
                
            </div>
            <div class="card-footer">
                <h6>Total Price : {{$total}} EGP</h6>
                <a href="{{url('checkout')}}" class="btn btn-outline-success float-end">Proceed to check out</a>
            </div>
            @else
            <div class="card-body text-center">
                <h2>Your Cart is Empty</h2>
                <a href="{{ url('category') }}" class="btn btn-outline-primary float-end">Continue Shopping</a>
            </div>
            @endif
            
          </div>
        </div>

@endsection