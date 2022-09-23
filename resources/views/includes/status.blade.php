<div class="p-l-20 p-r-20">
    @if (session()->has('success'))
        <script id="notification_script">
            if (Notification.permission == "granted") {
                new Notification("@lang('all.success')", {
                    body: "{{ session('success') }}",
                    icon: "{{ asset('assets/img/logo.png') }}"
                });
            } else {
                Notification.requestPermission();
            }

            toastr.success("{{ session('success') }}");
        </script>
    @endif
    @if (session()->has('success'))
        {{-- @push('scripts') --}}

        {{-- @endpush --}}

        <div class="m-t-10 sufee-alert alert with-close alert-success alert-dismissible fade show">
            <span class="badge badge-pill badge-success">@lang('all.success')</span>
            <i class="icon fas fa-check"></i>
            {{ session('success') }}

            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
    @endif

    @if (session()->has('info'))
        {{-- @push('scripts') --}}
        <script>
            toastr.info("{!! session('info') !!}");
        </script>
        {{-- @endpush --}}

        <div class="alert alert-info alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-info"></i>@lang('all.info')</h5>
            {!! session('info') !!}
        </div>
    @endif

    @if (session()->has('error'))
        {{-- @push('scripts') --}}
        <script>
            toastr.error("{{ session('error') }}");
        </script>
        {{-- @endpush --}}

        <div class="m-t-10 sufee-alert alert with-close alert-danger alert-dismissible fade show">
            <span class="badge badge-pill badge-danger">@lang('all.error')</span>
            <i class="icon fas fa-ban"></i>
            {{ session('error') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
    @endif

    @if ($errors->any())
        <div class="m-t-10 sufee-alert alert with-close alert-danger alert-dismissible fade show">
            <span class="badge badge-pill badge-danger">@lang('all.error')</span>
            <i class="icon fas fa-ban"></i>
            <ul class="list-unstyled">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
    @endif


</div>
