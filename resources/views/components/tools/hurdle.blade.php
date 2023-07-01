@props([
    'statePath' => null,
    'icon' => 'link',
    'label' => __('filament-tiptap-editor::editor.bolt.insert_edit'),
    'active' => true,
])

@php
    $useActive = $active ? 'link' : false;
@endphp

<x-filament-tiptap-editor::button
    action="openModal()"
    :active="$useActive"
    :label="$label"
    :icon="$icon"
    data-bolt-button
    x-data="{
        openModal() {
            let link = this.editor().getAttributes('link');
            let linkProps = {
                href: link.href || '',
                target: link.target || null,
                hreflang: link.hreflang || null,
                rel: link.rel ? link.rel.split(' ') : null,
                as_button: link.as_button || null,
                button_theme: link.button_theme || '',
            };

            $wire.dispatchFormEvent('tiptap::setBoltContent', '{{ $statePath }}', linkProps);
        }
    }"
/>

{{--<x-filament-tiptap-editor::dropdown-button
    label="Hurdle"
    active="'hurdle'"
    icon="hurdle"
>
    @foreach($colors as $key => $label)
        <x-filament-tiptap-editor::dropdown-button-item
            action="editor().chain().focus().setHurdle({ color: '{{ $key }}' }).run()"
        >
            {{ $label }}
        </x-filament-tiptap-editor::dropdown-button-item>
    @endforeach
</x-filament-tiptap-editor::dropdown-button>--}}
