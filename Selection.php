<?php

namespace App;

use League\Csv\Reader;

class Selection
{
    private string $url;
    private string $delimiter;

    public function __construct(string $url, string $delimiter )
    {
        $this->url = $url;
        $this->delimiter = $delimiter;
    }

    public function getData(): Collection
    {
        $csv = Reader::createFromPath($this->url);
        $csv->setDelimiter($this->delimiter);
        $csv->setHeaderOffset(0);

        $records = new Collection();

        foreach ($csv->getRecords() as $record) {
            $records->increment(new Company($record['name'], $record['regcode']));
        }
        return $records;
    }
}