<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-3">
                <div class="nav flex-column nav-tabs nav-tabs-right h-100" id="settings-tab" role="tablist"
                    aria-orientation="vertical">
                    <a class="nav-link {{ $tab == 'app' ? 'active' : '' }}" wire:click="$set('tab' , 'app')"
                        id="app-tab" data-toggle="pill" href="#app" role="tab"aria-controls="app"
                        aria-selected="true">@lang('all.app_settings')</a>
                    <a class="nav-link {{ $tab == 'clinic' ? 'active' : '' }}" wire:click="$set('tab' , 'clinic')"
                        id="clinic-tab" data-toggle="pill" href="#clinic" role="tab" aria-controls="clinic"
                        aria-selected="false">@lang('all.clinic_settings')</a>
                    <a class="nav-link {{ $tab == 'clinic-info' ? 'active' : '' }}"
                        wire:click="$set('tab' , 'clinic-info')" id="clinic-info-tab" data-toggle="pill"
                        href="#clinic-info" role="tab" aria-controls="clinic-info"
                        aria-selected="false">@lang('all.info')</a>
                    <a class="nav-link "
                        id="recipe-tab" href="{{route('settings.recipe-design')}}">@lang('all.recipe')</a>
                </div>
            </div>

            <div class="col-md-9">
                <div class="tab-content" id="settings-tabs-tabContent">
                    <div class=" tab-pane {{ $tab == 'app' ? 'active' : '' }}" id="app">

                        <div class=" row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" wire:model="fixed_navbar" class="custom-control-input"
                                            id="fixed_navbar">
                                        <label class="custom-control-label" for="fixed_navbar">@lang('all.fixed_navbar')</label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" wire:model="collaps_sidebar" class="custom-control-input"
                                            id="collaps_sidebar">
                                        <label class="custom-control-label"
                                            for="collaps_sidebar">@lang('all.collaps_sidebar')</label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" data-widget="fullscreen" class="custom-control-input"
                                            id="fullscreen">
                                        <label class="custom-control-label" for="fullscreen">@lang('all.fullscreen')</label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" wire:model="daily_backup" class="custom-control-input"
                                            id="daily_backup">
                                        <label class="custom-control-label" for="daily_backup">@lang('all.daily_backup')</label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" wire:model="dark_mode" class="custom-control-input"
                                            id="dark_mode">
                                        <label class="custom-control-label" for="dark_mode">@lang('all.dark_mode')</label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" wire:model="delete_dialog" class="custom-control-input"
                                            id="delete_dialog">
                                        <label class="custom-control-label"
                                            for="delete_dialog">@lang('all.delete_dialog')</label>
                                    </div>
                                </div>

                                <hr>

                                <div class="form-group">
                                    <label for="font">@lang('all.font')</label>
                                    <select id="font" wire:model="font"
                                        class="custom-select @error('font') is-invalid @enderror"
                                        placeholder="@lang('all.font')">

                                        <option value="sans-serif" id="sans-serif">@lang('all.font_num_0')</option>

                                        @for ($i = 1; $i <= 5; $i++)
                                            <option value="{{ $i }}.ttf" id="font-{{ $i }}">
                                                {{ __('all.font_num_' . $i) }}</option>
                                        @endfor

                                    </select>
                                    @error('font')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="notification_sound">@lang('all.notification_sound')</label>
                                    <select id="notification_sound" wire:model="notification_sound"
                                        class="custom-select @error('notification_sound') is-invalid @enderror"
                                        placeholder="@lang('all.notification_sound')">

                                        <option value="no_sound" id="no_sound">@lang('all.no_sound')</option>

                                        @for ($i = 1; $i <= 5; $i++)
                                            <option value="{{ $i }}.wav"
                                                id="notification_sound-{{ $i }}">
                                                {{ __('all.notification_sound_num_' . $i) }}</option>
                                        @endfor

                                    </select>
                                    @error('notification_sound')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                            </div>
                            <div class="col-md-6 ">
                                <a href="{{ route('clear-cache') }}"
                                    class="btn btn-sm btn-warning btn-block text-right"><i
                                        class="fa fa-trash mr-2"></i>@lang('all.clear_cache')</a>
                                <a target="_blank" href="{{ route('backup.index') }}"
                                    class="btn btn-sm btn-info btn-block text-right"><i
                                        class="fa fa-retweet mr-2"></i>@lang('all.backup')</a>
                            </div>
                        </div>
                    </div>

                    <div class=" tab-pane {{ $tab == 'clinic' ? 'active' : '' }}" id="clinic">

                        <div class="">
                            <div class="form-group">
                                <label for="start_time">@lang('all.start_time')</label>
                                <input type="time" id="start_time" wire:model="start_time"
                                    class="form-control @error('start_time') is-invalid @enderror"
                                    placeholder="@lang('all.start_time')">

                                @error('start_time')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="appointment_expected_time">@lang('all.appointment_expected_time')</label>
                                <div class="input-group">

                                    <input type="number" id="appointment_expected_time"
                                        wire:model="appointment_expected_time"
                                        class="form-control @error('appointment_expected_time') is-invalid @enderror"
                                        placeholder="@lang('all.appointment_expected_time')">

                                    <div class="input-group-append">
                                        <select wire:model="appointment_expected_time_unit" type="button"
                                            class="btn btn-info">
                                            <option value="minute">@lang('all.minute')</option>
                                            <option value="hour">@lang('all.hour')</option>
                                        </select>
                                    </div>

                                    @error('appointment_expected_time')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror

                                </div>

                            </div>

                            <div class="form-group">
                                <label for="age_unit">@lang('all.age_unit')</label>
                                <select type="time" id="age_unit" wire:model="age_unit"
                                    class="custom-select @error('age_unit') is-invalid @enderror"
                                    placeholder="@lang('all.age_unit')">

                                    <option value="year">@lang('all.year')</option>
                                    <option value="month">@lang('all.month')</option>
                                    <option value="week">@lang('all.week')</option>
                                    <option value="day">@lang('all.day')</option>

                                </select>
                                @error('age_unit')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>



                        </div>
                    </div>

                    <div class=" tab-pane {{ $tab == 'clinic-info' ? 'active' : '' }}" id="clinic-info">
                        <div class="">

                            <div class="form-group">
                                <label for="clinic_name">@lang('all.clinic_name')</label>
                                <input type="text" id="clinic_name" wire:model="clinic_name"
                                    class="form-control @error('clinic_name') is-invalid @enderror"
                                    placeholder="@lang('all.clinic_name')">

                                @error('clinic_name')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="header_info">@lang('all.header_info')</label>
                                <textarea id="header_info" wire:model="header_info" rows="5"
                                    class="form-control @error('header_info') is-invalid @enderror" placeholder="@lang('all.header_info')"></textarea>

                                @error('header_info')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="address">@lang('all.address')</label>
                                <input type="text" id="address" wire:model="address"
                                    class="form-control @error('address') is-invalid @enderror"
                                    placeholder="@lang('all.address')">

                                @error('address')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="footer_info">@lang('all.footer_info')</label>
                                <textarea rows="5" id="footer_info" wire:model="footer_info"
                                    class="form-control @error('footer_info') is-invalid @enderror" placeholder="@lang('all.footer_info')"></textarea>

                                @error('footer_info')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="phone">@lang('all.phone')</label>
                                <input type="text" id="phone" wire:model="phone"
                                    class="form-control @error('phone') is-invalid @enderror"
                                    placeholder="@lang('all.phone')">

                                @error('phone')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="whatsapp">@lang('all.whatsapp')</label>
                                <input type="text" id="whatsapp" wire:model="whatsapp"
                                    class="form-control @error('whatsapp') is-invalid @enderror"
                                    placeholder="@lang('all.whatsapp')">

                                @error('whatsapp')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="logo">@lang('all.logo')</label>
                                <input type="time" id="logo" wire:model="logo"
                                    class="form-control @error('logo') is-invalid @enderror"
                                    placeholder="@lang('all.logo')">

                                @error('logo')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>


                            <a href="{{route('settings.recipe-design')}}" class="btn btn-block btn-info">@lang('all.recipe-design')</a>



                        </div>
                    </div>
                </div>
            </div>

            @push('styles')
                <style>
                    #sans-serif {
                        font-family: sans-serif;
                    }


                </style>
            @endpush
            @push('styles')
                @for ($i = 1; $i <= 5; $i++)
                    <style>
                        @font-face {
                            font-family: '{{ $i }}.ttf';
                            src: url('{{ asset('assets/fonts/' . $i . '.ttf') }}');
                            font-weight: 400;
                            font-style: normal
                        }

                        #font-{{ $i }} {
                            font-family: '{{ $i }}.ttf';
                        }
                    </style>
                @endfor
            @endpush

            @push('scripts')

                <script>
                    $('#collaps_sidebar').on('click', function() {
                        if ($(this).is(':checked')) {
                            $('body').addClass('sidebar-collapse')
                            $(window).trigger('resize')
                        } else {
                            $('body').removeClass('sidebar-collapse')
                            $(window).trigger('resize')
                        }
                    });

                    $('#fixed_navbar').on('click', function() {
                        if ($(this).is(':checked')) {
                            $('body').addClass('layout-navbar-fixed')
                        } else {
                            $('body').removeClass('layout-navbar-fixed')
                        }
                    });

                    $('#dark_mode').on('click', function() {
                        if ($(this).is(':checked')) {
                            $('body').addClass('dark-mode')
                            $('nav.navbar').addClass('navbar-dark')
                            $('nav.navbar').removeClass('navbar-light')
                            $('nav.navbar').removeClass('navbar-white')
                        } else {
                            $('body').removeClass('dark-mode')
                            $('nav.navbar').removeClass('navbar-dark')
                            $('nav.navbar').addClass('navbar-light')
                            $('nav.navbar').addClass('navbar-white')
                        }
                    });

                    $('#notification_sound').change(function() {
                        var sound = $(this).find(":checked").val();
                        var audio = new Audio(`{{ asset('assets/sound/${sound}') }}`);
                        audio.play()
                    });
                </script>
            @endpush

        </div>
    </div>
</div>
