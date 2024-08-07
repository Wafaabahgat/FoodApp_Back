<div class="form-group">
    <x-form.input name="name" :value="$restaurant->name" type="text" class="form-control-lg" label="Restaurants Name" />
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
    <button type="submit" class="btn btn-primary ">{{ $button_label ?? 'Save' }}</button>
</div>
