<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductCreate;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ProductsController extends Controller
{


    public function create(){
        $categories = Category::all();
        return view('Admins.create-product', [
            'categories' => $categories
        ]);
    }


    public function store(ProductCreate $request): RedirectResponse
    {
        $imageName = '';

        if ($request->hasFile('image')){
            $image = $request->file('image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);
            $imageName = 'images/'.$name;
        }
        $request = $request->validated();
        $request = (object)$request;
//        Product::create([
//            'name' => $request->name,
//            'desc' => $request->desc,
//            'image' => $imageName,
//            'price' => $request->price,
//            'user_id' => auth()->user()->id,
//            'categories' => $request->category
//        ]);
        $product = new Product();
        $product->name = $request->name;
        $product->desc = $request->desc;
        $product->image = $imageName;
        $product->price = $request->price;
        $product->user_id = auth()->user()->id;
        $product->category_id = $request->category;
        $product->save();
        $categories = Category::query()->findOrFail($request->category);
        $product->categories()->attach($categories);
        return redirect()->route('product.dashboard', auth()->user()->username);
    }


    public function view($id){
        $product = Product::query()->findOrFail($id);
        return view('Admins.view-product')->with('product', $product);
    }

    public function edit(Product $product){
        Product::find($product);
        return view('Admins.edit-product', [
            'product' => $product
        ]);
    }
    public function update(Request $request, Product $product): RedirectResponse
    {
        $product->price = $request->price;
        $product->update();
//        $product->categories()->sync($request->category);
        return redirect()->route('product.dashboard', auth()->user()->username);
    }


    public function delete(Product $product): RedirectResponse
    {
        $product->delete();
        return redirect()->route('product.dashboard', auth()->user());
    }

















}
