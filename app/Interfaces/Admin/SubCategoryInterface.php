<?php


namespace App\Interfaces\Admin;


interface SubCategoryInterface
{
    public function index($dataTable, $category_id);

    public function create($category_id);

    public function store($request);

    public function show($id);

    public function edit($categroty_id, $id);

    public function update($request);

    public function destroy($category_id, $id);
}
