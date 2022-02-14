@extends('layout.app')

@section('content')
    <main>

        <!-- produkt a btn spat -->
        <div class="container-fluid container_max_width">
            <div class="row " >
                <div class="col-8 p-0 text-start">

                    <a href="{{ url()->previous() }}">
                        <button class="btn mb-3 mt-3 ml-2 ml-sm-5" type="button" id="spat" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-long-arrow-alt-left"></i>
                            Späť k produktom
                        </button>
                    </a>
                </div>
                @auth()
                    @if(Auth::user()->hasRole("ADMIN"))
                        <div class="col-2 text-end justify-content-end">
                            <form action="{{url('produkt', [$product->id])}}" method="POST">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="submit" class="btn btn-primary mb-3 mt-3 mx-2 mx-sm-5" value="Zmazať"/>
                           </form>
                        </div>
                        <div class="col-2 text-end justify-content-end">
                            <a href="{{url('/produkt/' . $product->id . '/edit' )}}">
                                <button class="btn btn-primary mb-3 mt-3 mx-2 mx-sm-5">Upraviť</button>
                            </a>
                        </div>


                    @endif
                @endauth()

            </div>

            <!-- produkt info -->

            <div class="card mx-auto mb-3">

                <div class="row m-3 p-0">

                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 p-3">

                        <div id="carouselExampleIndicators" class="carousel slide max-c-width" data-ride="carousel">
                            @if(sizeof($photos)>1)
                            <ol class="carousel-indicators">
                                @foreach( $photos as $photo )
                                    <li data-target="#carouselExampleIndicators" data-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}"></li>
                                @endforeach

                            </ol>
                            @endif
                            <div class="carousel-inner">
                                @foreach( $photos as $photo )
                                    <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                        <img class="d-block img-fluid " src={{asset('img/Sperky/'.$photo->file)}} alt="">
                                    </div>
                                @endforeach
                            </div>
                            @if(sizeof($photos)>1)
                            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                            @endif
                        </div>
                    </div>


                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 p-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h2>{{ $product->name }}</h2>
                                    <h3 class="pb-4">{{ $product->price }}€</h3>
                                    <div class="card-text mb-3">{{ $product->description }}</div>
                                    <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf

                                        <div class="row g-3 align-items-center">
                                            <div class="col-auto">
                                                <label for="count" class="col-form-label"><h4>Počet</h4></label>
                                            </div>
                                            <div class="col-auto">
                                                <input class="form-control" placeholder="1" name="quantity" id="count" min="1" value="1">
                                            </div>

                                            <div class="col-auto">

                                            </div>

<!--
                                        </div>
                                        <div class="row g-3 align-items-center">
                                            <div class="col-auto">
                                                <label for="count" class="col-form-label"><h4>Veľkosť</h4></label>

                                            </div>
                                            <div class="col-auto">
                                                <select class="form-select w-100" aria-label="Default select example" name="size">
                                                    <option value="8" selected >8mm</option>
                                                    <option value="10">10mm</option>
                                                    <option value="16">16mm</option>
                                                </select>
                                            </div>
                                        </div>
                                        -->


                                        <input type="hidden" value="{{ $product->id }}" name="id">
                                        <input type="hidden" value="{{ $product->name }}" name="name">
                                        <input type="hidden" value="{{ $product->price }}" name="price">

                                        <div class="row mt-3 d-flex justify-content-center">
                                            <button class="btn btn-primary">Pridať do košíka</button>
                                        </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>

        <!-- Velkost, Zaruka, Dorucenie -->
        <div class="container-fluid container_max_width">
            <div class="row">
                <div class="row bg-light text-black d-flex justify-content-center">
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 p-2 px-3 text-center">
                        <h3>Veľkosť</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Bquaerat quidem quisquam repudiandae rerum
                            sapiente! A cum eius excepturi sapiente temporibus! Provident!</p>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 p-2 px-3 text-center">
                        <h3>Záruka</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis deleniti dolorem explicabo ipsam
                            itaque, laudantium molestias numquam quaerat quidem quisquam repudiandae rerum sapiente! A cum eius
                            excepturi sapiente temporibus! Provident!</p>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 p-2 px-3 text-center">
                        <h3>Doručenie</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis deleniti dolorem explicabo ipsam
                            itaque, laudantium molestias numquam quaerat</p>

                    </div>
                </div>
            </div>
        </div>

    </main>
@endsection('content')
