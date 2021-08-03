<div v-if="item.links" class="float-right">
    <a v-if="item.links.show" :href="item.links.show">
        <button type="button" class="btn btn-primary">
            <i class="fa fa-search"></i>
            @lang('links._show')
        </button>
    </a>

    <a v-if="item.links.edit" :href="item.links.edit">
        <button type="button" class="btn btn-warning">
            <i class="fa fa-pencil"></i>
            @lang('links._edit')
        </button>
    </a>

    <delete-button class="d-inline" :link="item.links.destroy" @deleted="fetchData()">
        <confirmable
            class="d-inline"
            slot-scope="{handleDelete}"
            title="{{$confirmDeleteTitle ?? 'Excluir registro'}}"
            message="{{$confirmDeleteMessage ?? 'Tem certeza que deseja apagar este registro?'}}">
            <a v-if="item.links.destroy"
               slot-scope="{confirm}"
               @click="confirm($event, handleDelete)">
                <button type="button" class="btn btn-danger">
                    <i class="fa fa-plus"></i>
                    @lang('links._destroy')
                </button>
            </a>
        </confirmable>
    </delete-button>
    @yield('button-actions')
</div>
