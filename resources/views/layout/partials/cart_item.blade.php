<div class="card mx-auto mb-3">
    <div class="row m-3 p-0">

        <div class="col-md-3 p-3">

            <img src="{{asset('img/Sperky/'.$item->photo)}}" class="img-fluid mx-auto d-block" alt="img{{$item->type}}">
        </div>

        <div class="col-md-8">
            <div class="card-body">

                <div class = "row mt-3">
                    <div class = "col-8">
                        <h5 class="card-title">{{ $item->name }}</h5>

                    </div>
                </div>

                <div class = "row mt-3">

                    <div class = "col-xl-3 col-lg-3 col-md-3 col-sm-3 text-center mb-4">
                        <div class="row">
                            <h6 class="card-text">Cena 1ks</h6>
                        </div>
                        <div class="row">
                            <h6 class="card-text">{{ $item->price }}€</h6>
                        </div>
                    </div>

                    <div class = "col-xl-4 col-lg-4 col-md-4 col-sm-4 text-center mb-4">
                        <form action="{{ route('cart.update') }}" method="POST">
                            @csrf
                        <div class="row d-flex mx-auto justify-content-center">
                            <input type="hidden" name="id" value="{{ $item->id}}" >
                            <label for="count" class="col-form-label">Počet</label>
                            <input type="number" class="form-control" name="quantity" id="count" min="1" value="{{ $item->quantity }}">
                            <button type="submit" class="btn btn-primary m-2 w-75 ">Aktualizovať</button>
                        </div>

                        </form>
                    </div>




                    <div class = "col-xl-4 col-lg-4 col-md-4 col-sm-4 text-center mb-4">
                        <div class="row">
                            <h6 class="card-text">Cena</h6>
                        </div>
                        <div class="row">
                            <!--<input class="form-control" value="{{ $item->price * $item->quantity }}€" name="cena_vsetkych" id="cena_vsetkych">-->
                            <h6 class="card-text" name="cena_vsetkych" id="cena_vsetky">{{ $item->price * $item->quantity }}€</h6>

                        </div>
                    </div>



                    <div class="col-xl-1 col-lg-1 col-md-1 col-sm-1">
                        <div class = "row justify-content-start">
                            <form action="{{ route('cart.remove') }}" method="POST">
                                @csrf
                                <input type="hidden" value="{{ $item->id }}" name="id">
                                <button class="close" aria-label="Close"> X</button>
                            </form>

                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
