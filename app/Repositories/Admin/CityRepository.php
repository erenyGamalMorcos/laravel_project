<?php

namespace App\Repositories\Admin;


use App\Interfaces\Admin\CityInterface;
use App\Models\City;
use App\Models\Country;
use App\Helpers\ChangeActiveStatus;

class CityRepository implements CityInterface
{

    public function index($dataTable)
    {
        $countries = Country::where('active', 1)->get();
        return $dataTable->render('admin.cities.cities',compact('countries'));
    }

    public function create()
    {
        // TODO: Implement create() method.
    }

    public function store($request)
    {
        City::create($request);

        return redirect()->route('cities.index')
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
        City::whereId($id)->update($request);

        return redirect()->route('cities.index')
            ->with('success',__('translations.Saved successfully'));
    }

    public function destroy($request)
    {
        $id = $request->id;
        City::whereId($id)->delete();

        return redirect()->route('cities.index')
            ->with('success',__('translations.Saved successfully'));
    }

    public function changeStatus($request)
    {
        return ChangeActiveStatus::changeActiveStatus($request,City::class);
    }
}
