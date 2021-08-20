@csrf

<div class="form-group">
  <label for="name">@lang('labels.complaints.name')</label>
  <input type="name" name="name" class="form-control {{ with_error('name', 'has-danger') }}" id="name" placeholder="Nome da denúncia" value="{{old('name') ?? $complaint->name ?? ''}}">
  @errorblock('name')
</div>

<div class="form-group">
  <label for="description">@lang('labels.complaints.description')</label>
  <textarea type="text" name="description" maxlength="500" class="form-control {{ with_error('description', 'has-danger') }}" id="description" placeholder="Descrição" value="{{old('description') ?? $complaint->description ?? ''}}">
  </textarea>
  @errorblock('description')
</div>

@include('shared.partials._address', [
    'registering' => isset($complaint) && $complaint->addresses()->exists() ? 'false' : 'true',
    'prefix' => 'address'
])

<div class="form-group mt-3">
  <input id="attachments" name="attachments[]" type="file" accept=".png, .jpg, .jpeg" multiple>
</div>
