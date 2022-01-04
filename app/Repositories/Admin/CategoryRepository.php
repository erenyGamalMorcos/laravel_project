<?php


namespace App\Repositories\Admin;


use App\Interfaces\Admin\CategoryInterface;
use App\Models\Category;

class CategoryRepository implements CategoryInterface
{

    public function index($dataTable)
    {
        return $dataTable->render('admin.categories.index');
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store($request)
    {
        Category::create($request);
        return redirect()->route('categories.index')
            ->with('success',__('translations.Saved successfully'));
    }

    public function show($id)
    {
        $category = Category::findOrFail($id);

        return view('admin.categories.show', compact('category'));
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);

        return view('admin.categories.edit', compact('category'));
    }

    public function update($request)
    {
        $id = $request['id'];
        Category::whereId($id)->update($request);

        return redirect()->route('categories.index')
            ->with('success', __('translations.Saved successfully'));
    }

    public function destroy($id)
    {
        Category::findOrFail($id)->delete();

        return redirect()->route('categories.index')
            ->with('success', __('translations.Saved successfully'));
    }
}
