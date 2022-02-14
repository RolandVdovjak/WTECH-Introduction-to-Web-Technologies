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
        <!-- kategoria a dropdown -->
        <div class="container">
            <div class="row col-12">

                <div class="col-xl-9 offset-xl-3 col-lg-9 offset-lg-3 col-md-9 offset-md-3 col-sm-5 offset-sm-4 mb-3">
                    <div class="row mt-5">
                        <div class="col-2 text-start ps-4">
                            <h3>{{ $nazov_kategorie}}</h3>
                        </div>
                        <div class="col-3 offset-6 text-end">
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                    Zoradenie
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li><a class="dropdown-item" href="{{ url()->current().'?'.http_build_query(array_merge(request()->all(),['order' => 'ASC'])) }}">Od najlacnejších</a></li>
                                    <li><a class="dropdown-item" href="{{ url()->current().'?'.http_build_query(array_merge(request()->all(),['order' => 'DESC'])) }}">Od najdrachších</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>


            </div>
        </div>
        <!-- SIDEfiltre a produkty -->
        <div class="container-fluid container_max_width p-sm-0">
            <div class="row col-12 m-0 p-0">
                <!--SIDE filtre -->
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-5 mb-3">
                    <div class="card">
                        <?php

                        // both start checked
                        $c = ['1', '2', '3'];

                        // form is submitted
                        if (isset($_GET['c']))
                        {
                            $c = $_GET['c'];
                        }

                        ?>

                        <form method="GET">

                        <!-- Farba -->
                        <div class="filter-group">
                            <header class="card-header">
                                <a href="#" data-toggle="collapse" data-target="#collapse_2" aria-expanded="false"
                                   class="collapsed text-decoration-none">
                                    <div class="row">
                                        <div class="col-9">
                                            <h6 class="title">Farba </h6>
                                        </div>
                                        <div class="col-3">
                                            <i class="icon-control fa fa-plus"></i>
                                        </div>

                                    </div>
                                </a>
                            </header>
                            <div class="filter-content collapse" id="collapse_2" style="">
                                <div class="card-body">
                                    <div class="form-check">
                                        <label>
                                            <input type="hidden"  name="c[0]" value="0">
                                            <input type="checkbox"  name="c[0]" value="1" <?=$c[0] == '1' ?'checked':''?>>
                                        </label>
                                        <label class="custom-checkbox">
                                            Červená
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label>
                                            <input type="hidden"  name="c[1]" value="0">
                                            <input type="checkbox"  name="c[1]" value="2"<?=$c[1] == '2' ?'checked':''?>>
                                        </label>
                                        <label class="custom-checkbox">
                                            Modrá
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <label>
                                            <input type="hidden"  name="c[2]" value="0">
                                            <input type="checkbox"  name="c[2]" value="3"<?=$c[2] == '3' ?'checked':''?>>
                                        </label>
                                        <label class="custom-checkbox">
                                            Zelená
                                        </label>
                                    </div>

                                </div> <!-- card-body.// -->
                            </div>
                        </div>



                        <!-- Cena -->
                        <div class="filter-group">
                            <header class="card-header">
                                <a href="#" data-toggle="collapse" data-target="#collapse_4" aria-expanded="false"
                                   class="collapsed text-decoration-none">
                                    <div class="row">
                                        <div class="col-9">
                                            <h6 class="title">Cena </h6>
                                        </div>
                                        <div class="col-3">
                                            <i class="icon-control fa fa-plus"></i>
                                        </div>

                                    </div>
                                </a>
                            </header>
                            <div class="filter-content collapse" id="collapse_4" style="">
                                <div class="card-body">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label>Min</label>
                                            <input class="form-control" name="mincena" placeholder="10" type="number" min="10" max="1000">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Max</label>
                                            <input class="form-control" name="maxcena" placeholder="100" type="number" min="10" max="1000">
                                        </div>
                                    </div> <!-- form-row.// -->
                                </div><!-- card-body.// -->
                            </div>
                        </div> <!-- filter-group .// -->

                        <button class="btn btn-block btn-primary justify-content-center mt-3">Aplikovať filtrovanie</button>
                        </form>
                    </div> <!-- card.// -->
                </div>

                <!--Produkty -->
                <div class="col-xl-9 col-lg-9 col-md-8 col-sm-7 mb-3 ">
                    <div class="row">
                    @foreach($products as $product)
                        @foreach($photos as $photo)
                            @if($photo->product_id == $product->id)
                                @include('layout.partials.products_item', ['product' => $product, 'photo' => $photo])
                            @endif
                        @endforeach
                    @endforeach
                    </div>
                </div>

            </div>
        </div>



        <!-- paging -->

        <div class="row m-0 p-0">
            <div class="d-flex justify-content-center align-items-center">
                <nav aria-label="...">
                    <div class="d-flex justify-content-center">
                        {!! $products->appends(request()->input())->links("pagination::bootstrap-4") !!}
                    </div>



                </nav>
            </div>
        </div>


    </main>
@endsection('content')
