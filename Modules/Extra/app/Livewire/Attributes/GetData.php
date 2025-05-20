<?php

namespace Modules\Extra\Livewire\Attributes;

use Livewire\Component;
use Livewire\WithPagination;
use Modules\Extra\Interfaces\AttributeServiceInterface;

class GetData extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public string $search = '';
    public string $searchField = 'attribute';
    public string $sortField = 'created_at';
    public string $sortDirection = 'desc';
    public int $paginate = 10;

    // /** @var AttributeServiceInterface */
    public $service;

    protected $listeners = [
        'refreshData' => 'refreshComponent',
        'editAttribute' => '$refresh',

    ];

    protected function queryString(): array
    {
        return [
            'search' => ['except' => '', 'as' => 'q'],
            'page'   => ['except' => 1],
        ];
    }

    // public function mount(AttributeServiceInterface $service)
    // {
    //     $this->service = $service;
    // }

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
        $this->searchField = 'attribute';
    }

    public function render(AttributeServiceInterface $service)
    {
        // $this->service = $service;
        $filters = [
            // 'search'        => $this->search,
            // 'sortField'     => $this->sortField,
            // 'sortDirection' => $this->sortDirection,
            // 'paginate'      => $this->paginate,
        ];

        $data = $service->getAll($filters)
        ->where($this->searchField, 'like', '%' . $this->search . '%')
        ->orderBy($this->sortField, $this->sortDirection)
        ->latest()->paginate($this->paginate);
        // if ($this->field == 'kitchen') {
        //     $data = $data->whereHas('kitchen', function ($query) { $query->where('name', 'like', '%' . $this->search . '%'); });
        // } else if ($this->field == 'warehouse') {
        //     $data = $data->whereHas('warehouse', function ($query) { $query->where('name', 'like', '%' . $this->search . '%'); });
        // } else {
        //     $data = $data->where($this->field, 'like', '%' . $this->search . '%');
        // }

        //  $data = $data->latest()->paginate($this->paginate);


        return view('extra::livewire.attributes.get-data', [
            'data' => $data,
        ]);
    }
}
