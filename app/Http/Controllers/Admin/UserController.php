<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    
    public function perfil()
    {
        return view('site.perfil.perfil');
    }

    public function perfilUpdate(Request $request)
    {
        
        dd($request->all());
    }
}
