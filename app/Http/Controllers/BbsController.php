<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BbsController extends Controller
{
    public function index()
    {
        return response('Здесть будет перечень наших объявлений')
                        ->header('Content-Type', 'text/plain');
    }
}
