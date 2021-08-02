<div class="row">
    <div class="col">
        <div class="form-group {{ has_error('brand.name') }}">
            <label class="form-control-label" for="brandName">
                @lang('labels.common.name') *
            </label>
            <input type="text"
                name="brand[name]"
                class="form-control {{ has_error_class('brand.name') }}"
                id="brandName"
                value="{{ old('brand.name') ?? $brand->name ?? '' }}">
            @errorblock('brand.name')
        </div>
    </div>
</div>
