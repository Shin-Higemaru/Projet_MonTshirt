@extends('shop')

@section('content')

    <div class="container">

        <div class="row justify-content-between">

            <div class="col-6">
                <div class="card mb-4 box-shadow">
                    <img class="card-img-top" src="{{asset('produits/'.$product->photo_principale)}}" alt="{{$product->nom}}">

                </div>
            </div>
            <div class="col-6">

                <h1 class="jumbotron-heading">{{$product->nom}}</h1>
                <h5>{{$product->prixTTC()}}</h5>
                <p class="lead text-muted">{{$product->description}}</p>

                @foreach($product->tags as $tag)
                    <span class="badge badge-warning"><a href="{{route('voir_produits_par_tag',['id'=>$tag->id])}}">{{$tag->nom}}</a></span>
                @endforeach
                <hr>
                <form action="{{route('cart_add',['id'=>$product->id])}}" id="cart_add" method="POST">
{{--                    le 'arobase csrf' du bas génère une key aléatoirement pour sécuriser et régler la faille des formulaires dans laravel.On l emet just en dessous du form--}}
                    @csrf
                    <div>
                        <label for="qty">Qté</label>
                        <input type="number" name="qty" value="1" min="1" class="form-control">
                    </div>
                <label for="size">Choisissez votre taille</label>
                <select name="size" id="size" class="form-control">
                    <option value="XS">XS</option>
                    <option value="S">S</option>
                    <option value="M">M</option>
                    <option value="L">L</option>
                    <option value="XL">XL</option>
                    <option value="XXL">XXL</option>
                </select>
                <p>
{{--                    <a href="#" class="btn btn-cart my-2 btn-block"><i class="fas fa-shopping-cart"></i> Ajouter au Panier</a>--}}

                </p>
                </form>

                <button form="cart_add" type="submit" class="btn btn-cart my-2 btn-block"><i class="fas fa-shopping-cart"></i>Ajouter au panier</button>

            </div>
        </div>
    </div>


    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row">
                <h3>Vous aimerez aussi :</h3>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                        <img src="produits/hulk.jpg" class="card-img-top img-fluid" alt="Responsive image">

                        <div class="card-body">
                            <div class="d-flex justify-content-end">
                                <div class="btn-group">
                                    <a href="#" class="btn btn-sm btn-outline-secondary"><i class="fas fa-eye"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                        <img src="produits/krusty_simpsons.jpg" class="card-img-top img-fluid" alt="Responsive image">

                        <div class="card-body">
                            <div class="d-flex justify-content-end">
                                <div class="btn-group">
                                    <a href="#" class="btn btn-sm btn-outline-secondary"><i class="fas fa-eye"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-4 box-shadow">
                        <img src="produits/star_trek_kirk.jpg" class="card-img-top img-fluid" alt="Responsive image">

                        <div class="card-body">
                            <div class="d-flex justify-content-end">
                                <div class="btn-group">
                                    <a href="#" class="btn btn-sm btn-outline-secondary"><i class="fas fa-eye"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection