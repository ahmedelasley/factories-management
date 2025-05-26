<x-slides.slide :value="__('Supplier Management')"/>
<x-slides.slide-menu :value="__('Supplier Management')">
    <x-slides.slide-item :value="__('Suppliers')" :route="route('suppliers.index')" />
    <x-slides.slide-item :value="__('Companies')" :route="route('companies.index')" />
    {{-- <x-slides.slide-item :value="__(key: 'Attributes')" :route="route('attributes.index')" />
    <x-slides.slide-item :value="__(key: 'Values')" :route="route('values.index')" />
    <x-slides.slide-item :value="__(key: 'Attachments')" :route="route('attachments.index')" /> --}}
</x-slides.slide-menu>
