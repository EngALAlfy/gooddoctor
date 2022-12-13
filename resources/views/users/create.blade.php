@extends('layout.panel')

@section('title')
    @lang('all.add') @lang('all.users')
@endsection

@section('page_title')
    @lang('all.add') @lang('all.users')
@endsection

@push('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('users.index') }}">@lang('all.users')</a></li>
@endpush

@section('breadcrumb_title')
    @lang('all.add') @lang('all.users')
@endsection

@section('content')
    <div class="container-fluid">
        @include('includes.status')
        <div class="row">
            <div class="col-12">
                <form action="{{ route('users.store') }}" method="post">
                    @csrf
                    @method('post')

                    <div class="card">
                        <div class="card-body  pb-0">
                            <div class="form-group">
                                <label for="name">@lang('all.name')</label>
                                <input type="text" placeholder="@lang('all.name')" id="name" name="name"
                                    class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                                @error('name')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="email">@lang('all.email')</label>
                                <input type="text" placeholder="@lang('all.email')" id="email" name="email"
                                    class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
                                <small class="text-muted ">@lang('all.default_password', ['password' => \App\Http\Helpers\Constants::$default_password])</small>

                                @error('email')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="job">@lang('all.job')</label>
                                <input type="text" placeholder="@lang('all.job')" id="job" name="job"
                                    class="form-control @error('job') is-invalid @enderror" value="{{ old('job') }}">
                                @error('job')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="salary">@lang('all.salary')</label>
                                <input type="text" placeholder="@lang('all.salary')" id="salary" name="salary"
                                    class="form-control @error('salary') is-invalid @enderror" value="{{ old('salary') }}">
                                @error('salary')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">
                                @lang('all.roles')
                            </h5>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <select id="roles_duallistbox" name="roles[]" class="duallistbox" multiple="multiple">
                                            @foreach ($roles as $role)
                                                <option value="{{$role->id}}">{{__('roles.'.$role->name)}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <!-- /.form-group -->
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="modal-footer pt-0 m-b-20">
                        <button type="submit" class="btn btn-success btn-block">
                            @lang('all.save')
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <!-- Bootstrap4 Duallistbox -->
    <link rel="stylesheet"
        href="{{ asset('assets/adminLTE/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css') }}">
@endpush

@push('scripts')
    <!-- Bootstrap4 Duallistbox -->
    <script src="{{ asset('assets/adminLTE/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js') }}">
    </script>

    <script>
        //Bootstrap Duallistbox
        $('#roles_duallistbox').bootstrapDualListbox(
            {
                moveAllLabel:"@lang('all.move_all')",
                removeAllLabel:"@lang('all.remove_all')",
                selectedListLabel:"@lang('all.selected_roles')",
                nonSelectedListLabel:"@lang('all.non_selected_roles')",
                filterPlaceHolder:"@lang('all.search')",
                infoText:false,
            }
        );
    </script>
@endpush
