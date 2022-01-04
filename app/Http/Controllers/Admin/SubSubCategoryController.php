<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\sub_sub_categoriesDataTable;
use App\Http\Requests\Admin\StoreSubSubCategory;
use App\Models\SubSubCategory;
use Illuminate\Http\Request;
use App\Interfaces\Admin\SubSubCategoryInterface;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class SubSubCategoryController extends Controller
{
    private $sub_sub_category;

    public function __construct(SubSubCategoryInterface $sub_sub_category)
    {
        $this->sub_sub_category = $sub_sub_category;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(sub_sub_categoriesDataTable $dataTable, $category_id, $sub_category_id)
    {
        return $this->sub_sub_category->index($dataTable, $category_id, $sub_category_id);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($category_id, $sub_category_id)
    {
        return $this->sub_sub_category->create($category_id, $sub_category_id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSubSubCategory $request)
    {
        return $this->sub_sub_category->store($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SubSubCategory  $subSubCategory
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->sub_sub_category->show($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SubSubCategory  $subSubCategory
     * @return \Illuminate\Http\Response
     */
    public function edit($category_id, $sub_category_id, $id)
    {
        return $this->sub_sub_category->edit($category_id, $sub_category_id, $id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SubSubCategory  $subSubCategory
     * @return \Illuminate\Http\Response
     */
    public function update(StoreSubSubCategory $request)
    {
        $subSubCategoryInputs = $request->except(['_token', '_method']);
        return $this->sub_sub_category->update($subSubCategoryInputs);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubSubCategory  $subSubCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($category_id, $sub_category_id, $id)
    {
        return $this->sub_sub_category->destroy($category_id, $sub_category_id, $id);
    }

    public function getSubSubCategoryBySubCategoryID(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'sub_category_id' => 'required',
        ]);

        if ($validator->passes()) {
            $sub_sub_category_name = app()->getLocale() == 'en' ? 'sub_sub_category_name_en' : 'sub_sub_category_name_ar';
            $data = SubSubCategory::where("sub_category_id",$request->sub_category_id)->pluck($sub_sub_category_name, "id");

            return response()->json(['success'=>__('translations.Saved successfully'), 'sub_sub_categories'=> $data]);
        }

        return response()->json(['error'=>$validator->errors()->all()]);
    }
}
