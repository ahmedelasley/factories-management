<?php


namespace Modules\Employees\Livewire\Employees;

use Livewire\Component;
use Livewire\WithPagination;
use Modules\Employees\Models\Employee;
use Modules\Employees\Interfaces\EmployeeServiceInterface;

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
    public bool $trashed = false;


    protected EmployeeServiceInterface $employeeService;

    public function boot(EmployeeServiceInterface $employeeService): void
    {
        $this->employeeService = $employeeService;
    }
        protected $listeners = [
        'refreshData' => 'refreshComponent',
        'show_employee' => '$refresh',
        'edit_employee' => '$refresh',
        // 'toggle_status_employee' => '$refresh',
        'detach_employee' => '$refresh',

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
        $this->sortField = !$field ? 'created_at' : $field;
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

    public function resetSearch(): void
    {
        $this->search = '';
        $this->resetPage();
        $this->searchField = 'name';
    }


    public function selectTab(bool $trashed = false): void
    {
        $this->trashed = $trashed;
        $this->resetSearch();
    }

    public function render()
    {
        $filters = [];

        $query = $this->employeeService->getAll($filters);

        if ($this->trashed) {
            $query->onlyTrashed();
        } else {
            $query->whereNull('deleted_at');
        }
        $data = $query
        ->where($this->searchField, 'like', '%' . $this->search . '%')
        ->orderBy($this->sortField, $this->sortDirection)
        ->latest()->paginate($this->paginate);

        // $dataArchive = $this->employeeService->getAll($filters)->onlyTrashed()
        // ->where($this->searchField, 'like', '%' . $this->search . '%')
        // ->orderBy($this->sortField, $this->sortDirection)
        // ->latest()->paginate($this->paginate);

        return view('employees::livewire.employees.get-data', compact(['data']));
    }
}
