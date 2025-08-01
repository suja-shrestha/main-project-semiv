<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Productv2;
use Illuminate\Support\Str; // Import the Str class for slug-to-title conversion

class HomeController extends Controller
{
    /**
     * Constructor - Protects only the 'index' (dashboard) route.
     */
    public function __construct()
    {
        $this->middleware('auth')->only('index');
    }

    /**
     * Dashboard for Authenticated Users.
     */
    public function index()
    {
        $productData = $this->getHomePageProducts();
        $productData['products'] = Productv2::latest()->take(8)->get();
        return view('home', $productData);
    }

    /**
     * Public Homepage.
     */
    public function home()
    {
        $productData = $this->getHomePageProducts();
        return view('welcome', $productData);
    }

    /**
     * Show products for the "Men" page.
     */
    public function showMenProducts()
    {
        $pageTitle = "Men's Collection";
        $products = Productv2::where('gender', 'men')
            ->orWhere('gender', 'unisex')
            ->latest()
            ->paginate(12);

        return view('men', compact('products', 'pageTitle'));
    }

    /**
     * Show products for the "Women" page.
     */
    public function showWomenProducts()
    {
        $pageTitle = "Women's Collection";
        $products = Productv2::where('gender', 'women')
            ->orWhere('gender', 'unisex')
            ->latest()
            ->paginate(12);

        return view('women', compact('products', 'pageTitle'));
    }

    // In app/Http/Controllers/HomeController.php

    // ... (after the showWomenProducts method)

    // ===================================================================
//     NEW METHOD TO SHOW PRODUCTS ON THE "KIDS" PAGE
// ===================================================================
    public function showKidsProducts()
    {
        $pageTitle = "Kids' Collection";

        // Fetch products where gender is 'kids' OR 'unisex'
        $products = Productv2::where('gender', 'kids')
            ->orWhere('gender', 'unisex')
            ->latest()
            ->paginate(12); // Use pagination

        // This will point to a new 'kids.blade.php' view we will create
        return view('kids', compact('products', 'pageTitle'));
    }

    // ===================================================================
    //     NEW DYNAMIC METHOD FOR ALL PRODUCT CATEGORIES
    // ===================================================================
    /**
     * Shows a page of products filtered by a specific category slug.
     * This handles routes like /category/electronics, /category/fashion, etc.
     *
     * @param string $category_slug The URL-friendly version of the category name.
     * @return \Illuminate\View\View
     */
    public function showByCategory(string $category_slug)
    {
        // Convert the URL slug (e.g., "home-garden") back to the proper category name (e.g., "Home & Garden")
        // This makes the lookup in the database possible.
        $categoryName = Str::title(str_replace('-', ' ', $category_slug));

        // Create a dynamic page title for the view
        $pageTitle = "Category: " . $categoryName;

        // Fetch products that match the determined category name
        $products = Productv2::where('category', $categoryName)
            ->latest()
            ->paginate(12); // Use pagination for good performance

        // This will render the 'resources/views/products/category-page.blade.php' file
        // We pass the filtered products and the page title to the view.
        return view('products.category-page', compact('products', 'pageTitle'));
    }


    // ===================================================================
    //     PRIVATE HELPER METHOD FOR HOME/DASHBOARD PAGE PERFORMANCE
    // ===================================================================
    /**
     * Fetches all products ONCE and uses fast PHP collections to group them.
     * This reduces database queries significantly for the homepage.
     */
    private function getHomePageProducts(): array
    {
        $allProducts = Productv2::latest()->get();

        return [
            'productsByCategory' => $allProducts
                ->groupBy('category')
                ->map(fn($group) => $group->take(6)),

            'featuredByCategory' => $allProducts
                ->where('is_featured', true)
                ->groupBy('category')
                ->map(fn($group) => $group->take(6)),

            'hotSalesByCategory' => $allProducts
                ->where('is_hot_sale', true)
                ->groupBy('category')
                ->map(fn($group) => $group->take(6)),

            'newArrivalsByCategory' => $allProducts
                ->where('is_new', true)
                ->groupBy('category')
                ->map(fn($group) => $group->take(6)),

            'recommendedByCategory' => $allProducts
                ->where('is_best_deal', true)
                ->groupBy('category')
                ->map(fn($group) => $group->take(6)),
        ];
    }
}