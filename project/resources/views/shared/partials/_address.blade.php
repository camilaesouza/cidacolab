<address-component
    :errors-bag="{{ $errors }}"
    :old='{{ json_encode(old()) }}'
    :edit = '{!! $edit ?? 'false' !!}'
    :is-registering={{ $registering ?? 'true' }}
    @if (isset($prefix))
        prefix={{ $prefix }}
    @endif
>
</address-component>
