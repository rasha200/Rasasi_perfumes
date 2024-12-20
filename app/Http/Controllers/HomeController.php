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
       $products = Product::with('product_images')->get();
        

        return view('landing_page', ['categories'=>$categories ,'products'=>$products ]);
    }
}
