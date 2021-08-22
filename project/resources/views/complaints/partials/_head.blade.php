<th sortable @click="orderBy('name', $event)">@lang('headings.common.name')</th>
<th sortable @click="orderBy('description', $event)">@lang('headings.common.description')</th>
<th sortable @click="orderBy('is_solved', $event)">@lang('headings.common.is_solved')?</th>
<th sortable @click="orderBy('created_at', $event)">@lang('headings.common.created_at')</th>
<th></th>
