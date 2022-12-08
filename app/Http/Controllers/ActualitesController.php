<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ActualitesController extends Controller
{
    public function actualite()
    {
        return view('acceuils.actualite');
    }
}
