<?php

namespace App\Http\Controllers;

use App\Models\Nouveaute;
use Illuminate\Http\Request;

class AproposController extends Controller
{
    public function apropos()
    {
        
        return view('acceuils.apropos');
    }
}
