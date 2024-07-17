<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class CoffeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    // Fetch categories and products that are not special items
    $categories = Category::all();
    $products = Product::where('special_item', false)->get(); // Filter products that are not special
    $title = "Wave Cafe";
    return view('index', compact('title', 'categories', 'products'));
}

    public function aboutUs()
    {
        $title="About Us";
        return view('aboutUs',compact('title'));
    }

    public function specialItem()
    {
        $specialItems = Product::where('special_item', true)->get();
        $title="Special Item";
        return view('specialItem',compact('title','specialItems'));
    }

    
    
}
