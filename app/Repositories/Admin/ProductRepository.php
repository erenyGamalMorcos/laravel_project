<?php

namespace App\Repositories\Admin;

use App\Interfaces\Admin\ProductInterface;
use App\Models\Category;
use App\Models\Product;

class ProductRepository implements ProductInterface
{

    public function index($dataTable)
    {
        return $dataTable->render('admin.products.index');
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create',compact('categories'));
    }

    public function store($request)
    {
        Product::create($request);

        return redirect()->route('products.index')
            ->with('success',__('translations.Saved successfully'));
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        $sub_category_name = (app()->getLocale() == 'en') ? $product->subCategory->sub_category_name_en : $product->subCategory->sub_category_name_ar;
        $sub_sub_category_name = (app()->getLocale() == 'en') ? $product->subSubCategory->sub_sub_category_name_en : $product->subSubCategory->sub_sub_category_name_ar;
        $category_name = (app()->getLocale() == 'en') ? $product->category->category_name_en : $product->category->category_name_ar;


        return view('admin.products.show', compact('product', 'category_name', 'sub_category_name', 'sub_sub_category_name'));

    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $sub_category_name = (app()->getLocale() == 'en') ? $product->subCategory->sub_category_name_en : $product->subCategory->sub_category_name_ar;
        $sub_sub_category_name = (app()->getLocale() == 'en') ? $product->subSubCategory->sub_sub_category_name_en : $product->subSubCategory->sub_sub_category_name_ar;
        $categories = Category::all();


        return view('admin.products.edit', compact('product', 'categories', 'sub_category_name', 'sub_sub_category_name'));
    }

    public function update($request)
    {
        $id = $request['id'];
        Product::whereId($id)->update($request);

        return redirect()->route('products.index')
            ->with('success',__('translations.Saved successfully'));
    }

    public function destroy($id)
    {
        Product::findOrFail($id)->delete();

        return redirect()->route('products.index')
            ->with('success', __('translations.Saved successfully'));
    }
}
