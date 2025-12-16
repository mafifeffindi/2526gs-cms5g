<?php

namespace App\Controllers;

use App\Models\MenuModel;

class Landing extends BaseController
{
    public function index()
    {
        $featured = (new MenuModel())->orderBy('id', 'DESC')->findAll(6);
        return view('landing', ['featured' => $featured]);
    }
}
