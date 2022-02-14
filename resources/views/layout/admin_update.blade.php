@extends('layout.app')

@section('content')
    <main class="container-fluid container_max_width">

        <div class="card mx-auto my-3">

            <form method="POST" action="{{url('produkt', $product->id)}}" enctype="multipart/form-data">

                @csrf
                <div class="row p-0 justify-content-center">

                    <!-- Polia na informacie -->
                    <div class="col-12 col-md-12 col-lg-8">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">

                                    <div class="custom-file p-0 col-md-auto mb-3">
                                        <input type="file" class="form-control" name="image">
                                    </div>

                                    <div class="card-text my-3">
                                        <div class="row g-3 align-items-center">
                                            <div class="col-sm-3 col-md-2">
                                                <label for="count" class="col-form-label"><h5>Meno:</h5></label>
                                            </div>

                                            <div class="col-sm-9 col-md-10 pl-sm-0">
                                                <input type="text" class="form-control" value="{{$product->name}}" name="name">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-text my-3">
                                        <div class="row g-3  text-align-top">
                                            <div class="col-sm-3 col-md-2">
                                                <label for="count" class="col-form-label"><h5>Popis:</h5></label>
                                            </div>

                                            <div class="col-sm-9 col-md-10 pl-sm-0">
                                                <textarea class="form-control" rows="10" aria-label="With textarea" name="description">{{$product->description}}</textarea>
                                            </div>
                                        </div>
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
                                        <div class="row g-3  text-align-top">
                                            <div class="col-sm-3 col-md-2">
                                                <label for="count" class="col-form-label"><h5>Cena:</h5></label>
                                            </div>

                                            <div class="col-sm-9 col-md-10 pl-sm-0">
                                                <input type="text" class="form-control" value="{{$product->price}}" name="price">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-text my-3">
                                        <div class="row g-3  text-align-top">
                                            <div class="col-sm-3 col-md-2">
                                                <label for="count" class="col-form-label"><h5>Množstvo:</h5></label>
                                            </div>

                                            <div class="col-sm-9 col-md-10 pl-sm-0">
                                                <input type="text" class="form-control" value="{{$product->quantity}}" name="quantity">
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>



                            <div class="row">
                                    <h6>Zaškrtinite obrazky ktore chcete odstrániť</h6>
                                @foreach( $photos as $photo )
                                    <div class="col-lg-4 col-md-4 col-sm-6 col-12 p-3">

                                                <img class="img-fluid img-responsive px-5 pb-2 p-sm-2 " alt="img{{$product->type}}" src={{asset('img/Sperky/'.$photo->file)}} >
                                                <input type="checkbox" class="w-100" name="remove_images[]" value={{$photo->id}}>

                                    </div>
                                @endforeach

                            </div>

                            <div class="row mt-3 d-flex justify-content-center ">
                                <button type="submit" class="btn btn-primary w-50">Upraviť produkt</button>
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
