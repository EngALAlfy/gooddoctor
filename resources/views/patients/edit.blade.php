@extends('layout.panel')

@section('title')
    @lang('all.edit') @lang('all.patient') : {{ $patient->name }}
@endsection

@section('page_title')
    @lang('all.edit') @lang('all.patient') : {{ $patient->name }}
@endsection

@push('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('patients.index') }}">@lang('all.patients')</a></li>
@endpush

@section('breadcrumb_title')
    @lang('all.edit')  @lang('all.patient')
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <form action="{{ route('patients.update' , $patient) }}" method="post">
                    @csrf
                    @method('put')

                    <div class="card">
                        <div class="card-body  pb-0">

                            <div class="form-group">
                                <label for="name">@lang('all.name')</label>
                                <input type="text"  value="{{$patient->name}}" name="name"
                                    class="form-control @error('name') is-invalid @enderror" placeholder="@lang('all.name')">
                                @error('name')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="age">@lang('all.age')</label>

                                <input type="number"  value="{{$patient->age}}" name="age"
                                    class="form-control @error('age') is-invalid @enderror" placeholder="@lang('all.age')">
                                @error('age')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="address">@lang('all.address')</label>

                                <input type="text" value="{{$patient->address}}" name="address"
                                    class="form-control @error('address') is-invalid @enderror" placeholder="@lang('all.address')">
                                @error('address')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="sex">@lang('all.sex')</label>

                                <select name="sex" class="form-control @error('sex') is-invalid @enderror"
                                    placeholder="@lang('all.sex')">
                                    <option >@lang('all.sex')</option>
                                    <option @if($patient->sex == 'male') selected @endif value="male">@lang('all.male')</option>
                                    <option @if($patient->sex == 'female') selected @endif value="female">@lang('all.female')</option>
                                </select>
                                @error('sex')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="phone">@lang('all.phone')</label>

                                <input type="text" value="{{$patient->phone}}" name="phone"
                                    class="form-control @error('phone') is-invalid @enderror" placeholder="@lang('all.phone')">
                                @error('phone')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="info">@lang('all.info')</label>

                                <textarea value="{{$patient->info}}" type="text"  name="info" class="form-control @error('info') is-invalid @enderror"
                                    placeholder="@lang('all.info')"></textarea>
                                @error('info')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
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

