<?php

namespace App\Repository\Xml;

use App\Core\App;

class Repository
{
    public function create()
    {
        $parsedDatas = [];
        $filePath = App::get('configLocal')['sources']['xml'];
        // var_dump($filePath);
        // die();
        $parsedXml = new \SimpleXMLElement(file_get_contents($filePath));
        // var_dump($parsedXml);
        // die();

        $parsedData = [];

        foreach ($parsedXml as $item) {
            // var_dump($item);
            // die();
            $parsedData['doi'] = (string ) $item->doi;
            $parsedData['abstract'] = (string) $item->abstract;
            $parsedData['title'] = (string) $item->title;
            $parsedData['pub_date']  = (string) $item->publicationDate;

            // var_dump($parsedData);
            // die();

            // $data = Model::fromArray($parsedData);
            // var_dump($data);
            // die();


            $parsedDatas[] = $parsedData;
        }

        // var_dump($parsedDatas);
        // die();

        //here we use components for parsing data and here we do all logic for preparing data to the database
        // Here it will be parsed in the form of associative array and will be saved into $parameters variable
        // here we insert data to the database
        foreach ($parsedDatas as $parameters) {
            App::get('database')->insert('articles', $parameters);
        }
    }
}
