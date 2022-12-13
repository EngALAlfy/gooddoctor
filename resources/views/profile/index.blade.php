@extends('layout.panel')

@section('title')
    @lang('all.profile')
@endsection

@section('page_title')
    @lang('all.profile')
@endsection

@push('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('users.index') }}">@lang('all.users')</a></li>
@endpush

@section('breadcrumb_title')
    @lang('all.profile')
@endsection

@section('content')
    <div class="container-fluid">


        @include('includes.status')


        <div class="row">

            <div class="col-md-3">

                <!-- Profile Image -->
                <div class="card card-primary card-outline">

                    <div class="card-tools">
                        <button data-toggle="modal" data-target="#edit-account-modal" class="btn btn-tools float-left"><i
                                class="fa fa-edit"></i></button>
                    </div>
                    <div class="card-body box-profile pt-0">
                        <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle" src=""
                                onerror="this.src='{{ asset('assets/img/user.png') }}'" alt="User profile picture">
                        </div>

                        <h3 class="profile-username text-center">{{ auth()->user()->name }}</h3>

                        <p class="text-muted text-center">{{ auth()->user()->job ?? '--' }}</p>

                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>@lang('all.email')</b> <a class="float-left">{{ auth()->user()->email ?? '--' }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>@lang('all.salary')</b> <a class="float-left">{{ auth()->user()->salary ?? '--' }}</a>
                            </li>

                        </ul>

                        <a href="{{ route('logout') }}" class="btn btn-primary btn-block"><b>@lang('all.sign_out')</b></a>
                        <button data-toggle="modal" data-target="#delete-account-modal"
                            class="btn btn-danger btn-block"><b>@lang('all.delete_account')</b></button>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">@lang('all.change_password')</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form action="{{ route('profile.update-password') }}" enctype="multipart/form-data" method="post">
                            @csrf
                            @method('post')
                            <div class="form-group">
                                <label for="old_password">@lang('all.old_password')</label>
                                <input type="password" placeholder="@lang('all.old_password')" id="old_password"
                                    name="old_password" class="form-control @error('old_password') is-invalid @enderror">
                                @error('old_password')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password">@lang('all.new_password')</label>
                                <input type="password" placeholder="@lang('all.new_password')" id="password" name="password"
                                    class="form-control @error('password') is-invalid @enderror">
                                @error('password')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password_confirmation">@lang('validation.attributes.password_confirmation')</label>
                                <input type="password" placeholder="@lang('validation.attributes.password_confirmation')" id="password_confirmation"
                                    name="password_confirmation"
                                    class="form-control @error('password_confirmation') is-invalid @enderror">
                                @error('password_confirmation')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <button class="btn btn-success btn-block" type="submit">@lang('all.save')</button>


                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>

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
                    </div>
                    <div class="card-body">
                        @if (!auth()->user()->roles || count(auth()->user()->roles) <= 0)
                            <div class="alert alert-info m-l-10 m-r-10">
                                <h6><i class="icon fas fa-info"></i> @lang('all.no_data')</h6>
                            </div>
                        @else
                            <ol class="row">
                                @foreach (auth()->user()->roles as $role)
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
                    <form action="{{ route('profile.destroy') }}" method="post">
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

    {{-- edit account modal --}}
    <div class="modal fade" id="edit-account-modal">
        <div class="modal-dialog">

            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">@lang('all.edit') @lang('all.profile')</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="@lang('all.close')">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('profile.update') }}" method="post">
                        @csrf
                        @method('put')


                        <div class="form-group">
                            <label for="name">@lang('all.name')</label>
                            <input type="text" placeholder="@lang('all.name')" id="name" name="name"
                                class="form-control @error('name') is-invalid @enderror"
                                value="{{ auth()->user()->name }}">
                            @error('name')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">@lang('all.email')</label>
                            <input type="text" placeholder="@lang('all.email')" id="email" name="email"
                                class="form-control @error('email') is-invalid @enderror"
                                value="{{ auth()->user()->email }}">
                            @error('email')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="job">@lang('all.job')</label>
                            <input type="text" placeholder="@lang('all.job')" id="job" name="job"
                                class="form-control @error('job') is-invalid @enderror"
                                value="{{ auth()->user()->job }}">
                            @error('job')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="salary">@lang('all.salary')</label>
                            <input type="text" placeholder="@lang('all.salary')" id="salary" name="salary"
                                class="form-control @error('salary') is-invalid @enderror"
                                value="{{ auth()->user()->salary }}">
                            @error('salary')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>



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
