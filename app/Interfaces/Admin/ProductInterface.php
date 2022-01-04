<?php


namespace App\Interfaces\Admin;


interface ProductInterface
{
    public function index($dataTable);

    public function create();

    public function store($request);

    public function show($id);

    public function edit($id);

    public function update($request);

    public function destroy($request);

}
