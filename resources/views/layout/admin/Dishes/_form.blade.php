<div class="form-group">
    <x-form.input name="name" :value="$dish->name" type="text" class="form-control-lg" label="Dish Name" />
</div>

<div class="form-group">
    <x-form.select name="restaurant_id" label="Restaurant Name" :options="$restaurant->pluck('name', 'id')" :selected="old('restaurant_id')" />
</div>

<div class="form-group">
    <x-form.select name="category_id" label="Category Name" :options="$category->pluck('name', 'id')" :selected="old('category_id')" />
</div>

<div class="form-group">
    <x-form.input name="description" :value="$dish->description" type="text" class="form-control-lg" label="Description" />

</div>

<div class="form-group">
    <x-form.input name="price" :value="$dish->price" type="text" class="form-control-lg" label="Price" />

</div>


<div class="form-group">
    <button type="submit" class="btn btn-primary ">{{ $button_label ?? 'Save' }}</button>
</div>

</div>
