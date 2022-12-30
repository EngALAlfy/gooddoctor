<div class="container-fluid">
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <div class="form-group">
                    <div class="input-group input-group-lg">
                        <input wire:model='query' name="query" type="search" class="form-control form-control-lg" placeholder="Type your keywords here" value="{{$query}}">
                        <div class="input-group-append">
                            <div class="btn btn-lg btn-default">
                                <i class="fa fa-search"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                <div class="card-body">
            @if ($appointments == null || count($appointments) <= 0)

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
                            <th style="width: 35%">
                                @lang('all.patient')
                            </th>
                            <th style="width: 20%">
                                @lang('all.order')
                            </th>
                            <th style="width: 25%">
                                @lang('all.date')
                            </th>
                            <th style="width: 20%">
                                @lang('all.appointment_type')
                            </th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($appointments as $appointment)
                            <tr>
                                <td>
                                    <a href="{{route('appointments.show' , $appointment)}}">#{{ $appointment->id }}</a>
                                </td>
                                <td>

                                    <a href="{{ route('patients.show', $appointment->patient) }}">

                                    {{ $appointment->patient->name }}
                                    </a>
                                </td>
                                <td>
                                    <span class="badge badge-success p-2" style="font-size: 16px">
                                        {{ $appointment->order }}</span>
                                </td>
                                <td>
                                    <a href="{{route('appointments.show' , $appointment)}}">{{ $appointment->date }}</a>
                                </td>
                                <td>
                                    <small class="badge badge-warning"><i
                                            class="far fa-clock mr-1"></i>{{ $appointment->type->name }}</small>
                                </td>



                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">
            <span class="float-left">{{ $appointments->links() }}</span>

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
            </div>
        </div>
</div>
