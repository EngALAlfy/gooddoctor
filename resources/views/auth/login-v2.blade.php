@extends('layout.auth')

@section('title')
    @lang('all.login')
@endsection

@section('content')
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="/" class="h1"><b>Good</b>Doctor</a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">@lang('all.login_to_system')</p>

                <form action="{{route('login')}}" method="post" enctype="multipart/form-data">
                    @method('post')
                    @csrf

                    @include('includes.status')
                    <div class="input-group mb-3">
                        <input value="{{old('email')}}" type="text" name="email" class="form-control" placeholder="@lang('all.email')">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input value="{{old('password')}}" type="password" name="password" class="form-control" placeholder="@lang('all.password')">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input name="remember" type="checkbox" {{old('remember') ? 'checked' : ''}} id="remember">
                                <label for="remember">
                                    @lang('all.remember')
                                </label>
                            </div>
                        </div>

                    </div>


                    <div class="social-auth-links text-center mt-2 mb-3">
                        <button type="submit" class="btn btn-block btn-primary">
                            @lang('all.sign_in')
                        </button>
                    </div>
                </form>

                <!-- /.social-auth-links -->

            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->
@endsection
