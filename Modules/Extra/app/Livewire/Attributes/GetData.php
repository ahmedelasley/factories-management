<?php

namespace Modules\Extra\Livewire\Attributes;

use Livewire\Component;
use Livewire\WithPagination;
use Modules\Extra\Interfaces\AttributeServiceInterface;
use Illuminate\Support\Facades\Cache;

class GetData extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public string $search = '';
    public string $sortField = 'created_at';
    public string $sortDirection = 'desc';
    public int $perPage = 10;

    protected $listeners = [
        'refreshData' => 'refresh',
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
    }

    public function sortBy(string $field): void
    {
        $this->sortDirection = $this->sortField === $field
            ? ($this->sortDirection === 'asc' ? 'desc' : 'asc')
            : 'asc';

        $this->sortField = $field;
        $this->resetPage();
    }

    public function refreshWithEvent(): void
    {
        $this->resetPage();
        $this->dispatch('reinit-datatable');
    }

    protected function getData(AttributeServiceInterface $service)
    {
        // $cacheKey = 'attributes:' . md5(json_encode([
        //     'search'        => $this->search,
        //     'sortField'     => $this->sortField,
        //     'sortDirection' => $this->sortDirection,
        //     'perPage'       => $this->perPage,
        // ]));

        return Cache::remember("attrbites", now()->addMinutes(5), function () use ($service) {            return $service->paginateWithFilters([
                'search'        => $this->search,
                'sortField'     => $this->sortField,
                'sortDirection' => $this->sortDirection,
                'perPage'       => $this->perPage,
            ]);
        });

    }

    public function render(AttributeServiceInterface $service)
    {
        return view('extra::livewire.attributes.get-data', [
            'data' => $this->getData($service),
        ]);
    }
}
