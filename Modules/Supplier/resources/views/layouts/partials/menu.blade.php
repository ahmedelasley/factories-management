<x-slides.slide-category :value="__(key: 'Suppliers Management')" />
<x-slides.slide-menu :value="__('Supplier')">
    <x-slides.slide-item :value="__('Suppliers')" :route="route('suppliers.index')" />
    <x-slides.slide-item :value="__('Companies')" :route="route('companies.index')" />
</x-slides.slide-menu>
