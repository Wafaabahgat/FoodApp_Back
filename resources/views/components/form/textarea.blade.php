@props(['name', 'value' => ''])


<textarea name="{{ $name }}" class="form-control">{{ old($name, $value) }}</textarea>
@error($name)
    <div class="invalid-feedback">{{ $message }}</div>
@enderror
