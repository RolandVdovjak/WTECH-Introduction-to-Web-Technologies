
        <div class="row justify-content-md-center justify-content-sm-center">

            @guest()
            <div class="col col-xl-6 col-lg-6 col-sm-6 col-12">
                <div class="mb-3">
                    <label for="name" class="form-label">Meno</label>
                    <input type="text" class="form-control" id="name" name="name">
                    @if ($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="surname" class="form-label">Priezvisko</label>
                    <input type="text" class="form-control" id="surname" name="surname">
                    @if ($errors->has('surname'))
                        <span class="text-danger">{{ $errors->first('surname') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email">
                    @if ($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Telefónne číslo</label>
                    <input type="tel" class="form-control" id="phone" name="phone">
                    @if ($errors->has('phone'))
                        <span class="text-danger">{{ $errors->first('phone') }}</span>
                    @endif
                </div>


            </div>

            <div class="col col-xl-6 col-lg-6 col-sm-6 col-12">
                <div class="mb-3">
                    <label for="city" class="form-label">Mesto</label>
                    <input type="text" class="form-control" id="city" name="city">
                    @if ($errors->has('city'))
                        <span class="text-danger">{{ $errors->first('city') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="psc" class="form-label">PSČ</label>
                    <input type="text" class="form-control" id="psc" name="zip">
                    @if ($errors->has('zip'))
                        <span class="text-danger">{{ $errors->first('zip') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="street" class="form-label">Ulica</label>
                    <input type="text" class="form-control" id="street" name="street">
                    @if ($errors->has('street'))
                        <span class="text-danger">{{ $errors->first('street') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="street" class="form-label">Číslo domu</label>
                    <input type="text" class="form-control" id="house_number" name="house_number">
                    @if ($errors->has('house_number'))
                        <span class="text-danger">{{ $errors->first('house_number') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="state" class="form-label">Štát</label>
                    <input type="text" class="form-control" id="state" name="state">
                    @if ($errors->has('state'))
                        <span class="text-danger">{{ $errors->first('state') }}</span>
                    @endif
                </div>

            </div>
            @endguest

            @auth()
                @if(isset(Auth::user()->address))
                    <div class="col col-xl-6 col-lg-6 col-sm-6 col-12">
                        <div class="mb-3">
                            <label for="name" class="form-label">Meno</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{Auth::user()->name}}">
                        </div>
                        <div class="mb-3">
                            <label for="surname" class="form-label">Priezvisko</label>
                            <input type="text" class="form-control" id="surname" name="surname" value="{{Auth::user()->address->surname}}">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{Auth::user()->email}}">
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Telefónne číslo</label>
                            <input type="tel" class="form-control" id="phone" name="phone" value="{{Auth::user()->address->phone}}">
                        </div>


                    </div>

                    <div class="col col-xl-6 col-lg-6 col-sm-6 col-12">
                        <div class="mb-3">
                            <label for="city" class="form-label">Mesto</label>
                            <input type="text" class="form-control" id="city" name="city" value="{{Auth::user()->address->city}}">
                        </div>
                        <div class="mb-3">
                            <label for="psc" class="form-label">PSČ</label>
                            <input type="text" class="form-control" id="psc" name="zip" value="{{Auth::user()->address->zip}}">
                        </div>
                        <div class="mb-3">
                            <label for="street" class="form-label">Ulica</label>
                            <input type="text" class="form-control" id="street" name="street" value="{{Auth::user()->address->street}}">
                        </div>
                        <div class="mb-3">
                            <label for="street" class="form-label">Číslo domu</label>
                            <input type="text" class="form-control" id="street" name="house_number" value="{{Auth::user()->address->house_number}}">
                        </div>
                        <div class="mb-3">
                            <label for="state" class="form-label">Štát</label>
                            <input type="text" class="form-control" id="state" name="state" value="{{Auth::user()->address->state}}">
                        </div>

                    </div>
                    @else
                        <div class="col col-xl-6 col-lg-6 col-sm-6 col-12">
                            <div class="mb-3">
                                <label for="name" class="form-label">Meno</label>
                                <input type="text" class="form-control" id="name" name="name">
                                @if ($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                            <div class="mb-3">
                                <label for="surname" class="form-label">Priezvisko</label>
                                <input type="text" class="form-control" id="surname" name="surname">
                                @if ($errors->has('surname'))
                                    <span class="text-danger">{{ $errors->first('surname') }}</span>
                                @endif
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" value="{{Auth::user()->email}}" id="email" name="email" >
                                @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Telefónne číslo</label>
                                <input type="tel" class="form-control" id="phone" name="phone">
                                @if ($errors->has('phone'))
                                    <span class="text-danger">{{ $errors->first('phone') }}</span>
                                @endif
                            </div>


                        </div>

                        <div class="col col-xl-6 col-lg-6 col-sm-6 col-12">
                            <div class="mb-3">
                                <label for="city" class="form-label">Mesto</label>
                                <input type="text" class="form-control" id="city" name="city">
                                @if ($errors->has('city'))
                                    <span class="text-danger">{{ $errors->first('city') }}</span>
                                @endif
                            </div>
                            <div class="mb-3">
                                <label for="psc" class="form-label">PSČ</label>
                                <input type="text" class="form-control" id="psc" name="zip">
                                @if ($errors->has('zip'))
                                    <span class="text-danger">{{ $errors->first('zip') }}</span>
                                @endif
                            </div>
                            <div class="mb-3">
                                <label for="street" class="form-label">Ulica</label>
                                <input type="text" class="form-control" id="street" name="street">
                                @if ($errors->has('street'))
                                    <span class="text-danger">{{ $errors->first('street') }}</span>
                                @endif
                            </div>
                            <div class="mb-3">
                                <label for="street" class="form-label">Číslo domu</label>
                                <input type="text" class="form-control" id="house_number" name="house_number">
                                @if ($errors->has('house_number'))
                                    <span class="text-danger">{{ $errors->first('house_number') }}</span>
                                @endif
                            </div>
                            <div class="mb-3">
                                <label for="state" class="form-label">Štát</label>
                                <input type="text" class="form-control" id="state" name="state">
                                @if ($errors->has('state'))
                                    <span class="text-danger">{{ $errors->first('state') }}</span>
                                @endif
                            </div>

                        </div>

                    @endif
            @endauth

        </div>
