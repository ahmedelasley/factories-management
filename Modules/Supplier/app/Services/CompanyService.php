<?php
namespace Modules\Supplier\Services;
use Modules\Supplier\Interfaces\CompanyServiceInterface;
use Modules\Supplier\Models\Company;


class CompanyService implements CompanyServiceInterface
{

    public function getAll(array $filters = [])
    {
        return Company::with(['creator', 'editor', 'supplier'])
            ->withCount('supplier');
    }

    public function create(array $data): Company
    {
        return Company::create($data);
    }

    public function update(Company $company, array $data): Company
    {
        $company->update($data);
        return $company;
    }

    public function delete(Company $company): void
    {
        $company->delete();
    }

}
