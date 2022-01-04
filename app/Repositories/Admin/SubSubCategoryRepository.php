<?php


namespace App\Repositories\Admin;


use App\Interfaces\Admin\SubSubCategoryInterface;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;

class SubSubCategoryRepository implements SubSubCategoryInterface
{

    public function index($dataTable, $category_id, $sub_category_id)
    {
        Category::findOrFail($category_id);

        SubCategory::findOrFail($sub_category_id);

        return $dataTable->with(['category_id' => $category_id, 'sub_category_id' => $sub_category_id])->render('admin.sub_sub_categories.index',compact('category_id','sub_category_id'));
    }

    public function create($category_id, $sub_category_id)
    {
        return view('admin.sub_sub_categories.create', compact('category_id','sub_category_id'));
    }

    public function store($request)
    {
        $category_id = $request['category_id'];
        unset($request['category_id']);
        SubSubCategory::create($request);
        return redirect()->route('sub_sub_categories.index',['category_id' => $category_id, 'sub_category_id' => $request['sub_category_id']])
            ->with('success',__('translations.Saved successfully'));
    }

    public function show($id)
    {
//        $sub_sub_category = SubSubCategory::findOrFail($id);
//        return view('admin.sub_sub_categories.show', compact('sub_sub_category'));
    }

    public function edit($category_id, $sub_category_id, $id)
    {
        Category::findOrFail($category_id);
        SubCategory::findOrFail($sub_category_id);
        $sub_sub_category = SubSubCategory::findOrFail($id);
        return view('admin.sub_sub_categories.edit', compact('sub_category_id','category_id', 'sub_sub_category'));
    }

    public function update($request)
    {
        $id = $request['id'];
        $category_id = $request['category_id'];
        unset($request['category_id']);
        SubSubCategory::whereId($id)->update($request);

        return redirect()->route('sub_sub_categories.index',['category_id' => $category_id, 'sub_category_id' => $request['sub_category_id']])
            ->with('success',__('translations.Saved successfully'));
    }

    public function destroy($category_id, $sub_category_id, $id)
    {
        SubSubCategory::findOrFail($id)->delete();
        return redirect()->route('sub_sub_categories.index', ['category_id' => $category_id, 'sub_category_id' => $sub_category_id])
            ->with('success', __('translations.Saved successfully'));
    }
}
