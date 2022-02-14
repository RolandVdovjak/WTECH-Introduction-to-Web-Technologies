@extends('layout.app')

@section('content')

    <main class="container-fluid container_max_width pt-2">

        <!-- Registracia -->

        <form action="/address" method="POST">
            @csrf
            @include('layout.partials.input_addr_fields')
            <button class="btn btn-primary mt-3 mx-auto d-flex">Pridať</button>

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
