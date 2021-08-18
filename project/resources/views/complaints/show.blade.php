@extends('layouts.app')

@section('breadcrumb')
    <breadcrumb header="Visualizar usuário">
        <breadcrumb-item href="{{ route('home') }}">
            @lang('headings._home')
        </breadcrumb-item>

        <breadcrumb-item href="{{ route('complaints.index') }}">
            @lang('headings.complaints.index')
        </breadcrumb-item>

        <breadcrumb-item active>
            @lang('headings.complaints.show')
        </breadcrumb-item>
    </breadcrumb>
@endsection

@section('content')
    <div class="card shadow-lg">
        <div class="card-body" style="font-size: 18px">
            <img class="float-right" width="200"
                 src="https://i.pinimg.com/originals/32/af/0a/32af0ab808936dec8e3a22cd5236f79d.jpg" alt="">

            <h3 class="mb-4">@lang('headings.complaints.show')</h3>

            <dt>Nome:</dt>
            <dd>{{$complaint->name}}</dd>

            <dt>Endereço:</dt>
            <dd>{{$complaint->address ? $complaint->address->complete_address : __('labels.not_defined')}}</dd>

            <dt>Descrição:</dt>
            <dd>{{$complaint->description}}</dd>

            <div class="mt-3">
                <delete-button class="d-inline" link="{{route('complaints.destroy', $complaint->id)}}">
                    <confirmable
                            class="d-inline"
                            slot-scope="{handleDelete}"
                            title="{{$confirmDeleteTitle ?? 'Excluir registro'}}"
                            message="{{$confirmDeleteMessage ?? 'Tem certeza que deseja apagar este registro?'}}">
                        <a
                                slot-scope="{confirm}"
                                @click="confirm($event, handleDelete)">
                            <button type="button" class="btn btn-danger">
                                <i class="fa fa-plus"></i>
                                @lang('links._destroy')
                            </button>
                        </a>
                    </confirmable>
                </delete-button>
            </div>
        </div>
    </div>
@endsection
