@extends('layout.auth')

@section('title')
    @lang('all.backup')
@endsection

@section('content')
    <div class="container m-t-50">
        <div class="row justify-content-center">

            <div class="col-md-6 text-center">
                <a href="/" class="h1"><b>Good</b>Doctor</a>
            </div>

            <div class="col-md-12 m-t-20">
                @include('includes.status')

                <div class="card card-outline card-primary">

                    <div class="card-header">

                        <h3 class="card-title" class="h3" > @lang('all.backup')
                        </h3>

                        <div class="d-flex card-tools">
                            <a href="{{ route('backup.create') }}" class="btn btn-success"><i class="fa fa-plus mr-2"></i>
                                @lang('all.add')
                            </a>

                        </div>
                    </div>
                    <div class="card-body p-0">
                        @if ($backups == null || count($backups) <= 0)
                            <div class="alert alert-info m-l-10 m-r-10">
                                <h5><i class="icon fas fa-info"></i> @lang('all.no_data')</h5>
                            </div>
                        @else
                            <table class="table table-striped projects">
                                <thead>
                                    <tr>

                                        <th style="width: 30%">
                                            @lang('all.name')
                                        </th>
                                        <th style="width: 20%">
                                            @lang('all.size')
                                        </th>
                                        <th style="width: 20%">
                                            @lang('all.date')
                                        </th>
                                        <th style="width: 30%">
                                            @lang('all.actions')
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($backups as $backup)
                                        <tr>

                                            <td>
                                                {{ $backup['name'] }}
                                            </td>
                                            <td>
                                                {{ $backup['size'] >= 1001 ? floor($backup['size'] / 1024) . ' MB' : floor($backup['size']) . ' KB' }}
                                            </td>
                                            <td>
                                                {{ $backup['created_at']->format('Y-m-d') }}
                                            </td>

                                            <td class="project-actions text-right">
                                                {{-- <a class="btn btn-primary btn-sm" href="#">
                                            <i class="fas fa-folder">
                                            </i>
                                            View
                                        </a> --}}


                                                <form action="{{ route('backup.destroy', $backup['name']) }}"
                                                    enctype="multipart/form-data" method="POST">

                                                    <a href="{{ route('backup.restore', $backup['name']) }}"
                                                        class="btn btn-success btn-sm">
                                                        <i class="fas fa-upload">
                                                        </i>
                                                        @lang('all.restore')
                                                    </a>
                                                    <a href="{{ route('backup.show', $backup['name']) }}"
                                                        class="btn btn-info btn-sm">
                                                        <i class="fas fa-download">
                                                        </i>
                                                        @lang('all.download')
                                                    </a>

                                                    @method('DELETE')
                                                    @csrf
                                                    <button class="btn btn-danger btn-sm">
                                                        <i class="fas fa-trash">
                                                        </i>
                                                        @lang('all.delete')
                                                    </button>

                                                </form>

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                    <!-- /.card-body -->

                </div>


            </div>
        </div>
    </div>
@endsection
