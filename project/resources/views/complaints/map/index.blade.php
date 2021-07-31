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
    <div class="flex-center position-ref full-height">
        <div class="content">
            <h2>Denúncias</h2>

            <div class="map" id="app">
                <gmap-map
                        :center="{lat:10, lng:10}"
                        :zoom="7"
                        map-type-id="terrain"
                        style="width: 100%; height: 500px"
                >
                </gmap-map>
            </div>
        </div>
    </div>
@endsection
