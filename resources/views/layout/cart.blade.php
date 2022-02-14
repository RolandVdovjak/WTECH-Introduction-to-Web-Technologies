@extends('layout.app')

@section('content')


    @if(Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
            @php
                Session::forget('success');
            @endphp
        </div>
    @endif



        <!-- Tovary v kosiku -->
        <div class="container-fluid container_max_width" >
            <h2 class ="category text-center mb-5 mt-5" > Nákupný košík </h2>
                @foreach ($cartItems as $item)
                    @include('layout.partials.cart_item', ['item' => $item])
                @endforeach
        </div>

        <?php

        $delivery = '2.50';
        $payment = '0';
        $suma_celkom = Cart::getTotal() + 2.50;

        ?>

        <hr class="mt-5 mb-5">

        <!-- Dorucenie&Platba -->
        <form action="{{ route('order.store') }}" method="POST">
            @csrf
            <div class="container ">
                <div class="row">

                    <div class="col-12 col-sm-6 mb-3 d-flex flex-column">

                            <h2 class ="category text-start mb-2"> Doručenie </h2>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="delivery" id="dodanie1" value="1" checked>
                                <label class="form-check-label" for="dodanie1"> Kuriér DPD (2.50€)</label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="delivery" id="dodanie2" value="2">
                                <label class="form-check-label" for="dodanie2"> Kuriér GLS (2.50€) </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="delivery" id="dodanie3" value="3">
                                <label class="form-check-label" for="dodanie3"> Slovenská pošta (2.99€) </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="delivery" id="dodanie4" value="4">
                                <label class="form-check-label" for="dodanie4"> Osobný odber (Zdarma) </label>
                            </div>



                    </div>


                    <div class="col-12 col-sm-6 d-flex flex-column justify-content-center ">

                            <h2 class ="category text-start mb-2"> Platba </h2>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="payment" id="platba1" value="1" checked>
                                <label class="form-check-label" for="platba1"> Karta (Zdarma)</label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="payment" id="platba2" value="2">
                                <label class="form-check-label" for="platba2"> Bankový prevod (1.20€) </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="payment" id="platba3" value="3">
                                <label class="form-check-label" for="platba3"> V hotovosti (1.50) </label>
                            </div>


                    </div>

                </div>
            </div>
            <hr class="mt-5 mb-5">

            <!-- DODACIE UDAJE -->
            <div class="container">

                <h2 class ="category text-center mb-5" > Dodacie údaje </h2>
                @include('layout.partials.input_addr_fields', ['errors' => $errors])

            </div>
            <hr class="mt-5 mb-5">

            <!-- SUMAR OBJEDNAVKY -->
            <div class="container">
                <h2 class ="category text-center mb-5" > Sumár objednávky </h2>

                    <div class="row justify-content-md-center justify-content-sm-center">

                        <div class="col col-xl-6 col-lg-6 col-md-6 col-10 mb-2">
                            <div class="row">
                                <div class="col-6 offset-2">
                                    <h4> Cena tovarov </h4>
                                </div>
                                <div class="col-3">
                                    <h4> {{ Cart::getTotal() }}€ </h4>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6 offset-2">
                                    <h4> Cena dopravy </h4>
                                </div>
                                <div class="col-3">
                                    <h4 class="result_delivery" id="cena_dopravy"><?php echo $delivery; ?>€</h4>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6 offset-2">
                                    <h4> Poplatok za platbu </h4>
                                </div>
                                <div class="col-3">
                                    <h4 class="result_payment" id="cena_platby"><?php echo $payment; ?>€</h4>
                                </div>
                            </div>
                        </div>

                        <div class="col col-xl-6 col-lg-6 col-md-6 col-10">
                            <div class="row offset-1">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Zlavovy kod" aria-label="Recipient's username" aria-describedby="button-addon2">
                                    <button class="btn btn-outline-secondary" type="button" id="button-addon2">Uplatniť  kód</button>
                                </div>
                            </div>

                            <div class="row offset-2">
                                <div class="col col-xl-6 col-lg-6 col-md-6 col-sm-6 pl-0">
                                    <h3 > SPOLU </h3>
                                </div>
                                <div class="col col-xl-3 col-lg-3 col-md-3 col-sm-3 offset-1">
                                    <h3 id= "spolu" class="result_suma"><?php echo $suma_celkom . "€" ; ?></h3>
                                    <input type="hidden"  name="price" value="{{ Cart::getTotal() }}">

                                    @auth()
                                    <input type="hidden"  name="user_id" value="{{Auth::user()->id }}">
                                    @endauth()

                                    @foreach($items as $item)
                                        <input type="hidden"  name="items[]" value="{{$item}}">
                                    @endforeach

                                </div>
                            </div>
                        </div>

                    </div>


            </div>

            <hr class="mt-5 mb-5">





            <!-- Potvrdenie objednavky -->
            <div class="modal fade" id="check_order" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Potvrdenie objednávky</h5>
                        </div>
                        <div class="modal-body">
                            <p> Odoslať objednávku?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Potvrdiť</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Zrušiť</button>
                        </div>
                    </div>
                </div>
            </div>

        </form>

        <script>

            $("input[name='delivery']").click(function(e) {
                var delivery = $(this).val();

                var delivery_price = 2.50;
                switch(delivery) {
                    case '1':
                        delivery_price=2.50;
                        break;
                    case '2':
                        delivery_price=2.50;
                        break;
                    case '3':
                        delivery_price=2.90;
                        break;
                    case '4':
                        delivery_price=0;
                        break;
                }
                $('.result_delivery').html(delivery_price.toFixed(2));
                var hodnota = parseFloat({{Cart::getTotal()}}) + parseFloat(delivery_price.toFixed(2)) + parseFloat(document.getElementById("cena_platby").innerHTML);
                document.getElementById("spolu").innerHTML = hodnota.toString();
            });

            $("input[name='payment']").click(function(e) {
                var payment = $(this).val();
                var payment_price

                switch(payment) {
                    case '1':
                        payment_price=0;
                        break;
                    case '2':
                        payment_price=1.20;
                        break;
                    case '3':
                        payment_price=1.50;
                        break;
                }
                $('.result_payment').html(payment_price.toFixed(2));
                var hodnota = parseFloat({{Cart::getTotal()}}) + parseFloat(payment_price.toFixed(2)) + parseFloat(document.getElementById("cena_dopravy").innerHTML);
                document.getElementById("spolu").innerHTML = hodnota.toString();
            });


        </script>

        <!-- BUTTON -->
        <div class="row d-flex justify-content-md-center m-3">
            <div class="col-md-7 col-12 d-flex justify-content-center">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#check_order">
                    Prejsť k objednaniu
                </button>
            </div>
        </div>



    </main>
@endsection()
