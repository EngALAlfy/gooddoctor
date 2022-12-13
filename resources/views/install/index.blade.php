@extends('layout.auth')

@section('title')
    @lang('all.success') @lang('all.install')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                @livewire('install')
            </div>
        </div>
    </div>
@endsection

@prepend('scripts')
    @livewireScripts()
@endprepend

@push('styles')
    @livewireStyles()
@endpush
