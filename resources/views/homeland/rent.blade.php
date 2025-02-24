@extends('layouts.homeland')

@section('content')

    <div class="site-section site-section-sm pb-0">
        <div class="container">
            <div class="row">
                <form class="form-search col-md-12" style="margin-top: -100px;">
                    <div class="row align-items-end">
                        <div class="col-md-3">
                            <label for="list-types">Listing Types</label>
                            <div class="select-wrap">
                                <span class="icon icon-arrow_drop_down"></span>
                                <select name="list-types" id="list-types" class="form-control d-block rounded-0">
                                    <option value="">Condo</option>
                                    <option value="">Commercial Building</option>
                                    <option value="">Land Property</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="offer-types">Offer Type</label>
                            <div class="select-wrap">
                                <span class="icon icon-arrow_drop_down"></span>
                                <select name="offer-types" id="offer-types" class="form-control d-block rounded-0">
                                    <option value="For Rent" selected>For Rent</option>
                                    <option value="For Sale">For Sale</option>
                                    <option value="For Lease">For Lease</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="select-city">Select City</label>
                            <div class="select-wrap">
                                <span class="icon icon-arrow_drop_down"></span>
                                <select name="select-city" id="select-city" class="form-control d-block rounded-0">
                                    <option value="">New York</option>
                                    <option value="">Brooklyn</option>
                                    <option value="">London</option>
                                    <option value="">Japan</option>
                                    <option value="">Philippines</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <input type="submit" class="btn btn-success text-white btn-block rounded-0" value="Search">
                        </div>
                    </div>
                </form>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="view-options bg-white py-3 px-3 d-md-flex align-items-center">
                        <div class="mr-auto">
                            <a href="#" class="icon-view view-module active"><span
                                    class="icon-view_module"></span></a>
                            <a href="#" class="icon-view view-list"><span class="icon-view_list"></span></a>
                        </div>
                        <div class="ml-auto d-flex align-items-center">
                            <div>
                                <a href="{{ route('rent') }}" class="view-list px-3 border-right active">All</a>
                                <a href="#" class="view-list px-3 border-right">Sale</a>
                            </div>
                            <div class="select-wrap">
                                <span class="icon icon-arrow_drop_down"></span>
                                <select class="form-control form-control-sm d-block rounded-0">
                                    <option value="">Sort by</option>
                                    <option value="price_asc">Price Ascending</option>
                                    <option value="price_desc">Price Descending</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- SECCIÓN DONDE SE MUESTRAN LAS PROPIEDADES EN RENTA -->
    <div class="site-section site-section-sm bg-light">
        <div class="container">
            <div class="row mb-5">
                @if ($properties->count() > 0)
                    @foreach ($properties as $p)
                        <div class="col-md-6 col-lg-4 mb-4">
                            <div class="property-entry h-100">
                                <a href="{{ route('property_details', $p->id) }}" class="property-thumbnail">
                                    <div class="offer-type-wrap">
                                        <span class="offer-type bg-success">{{ $p->offer_type }}</span>
                                    </div>
                                    @php $images = json_decode($p->images); @endphp
                                    @if (!empty($images) && count($images) > 0)
                                        <img src="{{ asset('images/' . $images[0]) }}" alt="Property Image"
                                            class="img-fluid">
                                    @else
                                        <img src="{{ asset('images/default.jpg') }}" alt="Default Image" class="img-fluid">
                                    @endif
                                </a>
                                <div class="p-4 property-body">
                                    <a href="#" class="property-favorite"><span class="icon-heart-o"></span></a>
                                    <h2 class="property-title">
                                        <a href="{{ route('property_details', $p->id) }}">{{ $p->address }}</a>
                                    </h2>
                                    <span class="property-location d-block mb-3">
                                        <span class="property-icon icon-room"></span>
                                        {{ optional($p->city)->name ?? 'Unknown City' }}
                                    </span>
                                    <strong class="property-price text-primary mb-3 d-block text-success">
                                        ${{ number_format($p->price, 2) }}
                                    </strong>
                                    <ul class="property-specs-wrap mb-3 mb-lg-0">
                                        <li>
                                            <span class="property-specs">Beds</span>
                                            <span class="property-specs-number">{{ $p->bedrooms }} <sup>+</sup></span>
                                        </li>
                                        <li>
                                            <span class="property-specs">Baths</span>
                                            <span class="property-specs-number">{{ $p->bathrooms }}</span>
                                        </li>
                                        <li>
                                            <span class="property-specs">SQ FT</span>
                                            <span class="property-specs-number">{{ number_format($p->sq_ft) }}</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p class="text-center w-100">No properties found.</p>
                @endif
            </div>

            <!-- PAGINACIÓN -->
            <div class="row">
                <div class="col-md-12 d-flex justify-content-center">
                    {{ $properties->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
    <div class="site-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-7 text-center">
                    <div class="site-section-title">
                        <h2>Why Choose Us?</h2>
                    </div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis maiores quisquam saepe architecto
                        error corporis aliquam. Cum ipsam a consectetur aut sunt sint animi, pariatur corporis, eaque,
                        deleniti cupiditate officia.</p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 col-lg-4">
                    <a href="#" class="service text-center">
                        <span class="icon flaticon-house"></span>
                        <h2 class="service-heading">Research Subburbs</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt iure qui natus perspiciatis ex
                            odio molestia.</p>
                        <p><span class="read-more">Read More</span></p>
                    </a>
                </div>
                <div class="col-md-6 col-lg-4">
                    <a href="#" class="service text-center">
                        <span class="icon flaticon-sold"></span>
                        <h2 class="service-heading">Sold Houses</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt iure qui natus perspiciatis ex
                            odio molestia.</p>
                        <p><span class="read-more">Read More</span></p>
                    </a>
                </div>
                <div class="col-md-6 col-lg-4">
                    <a href="#" class="service text-center">
                        <span class="icon flaticon-camera"></span>
                        <h2 class="service-heading">Security Priority</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt iure qui natus perspiciatis ex
                            odio molestia.</p>
                        <p><span class="read-more">Read More</span></p>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
