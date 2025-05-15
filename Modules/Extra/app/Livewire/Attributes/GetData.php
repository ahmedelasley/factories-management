<?php

namespace Modules\Extra\Livewire\Attributes;

use Livewire\Component;
use Modules\Extra\Interfaces\AttributeServiceInterface;
use Livewire\WithPagination;

class GetData extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public string $search = '';
    public string $sortField = 'created_at';
    public string $sortDirection = 'desc';

    protected $listeners = [
        'refreshData' => 'refreshWithEvent',
    ];
    protected function queryString()
    {
        return [
            'search' => [
                'except' => '',
                'as' => 'q',
            ],
            'paginate' => [
                'except' => 1,
            ],
        ];
    }

    
    public function refreshWithEvent()
    {
        $this->resetPage(); // لإعادة تحميل الصفحة الأولى بعد أي تعديل
        $this->dispatch('reinit-datatable'); // يعيد تهيئة الجدول
    }
    
    public function render(AttributeServiceInterface $service)
    {
        $data = $service->paginateWithFilters([
            'search' => $this->search,
            'sortField' => $this->sortField,
            'sortDirection' => $this->sortDirection,
            'perPage' => 10, // يمكنك تغيير عدد العناصر في الصفحة حسب الحاجة
        ]);
        return view('extra::livewire.attributes.get-data', [
            'data' => $data
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
