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
            @if ($instructions == null || count($instructions) <= 0)

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
                            <th style="width: 20%">
                                @lang('all.name')
                            </th>
                            <th style="width: 10%">
                                @lang('all.type')
                            </th>
                            <th style="width: 25%">
                                @lang('all.list')
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
                        @foreach ($instructions as $instruction)
                            <tr>
                                <td>
                                    {{ $instruction->id }}
                                </td>
                                <td>
                                    <a>
                                        {{ $instruction->name }}
                                    </a>
                                </td>

                                <td>
                                    <span class="badge @if($instruction->type == 'forbiddens') badge-danger @elseif($instruction->type == 'warnings') badge-warning @elseif($instruction->type == 'diet') badge-info @elseif($instruction->type == 'instructions') badge-success @endif ">
                                        {{ __('all.'.$instruction->type) }}</span>
                                </td>

                                <td>

                                        {!! str_replace( "\n" , "<br/>"  , $instruction->list ) !!}

                                </td>

                                <td>

                                        {{ $instruction->patientsCount() }}

                                </td>

                                <td class="project-actions text-right">
                                    {{-- <a class="btn btn-primary btn-sm" href="#">
                                <i class="fas fa-folder">
                                </i>
                                View
                            </a> --}}
                                    <a class="btn btn-info btn-sm">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        @lang('all.edit')
                                    </a>
                                    @if ($delete_dialog)
                                        <button wire:click="deleteId({{ $instruction->id }})" data-target="#delete-modal"
                                            data-toggle="modal" class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash">
                                            </i>
                                            @lang('all.delete')
                                        </button>
                                    @else
                                        @if ($deleteId == $instruction->id)
                                            <button wire:click="delete" class="btn btn-warning btn-sm">
                                                <i class="fas fa-check">
                                                </i>
                                                @lang('all.are_you_sure')
                                            </button>
                                        @else
                                            <button wire:click="deleteId({{ $instruction->id }})"
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
            <span class="float-left">{{ $instructions->links() }}</span>

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


    @livewire('create-instructions')

    @push('scripts')
        <script>
            Livewire.on('stored', () => {
                $('#add-modal').modal('hide');
            });
        </script>
    @endpush

    {{-- @include('tests.create') --}}
    @include('instructions.delete')
    <!-- /.modal -->
</div>
