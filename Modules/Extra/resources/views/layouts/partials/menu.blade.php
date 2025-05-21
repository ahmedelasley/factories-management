<x-slides.slide :value="__(key: 'Extras')"/>
<x-slides.slide-menu :value="__(key: 'Extras')">
    <x-slides.slide-item :value="__(key: 'Categories')" :route="route('extras.index')" />
    <x-slides.slide-item :value="__(key: 'Attributes')" :route="route('attributes.index')" />
    <x-slides.slide-item :value="__(key: 'Values')" :route="route('values.index')" />
    <x-slides.slide-item :value="__(key: 'Attachments')" :route="route('extras.index')" />
</x-slides.slide-menu>
