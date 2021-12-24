<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Validator;

class ChangeActiveStatus
{
    public static function changeActiveStatus($request,$model)
    {
        $validator = Validator::make($request, [
            'active' => 'required',
        ]);

        if ($validator->passes()) {
            $fetchModel = $model::whereId($request['id']);

            $request['active'] = ! $request['active'];
            $fetchModel->update($request);
            $fetchData = $fetchModel->first();

            return response()->json(['success'=>__('translations.Saved successfully'), 'active'=> $fetchData['active']]);
        }

        return response()->json(['error'=>$validator->errors()->all()]);
    }

}
