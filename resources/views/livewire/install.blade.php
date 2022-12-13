<div class="container">
    <div class="row justify-content-center">
        <div class="card col-md-7 m-t-20">
            <div class="card-header">
                <div class="card-title">
                    <h4>@lang('all.install')</h4>

                </div>
            </div>
            <div class="card-body">
                @if ($success)
                    <div class="m-t-10 d-flex justify-content-center">
                        <i class="fa fa-check text-success" style="font-size: 100px;"></i>
                    </div>
                @elseif($error)
                <div class="m-t-10 d-flex justify-content-center">
                    <i class="fa fa-times text-danger" style="font-size: 100px;"></i>
                </div>
                @else
                    <div class="m-t-10 d-flex justify-content-center">
                        <img src="{{ asset('assets/img/loading.gif') }}" width="200">
                    </div>
                @endif

                {!! $result !!}

            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            document.addEventListener('livewire:load', function() {
                @this.start();
            });
        </script>
    @endpush

</div>
