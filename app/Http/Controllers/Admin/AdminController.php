<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use Illuminate\Http\Request;
use App\Interfaces\Admin\AdminInterface;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\Admin\StoreAdmin;
use Illuminate\Support\Arr;

class AdminController extends Controller
{
    protected $admin;

    public function __construct(AdminInterface $admin)
    {
        $this->admin = $admin;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return $this->admin->index();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return $this->admin->create();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAdmin $request)
    {
        return $this->admin->store($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->admin->show($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return $this->admin->edit($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreAdmin $request)
    {
        $adminInputs = $request->except(['_token','_method']);
        if(empty($input['password'])){
            $adminInputs = Arr::except($adminInputs,array('password'));
        }
        return $this->admin->update($adminInputs);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->admin->destroy($id);
    }

    public function changeStatus(Request $request)
    {
        return $this->admin->changeStatus($request->except(['_token','_method']));
    }

    public function dashboard()
    {
        return view('admin.index');
    }

    //Todo Make it generic
    public function getCitiesByCountries(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'country_id' => 'required',
        ]);

        if ($validator->passes()) {
            $city_name = app()->getLocale() == 'en' ? 'name_en' : 'name_ar';
            $data = City::where("country_id",$request->country_id)->pluck($city_name, "id");

            return response()->json(['success'=>__('translations.Saved successfully'), 'cities'=> $data]);
        }

        return response()->json(['error'=>$validator->errors()->all()]);
    }

    public function adminRouting($id)
    {
        if(view()->exists('admin.'.$id)){
            return view('admin.'.$id);
        }
        else
        {
            return view('404');
        }
    }


}
