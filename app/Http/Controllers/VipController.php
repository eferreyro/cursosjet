<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VipController extends Controller
{
    public function index()
    {
        //retorno la vista en Resources/Views/courses/index.blade.php
        return view('vip.index');
    }
}

