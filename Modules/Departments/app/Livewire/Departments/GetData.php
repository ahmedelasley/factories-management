<?php

namespace Modules\Departments\Livewire\Departments;

use Livewire\Component;
use Modules\Departments\Models\Department;

class GetData extends Component
{
    public function render()
    {

        $departments = Department::whereNull('parent_id')->withTrashed()

        ->with('childrenWithTrashed')->get();
        return view('departments::livewire.departments.get-data', compact('departments'));


    }
}
