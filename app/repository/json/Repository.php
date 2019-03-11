<?php

namespace App\Repository\Json;

use App\Core\App;

class Repository
{
    public function create()
    {
        // var_dump('Everyithing works json');
        // die();

        $parsedDatas = [];
        $apiPath = App::get('configLocal')['sources']['json'];
        $parsedJson = file_get_contents($apiPath);
        $jsonDecoded = json_decode($parsedJson, true);
        $parsedData = [];

        foreach ($jsonDecoded['items'] as $item) {
            $parsedData['doi'] = (string )$item['doi'];
            $parsedData['abstract'] = (string) $item['abstract'];
            $parsedData['title'] = (string) $item['title'];
            $parsedData['pub_date']  = (string) $item['publication_year'];
            $parsedDatas[] = $parsedData;
        }

        // here we insert data to the database
        foreach ($parsedDatas as $parameters) {
            App::get('database')->insert('articles', $parameters);
        }
    }
}
