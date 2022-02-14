@extends('layout.app')

@section('content')
    <main>
        @if(Session::has('success'))
            <div class="container-fluid container_max_width pb-5 px-0">

                <div class="alert alert-success">
                    {{ Session::get('success') }}
                    @php
                        Session::forget('success');
                    @endphp
                </div>

            </div>
        @endif
    <!-- Slideshow -->
        <div class="container-fluid container_max_width pb-5 px-0">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="img/homepage/slideshow/slideshow_1.jpg" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="img/homepage/slideshow/slideshow_2.jpg" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="img/homepage/slideshow/slideshow_3.jpg" alt="Third slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="img/homepage/slideshow/slideshow_4.jpg" alt="Fourth slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="img/homepage/slideshow/slideshow_5.jpg" alt="Fifth slide">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <!-- Prevzane z https://getbootstrap.com/docs/4.0/components/carousel/ -->

        <!-- Novinky -->
        <div class="container-fluid container_max_width py-5 p-0">
            <div class="d-flex justify-content-center  mb-2">
                <h2>Novinky</h2>
            </div>

            <div class="row justify-content-center">
                <div class="col-sm-4 col-8 d-flex justify-content-center">
                    <a href="#" class="w-75">
                        <img src="img/homepage/squares/novinka1.jpg" class="rounded w-100 my-2 shadow-sm" alt="Prvá novinka">
                    </a>
                </div>

                <div class="col-sm-4 col-8 d-flex justify-content-center">
                    <a href="#" class="w-75">
                        <img src="img/homepage/squares/novinka2.jpg" class="rounded w-100 my-2 shadow-sm" alt="Druhá novinka">
                    </a>
                </div>

                <div class="col-sm-4 col-8 d-flex justify-content-center">
                    <a href="#" class="w-75">
                        <img src="img/homepage/squares/novinka3.jpg" class="rounded w-100 my-2 shadow-sm" alt="Tretia novinka">
                    </a>
                </div>
            </div>
        </div>

        <!-- Takto to robime my -->
        <div class="container-fluid container_max_width py-5 p-0">
            <div class="row d-flex justify-content-center mb-2">
                <div class="col-12 justify-content-center">
                    <h2 class="text-center">Takto to robíme my</h2>
                </div>
                <div class="col-12 justify-content-center">
                    <h5 class="text-center">Na každom produkte nám záleží</h5>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-3 col-sm-6 col-8 d-flex justify-content-center">
                    <div class="card border-0 shadow bg-siva mt-4">

                            <img src="img/homepage/squares/rucnavyroba_500.jpg" class="rounded w-100 card-img-top" alt="Produkty sú vyrábané ručne">

                        <h5 class="p-2">Ručná výroba</h5>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6 col-8 d-flex justify-content-center">
                    <div class="card border-0 shadow bg-siva mt-4">

                            <img src="img/homepage/squares/mineraly_500.jpg" class="rounded w-100 card-img-top" alt="Produkty sú vyrábané z pravých minerálov">

                        <h5 class="p-2">Pravé minerály</h5>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6 col-8 d-flex justify-content-center">
                    <div class="card border-0 shadow bg-siva mt-4">

                            <img src="img/homepage/squares/jedinecnevyrobky_500.jpg" class="rounded w-100 card-img-top" alt="Každý produkt je jedinčný">

                        <h5 class="p-2">Jedinečné výrobky</h5>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6 col-8 d-flex justify-content-center">
                    <div class="card border-0 shadow bg-siva mt-4">

                            <img src="img/homepage/squares/materialy_500.jpg" class="rounded w-100 card-img-top" alt="Používame aj exotické materiály">

                        <h5 class="p-2">Exotické materiály</h5>
                    </div>
                </div>

            </div>
        </div>

    </main>
@endsection()
