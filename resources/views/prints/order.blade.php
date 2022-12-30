@extends('layout.blank')

@section('content')

    <div id="printable" style="width: 50mm!important; background-color: #0c525d">

        {{$printable}}

    </div>

@endsection


@push('scripts')
    <script src="{{ asset('assets/custom/js/print/jQuery.print.min.js') }}"></script>
    <script>
    $(function(){
        $('#printable').print({
            stylesheet: "{{ asset('assets/custom/css/print-recipe.css') }}"
        });
    });
    </script>
@endpush
