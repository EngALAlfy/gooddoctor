<li class="nav-item dropdown user-menu">
    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
        <img src="{{ asset('storage/photos/users')."/" . auth()->user()->photo }}"
             onerror="this.src='{{ asset('assets/img/user.png') }}'" alt="{{ auth()->user()->name }}" class="user-image img-circle elevation-2" >
        <span class="d-none d-md-inline">{{auth()->user()->name}}</span>
    </a>
    <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <!-- User image -->
        <li class="user-header bg-primary">
            <img  class="img-circle elevation-2" src="{{ asset('storage/photos/users')."/" . auth()->user()->photo }}"
                  onerror="this.src='{{ asset('assets/img/user.png') }}'" alt="{{ auth()->user()->name }}">

            <p>
                {{auth()->user()->name}}
                <small>{{auth()->user()->email}}</small>
            </p>
        </li>
        <!-- Menu Footer-->
        <li class="user-footer">
            <a href="{{route('profile')}}" class="btn btn-default btn-flat">@lang('all.profile')</a>
            <a href="{{route('logout')}}" class="btn btn-default btn-flat float-left">@lang('all.sign_out')</a>
        </li>
    </ul>
</li>
