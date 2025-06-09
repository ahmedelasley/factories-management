@include('employees::livewire.employees.partials.components.confirmation-notification', [
    'idModal' => 'forceDeleteModal',
    'modalTitle' => __('Force Delete', ['type' => __('Employee')] ) ,
    'question' => __('Are you sure you want to Force Delete ?', [ 'type' => __('Employee') ] ),
    'description' =>  __('Once you delete this item, there is no going back. Please be certain.'),
    'buttonText' => __('Yes' )
])
