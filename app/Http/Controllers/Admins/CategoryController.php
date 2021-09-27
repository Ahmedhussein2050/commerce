<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function create(){

        return view('Admins.create-category');
    }

    public function store(Request $request): RedirectResponse
    {
        Category::query()->create([
            'name' => $request->name
        ]);
        return redirect()->route('home');
    }

    public function view(Category $category){
        $products = Product::query()->where('category_id', $category->id)->get();
        return view('category-products')->with([
            'category' => $category,
            'products' => $products
        ]);
    }
}
