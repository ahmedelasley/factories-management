@include('employees::livewire.employees.partials.components.form-fields', [
    'idModal' => 'editModal',
    'modalTitle' => __('Edit', ['type' => __('Employee')] ) ,
    'buttonText' => __('Update' )
])
