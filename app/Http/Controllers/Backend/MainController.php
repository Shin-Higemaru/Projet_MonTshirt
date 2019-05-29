<?php

namespace App\Http\Controllers\Backend;

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
        return view('backend.index');
    }
}
