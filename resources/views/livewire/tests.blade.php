<div>
    @include('includes.status')


    <div class="card">

        <div class="card-header">
            <div class="card-title">
                <div class=" input-group input-group-sm m-auto" style="width: 150px">
                    <input type="search" wire:model="search" class="form-control" placeholder="@lang('all.search')">
                </div>
            </div>


            <div class="d-flex card-tools">
                <button data-toggle="modal" data-target="#add-modal" type="button" class="btn btn-success"><i
                        class="fa fa-plus mr-2"></i> @lang('all.add')
                </button>


            </div>
        </div>
        <div class="card-body p-0">
            @if ($tests == null || count($tests) <= 0)

                <div class="alert alert-info m-l-10 m-r-10">
                    <h5><i class="icon fas fa-info"></i> @lang('all.no_data')</h5>
                </div>
            @else
                <table class="table table-striped projects">
                    <thead>
                        <tr>
                            <th style="width: 5%">
                                #
                            </th>
                            <th style="width: 30%">
                                @lang('all.name')
                            </th>
                            <th style="width: 25%">
                                @lang('all.ar_name')
                            </th>
                            <th style="width: 10%">
                                @lang('all.patients_count')
                            </th>
                            <th style="width: 30%">
                                @lang('all.actions')
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tests as $test)
                            <tr>
                                <td>
                                    {{ $test->id }}
                                </td>
                                <td>
                                    <a href="{{route('tests.show' , $test)}}">
                                        {{ $test->name }}
                                    </a>
                                </td>
                                <td>
                                    <a href="{{route('tests.show' , $test)}}">
                                        {{ $test->ar_name }}
                                    </a>
                                </td>
                                <td>
                                        {{-- appointments count == patiens count (every appointment have only one patient) --}}

                                        {{ $test->appointments_count }}

                                </td>

                                <td class="project-actions text-right">
                                    {{-- <a class="btn btn-primary btn-sm" href="#">
                                <i class="fas fa-folder">
                                </i>
                                View
                            </a> --}}
                                    <a href="{{route('tests.edit' , $test)}}" class="btn btn-info btn-sm">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        @lang('all.edit')
                                    </a>
                                    @if ($delete_dialog)
                                        <button wire:click="deleteId({{ $test->id }})" data-target="#delete-modal"
                                            data-toggle="modal" class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash">
                                            </i>
                                            @lang('all.delete')
                                        </button>
                                    @else
                                        @if ($deleteId == $test->id)
                                            <button wire:click="delete" class="btn btn-warning btn-sm">
                                                <i class="fas fa-check">
                                                </i>
                                                @lang('all.are_you_sure')
                                            </button>
                                        @else
                                            <button wire:click="deleteId({{ $test->id }})"
                                                class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash">
                                                </i>
                                                @lang('all.delete')
                                            </button>
                                        @endif
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">
            <span class="float-left">{{ $tests->links() }}</span>

            <div class="form-group float-right">

                <label>
                    <select wire:model="perPage" class="form-control">
                        <option>10</option>
                        <option>50</option>
                        <option>100</option>
                        <option>500</option>
                        <option>1000</option>
                    </select>
                </label>
            </div>
        </div>


    </div>


    @livewire('create-test')

    @push('scripts')
        <script>
            Livewire.on('stored', () => {
                $('#add-modal').modal('hide');
            });
        </script>
    @endpush

    {{-- @include('tests.create') --}}
    @include('tests.delete')
    <!-- /.modal -->
</div>
