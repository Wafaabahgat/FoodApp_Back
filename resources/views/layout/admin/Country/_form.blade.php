<div class="form-group">
    <x-form.input name="name" :value="$country->name" type="text" class="form-control-lg" label="Country Name" />
</div>
<div class="form-group">
    <x-form.input name="code" :value="$country->code" type="text" class="form-control-lg" label="code" />
</div>


<div class="form-group">
    <button type="submit" class="btn btn-primary ">{{ $button_label ?? 'Save' }}</button>
</div>
