@extends('layouts.frontend')

@section('title')
Categories
@endsection

@section('content')

<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="text-center pb-3">All Categories</h2>
                <div class="row">
                    @foreach ($category as $categ)
                    <div class="col-md-4 mb-5">
                        <a href="{{ url('view-category/'.$categ->id) }}" style="text-decoration: none; color:black">
                            <div class="card" style="border: none">
                                <img class="product-img" src="{{ asset('assets/uploads/Category/'.$categ->image) }}" alt="category image" style="width: 100% ; hight:100%">
                                <div class="card-body">
                                    <h5 class="text-center">{{ $categ->title }}</h5>
                                </div>
                            </div>
                        </a>

                        

                    </div>
                    
                @endforeach
                </div>
            </div>
        </div>
    </div>
</div>


<div class="footer">
    <div class="container">
          
        <div class="content">
            <div class="who-are-we">
                <h2>Who are we</h2>
                <p> Souviners is an online portal</p>
                <p> with a variety of souvenirs</p>
                <p> gifts and souvenirs from Egypt.</p>
                
            </div>
            <div class="contact-us">
                <h2>Contact us</h2>
                <a href=""><i class="fa-brands fa-facebook"></i></a>
                <a href=""><i class="fa-brands fa-whatsapp"></i></a>
                <a href=""><i class="fa-solid fa-envelope"></i></a>
                <a href=""><i class="fa-brands fa-twitter"></i></a>

            </div>
        </div>
    </div>
</div>
@endsection