<div class="row">

    <div class="card col-md-6">
        <div class="card-header">
            <div class="card-title">
                @lang('all.app_settings')
            </div>
        </div>
        <div class="card-body row">
            <div class="col-md-6">
                <div class="form-group">
                    <div class="custom-control custom-switch">
                        <input type="checkbox" wire:model="fixed_navbar" class="custom-control-input" id="fixed_navbar">
                        <label class="custom-control-label" for="fixed_navbar">@lang('all.fixed_navbar')</label>
                    </div>
                </div>

                <div class="form-group">
                    <div class="custom-control custom-switch">
                        <input type="checkbox" wire:model="collaps_sidebar" class="custom-control-input"
                            id="collaps_sidebar">
                        <label class="custom-control-label" for="collaps_sidebar">@lang('all.collaps_sidebar')</label>
                    </div>
                </div>

                <div class="form-group">
                    <div class="custom-control custom-switch">
                        <input type="checkbox" data-widget="fullscreen" class="custom-control-input" id="fullscreen">
                        <label class="custom-control-label" for="fullscreen">@lang('all.fullscreen')</label>
                    </div>
                </div>

                <div class="form-group">
                    <div class="custom-control custom-switch">
                        <input type="checkbox" wire:model="daily_backup" class="custom-control-input" id="daily_backup">
                        <label class="custom-control-label" for="daily_backup">@lang('all.daily_backup')</label>
                    </div>
                </div>

                <div class="form-group">
                    <div class="custom-control custom-switch">
                        <input type="checkbox" wire:model="dark_mode" class="custom-control-input" id="dark_mode">
                        <label class="custom-control-label" for="dark_mode">@lang('all.dark_mode')</label>
                    </div>
                </div>

                <div class="form-group">
                    <div class="custom-control custom-switch">
                        <input type="checkbox" wire:model="delete_dialog" class="custom-control-input"
                            id="delete_dialog">
                        <label class="custom-control-label" for="delete_dialog">@lang('all.delete_dialog')</label>
                    </div>
                </div>

                <hr>

                <div class="form-group">
                    <label for="font">@lang('all.font')</label>
                    <select id="font" wire:model="font" class="custom-select @error('font') is-invalid @enderror"
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
                    <select id="notification_sound" wire:model="notification_sound" class="custom-select @error('notification_sound') is-invalid @enderror"
                        placeholder="@lang('all.notification_sound')">

                        <option value="no_sound" id="no_sound">@lang('all.no_sound')</option>

                        @for ($i = 1; $i <= 5; $i++)
                            <option value="{{ $i }}.wav" id="notification_sound-{{ $i }}">
                                {{ __('all.notification_sound_num_' . $i) }}</option>
                        @endfor

                    </select>
                    @error('notification_sound')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

            </div>
            <div class="col-md-6 ">
                <button class="btn btn-sm btn-warning btn-block text-right"><i
                        class="fa fa-trash mr-2"></i>@lang('all.clear_cache')</button>
                <button class="btn btn-sm btn-info btn-block text-right"><i
                        class="fa fa-file mr-2"></i>@lang('all.backup')</button>
                <button class="btn btn-sm btn-success btn-block text-right"><i
                        class="fa fa-retweet mr-2"></i>@lang('all.clean_backups')</button>
            </div>
        </div>
    </div>

    <div class="card col-md-6">
        <div class="card-header">
            <div class="card-title">
                @lang('all.clinic_settings')
            </div>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label for="start_time">@lang('all.start_time')</label>
                <input type="time" id="start_time" wire:model="start_time"
                    class="form-control @error('start_time') is-invalid @enderror" placeholder="@lang('all.start_time')">

                @error('start_time')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="appointment_expected_time">@lang('all.appointment_expected_time')</label>
                <div class="input-group">

                    <input type="number" id="appointment_expected_time" wire:model="appointment_expected_time"
                        class="form-control @error('appointment_expected_time') is-invalid @enderror"
                        placeholder="@lang('all.appointment_expected_time')">

                    <div class="input-group-append">
                        <select wire:model="appointment_expected_time_unit" type="button" class="btn btn-info">
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
                    class="custom-select @error('age_unit') is-invalid @enderror" placeholder="@lang('all.age_unit')">

                    <option value="year">@lang('all.year')</option>
                    <option value="month">@lang('all.month')</option>

                </select>
                @error('age_unit')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
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

            $('#notification_sound').change(function () {
                var sound = $(this).find(":checked").val();
                var audio = new Audio(`{{asset('assets/sound/${sound}')}}`);
                audio.play()
            });
        </script>
    @endpush

</div>
