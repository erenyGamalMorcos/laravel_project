<?php

namespace App\Http\Controllers\Admin;

use App\Interfaces\Admin\WebsiteInfoInterface;
use App\Models\WebsiteInfo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WebsiteInfoController extends Controller
{
    private $info;

    public function __construct(WebsiteInfoInterface $info)
    {
        $this->info = $info;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->info->index();
    }

    public function update(Request $request)
    {
        return $this->info->update($request->except(['_token','_method']));
    }

}
