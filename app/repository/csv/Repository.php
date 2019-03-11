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

            //Here we use model here to encapsulate data, and use that encapsulated data in the anonther new mapper layer to encapsulate it and dispatch it to the database
            // $data = Model::fromArray($parsedData);
            $parsedDatas[] = $parsedData;
        }

        // here we insert data to the database
        foreach ($parsedDatas as $parameters) {
            App::get('database')->insert('articles', $parameters);
        }
    }
}
