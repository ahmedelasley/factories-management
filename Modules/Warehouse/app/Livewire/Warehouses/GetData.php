<?php

namespace Modules\Warehouse\Livewire\Warehouses;

use Livewire\Component;
use Livewire\WithPagination;
use Modules\Warehouse\Interfaces\WarehouseServiceInterface;

class GetData extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public string $search        = '';
    public string $searchField   = 'name';
    public string $sortField     = 'created_at';
    public string $sortDirection = 'desc';
    public int $paginate         = 10;
    public int $page             = 1;


    protected $listeners = [
        'refreshData'             => 'refreshComponent',
        'show_warehouse'          => '$refresh',
        'edit_warehouse'          => '$refresh',
        'toggle_status_warehouse' => '$refresh',
        'detach_warehouse'        => '$refresh',

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
        $this->sortField     = !$field ? 'created_at' : $field;
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

    public function render(WarehouseServiceInterface $service)
    {
        $filters = [];

        $data = $service->getAll($filters)
        ->where($this->searchField, 'like', '%' . $this->search . '%')
        ->orderBy($this->sortField, $this->sortDirection)
        ->latest()->paginate($this->paginate);

        return view('warehouse::livewire.warehouses.get-data', [
            'data' => $data,
        ]);
    }
}
