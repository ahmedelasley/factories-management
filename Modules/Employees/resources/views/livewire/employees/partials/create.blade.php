@include('employees::livewire.employees.partials.components.form-fields', [
    'idModal' => 'createModal',
    'modalTitle' => __('Add', ['type' => __('Employee')] ) ,
    'buttonText' => __('Save' )
])
