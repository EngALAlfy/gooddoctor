<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
        <img src="{{asset('assets/img/logo.png')}}" alt="{{env('app_name')}}" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">GoodDoctor</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('storage/photos/users')."/" . auth()->user()->photo }}"
                      onerror="this.src='{{ asset('assets/img/user.png') }}'" alt="{{ auth()->user()->name }}"  class="img-circle elevation-2">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{auth()->user()->name}}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item">
                    <a href="{{route('home')}}" @class(["nav-link" , "active" => Route::currentRouteName()== 'home'])>
                    <i class="nav-icon fa fa-home"></i>
                    <p class="text">@lang('all.home')</p>
                    </a>
                </li>

                <li @class(["nav-item" , "menu-open" => Str::contains(Route::currentRouteName() , "appointment")])>
                    <a href="#" @class(["nav-link" , "active" => Str::contains(Route::currentRouteName() , "appointment")])>
                        <i class="nav-icon ahi ahi-i_exam_multiple_choice"></i>
                        <p>
                            @lang('all.appointments')
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('appointments.index')}}" @class(["nav-link" , "active" => Route::currentRouteName()== 'appointments.index'])>
                            <i class="nav-icon ahi ahi-i_note_action"></i>
                            <p class="text">@lang('all.all_appointments')
                            <span class="right badge badge-warning">{{$all_appointments_count}}</span></p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('appointments.today')}}" @class(["nav-link" , "active" => Route::currentRouteName()== 'appointments.today'])>
                            <i class="nav-icon ahi ahi-i_documents_accepted"></i>
                            <p class="text">@lang('all.today_appointments')
                            <span class="right badge badge-success">{{$today_appointments_count}}</span>
                            </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('appointments.next')}}" @class(["nav-link" , "active" => Route::currentRouteName()== 'appointments.next'])>
                            <i class="nav-icon ahi ahi-health_data_sync"></i>
                            <p class="text">@lang('all.next_appointments')
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('appointments.yesterday')}}" @class(["nav-link" , "active" => Route::currentRouteName()== 'appointments.yesterday'])>
                            <i class="nav-icon ahi ahi-i_documents_denied"></i>
                            <p class="text">@lang('all.yesterday_appointments')
                                <span class="right badge badge-danger">{{$yesterday_appointments_count}}</span></p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('appointments.exited')}}" @class(["nav-link" , "active" => Route::currentRouteName()== 'appointments.exited'])>
                            <i class="nav-icon ahi ahi-default"></i>
                            <p class="text">@lang('all.exited_appointments')</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('appointment-types.index')}}" @class(["nav-link" , "active" => Route::currentRouteName()== 'appointment-types.index'])>
                            <i class="nav-icon fa fa-sitemap"></i>
                            <p class="text">@lang('all.appointment_types')</p>
                            </a>
                        </li>
                    </ul>
                </li>



                <li class="nav-item">
                    <a href="{{route('patients.index')}}" @class(["nav-link" , "active" => Route::currentRouteName()== 'patients.index'])>
                    <i class="nav-icon ahi ahi-outpatient"></i>
                    <p>@lang('all.patients')
                        <span class="right badge badge-danger">{{$patients_count}}</span>
                    </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('recipes.index')}}" @class(["nav-link" , "active" => Route::currentRouteName()== 'recipes.index'])>
                    <i class="nav-icon ahi ahi-cardiogram_e"></i>
                    <p class="text">@lang('all.recipes')
                        <span class="right badge badge-danger">{{$recipes_count}}</span>
                    </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('diseases.index')}}" @class(["nav-link" , "active" => Route::currentRouteName()== 'diseases.index'])>
                    <i class="nav-icon ahi ahi-virus"></i>
                    <p class="text">@lang('all.diseases')
                        <span class="right badge badge-danger">{{$diseases_count}}</span>
                    </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('drugs.index')}}" @class(["nav-link" , "active" => Route::currentRouteName()== 'drugs.index'])>
                    <i class="nav-icon ahi ahi-medicines"></i>
                    <p class="text">@lang('all.drugs')
                        <span class="right badge badge-danger">{{$drugs_count}}</span>
                    </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('rays.index')}}" @class(["nav-link" , "active" => Route::currentRouteName()== 'rays.index'])>
                    <i class="nav-icon ahi ahi-xray"></i>
                    <p class="text">@lang('all.rays')
                        <span class="right badge badge-danger">{{$rays_count}}</span>
                    </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('tests.index')}}" @class(["nav-link" , "active" => Route::currentRouteName()== 'tests.index'])>
                    <i class="nav-icon ahi ahi-microscope"></i>
                    <p class="text">@lang('all.tests')
                        <span class="right badge badge-danger">{{$tests_count}}</span>
                    </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('instructions.index')}}" @class(["nav-link" , "active" => Route::currentRouteName()== 'instructions.index'])>
                    <i class="nav-icon ahi ahi-health_data_security"></i>
                    <p class="text">@lang('all.instructions')
                        <span class="right badge badge-danger">{{$instructions_count}}</span>
                    </p>
                    </a>
                </li>


                <li class="nav-header">@lang('all.settings')</li>

                <li @class(["nav-item" , "menu-open" => Str::contains(Route::currentRouteName() , "users")])>
                <a href="#" @class(["nav-link" , "active" => Str::contains(Route::currentRouteName() , "users")])>
                <i class="nav-icon fa fa-users"></i>
                <p>
                    @lang('all.users')
                    <i class="right fas fa-angle-left"></i>
                </p>
                </a>
                <ul class="nav nav-treeview">

                    <li class="nav-item">
                        <a href="{{route('users.index')}}" @class(["nav-link" , "active" => Route::currentRouteName()== 'users.index'])>
                        <i class="nav-icon fa fa-users"></i>
                        <p class="text">@lang('all.users')</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{route('users.create')}}" @class(["nav-link" , "active" => Route::currentRouteName()== 'users.create'])>
                        <i class="nav-icon fa fa-plus"></i>
                        <p class="text">@lang('all.add')</p>
                        </a>
                    </li>

                </ul>
                </li>

                <li class="nav-item">
                    <a href="{{route('settings')}}" @class(["nav-link" , "active" => Route::currentRouteName()== 'settings'])>
                    <i class="nav-icon ahi ahi-ui_settings"></i>
                    <p class="text">@lang('all.settings')</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('profile')}}" @class(["nav-link" , "active" => Route::currentRouteName()== 'profile'])>
                    <i class="nav-icon ahi ahi-ui_user_profile"></i>
                    <p class="text">@lang('all.profile')</p>
                    </a>
                </li>


                <li class="nav-item">
                    <a href="{{route('logout')}}" @class(["nav-link" , "active" => Route::currentRouteName()== 'sign_out'])>
                    <i class="nav-icon fa fa-sign-out-alt"></i>
                    <p class="text">@lang('all.sign_out')</p>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
