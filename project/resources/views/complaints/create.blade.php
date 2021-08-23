@extends('layouts.app')

@section('breadcrumb')
<breadcrumb header="@lang('headings.complaints.create')">
    <breadcrumb-item href="{{ route('home') }}">
        @lang('headings.complaints.index')
    </breadcrumb-item>

    <breadcrumb-item active>
        @lang('headings.complaints.create')
    </breadcrumb-item>
</breadcrumb>
@endsection

@section('content')
<div class="card shadow-lg">
    <div class="card-body">
        <h3 class="mb-4">@lang('headings.complaints.create')</h3>

        <form class="form-horizontal" method="POST" action="{{ route('complaints.store') }}" enctype="multipart/form-data">
            @include('complaints.partials._form')
            <button class="btn btn-primary" type="submit">@lang('links._create')</button>
        </form>
    </div>
</div>
@endsection
