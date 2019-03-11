
<?php

// Here sources can be alocated across users

return [
    'sources' => [
         'csv' =>  __DIR__ . '/app/files/csv_test.csv',
         'xml' => __DIR__ . '/app/files/xml_test.xml',
         'json' => 'https://www.scilit.net/api/v1/articles?_format=json&token=575ffe99998e814d2e8054ed030f9dea'
    ]
];
