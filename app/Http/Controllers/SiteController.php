<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;

class SiteController extends Controller
{
    /**
     * Mostra a página home
     * 
     * @return View|Factory 
     */
    public function home()
    {
       return view('home');
    }

    /**
     * Mostra a página contato
     * 
     * @return View|Factory 
     */
    public function contato()
    {
        return view('contato');  
    }

    /**
     * Mostra a página sobre
     * 
     * @return View|Factory 
     */
    public function sobre()
    {
        return view('sobre');  

    }
}
