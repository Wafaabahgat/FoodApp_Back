<div class="form-group">
    <x-form.input name="name" :value="$category->name" type="text" class="form-control-lg" label="Categories Name" />
</div>


<div class="form-group">
    <button type="submit" class="btn btn-primary ">{{ $button_label ?? 'Save' }}</button>
</div>
