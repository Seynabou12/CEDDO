<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class ActualitesController extends Controller
{
    public function actualite()
    {
        $actualites = Article::all();
        return view('acceuils.actualite', compact('actualites'));
    }
   
}
