<?php
namespace Modules\Supplier\Interfaces;
use Modules\Supplier\Models\Company;

interface  CompanyServiceInterface
{
    public function getAll(array $filters = []);

    public function create(array $data): Company;

    public function update(Company $company, array $data): Company;

    public function delete(Company $company): void;





}
