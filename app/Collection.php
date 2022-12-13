<?php

namespace App;

class Collection
{
    private array $data = [];

    public function increment(Company $company): void
    {
        $this->data []= $company;
    }

    public function getList (): array
    {
        return $this->data;
    }

    public function getLast(int $number = 30): array
    {
        return array_slice($this->data, -$number);
    }

    public function getAllCompanies(): int
    {
        return count($this->data);
    }

    public function getCompanyName(Collection $name): Collection
    {
        $data = new Collection();

        foreach ($this->data as $company) {
            if ($company->getName() == $name) {
                $data->increment($company);
            }
        }
        return $data;
    }

    public function getCompanyRegistrationCode(int $number): ?Company
    {
        foreach ($this->data as $company) {
            if ($company->getRegistrationCode() == $number) {
                return $company;
            }
        }
        return null;
    }
}