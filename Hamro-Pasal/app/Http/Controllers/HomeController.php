<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Productv2; // ✅ Moved here, correct usage

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth'); // Protects the dashboard
    }

    /**
     * Show the application dashboard.
     */
    public function index()
    {
        $products = Productv2::latest()->take(8)->get();  // Get latest 8 products
        return view('home', compact('products'));
    }

    /**
     * Public Home Page with featured products.
     */
    public function home()
    {
        $products = Productv2::latest()->take(8)->get(); // Get top 8
        return view('welcome', compact('products'));
    }
}
