@extends('layouts.app')

@section('breadcrumb')
    <breadcrumb header="Usuários">
        <breadcrumb-item href="{{ route('home') }}">
            @lang('headings._home')
        </breadcrumb-item>

        <breadcrumb-item active>
            @lang('headings.users.index')
        </breadcrumb-item>
    </breadcrumb>
@endsection

@section('content')
    <div class="card shadow-lg">
        <div class="card-body">
        <div class="row mt-3">
            <div class="col-md-12">
                <data-list data-source="{{ route('pagination.complaints') }}">
                    <template #options>
                        <div class="row my-2">
                            <div class="col-9">
                                <filter-text url-key="query"
                                             class="col-12 form-control"
                                             placeholder="Buscar...">
                                </filter-text>
                            </div>

                            <div class="col-3">
                                <a class="btn btn-primary btn-block"
                                   :href="'{{ route('complaints.create') }}'">
                                    <i class="fa fa-search"></i>
                                    Nova denúncia
                                </a>
                            </div>
                        </div>
                    </template>

                    <template #header="{orderBy}">
                        <tr>
                            @include('complaints.partials._head')
                        </tr>
                    </template>

                    <template #body="{fetchData, items}">
                        <tr v-for="(item, index) in items" :key="index">
                            @include('complaints.partials._body')
                        </tr>
                    </template>
                </data-list>
            </div>
        </div>
        </div>
    </div>
@endsection