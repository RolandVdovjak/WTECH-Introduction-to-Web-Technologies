<!-- Navbar -->
<header class="container-fluid container_max_width pt-2">

    <!-- Topbar (v buducnosti nie foto ale text) -->
    <div class="d-sm-none d-flex justify-content-center"><img class="w-50 " src={{ URL::asset("img/topbar.png")}} alt="Logo"></div>
    <div class="d-none d-sm-block pb-2"><img class="w-100 " src={{ URL::asset("img/topbar_desktop.png")}} alt="Logo"></div>

    <div class="row ">
        <!-- Menu -->
        <div class="col-xl-9 col-lg-8 col-md-8 col-sm-7 col-3 m-0 p-0">
            <nav class="navbar navbar-expand-md navbar-light bg-siva px-0">
                <div class="container-fluid pl-2">
                    <a class="navbar-brand order-1 mx-2 d-none d-sm-block" href="/"><img height="40" src={{ URL::asset("img/logo.png")}} alt="Logo"></a>
                    <button class="navbar-toggler " type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon "></span>
                    </button>
                    <div class="collapse navbar-collapse order-2" id="navbarNavDropdown">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link " aria-current="page" href="/">Domov</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="SperkyDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Šperky
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="SperkyDropdownMenuLink">
                                    <li><a class="dropdown-item" href="{{url('/produkt/Nausnice')}}">Náušnice</a></li>
                                    <li><a class="dropdown-item" href="{{url('/produkt/Privesky')}}">Prívesky</a></li>
                                    <li><a class="dropdown-item" href="{{url('/produkt/Gombiky')}}">Manžetové gombíky</a></li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('/produkt/Noze')}}">Nože</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('/produkt/Vyvrtky')}}">Vývrtky</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('/o-nas')}}">O nás</a>
                            </li>

                            @auth()
                                @if(Auth::user()->hasRole("ADMIN"))
                                <li>
                                    <a class="nav-link" href="{{url('/admin')}}">Admin</a>
                                </li>
                                @endif
                            @endauth()
                        </ul>
                    </div>

                </div>
            </nav>
        </div>
        <!-- Ikony -->
        <div class="col-xl-3 col-lg-4 col-md-4 col-sm-5 col-9 pr-3 buttons bg-siva p-0 d-flex align-items-center justify-content-end" >
            <div class = "icons">
                <ul class="list-inline mb-0">
                    <li class="list-inline-item">
                        <div class="dropdown">
                            <button class="btn dropdown-toggle" type="button" id="hladat" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-fw fa-search"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right p-0">
                                <form class="form-inline m-3 search-bar" method="GET">
                                    <input class="form-control" name="search_text" placeholder="Produkt" aria-label="Search=">
                                    <button class="btn btn-primary mt-3 mx-auto d-flex" type="submit">
                                        Hľadať
                                    </button>
                                </form>
                            </div>
                        </div>
                    </li>

                    <li class="list-inline-item">
                            <a href="{{ route('cart.list') }}">
                            <button class="btn" type="button" id="kosik">
                                <i class="fa fa-shopping-cart"></i>
                                @guest()
                                    {{Cart::getTotalQuantity()}}
                                @endguest
                                @auth()
                                    {{Cart::session(auth()->user()->id)->getTotalQuantity()}}
                                @endauth
                            </button></a>
                    </li>

                    <li class="list-inline-item">
                        <div class="dropdown">

                                <button class="btn dropdown-toggle" type="button" id="profil" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-target="#login">
                                    <i class="fa fa-user"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right p-3">
                                    @guest()
                                    <a href="{{url('/login')}}"><button class="btn btn-primary w-100" type="button">Prihlásiť sa</button></a>
                                    <a href="{{url('/register')}}"><button class="btn btn-primary mt-3 w-100" type="button">Registrovať sa</button></a>
                                    @endguest

                                    @auth()
                                    <div class="text-center p-2">{{ Auth::user()->name }}</div>
                                            @if (isset(Auth::user()->address))
                                                <a href="{{url('/address/' . Auth::user()->address_id . '/edit' )}}"><button class="btn btn-primary w-100 my-2" type="button">Adresa Edit</button></a>
                                            @else
                                                <a href="{{url('/address')}}"><button class="btn btn-primary w-100 my-2" type="button">Adresa</button></a>
                                            @endif
                                    <div class="text-center">

                                        <!-- Authentication -->
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf

                                            <x-dropdown-link :href="route('logout')"
                                                             onclick="event.preventDefault();
                                        this.closest('form').submit();">
                                                {{ __('Log Out') }}
                                            </x-dropdown-link>
                                        </form>

                                    </div>
                                    @endauth
                                </div>

                        </div>
                    </li>

                </ul>
            </div>
        </div>

    </div>

</header>
