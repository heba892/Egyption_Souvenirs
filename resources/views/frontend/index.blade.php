@extends('layouts.frontend')

@section('title')
  Egypt Souvineers
@endsection

@section('content')
@include('layouts.inc.slider')

<div class="py-5">
    <div class="container">
        <div class="row">
            <h2 class="text-center pb-3">Recent Profucts</h2>
            @foreach ($recent_products as $recentProd)
                
            <div class="col-md-4 mb-5 text-center">
                <div class="card text-truncate text-center" style="border:none">
                    <img class="product-img" src="{{ asset('assets/uploads/Product/'.$recentProd->image) }}" alt="product image">
                    <div class="card-body text-center">
                        <h6 class="text-center">{{ $recentProd->title }}</h6>
                        <p class="text-center">{{ $recentProd ->price }} EGP</p>
                        <button class="btn text-center" style="color: white">Select Options</button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>



<div class="py-5">
    <div class="container">
        <div class="row">
            <h2 class="text-center pb-3">Featured Profucts</h2>
            @foreach ($featured_products as $prod)
                
            <div class="col-md-4 mb-5 text-center">
               
                    <div class="card text-truncate text-center" style="border: none">
                        <img class="product-img" src="{{ asset('assets/uploads/Product/'.$prod->image) }}" alt="product image">
                        <div class="card-body">
                            <h5>{{ $prod->title }}</h5>
                            <p>{{ $prod ->price}} EGP</p>
                            <button class="btn  text-center">Select Option</button>
    
                        </div>
                    </div>
                

            </div>
            @endforeach
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

@section('scripts')

<script>
    $('.featured-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:5
        }
    }
})
</script>
@endsection