<?php

namespace App\Repositories\Admin;

use App\Interfaces\Admin\WebsiteInfoInterface;
use App\Models\WebsiteInfo;

class WebsiteInfoRepository implements WebsiteInfoInterface
{

    public function index()
    {
        $infos = WebsiteInfo::all();
        return view('admin.website_info.index',compact('infos'));
    }

    public function update($request)
    {
        foreach($request as $key => $value){

            if(strpos($key, 'active') !== false){
                $active_row = explode("_",$key);
                $active_info = WebsiteInfo::whereId($active_row[1]);
                $active_info->update(['active' => $value]);
            }else {
                   $check_exists_row = WebsiteInfo::where('option', $key)->exists();
                   if($check_exists_row){
                       $option_row = WebsiteInfo::where('option', $key);
                        // Website Logo
                       if(is_object($value) && $value->isValid())
                       {
                           if ($image = $value) {
                               $destinationPath = public_path('website_info');
                               $file_name = $image->getClientOriginalName();
                               $image->move($destinationPath, $file_name);
                               $value = $file_name;
                           }
                       }
                       // Update Logo and other values
                       $option_row->update(['value' => $value]);
                   }
                }
        }

        return redirect()->route('info.index')
            ->with('success', __('translations.Saved successfully'));
    }
}

