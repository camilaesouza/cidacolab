@extends('layouts.app')

@section('breadcrumb')
    <breadcrumb header="Visualizar usuário">
        <breadcrumb-item href="{{ route('home') }}">
            @lang('headings._home')
        </breadcrumb-item>

        <breadcrumb-item href="{{ route('users.index') }}">
            @lang('headings.users.index')
        </breadcrumb-item>

        <breadcrumb-item active>
            @lang('headings.users.show')
        </breadcrumb-item>
    </breadcrumb>
@endsection

@section('content')
    <div class="card shadow-lg">
        <div class="card-body" style="font-size: 18px">
            <img class="float-right mr-3" width="150"
                 src="https://image.flaticon.com/icons/png/512/236/236842.png" alt="">

            <h3 class="mb-4">@lang('headings.users.show')</h3>

            <dt>Nome:</dt>
            <dd>{{$user->name}}</dd>
            <dt>Email:</dt>
            <dd>{{$user->email}}</dd>

            <div class="mt-3">
                <a type="button" class="btn btn-warning" href="{{route('users.edit', $user->id)}}">
                    <i class="fa fa-pencil"></i>
                    @lang('links._edit')
                </a>

                @if(current_user()->type === \App\Enums\UserType::ADMIN)
                    <delete-button class="d-inline" link="{{route('users.destroy', $user->id)}}">
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
                @endif
            </div>
        </div>
    </div>
@endsection
