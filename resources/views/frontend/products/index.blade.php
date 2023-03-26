@extends('layouts.frontend')

@section('title')
{{$category->title}}
@endsection

@section('content')
<div class="py-3 shadow-sm border-top">
    <div class="container">
        <h6 class="mb-0">Collection / {{$category->title}}</h6>
    </div>
</div>
<div class="py-5">
    <div class="container p-5"  style="background-color: #fff">
        <div class="row">
            <h2 class="text-center pb-3" style="color:#dbaa09">{{$category->title}}</h2>
            @foreach ($product as $prod)
                
            <div class="col-md-3 mb-4">
             <a href="{{url('category/'.$category->title.'/'.$prod->title)}}" style="text-decoration: none; color:black" >
                <div class="card text-center" style="border:none">
                    <img class="product-img" src="{{ asset('assets/uploads/Product/'.$prod->image) }}" alt="product image">
                    <div class="card-body text-center">
                        <h6>{{ $prod->title }}</h6>
                        <p class="text-center">{{ $prod ->price}} EGP</p>
                        <button class="btn text-center"><a style="color: white" href="{{url('category/'.$category->title.'/'.$prod->title)}}">Select Option</a></button>

                    </div>
                </div>
             </a>
                

            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection