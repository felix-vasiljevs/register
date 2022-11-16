<?php

namespace App;

use League\Csv\Reader;
use League\Csv\Statement;
use League\Csv\setDelimiter;
use SplFileObject;

class Selection
{
    private array $data;
    private string $csv;

    public function __construct(Collection $data)
    {
        foreach ($data as $datum) {
            $this->data []= $datum;
        }
    }

    public static function createFromPath(string $csv): string
    {
        return Reader::createFromPath($csv);
    }

    public function setDelimiter (string $delimiter)
    {
        return $this->csv->setDelimiter($delimiter);
    }

    public function setHeaderOffset (int $integer): int
    {
        return $this->csv->setHeaderOffset($integer);
    }

    public function getHeader ()
    {
        return $this->csv->getHeader();
    }

    public function setSplFileObject (string $csv): string
    {
        return $this->csv = new SplFileObject($csv);
    }
//SplFileObject
//setDelimiter
//setHeaderOffset
//getHeader
}