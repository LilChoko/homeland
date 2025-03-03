@extends('layouts.homeland')

@section('content')
    <div class="site-blocks-cover inner-page-cover overlay"
        style="background-image: url({{ asset('images/hero_bg_2.jpg') }});" data-aos="fade"
        data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row align-items-center justify-content-center text-center">
                <div class="col-md-10">
                    <span class="d-inline-block text-white px-3 mb-3 property-offer-type rounded">Property Details of</span>
                    <h1 class="mb-2">{{ $property->address }}</h1>
                    <p class="mb-5"><strong
                            class="h2 text-success font-weight-bold">{{ $property->getPriceAsCurrency() }}</strong></p>
                </div>
            </div>
        </div>
    </div>

    <div class="site-section site-section-sm">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div>
                        <div class="slide-one-item home-slider owl-carousel">
                            @if (!empty($property->images) && is_array(json_decode($property->images, true)))
                                @foreach (json_decode($property->images) as $img)
                                    <div class="item">
                                        <img src="{{ asset('images/' . $img) }}" alt="Property Image" class="img-fluid">
                                    </div>
                                @endforeach
                            @else
                                <p class="text-center">No images available</p>
                            @endif
                        </div>
                    </div>

                    <div class="bg-white property-body border-bottom border-left border-right">
                        <div class="row mb-5">
                            <div class="col-md-6">
                                <strong class="text-success h1 mb-3">{{ $property->getPriceAsCurrency() }}</strong>
                            </div>
                            <div class="col-md-6">
                                <ul class="property-specs-wrap mb-3 mb-lg-0 float-lg-right">
                                    <li>
                                        <span class="property-specs">Beds</span>
                                        <span class="property-specs-number">{{ $property->bedrooms }} <sup>+</sup></span>
                                    </li>
                                    <li>
                                        <span class="property-specs">Baths</span>
                                        <span class="property-specs-number">{{ $property->bathrooms }}</span>
                                    </li>
                                    <li>
                                        <span class="property-specs">SQ FT</span>
                                        <span class="property-specs-number">{{ $property->sq_ft }}</span>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="row mb-5">
                            <div class="col-md-6 col-lg-3 text-center border-bottom border-top py-3">
                                <span class="d-inline-block text-black mb-0 caption-text">Home Type</span>
                                <strong class="d-block">{{ $property->list_type->name }}</strong>
                            </div>
                            <div class="col-md-6 col-lg-3 text-center border-bottom border-top py-3">
                                <span class="d-inline-block text-black mb-0 caption-text">Year Built</span>
                                <strong class="d-block">{{ $property->year_built }}</strong>
                            </div>
                            <div class="col-md-6 col-lg-3 text-center border-bottom border-top py-3">
                                <span class="d-inline-block text-black mb-0 caption-text">Price/Sqft</span>
                                <strong class="d-block">{{ $property->getPriceBySquareFeet() }}</strong>
                            </div>
                            <div class="col-md-6 col-lg-3 text-center border-bottom border-top py-3">
                                <span class="d-inline-block text-black mb-0 caption-text">City</span>
                                <strong class="d-block">{{ $property->city->name }}</strong>
                            </div>
                        </div>

                        <h2 class="h4 text-black">More Info</h2>
                        <p>{{ $property->description }}</p>

                        <div class="row no-gutters mt-5">
                            <div class="col-12">
                                <h2 class="h4 text-black mb-3">Gallery</h2>
                            </div>

                            @if (!empty($property->images) && is_array(json_decode($property->images, true)))
                                @foreach (json_decode($property->images) as $img)
                                    <div class="col-sm-6 col-md-4 col-lg-3">
                                        <a href="{{ asset('images/' . $img) }}" class="image-popup gal-item">
                                            <img src="{{ asset('images/' . $img) }}" alt="Gallery Image" class="img-fluid">
                                        </a>
                                    </div>
                                @endforeach
                            @else
                                <p class="text-center">No images available</p>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="bg-white widget border rounded">
                        <h3 class="h4 text-black widget-title mb-3">Contact Agent</h3>
                        @if (session()->has('message'))
                            <div class="alert alert-success">
                                {{ session()->get('message') }}
                            </div>
                        @endif
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div id="successAlert" class="alert alert-success d-none">
                            <strong>Success!</strong> Your message has been sent successfully.
                        </div>
                        <form id="formContactAgent" action="" class="form-contact-agent" method="POST">
                            <input type="hidden" id="property_id" name="property_id" value="{{ $property->id }}">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" id="name" name="name" class="form-control"
                                    value="{{ old('name') }}">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" id="email" name="email" class="form-control"
                                    value="{{ old('email') }}">
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="text" id="phone" name="phone" class="form-control"
                                    value="{{ old('phone') }}">
                            </div>
                            <div class="form-group">
                                <label for="messsage">Message</label>
                                <textarea id="message" name="message" class="form-control"> {{ old('message') }}</textarea>
                            </div>
                            <div class="form-group">
                                <input type="submit" id="btnSendContactAgentMessage" class="btn btn-primary" value="Send Message">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- Sección de Reviews -->
