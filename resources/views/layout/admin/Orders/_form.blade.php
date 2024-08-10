<div class="form-group">
    <x-form.select name="user" label="user" :options="$user->pluck('name', 'id')" :selected="old('user_id')" />
</div>
<div class="form-group">
    <x-form.select name="restaurant_id" label="Restaurant Name" :options="$restaurant->pluck('name', 'id')" :selected="old('restaurant_id')" />
</div>
{{-- <div class="form-group">
    <x-form.select name="order_id" label="order_id" :options="$orderitem->pluck('name', 'id')" :selected="old('order_id')" />
</div> --}}

<div class="form-group">
    <x-form.input name="price" :value="$order->price" type="text" class="form-control-lg" label="price" />
</div>

<div class="form-group">
    <x-form.select name="status" label="Status" :options="[
        'pending' => 'Pending',
        'completed' => 'Completed',
        'cancelled' => 'Cancelled',
    ]" :selected="old('status', $order->status)" />

</div>



<div class="form-group">
    <button type="submit" class="btn btn-primary ">{{ $button_label ?? 'Save' }}</button>
</div>
