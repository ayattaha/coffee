<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CoffeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title="Wave Cafe";
        return view('index',compact('title'));
    }
    public function aboutUs()
    {
        $title="About Us";
        return view('aboutUs',compact('title'));
    }

    public function specialItem()
    {
        $title="Special Item";
        return view('specialItem',compact('title'));
    }

    public function contact()
    {
        $title="Contact";
        return view('contact',compact('title'));
    }
    
}