<div class="bg-white p-4 mt-5 border rounded shadow">
    <h3 class="h4 text-black widget-title mb-4 text-center">Reviews</h3>

    @if(session()->has('message'))
        <div class="alert alert-success text-center">{{ session()->get('message') }}</div>
    @endif

    <!-- Mostrar las reseñas -->
    <div class="reviews-list mb-4">
        @foreach ($reviews as $review)
            <div class="p-3 border-bottom">
                <h5 class="mb-1">{{ $review->name }}
                    <small class="text-muted">({{ $review->created_at->format('F j, Y') }})</small>
                </h5>
                <p class="mb-1">{{ $review->description }}</p>
                <p class="text-warning">
                    <!-- Mostrar estrellas según la calificación -->
                    @for ($i = 1; $i <= 5; $i++)
                        <i class="fa fa-star{{ $i <= $review->rating ? '' : '-o' }}"></i>
                    @endfor
                </p>
            </div>
        @endforeach
    </div>

    <!-- Formulario para nueva reseña -->
    <div class="p-4 bg-light border rounded">
        <h4 class="text-black mb-3 text-center">Leave a Review</h4>
        <form action="{{ route('property_details', $property->id) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Your Name</label>
                <input type="text" id="name" name="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="email">Your Email</label>
                <input type="email" id="email" name="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="description">Review</label>
                <textarea id="description" name="description" class="form-control" rows="3" required></textarea>
            </div>

            <!-- Selector de Estrellas -->
            <div class="form-group">
                <label class="d-block">Rating</label>
                <div class="rating">
                    <input type="radio" id="star5" name="rating" value="5">
                    <label for="star5" title="5 stars">★</label>

                    <input type="radio" id="star4" name="rating" value="4">
                    <label for="star4" title="4 stars">★</label>

                    <input type="radio" id="star3" name="rating" value="3">
                    <label for="star3" title="3 stars">★</label>

                    <input type="radio" id="star2" name="rating" value="2">
                    <label for="star2" title="2 stars">★</label>

                    <input type="radio" id="star1" name="rating" value="1">
                    <label for="star1" title="1 star">★</label>
                </div>
            </div>

            <div class="form-group text-center">
                <button type="submit" class="btn btn-primary">Submit Review</button>
            </div>
        </form>
    </div>
</div>

<!-- Estilos para la sección de estrellas -->
<style>
    .rating {
        display: flex;
        justify-content: center;
        direction: rtl;
    }

    .rating input {
        display: none;
    }

    .rating label {
        font-size: 24px;
        color: #ddd;
        cursor: pointer;
    }

    .rating input:checked ~ label {
        color: gold;
    }

    .rating label:hover,
    .rating label:hover ~ label {
        color: gold;
    }
</style>



    <div class="site-section site-section-sm bg-light">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    {{-- <div class="site-section-title mb-5">
                        <h2>Related Properties</h2>
                    </div> --}}
                </div>
            </div>

            {{-- <div class="row mb-5">
                @foreach ($relatedProperties as $related)
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="property-entry h-100">
                            <a href="{{ route('property_details', $related->id) }}" class="property-thumbnail">
                                <div class="offer-type-wrap">
                                    <span class="offer-type bg-danger">Sale</span>
                                    <span class="offer-type bg-success">Rent</span>
                                </div>
                                @if (!empty($related->images) && is_array(json_decode($related->images, true)))
                                    <img src="{{ asset('images/' . json_decode($related->images)[0]) }}" alt="Image" class="img-fluid">
                                @else
                                    <img src="{{ asset('images/default.jpg') }}" alt="Image" class="img-fluid">
                                @endif
                            </a>
                            <div class="p-4 property-body">
                                <h2 class="property-title"><a href="{{ route('property_details', $related->id) }}">{{ $related->address }}</a></h2>
                                <span class="property-location d-block mb-3"><span class="property-icon icon-room"></span> {{ $related->address }}</span>
                                <strong class="property-price text-primary mb-3 d-block text-success">{{ $related->getPriceAsCurrency() }}</strong>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div> --}}
        </div>
    </div>
@endsection
