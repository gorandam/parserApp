<?php

namespace App\Models;

class Data
{
    private $doi;

    private $abstract;

    private $title;

    private $date_published;

    private function __construct(string $doi, string $abstract, string $title, string $date_published)
    {
        $this->doi = $doi;
        $this->abstract = $abstract;
        $this->title = $title;
        $this->date_published = $date_published;
    }

    public static function fromArray(array $dataArray): self
    {
        return new self(
            $dataArray['doi'],
            $dataArray['abstract'],
            $dataArray['title'],
            $dataArray['date_published']
        );
    }

    public function toArray(): array
    {
        return [
            'doi' => $this->doi,
            'abstract ' => $this->abstract ,
            'title' => $this->title,
            'date_published' => $this->date_published,
        ];
    }
}
