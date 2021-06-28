<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
       $all=Product::all();
        return view('product.index',compact('all'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create():View {
        return view('product.form');
    }


    public function store(ProductRequest $request):RedirectResponse
    {
        $product=Product::create($request->validated());
        return redirect()->route('admin.products.edit',compact('product'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }


    public function edit(Product $product):View
    {
        return view('product.edit',compact('product'));
    }
    public function update(ProductRequest $request,Product $product):RedirectResponse
    {
        $product->update($request->validated());
        return redirect()->route('admin.products.edit',compact('product'));
    }

    public function destroy(Product $product):RedirectResponse
    {
        $product->delete();
        return redirect()->route('admin.products.index');
    }
}
