@csrf

<div class="form-group">
  <label for="userName">@lang('headings.common.name')</label>
  <input type="name" name="name" class="form-control {{ with_error('name', 'has-danger') }}" id="userName" placeholder="@lang('headings.common.name')" value="{{old('name') ?? $user->name ?? ''}}">
  @errorblock('name')
</div>

<div class="form-group">
  <label for="userEmail">@lang('headings.common.email')</label>
  <input type="email" name="email" class="form-control {{ with_error('name', 'has-danger') }}" id="userEmail" placeholder="@lang('headings.common.email')" value="{{old('email') ?? $user->email ?? ''}}">
  @errorblock('email')
</div>

<div class="form-group">
  <label for="userPassword">@lang('headings.common.password')</label>
  <input type="password" name="password" class="form-control {{ with_error('name', 'has-danger') }}" id="userPassword" placeholder="@lang('headings.common.password')">
  @errorblock('password')
</div>

<div class="form-group">
  <label for="confirmPassword">@lang('headings.common.confirm_password')</label>
  <input type="password" name="password_confirmation" class="form-control" id="confirmPassword" placeholder="@lang('headings.common.confirm_password')">
</div>
