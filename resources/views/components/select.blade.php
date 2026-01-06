@props(['name', 'label' => null, 'value' => '', 'type' => 'text', 'list' => [], 'itemValue' => 'name', 'itemLabel' =>
'value'])

@php
$labelText = $label ?? ucfirst(str_replace('_', ' ', $name));
$selectedValue = old($name, $value);
@endphp

<div class="mb-5">
    <x-label labelName="{{$labelText}}" colorText="'text-gray-900'" for="{{$name}}" />
    <select {{ $attributes->merge([
        'id' => $name,
        'name' => $name,
        'class' => 'shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500
        focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400
        dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light'
        ])
        }}>
        <option value="">Selecione...</option>
        @foreach ($list as $item)
        <option value="{{ $item->$itemValue }}" @selected($item->$itemValue == $selectedValue)>
            {{ $item->$itemLabel }}
        </option>
        @endforeach
    </select>
</div>
