<?php

namespace App\Controllers;

use App\Core\App;

class GetAllController
{
    public function index()
    {
        $parsedDatas = App::get('database')->selectAll('articles');

        return view('index', compact('parsedDatas'));
    }
}
