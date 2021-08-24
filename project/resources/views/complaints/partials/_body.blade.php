<td>@{{ item.name }}</td>
<td>@{{ item.description }}</td>
<td>
    <span v-if="item.is_solved">
        <i class="fa fa-check text-success mr-2"></i>
        Sim
    </span>
    <span v-else>
        <i class="fa fa-plus text-danger mr-2"></i>
        Não
    </span>
</td>
<td>@{{ item.created_at }}</td>
<td>@include('shared.partials._buttons_actions')</td>
