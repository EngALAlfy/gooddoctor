@extends('layout.panel')

@section('title')
    {{ $user->name }}
@endsection

@section('page_title')
    {{ $user->name }}
@endsection

@push('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('users.index') }}">@lang('all.users')</a></li>
@endpush

@section('breadcrumb_title')
    {{ $user->name }}
@endsection

@section('content')
    <div class="container-fluid">


        @include('includes.status')


        <div class="row">

            <div class="col-md-3">

                <!-- Profile Image -->
                <div class="card card-primary card-outline">

                    <div class="card-tools">
                        <a href="{{route('users.edit' , $user)}}" class="btn btn-tools float-left"><i
                                class="fa fa-edit"></i></a>
                    </div>
                    <div class="card-body box-profile pt-0">
                        <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle" src=""
                                onerror="this.src='{{ asset('assets/img/user.png') }}'" alt="User profile picture">
                        </div>

                        <h3 class="profile-username text-center">{{ $user->name }}</h3>

                        <p class="text-muted text-center">{{ $user->job ?? '--' }}</p>

                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>@lang('all.email')</b> <a class="float-left">{{ $user->email ?? '--' }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>@lang('all.salary')</b> <a class="float-left">{{ $user->salary ?? '--' }}</a>
                            </li>

                        </ul>

                        <button data-toggle="modal" data-target="#delete-account-modal"
                            class="btn btn-danger btn-block"><b>@lang('all.delete_account')</b></button>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

            </div>

            <div class="col-md-9 ">
                <div class="row">
                    <div class="col-md-3">
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{ $today_appointments_count }}</h3>

                                <p>@lang('all.today_new_appointments')</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <a href="z" class="small-box-footer">@lang('all.more') <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>{{ $today_patients_count }}</h3>

                                <p>@lang('all.today_new_patients')</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <a href="z" class="small-box-footer">@lang('all.more') <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>{{ $all_appointments_count }}</h3>

                                <p>@lang('all.all_appointments')</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <a href="z" class="small-box-footer">@lang('all.more') <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3>{{ $all_patients_count }}</h3>

                                <p>@lang('all.all_paitents')</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <a href="z" class="small-box-footer">@lang('all.more') <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">@lang('all.roles')</h5>
                        <div class="card-tools">
                            <button data-toggle="modal" data-target="#edit-roles-modal" class="btn btn-tools float-left"><i
                                    class="fa fa-edit"></i></button>
                        </div>
                    </div>
                    <div class="card-body">
                        @if (!$user->roles || count($user->roles) <= 0)
                            <div class="alert alert-info m-l-10 m-r-10">
                                <h6><i class="icon fas fa-info"></i> @lang('all.no_data')</h6>
                            </div>
                        @else
                            <ol class="row">
                                @foreach ($user->roles as $role)
                                    <li class="col-md-4">{{ __('roles.'.$role->name) }}</li>
                                @endforeach
                            </ol>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- delete account modal --}}
    <div class="modal fade" id="delete-account-modal">
        <div class="modal-dialog">

            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">@lang('all.delete_account')</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="@lang('all.close')">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @lang('all.are_you_sure_delete_account')
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-success" data-dismiss="modal">@lang('all.no')</button>
                    <form action="{{ route('users.destroy' , $user) }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger">
                            @lang('all.yes') @lang('all.delete_account')
                        </button>
                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>



    {{-- edit roles modal --}}
    <div class="modal fade" id="edit-roles-modal">
        <div class="modal-dialog">

            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">@lang('all.edit') @lang('all.roles')</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="@lang('all.close')">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('users.update-roles' , $user) }}" method="post">
                        @csrf
                        @method('put')

                        <div class="form-group">
                            <select id="roles_duallistbox" name="roles[]" class="duallistbox" multiple="multiple">
                                @foreach ($roles as $role)
                                    <option @if($user->checkRole($role->name) === true) selected @endif value="{{$role->id}}">{{__('roles.'.$role->name)}}</option>
                                @endforeach
                            </select>
                        </div>
                        <!-- /.form-group -->


                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success btn-block">
                                @lang('all.save')
                            </button>
                        </div>

                    </form>

                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
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

