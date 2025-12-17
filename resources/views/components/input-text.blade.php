@props(['name', 'label' => null, 'value' => '', 'type' => 'text'])

@php
    $labelText = $label ?? ucfirst(str_replace('_', ' ', $name));
@endphp

<div class="mb-5">
    <x-label labelName="{{$labelText}}" colorText="'text-gray-900'" for="{{$name}}" />
    {{-- <input type="text" id="{{$nomeInput}}" name="{{$nomeInput}}" value="{{ old($nomeInput) }}"
        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"> --}}

    <input {{
        $attributes->merge([
            'type' => $type,
            'id' => $name,
            'name' => $name,
            'value' => old($name, $value),
            'class' => 'shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500
            focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white
            dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light'
        ])
    }}>
</div>
