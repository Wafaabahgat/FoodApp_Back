@props(['name' => '', 'options' => [], 'label' => false, 'selected' => ''])

@if ($label)
    <label for="">{{ $label }}</label>
@endif

{{-- @dd($options) --}}
<select name="{{ $name }}"
    {{ $attributes->class(['form-control', 'form-select', 'is-invalid' => $errors->has($name)]) }}>
    @foreach ($options as $value => $text)
        <option value="{{ $value }}" @selected($value == $selected)>{{ $text }}</option>
    @endforeach
</select>

{{-- <x-form.validation-feedback :name="$name" /> --}}
