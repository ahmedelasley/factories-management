<?php

namespace Modules\Extra\Livewire\Attributes;

use Livewire\Component;
use Modules\Extra\Interfaces\AttributeServiceInterface;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public string $search = '';
    public string $sortField = 'created_at';
    public string $sortDirection = 'desc';


    
    public function render(AttributeServiceInterface $service)
    {
        $attributes = $service->paginateWithFilters([
            'search' => $this->search,
            'sortField' => $this->sortField,
            'sortDirection' => $this->sortDirection,
            'perPage' => 10
        ]);
        return view('extra::livewire.attributes.index', [
            'attributes' => $attributes
        ]);
    }

    
    public function updatingSearch() { $this->resetPage(); }

    public function sortBy(string $field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortField = $field;
            $this->sortDirection = 'asc';
        }
    }

}
