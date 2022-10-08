<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ActualiteController extends Controller
{
    public function index()
    {

        return view('publicites.index');

    }

    public function create()
    {

        return view('publicites.create');

    }

    public function store()
    {
        


    }
    
}
