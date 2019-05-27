<?php

namespace App\Http\Controllers\Shop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProcessController extends Controller
{
    public function __construct()
    {
        // On doit être loggé pour accéder à toute les pages du process sauf la page d'identification
        $this->middleware('auth')->except('identification');

        // Empêcher l'accès au formulaire d'identification si on est déjà loggé
        $this->middleware('guest')->only('identification');
    }

    // Etape 1 identification
    public function identification() {

        return view('shop.process.identification');
    }

    // Etape 2 // Adresse de livraison
    public function adresse() {
        return view('shop.process.adresse');
    }
}
