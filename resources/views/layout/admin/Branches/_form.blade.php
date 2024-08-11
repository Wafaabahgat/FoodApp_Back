
<div class="form-group">
    <x-form.select name="restaurant_id" label="Restaurant Name" :options="$restaurant->pluck('name', 'id')" :selected="old('restaurant_id')" />
</div>

<div class="form-group">
    <x-form.select name="country_id" label="Country Name" :options="$country->pluck('name', 'id')" :selected="old('country_id')" />
</div>

<div class="form-group">
    <x-form.input name="name" :value="$branches->name" type="text" class="form-control-lg" label="Branches Name" />
</div>

<div class="form-group">
    <x-form.input name="city" :value="$branches->city" type="text" class="form-control-lg" label="City" />
</div>

<div class="form-group">
    <x-form.input name="address" :value="$branches->address" type="text" class="form-control-lg" label="Address" />
</div>

<div class="form-group">
    <x-form.input name="phone" :value="$branches->phone" type="text" class="form-control-lg" label="Phone" />
</div>


<div class="form-group">
    <button type="submit" class="btn btn-primary ">{{ $button_label ?? 'Save' }}</button>
</div>
