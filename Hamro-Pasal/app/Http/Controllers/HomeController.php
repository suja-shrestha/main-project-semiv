<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Productv2;

class HomeController extends Controller
{
    /**
     * Constructor - Protect only the dashboard route with auth middleware
     */
    public function __construct()
    {
        $this->middleware('auth')->only('index');
    }

    /**
     * Dashboard for Authenticated Users
     * Shows latest 8 products + featured, hot sales, new arrivals, recommended grouped by category
     */
    public function index()
    {
        $categories = ['Electronics', 'Fashion', 'Home & Garden', 'Sports', 'Books', 'Gaming', 'Toys'];

        // Latest 8 products for dashboard main display
        $products = Productv2::latest()->take(8)->get();

        // Prepare arrays for different product groups by category
        $productsByCategory = [];
        $featuredByCategory = [];
        $hotSalesByCategory = [];
        $newArrivalsByCategory = [];
        $recommendedByCategory = [];

        foreach ($categories as $category) {
            $productsByCategory[$category] = Productv2::where('category', $category)
                ->latest()
                ->take(6)
                ->get();

            $featuredByCategory[$category] = Productv2::where('category', $category)
                ->where('is_featured', true)
                ->latest()
                ->take(6)
                ->get();

            $hotSalesByCategory[$category] = Productv2::where('category', $category)
                ->where('is_hot_sale', true)
                ->latest()
                ->take(6)
                ->get();

            $newArrivalsByCategory[$category] = Productv2::where('category', $category)
                ->where('is_new', true)
                ->latest()
                ->take(6)
                ->get();

            $recommendedByCategory[$category] = Productv2::where('category', $category)
                ->where('is_best_deal', true)  // Assuming 'is_best_deal' means recommended products
                ->latest()
                ->take(6)
                ->get();
        }

        // Pass all data including categories to the dashboard home view
        return view('home', compact(
            'categories',
            'products',
            'productsByCategory',
            'featuredByCategory',
            'hotSalesByCategory',
            'newArrivalsByCategory',
            'recommendedByCategory'
        ));
    }

    /**
     * Public Homepage - Grouped Products by Category
     */
    public function home()
    {
        $categories = ['Electronics', 'Fashion', 'Home & Garden', 'Sports', 'Books', 'Gaming', 'Toys'];

        $productsByCategory = [];
        $featuredByCategory = [];
        $hotSalesByCategory = [];
        $newArrivalsByCategory = [];
        $recommendedByCategory = [];

        foreach ($categories as $category) {
            $productsByCategory[$category] = Productv2::where('category', $category)
                ->latest()
                ->take(6)
                ->get();

            $featuredByCategory[$category] = Productv2::where('category', $category)
                ->where('is_featured', true)
                ->latest()
                ->take(6)
                ->get();

            $hotSalesByCategory[$category] = Productv2::where('category', $category)
                ->where('is_hot_sale', true)
                ->latest()
                ->take(6)
                ->get();

            $newArrivalsByCategory[$category] = Productv2::where('category', $category)
                ->where('is_new', true)
                ->latest()
                ->take(6)
                ->get();

            $recommendedByCategory[$category] = Productv2::where('category', $category)
                ->where('is_best_deal', true)
                ->latest()
                ->take(6)
                ->get();
        }

        // Pass all data including categories to the public welcome view
        return view('welcome', compact(
            'categories',
            'productsByCategory',
            'featuredByCategory',
            'hotSalesByCategory',
            'newArrivalsByCategory',
            'recommendedByCategory'
        ));
    }
}
