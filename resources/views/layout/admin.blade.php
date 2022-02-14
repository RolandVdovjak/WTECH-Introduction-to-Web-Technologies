@extends('layout.app')

@section('content')
    <main class="container-fluid container_max_width">

        <div class="card mx-auto my-3">

            <form action="/produkt" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row p-0 justify-content-center">

                    <!-- Polia na informacie -->
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-8">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div class="custom-file p-0 col-md-auto mb-3">
                                        <input type="file" class="form-control" name="image1">
                                    </div>
                                    <div class="custom-file p-0 col-md-auto mb-3">
                                        <input type="file" class="form-control" name="image2">
                                    </div>
                                    <div class="custom-file p-0 col-md-auto mb-3">
                                        <input type="file" class="form-control" name="image3">
                                    </div>

                                    <input type="text" class="form-control" placeholder="Názov produktu" name="name">

                                    <div class="card-text my-3">
                                        <textarea class="form-control" placeholder="Popis produktu" aria-label="With textarea" name="description"></textarea>
                                    </div>

                                    <!--
                                                                    <div class ="text-center">
                                                                        <label class="mx-1"><input type="radio" name="colorRadio" value="one_size"> Jedna veľkosť</label>
                                                                        <label class="mx-1"><input type="radio" name="colorRadio" value="many_s"> Viac veľkostí</label>
                                                                    </div>

                                                                    <div class="many_sizes info_box m-0 p-1">

                                                                        <div class="card-text my-3">
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault1">
                                                                                <input type="text" placeholder="Veľkosť" value="" id="size1">
                                                                                <input type="text" placeholder="Cena" value="" id="price1">
                                                                            </div>
                                                                        </div>

                                                                        <div class="card-text my-3">
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault2">
                                                                                <input type="text" placeholder="Veľkosť" value="" id="size2">
                                                                                <input type="text" placeholder="Cena" value="" id="price2">
                                                                            </div>
                                                                        </div>

                                                                        <div class="card-text my-3">
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault3">
                                                                                <input type="text" placeholder="Veľkosť" value="" id="size3">
                                                                                <input type="text" placeholder="Cena" value="" id="price3">
                                                                            </div>
                                                                        </div>
                                                                    -->

                                    <div class="card-text my-3">
                                        <div class="form-check p-0">
                                            <input type="text" class="form-control" placeholder="Cena" value="" name="price">
                                        </div>
                                    </div>

                                    <div class="card-text my-3">
                                        <div class="form-check p-0">
                                            <input type="text" class="form-control" placeholder="Množstvo" value="" name="quantity">
                                        </div>
                                    </div>

                                    <div class="card-text my-3">
                                        <div class="row g-3  d-flex align-items-center">
                                            <div class="col-sm-3 col-md-2">
                                                <label for="count" class="col-form-label"><h5>Farba:</h5></label>
                                            </div>

                                            <div class="col-sm-3 col-md-3 pl-3 ">
                                                <input class="form-check-input ml-3 ml-sm-1" type="checkbox" name="color1">
                                                <label class="form-check-label ml-5 ml-sm-4" for="flexCheckDefault">Červená</label>
                                            </div>

                                            <div class="col-sm-3 col-md-3 pl-3 ">
                                                <input class="form-check-input ml-3 ml-sm-1" type="checkbox" name="color2">
                                                <label class="form-check-label ml-5 ml-sm-4" for="flexCheckDefault">Modrá</label>
                                            </div>

                                            <div class="col-sm-3 col-md-3 pl-3 ">
                                                <input class="form-check-input ml-3 ml-sm-1" type="checkbox" name="color3">
                                                <label class="form-check-label ml-5 ml-sm-4" for="flexCheckDefault">Zelená</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-text my-3">
                                        <div class="row g-3 align-items-center">
                                            <div class="col-2">
                                                <label for="count" class="col-form-label"><h5>Typ</h5></label>

                                            </div>
                                            <div class="col-10 w-auto">
                                                <select class="form-select w-100" aria-label="Default select example" name="type">
                                                    <option value="Nausnice" selected >Náušnice</option>
                                                    <option value="Privesky">Prívesky</option>
                                                    <option value="Gombiky">Gombíky</option>
                                                    <option value="Noze">Nože</option>
                                                    <option value="Vyvrtky">Vývrtky</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mt-3 d-flex justify-content-center ">
                                        <button type="submit" class="btn btn-primary w-50">Pridať produkt</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li> {{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

        </div>
    </main>
@endsection()
