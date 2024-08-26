<div class="form-group">
    <x-form.input name="name" :value="$carusels->name" type="text" class="form-control-lg" label="Carusels Name" />
</div>

<div class="form-group">
    <x-form.input name="image" type="file" class="form-control-lg" label="Image" />
    @if ($carusels->image)
        <div class="mt-2">
            <img src="{{ asset('storage/' . $carusels->image) }}" alt="carusels Image" width="200">
        </div>
    @endif
</div>

<div class="form-group">
    <button type="submit" class="btn btn-primary ">{{ $button_label ?? 'Save' }}</button>
</div>
