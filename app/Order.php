<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    // Récupérer l'adresse d'une comamande
    public function adresse() {
        return $this->belongsTo('App\Adresse');
    }

    // Récupérer l'acheteur d'une commande
    public function user() {
        return $this->belongsTo('App\User');
    }

    // Récupérer les produits de la commande + les infos dans la table de liaison (pivot) 'order_products'
    public function products() {
        return $this->belongsToMany('App\Product','order_products')
            ->withPivot([
                'size',
                'qty',
                'prix_unitaire_ht',
                'prix_unitaire_ttc',
                'prix_total_ht',
                'prix_total_ttc'

            ]);
    }
}
