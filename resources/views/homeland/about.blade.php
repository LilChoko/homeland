@extends('layouts.homeland')

@section('content')

<div class="site-navbar mt-4">
    <div class="container py-1">
        <div class="row align-items-center">
            <div class="col-8 col-md-8 col-lg-4">
                <h1 class="mb-0">
                    <a href="{{ route('home') }}" class="text-white h2 mb-0">
                        <strong>Homeland<span class="text-danger">.</span></strong>
                    </a>
                </h1>
            </div>
            <div class="col-4 col-md-4 col-lg-8">
                <nav class="site-navigation text-right text-md-right" role="navigation">
                    <div class="d-inline-block d-lg-none ml-md-0 mr-auto py-3">
                        <a href="#" class="site-menu-toggle js-menu-toggle text-white">
                            <span class="icon-menu h3"></span>
                        </a>
                    </div>
                    <ul class="site-menu js-clone-nav d-none d-lg-block">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li><a href="{{ route('buy') }}">Buy</a></li>
                        <li><a href="{{ route('rent') }}">Rent</a></li>
                        <li class="has-children">
                            <a href="#">Properties</a>
                            <ul class="dropdown arrow-top">
                                <li><a href="{{ route('property_listing_type', 1) }}">Condo</a></li>
                                <li><a href="{{ route('property_listing_type', 2) }}">Commercial Building</a></li>
                                <li><a href="{{ route('property_listing_type', 3) }}">Land Property</a></li>
                            </ul>
                        </li>
                        <li class="active"><a href="{{ route('about') }}">About</a></li>
                        <li><a href="{{ route('contact') }}">Contact</a></li>
                        <li><a href="{{ route('login') }}">Login</a></li>
                        <li><a href="{{ route('register') }}">Register</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="site-blocks-cover inner-page-cover overlay" style="background-image: url({{ asset('images/hero_bg_2.jpg') }});" data-aos="fade" data-stellar-background-ratio="0.5">
    <div class="container">
        <div class="row align-items-center justify-content-center text-center">
            <div class="col-md-10">
                <h1 class="mb-2">About Homeland</h1>
            </div>
        </div>
    </div>
</div>

<div class="site-section">
    <div class="container">
        <div class="row">
            <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
                <img src="{{ asset('images/about.jpg') }}" alt="Image" class="img-fluid">
            </div>
            <div class="col-md-5 ml-auto" data-aos="fade-up" data-aos-delay="200">
                <div class="site-section-title">
                    <h2>Our Company</h2>
                </div>
                <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus in cum odio.</p>
                <p>Illum repudiandae ratione facere explicabo. Consequatur dolor optio iusto, quos autem voluptate ea? Sunt laudantium fugiat, mollitia voluptate?</p>
                <p><a href="#" class="btn btn-outline-primary rounded-0 py-2 px-5">Read More</a></p>
            </div>
        </div>
    </div>
</div>

<!-- Sección de Leadership -->
<div class="site-section bg-light">
    <div class="container">
        <div class="row mb-5 justify-content-center" data-aos="fade-up">
            <div class="col-md-7">
                <div class="site-section-title text-center">
                    <h2>Leadership</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach([1, 2, 3] as $id)
            <div class="col-md-6 col-lg-4 mb-5 mb-lg-5" data-aos="fade-up" data-aos-delay="200">
                <div class="team-member">
                    <img src="{{ asset("images/person_$id.jpg") }}" alt="Image" class="img-fluid rounded mb-4">
                    <div class="text">
                        <h2 class="mb-2 font-weight-light text-black h4">Leader {{ $id }}</h2>
                        <span class="d-block mb-3 text-white-opacity-05">Real Estate Agent</span>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                        <p>
                            <a href="#" class="text-black p-2"><span class="icon-facebook"></span></a>
                            <a href="#" class="text-black p-2"><span class="icon-twitter"></span></a>
                            <a href="#" class="text-black p-2"><span class="icon-linkedin"></span></a>
                        </p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<!-- Sección de Preguntas Frecuentes -->
