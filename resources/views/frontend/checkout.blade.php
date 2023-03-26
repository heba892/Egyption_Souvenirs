@extends('layouts.frontend')

@section('title')
Checkout 
@endsection

@section('content')
<div class="container mt-5">
    <form action="{{url('place-order')}}" method="POST">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-md-7">
                <div class="card">
                    <div class="card-body">
                        <h6>basic details</h6>
                        <hr>
                        <div class="row checkout-form">
                            <div class="col-md-6">
                                <label for="firstname">First Name</label>
                                <input type="text" class="form-control mb-3" placeholder="Enter First Name" name="fname" value="{{ Auth::user()->name }}">
                            </div>
                            <div class="col-md-6">
                                <label for="lastname">Last Name</label>
                                <input type="text" class="form-control mb-3" placeholder="Enter Last Name" name="lname" value="{{ Auth::user()->name }}">
                            </div>
                            <div class="col-md-6">
                                <label for="firstname">Email</label>
                                <input type="email" class="form-control mb-3" placeholder="Enter Your Email" name="email" value="{{ Auth::user()->email }}">
                            </div>
                            <div class="col-md-6">
                                <label for="firstname">Phone Number</label>
                                <input type="text" class="form-control mb-3" placeholder="Enter phone number" name="phone" value="{{ Auth::user()->phone }}">
                            </div>
                            <div class="col-md-6">
                                <label for="firstname">Address</label>
                                <input type="text" class="form-control mb-3" placeholder="Enter Address" name="address" value="{{ Auth::user()->address }}">
                            </div>
                            <div class="col-md-6">
                                <label for="firstname">City</label>
                                <input type="text" class="form-control mb-3" placeholder="Enter City" name="city" value="{{ Auth::user()->city }}">
                            </div>
                            <div class="col-md-6">
                                <label for="firstname">State</label>
                                <input type="text" class="form-control mb-3" placeholder="Enter state" name="state" value="{{ Auth::user()->state }}">
                            </div>
                            <div class="col-md-6">
                                <label for="firstname">Pin Code</label>
                                <input type="text" class="form-control mb-3" placeholder="Enter City" name="pincode" value="{{ Auth::user()->pincode }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="card">
                    <div class="card-body">
                        <h6>Order details</h6>
                        <hr>
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($cartitems as $item)
                                <tr>
                                    <td>{{ $item->products->title}}</td>
                                    <td>{{ $item->products->quantity}}</td>
                                    <td>{{ $item->products->price}} EGP</td>
                                   
    
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <hr>
                        <button type="submit" class="btn btn-primary float-end">Place Order</button>
                        
                    </div>
                </div>
            </div>
    
        </div>
    
    </form>
    
</div>
@endsection