<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\StoreCountry;
use App\Interfaces\Admin\CountryInterface;
use App\Models\Country;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DataTables\countriesDataTable;

class CountryController extends Controller
{
    private $country;

    public function __construct(CountryInterface $country)
    {
        $this->country = $country;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(countriesDataTable $dataTable)
    {
        return $this->country->index($dataTable);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return $this->country->create();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCountry $request)
    {
        return $this->country->store($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function show(Country $country)
    {
        return $this->country->show($country);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function edit(Country $country)
    {
        return $this->country->edit($country);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCountry $request)
    {
        return $this->country->update( $request->except(['_token','_method']) );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        return $this->country->destroy($request);
    }

    public function changeStatus(Request $request)
    {
        return $this->country->changeStatus($request->except(['_token','_method']));
    }
}
