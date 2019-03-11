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

        //sanitaze data
        // $data = filter_var($data, FILTER_SANITZE_STRING);
        //valildate data

        //dispatch to referended lower layer
        if ($data === 'xml') {
            $repository = new XmlRepository;
        } elseif ($data === 'json') {
            $repository = new JsonRepository;
        } else {
            $repository = new CsvRepository;
            ;
        }

        //dispatch to referended lower layer
        // Here we can do type cheking to check if returned true from the database
        $repository->create();

        //Redirect to index page
        redirect('index');
    }
}
