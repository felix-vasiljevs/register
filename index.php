<?php
require_once 'vendor/autoload.php';
use App\Selection;

$companies = (new Selection('register.csv', ';'))->getData();

while(true)
{
    echo "[1] Show last 30 companies." . PHP_EOL;
    echo "[2] Show company by registration code." . PHP_EOL;
    echo "[3] Show registration code by company name." . PHP_EOL;
    echo "[4] Exit." . PHP_EOL;

    $selection = (int)readline("Select option You're looking for: ") . PHP_EOL;
    switch ($selection){
        case 1:
            foreach ($companies->getLast() as $company) {
                echo "Company name: {$company->getName()} | Registration Code: {$company->getRegistrationCode()}" . PHP_EOL;
            }
            break;
        case 2:
            $companyRegistrationCode = (int)readline("Enter a registration code: ");
            $company = $companies->getCompanyRegistrationCode($companyRegistrationCode);

            if ($company) {
                echo "The company You're looking for is: {$company->getName()} = {$company->getRegistrationCode()}" . PHP_EOL;
            } else {
                echo "There is no company You're looking for :(" . PHP_EOL;
            }
            break;
        case 3:
            $companyName = readline("Enter company's name: ") . PHP_EOL;
            $searchedCompanies = $companies->getCompanyName($companyName);
            foreach ($searchedCompanies->getList() as $company) {
                echo "{$company->getName()} = {$company->getRegistrationCode()}" . PHP_EOL;
            }
            break;
        case 4:
            exit;
    }
}
