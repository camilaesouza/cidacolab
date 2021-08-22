@extends('layouts.app')

@section('breadcrumb')
    <breadcrumb header="Usuários">
        <breadcrumb-item href="{{ route('home') }}">
            @lang('headings.complaints.map')
        </breadcrumb-item>

        <breadcrumb-item active>
            @lang('headings.users.index')
        </breadcrumb-item>
    </breadcrumb>
@endsection

@section('content')
    <div class="flex-center position-ref full-height">
        <div class="content">
            <h2>@lang('headings.complaints.map')</h2>

            <div class="map" id="app">
                <gmap-map
                        :center="{lat:{{$complaints->first()->latitude}}, lng:{{$complaints->first()->longitude}}}"
                        :zoom="7"
                        map-type-id="terrain"
                        style="width: 100%; height: 500px"
                >
                    @foreach($complaints as $complaint)
                        <gmap-marker
                                :position="{lat:{{$complaint->latitude}},lng:{{$complaint->longitude}}}"
                                :key="{{ $complaint->id }}"
                                :clickable="true"
                                :draggable="false"
                        >
                        </gmap-marker>
                    @endforeach
                </gmap-map>
            </div>
        </div>
    </div>
@endsection
