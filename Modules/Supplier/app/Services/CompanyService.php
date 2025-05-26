<?php
namespace Modules\Supplier\Services;
use Modules\Supplier\Interfaces\CompanyServiceInterface;
use Modules\Supplier\Models\Company;


class CompanyService implements CompanyServiceInterface
{

    public function getAll(array $filters = [])
    {
        // return Company::with(['creator', 'editor', 'supplier'])
            // ->withCount('supplier');

        $query = Company::with('supplier');

            if (!empty($filters['search'])) {
                if ($filters['searchField'] === 'supplier') {
                    $query->whereHas('supplier', function ($q) use ($filters) {
                        $q->where('name', 'like', '%' . $filters['search'] . '%');
                    });
                } else {
                    $query->where($filters['searchField'], 'like', '%' . $filters['search'] . '%');
                }
            }

            if (!empty($filters['sortField']) && $filters['sortField'] === 'supplier') {
                $query->join('suppliers', 'suppliers.id', '=', 'companies.supplier_id')
                    ->orderBy('suppliers.name', $filters['sortDirection'] ?? 'asc');
            } else {
                $query->orderBy($filters['sortField'] ?? 'created_at', $filters['sortDirection'] ?? 'desc');
            }

            return $query->paginate($filters['perPage'] ?? 10);
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
