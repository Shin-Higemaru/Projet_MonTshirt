<?php

namespace App\Http\Controllers\Backend;

use App\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MainController extends Controller
{
    // Afficher le formulaire d'identification
    public function loginBackend() {
        return view('backend.login');
    }

    // Afficher la page liste des commandes (homepage du backend)
    public function index() {
        //pour voir qu'une commande par page:
//        $orders = Order::paginate(1);

//        pour ne pas afficher les commandes envoyés:
        $orders = Order::where('is_sent','=','false')->paginate(1);

        //pour voir toutes les commandes dans la même page
//        $orders = Order::all();
        return view('backend.index',compact('orders'));
    }

    // Afficher le détail d'une commande
    public function orderShow(Request $request) {
        // Récupérer l'id de la commande à afficher via le param dans la route
        $order_id = $request->id;
        // Récupérer la commande dans la db
        $order = Order::find($order_id);
        // Afficher la page voir commande
        return view('backend.orderShow',compact('order'));
    }

//    Commande envoyés
    public function orderSent(Request $request) {
       $order_id = $request->id;
       $order = Order::find($order_id);
        $order->is_sent = true;
       $order->save();
        return redirect(route('backend_homepage'));
    }
}
