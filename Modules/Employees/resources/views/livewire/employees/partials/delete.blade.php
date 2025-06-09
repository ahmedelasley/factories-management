@include('employees::livewire.employees.partials.components.confirmation-notification', [
    'idModal' => 'deleteModal',
    'modalTitle' => __('Soft Delete', ['type' => __('Employee')] ) ,
    'question' => __('Are you sure you want to Soft Delete ?', [ 'type' => __('Employee') ] ),
    // 'description' =>  __('Once you delete this item, there is no going back. Please be certain.'),
    'buttonText' => __('Yes' )
])
