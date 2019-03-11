<?php

namespace App\Repository\Csv;

use App\Core\App;
use League\Csv\Reader as CsvReader;
use App\Models\Data as Model;

class Repository
{
    public function create()
    {
        $parsedDatas = [];
        $filePath = App::get('configLocal')['sources']['csv'];
        $parsedCsv = CsvReader::createFromPath($filePath);
        $parsedCsv->setHeaderOffset(0);
        umask(0000);

        $parsedData = [];

        foreach ($parsedCsv as $rowNumer => $item) {
            $parsedData['doi'] = (string )$item['doi'];
            $parsedData['abstract'] = (string) $item['abstract'];
            $parsedData['title'] = (string) $item['title'];
            $parsedData['pub_date']  = (string) $item['date_published'];
            // $data = Model::fromArray($parsedData);
            $parsedDatas[] = $parsedData;
        }

        //here we use components for parsing data and here we do all logic for preparing data to the database
        // Here it will be parsed in the form of associative array and will be saved into $parameters variable
        // here we insert data to the database
        foreach ($parsedDatas as $parameters) {
            App::get('database')->insert('articles', $parameters);
        }
    }
}
