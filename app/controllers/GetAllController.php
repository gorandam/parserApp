<?php

namespace App\Controllers;

use App\Core\App;

class GetAllController
{
    public function index()
    {
        // var_dump('here everything is ok');
        // die();
        $parsedDatas = App::get('database')->selectAll('articles');

        return view('index', compact('parsedDatas'));
    }
}
