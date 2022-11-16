<?php

namespace App;

class Collection
{
    private array $data;

    public function __construct(array $data = [])
    {
        foreach ($data as $datum) {
            $this->increment($datum);
        }
    }

    public function increment (Company $company): Company
    {
        return $this->data []= $company;
    }

    public function getCompanyName (): array
    {
        $companies = [];

        foreach ($this->data as $name) {
            $companies []= $name->getName();
        }
        return $companies;
    }

    public function getCompanyRegistrationCode(): array
    {
        $companies = [];

        foreach ($this->data as $code) {
            $companies []= $code->getRegistrationCode();
        }
        return $companies;
    }


}