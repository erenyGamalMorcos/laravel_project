<?php

namespace App\Repositories\Admin;

use App\Helpers\ChangeActiveStatus;
use App\Interfaces\Admin\AdminInterface;
use App\Models\Admin;
use App\Models\City;
use App\Models\Country;


class AdminRepository implements AdminInterface
{
    public function index()
    {
        $admins = Admin::all();
        $countries = Country::where('active', 1)->get();

        return view('admin.admins.index', compact('admins', 'countries'));
    }

    public function create()
    {
        $countries = Country::where('active', 1)->get();

        return view('admin.admins.create', compact('countries'));
    }

    public function store($request)
    {
        if(isset($request['image'])){
            if ($image = $request['image']) {
                $destinationPath = public_path('admins');
                $file_name = $image->getClientOriginalName();
                $image->move($destinationPath, $file_name);
                $request['image'] = $file_name;
            }
        }
        Admin::create($request);

        return redirect()->route('admins.index')
            ->with('success', __('translations.Saved successfully'));
    }

    public function show($id)
    {
        $admin = Admin::findOrFail($id);

        return view('admin.admins.show', compact('admin'));
    }

    public function edit($id)
    {
        $admin = Admin::findOrFail($id);
        $countries = Country::where('active', 1)->get();
        $cities = City::where('active', 1)->get();

        return view('admin.admins.edit', compact('admin', 'countries', 'cities'));
    }

    public function update($request)
    {
        if(isset($request['image'])){
            if ($image = $request['image']) {
                $destinationPath = public_path('admins');
                $file_name = $image->getClientOriginalName();
                $image->move($destinationPath, $file_name);
                $request['image'] = $file_name;
            }
        }

        $id = $request['id'];
        Admin::whereId($id)->update($request);

        return redirect()->route('admins.index')
            ->with('success', __('translations.Saved successfully'));
    }

    public function destroy($id)
    {
        Admin::findOrFail($id)->delete();

        return redirect()->route('admins.index')
            ->with('success', __('translations.Saved successfully'));
    }

    public function changeStatus($request)
    {
        return ChangeActiveStatus::changeActiveStatus($request,Admin::class);
    }

}