<div class="row justify-content-center mb-5">
    <div class="col-md-7 text-center">
      <div class="site-section-title">
        <h2>Frequently Ask Questions</h2>
      </div>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis maiores quisquam saepe architecto error corporis aliquam. Cum ipsam a consectetur aut sunt sint animi, pariatur corporis, eaque, deleniti cupiditate officia.</p>
    </div>
  </div>

  <div class="row justify-content-center" data-aos="fade" data-aos-delay="100">
    <div class="col-md-8">
      <div class="accordion unit-8" id="accordion">
      <div class="accordion-item">
        <h3 class="mb-0 heading">
          <a class="btn-block" data-toggle="collapse" href="#collapseOne" role="button" aria-expanded="true" aria-controls="collapseOne">What is the name of your company<span class="icon"></span></a>
        </h3>
        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
          <div class="body-text">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur quae cumque perspiciatis aperiam accusantium facilis provident aspernatur nisi optio debitis dolorum, est eum eligendi vero aut ad necessitatibus nulla sit labore doloremque magnam! Ex molestiae, dolor tempora, ad fuga minima enim mollitia consequuntur, necessitatibus praesentium eligendi officia recusandae culpa tempore eaque quasi ullam magnam modi quidem in amet. Quod debitis error placeat, tempore quasi aliquid eaque vel facilis culpa voluptate.</p>
          </div>
        </div>
      </div> <!-- .accordion-item -->

      <div class="accordion-item">
        <h3 class="mb-0 heading">
          <a class="btn-block" data-toggle="collapse" href="#collapseTwo" role="button" aria-expanded="false" aria-controls="collapseTwo">How much pay for 3  months?<span class="icon"></span></a>
        </h3>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
          <div class="body-text">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vel ad laborum expedita. Nostrum iure atque enim quisquam minima distinctio omnis, consequatur aliquam suscipit, quidem, esse aspernatur! Libero, excepturi animi repellendus porro impedit nihil in doloremque a quaerat enim voluptatum, perspiciatis, quas dignissimos maxime ut cum reiciendis eius dolorum voluptatem aliquam!</p>
          </div>
        </div>
      </div> <!-- .accordion-item -->

      <div class="accordion-item">
        <h3 class="mb-0 heading">
          <a class="btn-block" data-toggle="collapse" href="#collapseThree" role="button" aria-expanded="false" aria-controls="collapseThree">Do I need to register?  <span class="icon"></span></a>
        </h3>
        <div id="collapseThree" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
          <div class="body-text">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vel ad laborum expedita. Nostrum iure atque enim quisquam minima distinctio omnis, consequatur aliquam suscipit, quidem, esse aspernatur! Libero, excepturi animi repellendus porro impedit nihil in doloremque a quaerat enim voluptatum, perspiciatis, quas dignissimos maxime ut cum reiciendis eius dolorum voluptatem aliquam!</p>
          </div>
        </div>
      </div> <!-- .accordion-item -->

      <div class="accordion-item">
        <h3 class="mb-0 heading">
          <a class="btn-block" data-toggle="collapse" href="#collapseFour" role="button" aria-expanded="false" aria-controls="collapseFour">Who should I contact in case of support.<span class="icon"></span></a>
        </h3>
        <div id="collapseFour" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
          <div class="body-text">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vel ad laborum expedita. Nostrum iure atque enim quisquam minima distinctio omnis, consequatur aliquam suscipit, quidem, esse aspernatur! Libero, excepturi animi repellendus porro impedit nihil in doloremque a quaerat enim voluptatum, perspiciatis, quas dignissimos maxime ut cum reiciendis eius dolorum voluptatem aliquam!</p>
          </div>
        </div>
      </div> <!-- .accordion-item -->

    </div>
    </div>
  </div>

@endsection
