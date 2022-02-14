<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 mb-3">
    @if($product->type =='Noze')
        <a href="/produkt/Noze/{{$product->id}}" class="text-decoration-none">
            @elseif($product->type =='Vyvrtky')
                <a href="/produkt/Vyvrtky/{{$product->id}}" class="text-decoration-none">
                    @else
                        @if($product->type =='Privesky')
                            <a href="/produkt/Privesky/{{$product->id}}" class="text-decoration-none">
                                @elseif($product->type =='Gombiky')
                                    <a href="/produkt/Gombiky/{{$product->id}}" class="text-decoration-none">
                                        @else
                                            <a href="/produkt/Nausnice/{{$product->id}}" class="text-decoration-none">
                            @endif

        @endif
        <div class="card h-80">



            <img src={{asset('img/Sperky/'.$photo->file)}} class="card-img-top" alt="img{{$product->type}}">


            <div class="card-body text-center">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="small-ratings">
                        <i class="fa fa-star rating-color"></i>
                        <i class="fa fa-star rating-color"></i>
                        <i class="fa fa-star rating-color"></i>
                        <i class="fa fa-star rating-color"></i>
                        <i class="fa fa-star"></i>
                    </div>
                    <h5 class="review-count">12 Hodnotení</h5>
                </div>
                <h6 class="card-title">{{$product->name}} </h6>
                <h4>{{$product->price}}</h4>
            </div>
        </div>
    </a>
                </a>
        </a>
</div>
