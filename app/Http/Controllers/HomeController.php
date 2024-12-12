<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    function index()
    {
        $pageTitle = 'Home';
        dd($pageTitle);

        return view('home', compact('pageTitle'));
    }
}
