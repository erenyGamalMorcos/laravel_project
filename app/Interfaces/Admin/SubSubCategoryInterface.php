<?php


namespace App\Interfaces\Admin;


interface SubSubCategoryInterface
{
    public function index($dataTable, $category_id, $sub_category_id);

    public function create($category_id, $sub_category_id);

    public function store($request);

    public function show($id);

    public function edit($category_id, $sub_category_id, $id);

    public function update($request);

    public function destroy($category_id, $sub_category_id, $id);
}
