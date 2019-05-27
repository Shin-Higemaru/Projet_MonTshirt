<?php


namespace App\Http\ViewComposers;


use App\Category;
use Illuminate\View\View;

class HeaderComposer
{

    // Ici on déclare les variables "communes" à N views
    public function compose(View $view) {
        $categories = Category::where('id_parent',null)->get();
        $total_products_cart = \Cart::getTotalQuantity();
//        dd($total_products_cart);
        $view->with('categories',$categories)->with('total_products_cart',$total_products_cart);
    }

}