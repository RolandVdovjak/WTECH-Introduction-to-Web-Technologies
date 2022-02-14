@extends('layout.app')

@section('content')

    <main class="container-fluid container_max_width pt-2">

        <!-- Registracia -->

        <form action="{{url('address', $address->id)}}" method="PATCH">
            @csrf

            <div class="row justify-content-md-center justify-content-sm-center">

                <div class="col col-xl-6 col-lg-6 col-sm-6 col-12">
                    <div class="mb-3">
                        <label for="name" class="form-label">Meno</label>
                        <input type="text" value="{{$address->name}}" class="form-control" id="name" name="name">
                    </div>
                    <div class="mb-3">
                        <label for="surname" class="form-label">Priezvisko</label>
                        <input type="text" value="{{$address->surname}}" class="form-control" id="surname" name="surname">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" value="{{Auth::user()->email}}" class="form-control" id="email" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Telefónne číslo</label>
                        <input type="tel" value="{{$address->phone}}" class="form-control" id="phone" name="phone">
                    </div>


                </div>

                <div class="col col-xl-6 col-lg-6 col-sm-6 col-12">
                    <div class="mb-3">
                        <label for="city" class="form-label">Mesto</label>
                        <input type="text" value="{{$address->city}}" class="form-control" id="city" name="city">
                    </div>
                    <div class="mb-3">
                        <label for="psc" class="form-label">PSČ</label>
                        <input type="text" value="{{$address->zip}}" class="form-control" id="psc" name="zip">
                    </div>
                    <div class="mb-3">
                        <label for="street" class="form-label">Ulica</label>
                        <input type="text" value="{{$address->street}}"  class="form-control" id="street" name="street">
                    </div>
                    <div class="mb-3">
                        <label for="street" class="form-label">Číslo domu</label>
                        <input type="text" value="{{$address->house_number}}" class="form-control" id="street" name="house_number">
                    </div>
                    <div class="mb-3">
                        <label for="state" class="form-label">Štát</label>
                        <input type="text" value="{{$address->state}}" class="form-control" id="state" name="state">
                    </div>

                </div>

            </div>

            <button class="btn btn-primary mt-3 mx-auto d-flex">Aktualizovať</button>
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

@endsection('content')
