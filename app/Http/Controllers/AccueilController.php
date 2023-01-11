<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Nouveaute;
use Illuminate\Http\Request;

class AccueilController extends Controller
{
    public function index()
    {
        $nouveautes = Nouveaute::all();
        $actualites = Article::all();
        return view('acceuils.index', compact('nouveautes', 'actualites'));
    }
    public function propos()
    {
        return view('acceuils.apropos');
    }

}
