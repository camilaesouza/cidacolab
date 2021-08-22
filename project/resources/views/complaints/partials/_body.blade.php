<td>@{{ item.name }}</td>
<td>@{{ item.description }}</td>
<td>
    <i v-if="item.is_solved" class="fa fa-check text-success mr-2"></i> Sim
    <i v-else class="fa fa-plus text-danger mr-2"></i> Não
</td>
<td>@{{ item.created_at }}</td>
<td>@include('shared.partials._buttons_actions')</td>
