<div class="form-group">
    <x-form.input name="name" :value="$restaurant->name" type="text" class="form-control-lg" label="Restaurants Name" />
</div>

<div class="form-group">
    <x-form.input name="slug" :value="$restaurant->slug" type="text" class="form-control-lg" label="Slug" />
</div>

<div class="form-group">
    <x-form.input name="description" :value="$restaurant->description" type="text" class="form-control-lg" label="Description" />
</div>

<div class="form-group">
    <x-form.input name="address" :value="$restaurant->address" type="text" class="form-control-lg" label="Address" />

</div>

<div class="form-group">
    <x-form.input name="phone" :value="$restaurant->phone" type="text" class="form-control-lg" label="Phone" />

</div>
<div class="form-group">
    <x-form.input name="email" :value="$restaurant->email" type="email" class="form-control-lg" label="Email" />

</div>



<div class="form-group">
    <x-form.input name="image" type="file" class="form-control-lg" label="Image" />
    @if ($restaurant->image)
        <div class="mt-2">
            <img src="{{ asset('storage/' . $restaurant->image) }}" alt="Restaurant Image" width="200">
        </div>
    @endif
</div>


<div class="form-group">
    <button type="submit" class="btn btn-primary ">{{ $button_label ?? 'Save' }}</button>
</div>
