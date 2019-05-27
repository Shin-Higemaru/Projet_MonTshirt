<?php

namespace App\Http\Controllers\Shop;

use App\Adresse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

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

    // Etape 2bis // Stocker l'adresse de livraison dans la DB
    public function adresseStore(Request $request) {
        // Récupération des datas du form
//        dd($request->all());
        // Validation
        $request->validate([
            'nom'=>'required',
            'adresse'=>'required',
            //limite le nombre de chiffre à 10
            'telephone'=>'required | digits:10',
            'code_postale'=>'required',
            'ville'=>'required',
            'pays'=>'required'

        ]);
        // Création de l'entité et hydratation
        $adresse = new Adresse();
//        Soi hydrater les attributs 1 à 1
//        $adresse->prenom = $request->prenom;
//        $adresse->nom = $request->nom;
//        $adresse->adresse = $request->adresse;

        // ...Soit hydrater tous les attributs de l'adresse en 1 seule ligne
        $adresse->fill($request->all());
//        Sauvegarder dans la db
        $adresse->save();

        // Récupération du user connecté pour lui associer l'adresse qui vient d'être créée
        $user_auth = Auth::user();
        $user_auth->adresse_id = $adresse->id;
        $user_auth->save();

        // Redirection vers la page pour procéder au paiement

    }
}
