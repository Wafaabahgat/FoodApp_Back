
<div class="form-group">
    <x-form.select name="order_id" label="order_id" :options="$orderitem->pluck('name', 'id')" :selected="old('order_id')" />
</div> 

<div class="form-group">
    <x-form.input name="price" :value="$orderI->price" type="text" class="form-control-lg" label="price" />
</div>

<div class="form-group">
    <x-form.input name="quantity" :value="$orderI->quantity" type="text" class="form-control-lg" label="quantity" />
</div>

{{-- <div class="form-group">
    <x-form.select name="status" label="Status" :options="[
        'pending' => 'Pending',
        'completed' => 'Completed',
        'cancelled' => 'Cancelled',
    ]" :selected="old('status', $order->status)" />

</div> --}}



<div class="form-group">
    <button type="submit" class="btn btn-primary ">{{ $button_label ?? 'Save' }}</button>
</div>
