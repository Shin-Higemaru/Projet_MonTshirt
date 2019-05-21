<?php

namespace App\Http\Controllers\Shop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MainController extends Controller
{
    //
    public function test(Request $request) {
        $prenom = $request->prenom;
//        echo $prenom;
//        die();


        return view('test',['prenom'=>$prenom]);
    }

    public function index() {
        return view('shop.index');
    }
}
