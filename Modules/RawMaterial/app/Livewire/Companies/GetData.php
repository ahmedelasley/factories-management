<?php

namespace Modules\Supplier\Livewire\Companies;

use Livewire\Component;
use Livewire\WithPagination;
use Modules\Supplier\Interfaces\CompanyServiceInterface;

class GetData extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public string $search = '';
    public string $searchField = 'name';
    public string $sortField = 'created_at';
    public string $sortDirection = 'desc';
    public int $paginate = 10;
    public int $page = 1;


    protected $listeners = [
        'refreshData' => 'refreshComponent',
        'show_company' => '$refresh',
        'edit_company' => '$refresh',
        'toggle_status_company' => '$refresh',
        'detach_company' => '$refresh',

    ];

    protected function queryString(): array
    {
        return [
            'search' => ['except' => '', 'as' => 'q'],
            'page'   => ['except' => 1],
        ];
    }

    public function updatingSearch(): void
    {
        $this->resetPage();
        $this->search = '';
    }

    public function updatingPaginate(): void
    {
        $this->resetPage();
    }

    public function searchFilter(string $field): void
    {
        $this->searchField = $field;
        $this->resetPage();
    }

    public function sortBy(string $field ): void
    {
        if ($this->sortField == 'supplier') {
            $this->sortField = 'supplier_id';
        } else {
            $this->sortField = !$field ? 'created_at' : $field;
        }
        // $this->sortField = !$field ? 'created_at' : $field;
        $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';

        $this->resetPage();
    }

    /**
     * Refresh the component and reset pagination.
     */
    public function selectPaginate(int $count = 10): void
    {
        $this->paginate = $count;
        $this->resetPage();
    }

    public function refreshComponent(): void
    {
        $this->resetPage();
        $this->dispatch('reinit-datatable');
    }

    // resetSearch
    public function resetSearch(): void
    {
        $this->search = '';
        $this->resetPage();
        $this->searchField = 'name';
    }

    public function render(CompanyServiceInterface $service)
    {
        $filters = [
            'search'        => $this->search,
            'searchField'   => $this->searchField,
            'sortField'     => $this->sortField,
            'sortDirection' => $this->sortDirection,
            'perPage'       => $this->paginate,
        ];
        $data = $service->getAll($filters);


        return view('supplier::livewire.companies.get-data', [
            'data' => $data,
        ]);
    }
}
