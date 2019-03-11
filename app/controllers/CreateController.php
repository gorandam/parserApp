<?php

namespace App\Controllers;

use App\Repository\Xml\Repository as XmlRepository;
use App\Repository\Json\Repository as JsonRepository;
use App\Repository\Csv\Repository as CsvRepository;

class CreateController
{
    public function create()
    {
        // parser data
        $data = $_GET['task'];

        if ($data === 'xml') {
            $repository = new XmlRepository;
        } elseif ($data === 'json') {
            $repository = new JsonRepository;
        } else {
            $repository = new CsvRepository;
            ;
        }

        // Here we can do type cheking to check if returned true from the database
        $repository->create();

        redirect('index');
    }
}
