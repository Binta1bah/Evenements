@props(['id', 'name', 'checked'])

<input type="checkbox" id="{{ $id }}" name="{{ $name }}" {{ $checked ? 'checked' : '' }} {{ $attributes }}>