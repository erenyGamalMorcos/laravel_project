<?php

namespace App\Repositories\Admin;

use App\Helpers\ChangeActiveStatus;
use App\Interfaces\Admin\CountryInterface;
use App\Models\Country;

class CountryRepository implements CountryInterface
{

    public function index($dataTable)
    {
        return $dataTable->render('admin.countries.countries');
//        $countries = Country::all();
//        return view('admin.countries.countries',compact('countries'));
    }

    public function create()
    {
        // TODO: Implement create() method.
    }

    public function store($request)
    {
        Country::create($request);

        return redirect()->route('countries.index')
            ->with('success',__('translations.Saved successfully'));
    }

    public function show($id)
    {
        // TODO: Implement show() method.
    }

    public function edit($id)
    {
        // TODO: Implement edit() method.
    }

    public function update($request)
    {
        $id = $request['id'];
        Country::whereId($id)->update($request);

        return redirect()->route('countries.index')
            ->with('success',__('translations.Saved successfully'));
    }

    public function destroy($request)
    {
        $id = $request->id;
        Country::whereId($id)->delete();

        return redirect()->route('countries.index')
            ->with('success',__('translations.Saved successfully'));
    }

    public function changeStatus($request)
    {
        return ChangeActiveStatus::changeActiveStatus($request,Country::class);
    }
}
