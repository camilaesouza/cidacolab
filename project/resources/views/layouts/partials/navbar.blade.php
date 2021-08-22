@if(Auth::user()->type === \App\Enums\UserType::ADMIN)
    <li class="nav-item">
        <a class="nav-link" href="{{route('users.index')}}">@lang('headings._users')</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{route('complaints.index')}}">@lang('headings.complaints.index')</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{route('complaints.map')}}">@lang('headings.complaints.map')</a>
    </li>
    <li class="nav-item dropdown">
        <a href="#" class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            {{ Auth::user()->name }}
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
            <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                @lang('headings.common.logout')
            </a>
            <a href="{{ route('users.show', current_user()->id) }}" class="dropdown-item">
                @lang('headings.common.profile')
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
    </li>
@else
    <li class="nav-item">
        <a class="nav-link" href="{{route('complaints.index')}}">@lang('headings.complaints.index')</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{route('complaints.map')}}">@lang('headings.complaints.map')</a>
    </li>
    <li class="nav-item dropdown">
        <a href="#" class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            {{ Auth::user()->name }}
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
            <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                @lang('headings.common.logout')
            </a>
            <a href="{{ route('users.show', current_user()->id) }}" class="dropdown-item">
                @lang('headings.common.profile')
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
    </li>
@endif
