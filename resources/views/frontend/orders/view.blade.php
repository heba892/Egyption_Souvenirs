@extends('layouts.frontend')

@section('title')
  My Orders
@endsection

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Order Veiw
                        <a href="{{ url('my-orders') }}" class="btn btn-danger float-end">Back</a>
                    </h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h4>Shipping Details</h4>
                            <label for="">First Name</label>
                            <div class="border p-2">{{ $orders->fname }}</div>
                            <label for="">Last Name</label>
                            <div class="border p-2">{{ $orders->lname }}</div>
                            <label for="">Email</label>
                            <div class="border p-2">{{ $orders->email }}</div>
                            <label for="">Contact No.</label>
                            <div class="border p-2">{{ $orders->phone }}</div>
                            <label for="">Shipping Address</label>
                            <div class="border p-2">
                                {{ $orders->address }},
                                {{ $orders->city }},
                                {{ $orders->state }},
                            </div>
                            <label for="">Zip Code</label>
                            <div class="border p-2">{{ $orders->pincode }}</div>

                        </div>
                        <div class="col-md-6">
                            <h4>Order Details</h4>

                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                       <th>Quantity</th> 
                                        <th>Price</th>
                                        <th>Image</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($orders->orderitems as $item)
                                    <tr>
                                         <td>{{ $item->products->title}}</td>
                                         <td>{{ $item->quantity }}</td>
                                         <td>{{ $item->price }}</td>
                                         <td>
                                            <img src="{{ asset('assets/uploads/Product/'.$item->products->image)}}" width="60px" alt="Product Image">
                                         </td>
                                    </tr>
                                    @endforeach
                
                                </tbody>
                            </table>
                            <h4>Total Price : {{$orders->total_price}}</h4>
                        </div>

                    </div>
                   
                </div>
            </div>
            
        </div>
    </div>
</div>
@endsection