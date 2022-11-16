<?php

require_once 'vendor/autoload.php';

use App\Company;
use App\Selection;
use League\Csv\Reader;
use League\Csv\Statement;

$selection = Selection::createFromPath('register.csv');

$csv = Reader::createFromPath('register.csv');
$csv->setDelimiter(';');
$csv->setHeaderOffset(0);
$header = $csv->getHeader();

if ($input_bom === Reader::BOM_UTF16_LE || $input_bom === Reader::BOM_UTF16_BE) {
    $csv->addStreamFilter('https://data.gov.lv/dati/lv/dataset/uz/resource/25e80bf3-f107-4ab4-89ef-251b5b9374e9');
}

$companies = new \App\Collection();
echo implode(', ', $companies->getCompanyName());

$stmt = Statement::create()
    ->limit(25);
$records = $stmt->process($csv);

foreach ($records->getRecords() as $record) {
    $companies []= new Company($record['name'], $record['regcode']);
}

var_dump($companies);
