<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('assets/adminLTE/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('assets/adminLTE/plugins/bootstrap/js/bootstrap.bundle.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('assets/adminLTE/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('assets/adminLTE/plugins/moment/locale/ar.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('assets/adminLTE/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('assets/adminLTE/js/adminlte.js') }}"></script>
<!-- audio -->
<script src="{{ asset('assets/custom/js/howler/howler.min.js') }}"></script>
<!-- intro help tour -->
<script src="{{ asset('assets/custom/js/intro.js/intro.js') }}"></script>
@livewireScripts

<script>
    // toastr
    @if (\Mcamara\LaravelLocalization\Facades\LaravelLocalization::getCurrentLocaleDirection() == 'rtl')
        toastr.options.rtl = true;
    @endif

    toastr.options.close = true;
    toastr.options.positionClass = "toast-bottom-left";
    toastr.options.progressBar = true;
    toastr.options.onHidden  = function() {
        // remove old toastr - bug for livewire
        $('#notification_script').remove();
    };
    toastr.options.onShown = function() {
        @if ($notification_sound != 'no_sound')
            var sound = new Howl({
                src: ["{{ asset('assets/sound/' . $notification_sound) }}"]
            });
            sound.play();
        @endif
    };
    // time now in footer
    $(function() {
        $('#time').html(moment(new Date()).format("h:m  dddd D-M-Y "));

        setInterval(function() {
            $('#time').html(moment(new Date()).format("h:m  dddd D-M-Y "));
        }, 60 * 1000);

    });

    // settings

    @if ($collaps_sidebar)
        $('body').addClass('sidebar-collapse')
        $(window).trigger('resize')
    @else
        $('body').removeClass('sidebar-collapse')
        $(window).trigger('resize')
    @endif

    @if ($fixed_navbar)
        $('body').addClass('layout-navbar-fixed')
    @else
        $('body').removeClass('layout-navbar-fixed')
    @endif

    @if ($dark_mode)
        $('body').addClass('dark-mode')
        $('nav.navbar').addClass('navbar-dark')
        $('nav.navbar').removeClass('navbar-light')
        $('nav.navbar').removeClass('navbar-white')
    @else
        $('body').removeClass('dark-mode')
        $('nav.navbar').removeClass('navbar-dark')
        $('nav.navbar').addClass('navbar-light')
        $('nav.navbar').addClass('navbar-white')
    @endif

    // hint icon
    $('.hint').each(function(){
        var hint = $(this).data('hint');
        $(this).append('<button data-placement="auto"  data-toggle="tooltip" title="'+hint+'" class="btn hint-btn"><i class="fa fa-info-circle text-info"></i></button>');
    });

    // tooltip
    $('[data-toggle="tooltip"]').tooltip();

</script>

@stack('scripts')
