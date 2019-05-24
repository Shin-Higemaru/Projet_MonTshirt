@extends('shop')

@section('content')
    <section class="py-5">
        <div class="container">
            <h1 class="jumbotron-heading"> <span class="badge badge-primary ">Votre panier </span></h1>
            <table class="table table-bordered table-responsive-sm">
                <thead>
                <tr>
                    <th>Produit</th>
                    <th>Qte</th>
                    <th>P.U TTC</th>
                    <th>Total TTC</th>
                </tr>
                </thead>
                <tbody>
{{--                Chaques produit dans le panier que je renomme product--}}
                @foreach($products_cart as $product)
                <tr>
                    <td>
                        <img width="110" class="rounded-circle img-thumbnail" src="produits/{{$product->attributes->photo}}" alt="">
                        {{$product->name}}
                    </td>
                    <td>
                        <form action="{{route('carte_update')}}" id="update_qty" method="POST">
                            <input type="hidden" name="id" value="{{$product->id}}">

                        <input name="qty" style="display: inline-block" id="qte" class="form-control col-sm-4" type="number" value="{{$product->quantity}}">

                            <button form="update_qty" class="pl-2 btn btn-light">
                                <i class="fas fa-sync"></i>
                            </button>

                        </form>
                    </td>
                    <td>
                        {{ number_format($product->price * 1.2,2) }} €
                    </td>
                    <td>
                        {{ number_format( ($product->price * $product->quantity) * 1.2 ,2) }} €
                    </td>
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <td colspan="2"></td>
                    <td>Total HT</td>
                    <td>{{ number_format($total_panier_ht,2) }} €</td>
                </tr>
                <tr>
                    <td colspan="2"></td>
                    <td>TVA (20%)</td>
                    <td>{{ number_format($total_panier_ttc - $total_panier_ht ,2) }}</td>
                </tr>
                <tr>
                    <td colspan="2"></td>
                    <td>Total TTC</td>
                    <td>{{ number_format($total_panier_ttc,2) }} €</td>
                </tr>
                </tfoot>
            </table>
            <a class="btn btn-block btn-outline-dark" href="">Commander</a>
        </div>
    </section>
@endsection