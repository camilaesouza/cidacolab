@extends('layouts.app')

@section('breadcrumb')
<breadcrumb header="Editar usuário">
    <breadcrumb-item href="{{ route('home') }}">
        @lang('headings._home')
    </breadcrumb-item>

    <breadcrumb-item href="{{ route('users.index') }}">
        @lang('headings.users.index')
    </breadcrumb-item>

    <breadcrumb-item active>
        @lang('headings.users.edit')
    </breadcrumb-item>
</breadcrumb>
@endsection

@section('content')
<div class="card shadow-lg">
    <div class="card-body">
        <h3 class="mb-4">@lang('headings.users.edit')</h3>

        <form class="form-horizontal" method="POST" action="{{ route('users.update', $user->id) }}">
            @method('PUT')
            @include('users.partials._form')
            <button class="btn btn-primary" type="submit">@lang('links._update')</button>
        </form>
    </div>
</div>
@endsection
