<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function create(){

        return view('Admins.create-category');
    }

    public function store(Request $request): RedirectResponse
    {
        Category::create([
            'name' => $request->name
        ]);
        return redirect()->route('dashboard');
    }

    public function view(Category $category){
        $category->load('products');

        return view('category-products')->with('category', $category);
    }
}
