<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Product;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       //
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

       $categories = Category::with('subCategories')->get();
       $discountedSubCategories = SubCategory::where('discount', '>', 0)->get();
       $products = Product::with('product_images')->get();
       $discountedProducts = Product::where('discount', '>', 0) // Only products with a discount
        ->inRandomOrder() // Randomize the order
        ->limit(8) // Limit to 8 products
        ->get();
       $latestProduct = Product::latest()->take(9)->get();
       $bestseller = Product::with('product_images')->inRandomOrder() // Randomize order
       ->take(8) // Limit the number of related products displayed
       ->get();
        return view('landing_page', [
            'categories'=>$categories ,
            'products'=>$products ,
            'latestProduct'=>$latestProduct ,
            'bestseller'=>$bestseller ,
            'discountedSubCategories'=>$discountedSubCategories,
            'discountedProducts'=>$discountedProducts,

        ]);
    }
}
