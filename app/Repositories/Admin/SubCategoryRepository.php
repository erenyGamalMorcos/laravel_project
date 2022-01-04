<?php
namespace App\Repositories\Admin;

use App\Interfaces\Admin\SubCategoryInterface;
use App\Models\Category;
use App\Models\SubCategory;

class SubCategoryRepository implements SubCategoryInterface
{

    public function index($dataTable, $category_id)
    {
        Category::findOrFail($category_id);

        return $dataTable->with(['category_id' => $category_id])->render('admin.sub_categories.index',compact('category_id'));
    }

    public function create($category_id)
    {
        Category::findOrFail($category_id);

        return view('admin.sub_categories.create', compact('category_id'));
    }

    public function store($request)
    {
        SubCategory::create($request);
        return redirect()->route('sub_categories.index', $request['category_id'])
            ->with('success',__('translations.Saved successfully'));
    }

    public function show($id)
    {
        $sub_category = SubCategory::findOrFail($id);

        return view('admin.sub_categories.show', compact('sub_category'));
    }

    public function edit($category_id, $id)
    {
        Category::findOrFail($category_id);
        $sub_category = SubCategory::findOrFail($id);

        return view('admin.sub_categories.edit', compact('sub_category','category_id'));
    }

    public function update($request)
    {
        $id = $request['id'];
        SubCategory::whereId($id)->update($request);

        return redirect()->route('sub_categories.index', $request['category_id'])
            ->with('success', __('translations.Saved successfully'));
    }

    public function destroy($category_id, $id)
    {

        SubCategory::findOrFail($id)->delete();

        return redirect()->route('sub_categories.index', $category_id)
            ->with('success', __('translations.Saved successfully'));
    }
}
