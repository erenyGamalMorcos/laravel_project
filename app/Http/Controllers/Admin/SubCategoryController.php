<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\sub_categoriesDataTable;
use App\Http\Requests\Admin\StoreSubCategory;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Interfaces\Admin\SubCategoryInterface;
use Illuminate\Support\Facades\Validator;

class SubCategoryController extends Controller
{
    private $sub_category;

    public function __construct(SubCategoryInterface $sub_category)
    {
        $this->sub_category = $sub_category;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(sub_categoriesDataTable $dataTable, $category_id)
    {
        return $this->sub_category->index($dataTable, $category_id);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($category_id)
    {
        return $this->sub_category->create($category_id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSubCategory $request)
    {
        return $this->sub_category->store($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->sub_category->show($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function edit($categroty_id, $id)
    {
        return $this->sub_category->edit($categroty_id, $id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function update(StoreSubCategory $request)
    {
        $subCategoryInputs = $request->except(['_token','_method']);
        return $this->sub_category->update($subCategoryInputs);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($category_id, $id)
    {
        return $this->sub_category->destroy($category_id, $id);
    }

    public function getSubCategoryByCategoryID(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'category_id' => 'required',
        ]);

        if ($validator->passes()) {
            $sub_category_name = app()->getLocale() == 'en' ? 'sub_category_name_en' : 'sub_category_name_ar';
            $data = SubCategory::where("category_id",$request->category_id)->pluck($sub_category_name, "id");

            return response()->json(['success'=>__('translations.Saved successfully'), 'sub_categories'=> $data]);
        }

        return response()->json(['error'=>$validator->errors()->all()]);
    }
}
