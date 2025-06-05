<x-slides.slide-category :value="__(key: 'Extras')" />
<x-slides.slide-menu :value="__(key: 'Extras')">
    <x-slides.slide-item :value="__(key: 'Categories')" :route="route('categories.index')" />
    <x-slides.slide-item :value="__(key: 'Attributes')" :route="route('attributes.index')" />
    <x-slides.slide-item :value="__(key: 'Values')" :route="route('values.index')" />
    <x-slides.slide-item :value="__(key: 'Attachments')" :route="route('attachments.index')" />
</x-slides.slide-menu>
