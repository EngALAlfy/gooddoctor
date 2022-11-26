@extends('layout.panel')

@section('title')
    @lang('all.home')
@endsection

@section('page_title')
    @lang('all.home')
@endsection


@section('breadcrumb_title')
    @lang('all.home')
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">CPU Traffic</span>
                        <span class="info-box-number">
                            10
                            <small>%</small>
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Likes</span>
                        <span class="info-box-number">41,410</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->

            <!-- fix for small devices only -->
            <div class="clearfix hidden-md-up"></div>

            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Sales</span>
                        <span class="info-box-number">760</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">New Members</span>
                        <span class="info-box-number">2,000</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="card bg-gradient-success">
                    <div class="card-header border-0 ui-sortable-handle" style="cursor: move;">

                        <h3 class="card-title">
                            <i class="far fa-calendar-alt"></i>
                            Calendar
                        </h3>
                        <!-- tools card -->
                        <div class="card-tools">

                            <button type="button" class="btn btn-success btn-sm" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>

                        </div>
                        <!-- /. tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body pt-0">
                        <!--The calendar -->
                        <div id="calendar" style="width: 100%">
                            <div class="bootstrap-datetimepicker-widget usetwentyfour">
                                <ul class="list-unstyled">
                                    <li class="show">
                                        <div class="datepicker">
                                            <div class="datepicker-days" style="">
                                                <table class="table table-sm">
                                                    <thead>
                                                        <tr>
                                                            <th class="prev" data-action="previous"><span
                                                                    class="fa fa-chevron-left" title="Previous Month"></span>
                                                            </th>
                                                            <th class="picker-switch" data-action="pickerSwitch" colspan="5"
                                                                title="Select Month">September 2022</th>
                                                            <th class="next" data-action="next"><span
                                                                    class="fa fa-chevron-right" title="Next Month"></span></th>
                                                        </tr>
                                                        <tr>
                                                            <th class="dow">Su</th>
                                                            <th class="dow">Mo</th>
                                                            <th class="dow">Tu</th>
                                                            <th class="dow">We</th>
                                                            <th class="dow">Th</th>
                                                            <th class="dow">Fr</th>
                                                            <th class="dow">Sa</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td data-action="selectDay" data-day="08/28/2022"
                                                                class="day old weekend">28</td>
                                                            <td data-action="selectDay" data-day="08/29/2022" class="day old">29
                                                            </td>
                                                            <td data-action="selectDay" data-day="08/30/2022" class="day old">
                                                                30</td>
                                                            <td data-action="selectDay" data-day="08/31/2022"
                                                                class="day old">31</td>
                                                            <td data-action="selectDay" data-day="09/01/2022" class="day">
                                                                1</td>
                                                            <td data-action="selectDay" data-day="09/02/2022" class="day">
                                                                2</td>
                                                            <td data-action="selectDay" data-day="09/03/2022"
                                                                class="day weekend">3</td>
                                                        </tr>
                                                        <tr>
                                                            <td data-action="selectDay" data-day="09/04/2022"
                                                                class="day weekend">4</td>
                                                            <td data-action="selectDay" data-day="09/05/2022" class="day">
                                                                5</td>
                                                            <td data-action="selectDay" data-day="09/06/2022" class="day">
                                                                6</td>
                                                            <td data-action="selectDay" data-day="09/07/2022" class="day">
                                                                7</td>
                                                            <td data-action="selectDay" data-day="09/08/2022" class="day">
                                                                8</td>
                                                            <td data-action="selectDay" data-day="09/09/2022" class="day">
                                                                9</td>
                                                            <td data-action="selectDay" data-day="09/10/2022"
                                                                class="day weekend">10</td>
                                                        </tr>
                                                        <tr>
                                                            <td data-action="selectDay" data-day="09/11/2022"
                                                                class="day weekend">11</td>
                                                            <td data-action="selectDay" data-day="09/12/2022" class="day">
                                                                12</td>
                                                            <td data-action="selectDay" data-day="09/13/2022" class="day">
                                                                13</td>
                                                            <td data-action="selectDay" data-day="09/14/2022" class="day">
                                                                14</td>
                                                            <td data-action="selectDay" data-day="09/15/2022"
                                                                class="day active">15</td>
                                                            <td data-action="selectDay" data-day="09/16/2022" class="day">
                                                                16</td>
                                                            <td data-action="selectDay" data-day="09/17/2022"
                                                                class="day weekend">17</td>
                                                        </tr>
                                                        <tr>
                                                            <td data-action="selectDay" data-day="09/18/2022"
                                                                class="day weekend">18</td>
                                                            <td data-action="selectDay" data-day="09/19/2022" class="day">
                                                                19</td>
                                                            <td data-action="selectDay" data-day="09/20/2022" class="day">
                                                                20</td>
                                                            <td data-action="selectDay" data-day="09/21/2022" class="day">
                                                                21</td>
                                                            <td data-action="selectDay" data-day="09/22/2022" class="day">
                                                                22</td>
                                                            <td data-action="selectDay" data-day="09/23/2022" class="day">
                                                                23</td>
                                                            <td data-action="selectDay" data-day="09/24/2022"
                                                                class="day weekend">24</td>
                                                        </tr>
                                                        <tr>
                                                            <td data-action="selectDay" data-day="09/25/2022"
                                                                class="day today weekend">25</td>
                                                            <td data-action="selectDay" data-day="09/26/2022" class="day">
                                                                26</td>
                                                            <td data-action="selectDay" data-day="09/27/2022" class="day">
                                                                27</td>
                                                            <td data-action="selectDay" data-day="09/28/2022" class="day">
                                                                28</td>
                                                            <td data-action="selectDay" data-day="09/29/2022" class="day">
                                                                29</td>
                                                            <td data-action="selectDay" data-day="09/30/2022" class="day">
                                                                30</td>
                                                            <td data-action="selectDay" data-day="10/01/2022"
                                                                class="day new weekend">1</td>
                                                        </tr>
                                                        <tr>
                                                            <td data-action="selectDay" data-day="10/02/2022"
                                                                class="day new weekend">2</td>
                                                            <td data-action="selectDay" data-day="10/03/2022"
                                                                class="day new">3</td>
                                                            <td data-action="selectDay" data-day="10/04/2022"
                                                                class="day new">4</td>
                                                            <td data-action="selectDay" data-day="10/05/2022"
                                                                class="day new">5</td>
                                                            <td data-action="selectDay" data-day="10/06/2022"
                                                                class="day new">6</td>
                                                            <td data-action="selectDay" data-day="10/07/2022"
                                                                class="day new">7</td>
                                                            <td data-action="selectDay" data-day="10/08/2022"
                                                                class="day new weekend">8</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="datepicker-months" style="display: none;">
                                                <table class="table-condensed">
                                                    <thead>
                                                        <tr>
                                                            <th class="prev" data-action="previous"><span
                                                                    class="fa fa-chevron-left" title="Previous Year"></span>
                                                            </th>
                                                            <th class="picker-switch" data-action="pickerSwitch"
                                                                colspan="5" title="Select Year">2022</th>
                                                            <th class="next" data-action="next"><span
                                                                    class="fa fa-chevron-right" title="Next Year"></span></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td colspan="7"><span data-action="selectMonth"
                                                                    class="month">Jan</span><span data-action="selectMonth"
                                                                    class="month">Feb</span><span data-action="selectMonth"
                                                                    class="month">Mar</span><span data-action="selectMonth"
                                                                    class="month">Apr</span><span data-action="selectMonth"
                                                                    class="month">May</span><span data-action="selectMonth"
                                                                    class="month">Jun</span><span data-action="selectMonth"
                                                                    class="month">Jul</span><span data-action="selectMonth"
                                                                    class="month">Aug</span><span data-action="selectMonth"
                                                                    class="month active">Sep</span><span
                                                                    data-action="selectMonth" class="month">Oct</span><span
                                                                    data-action="selectMonth" class="month">Nov</span><span
                                                                    data-action="selectMonth" class="month">Dec</span></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="datepicker-years" style="display: none;">
                                                <table class="table-condensed">
                                                    <thead>
                                                        <tr>
                                                            <th class="prev" data-action="previous"><span
                                                                    class="fa fa-chevron-left" title="Previous Decade"></span>
                                                            </th>
                                                            <th class="picker-switch" data-action="pickerSwitch"
                                                                colspan="5" title="Select Decade">2020-2029</th>
                                                            <th class="next" data-action="next"><span
                                                                    class="fa fa-chevron-right" title="Next Decade"></span>
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td colspan="7"><span data-action="selectYear"
                                                                    class="year old">2019</span><span data-action="selectYear"
                                                                    class="year">2020</span><span data-action="selectYear"
                                                                    class="year">2021</span><span data-action="selectYear"
                                                                    class="year active">2022</span><span
                                                                    data-action="selectYear" class="year">2023</span><span
                                                                    data-action="selectYear" class="year">2024</span><span
                                                                    data-action="selectYear" class="year">2025</span><span
                                                                    data-action="selectYear" class="year">2026</span><span
                                                                    data-action="selectYear" class="year">2027</span><span
                                                                    data-action="selectYear" class="year">2028</span><span
                                                                    data-action="selectYear" class="year">2029</span><span
                                                                    data-action="selectYear" class="year old">2030</span></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="datepicker-decades" style="display: none;">
                                                <table class="table-condensed">
                                                    <thead>
                                                        <tr>
                                                            <th class="prev" data-action="previous"><span
                                                                    class="fa fa-chevron-left"
                                                                    title="Previous Century"></span></th>
                                                            <th class="picker-switch" data-action="pickerSwitch"
                                                                colspan="5">2000-2090</th>
                                                            <th class="next" data-action="next"><span
                                                                    class="fa fa-chevron-right" title="Next Century"></span>
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td colspan="7"><span data-action="selectDecade"
                                                                    class="decade old" data-selection="2006">1990</span><span
                                                                    data-action="selectDecade" class="decade"
                                                                    data-selection="2006">2000</span><span
                                                                    data-action="selectDecade" class="decade"
                                                                    data-selection="2016">2010</span><span
                                                                    data-action="selectDecade" class="decade active"
                                                                    data-selection="2026">2020</span><span
                                                                    data-action="selectDecade" class="decade"
                                                                    data-selection="2036">2030</span><span
                                                                    data-action="selectDecade" class="decade"
                                                                    data-selection="2046">2040</span><span
                                                                    data-action="selectDecade" class="decade"
                                                                    data-selection="2056">2050</span><span
                                                                    data-action="selectDecade" class="decade"
                                                                    data-selection="2066">2060</span><span
                                                                    data-action="selectDecade" class="decade"
                                                                    data-selection="2076">2070</span><span
                                                                    data-action="selectDecade" class="decade"
                                                                    data-selection="2086">2080</span><span
                                                                    data-action="selectDecade" class="decade"
                                                                    data-selection="2096">2090</span><span
                                                                    data-action="selectDecade" class="decade old"
                                                                    data-selection="2106">2100</span></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="picker-switch accordion-toggle"></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Monthly Recap Report</h5>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <div class="btn-group">
                                <button type="button" class="btn btn-tool dropdown-toggle" data-toggle="dropdown"
                                    aria-expanded="false">
                                    <i class="fas fa-wrench"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right" role="menu" style="">
                                    <a href="#" class="dropdown-item">Action</a>
                                    <a href="#" class="dropdown-item">Another action</a>
                                    <a href="#" class="dropdown-item">Something else here</a>
                                    <a class="dropdown-divider"></a>
                                    <a href="#" class="dropdown-item">Separated link</a>
                                </div>
                            </div>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body" style="display: block;">
                        <div class="row">
                            <div class="col-md-8">
                                <p class="text-center">
                                    <strong>Sales: 1 Jan, 2014 - 30 Jul, 2014</strong>
                                </p>

                                <div class="chart">
                                    <div class="chartjs-size-monitor">
                                        <div class="chartjs-size-monitor-expand">
                                            <div class=""></div>
                                        </div>
                                        <div class="chartjs-size-monitor-shrink">
                                            <div class=""></div>
                                        </div>
                                    </div>
                                    <!-- Sales Chart Canvas -->
                                    <canvas id="salesChart" height="270"
                                        style="height: 180px; display: block; width: 623px;" width="934"
                                        class="chartjs-render-monitor"></canvas>
                                </div>
                                <!-- /.chart-responsive -->
                            </div>
                            <!-- /.col -->
                            <div class="col-md-4">
                                <p class="text-center">
                                    <strong>Goal Completion</strong>
                                </p>

                                <div class="progress-group">
                                    Add Products to Cart
                                    <span class="float-right"><b>160</b>/200</span>
                                    <div class="progress progress-sm">
                                        <div class="progress-bar bg-primary" style="width: 80%"></div>
                                    </div>
                                </div>
                                <!-- /.progress-group -->

                                <div class="progress-group">
                                    Complete Purchase
                                    <span class="float-right"><b>310</b>/400</span>
                                    <div class="progress progress-sm">
                                        <div class="progress-bar bg-danger" style="width: 75%"></div>
                                    </div>
                                </div>

                                <!-- /.progress-group -->
                                <div class="progress-group">
                                    <span class="progress-text">Visit Premium Page</span>
                                    <span class="float-right"><b>480</b>/800</span>
                                    <div class="progress progress-sm">
                                        <div class="progress-bar bg-success" style="width: 60%"></div>
                                    </div>
                                </div>

                                <!-- /.progress-group -->
                                <div class="progress-group">
                                    Send Inquiries
                                    <span class="float-right"><b>250</b>/500</span>
                                    <div class="progress progress-sm">
                                        <div class="progress-bar bg-warning" style="width: 50%"></div>
                                    </div>
                                </div>
                                <!-- /.progress-group -->
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- ./card-body -->
                    <div class="card-footer" style="display: block;">
                        <div class="row">
                            <div class="col-sm-3 col-6">
                                <div class="description-block border-right">
                                    <span class="description-percentage text-success"><i class="fas fa-caret-up"></i>
                                        17%</span>
                                    <h5 class="description-header">$35,210.43</h5>
                                    <span class="description-text">TOTAL REVENUE</span>
                                </div>
                                <!-- /.description-block -->
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-3 col-6">
                                <div class="description-block border-right">
                                    <span class="description-percentage text-warning"><i class="fas fa-caret-left"></i>
                                        0%</span>
                                    <h5 class="description-header">$10,390.90</h5>
                                    <span class="description-text">TOTAL COST</span>
                                </div>
                                <!-- /.description-block -->
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-3 col-6">
                                <div class="description-block border-right">
                                    <span class="description-percentage text-success"><i class="fas fa-caret-up"></i>
                                        20%</span>
                                    <h5 class="description-header">$24,813.53</h5>
                                    <span class="description-text">TOTAL PROFIT</span>
                                </div>
                                <!-- /.description-block -->
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-3 col-6">
                                <div class="description-block">
                                    <span class="description-percentage text-danger"><i class="fas fa-caret-down"></i>
                                        18%</span>
                                    <h5 class="description-header">1200</h5>
                                    <span class="description-text">GOAL COMPLETIONS</span>
                                </div>
                                <!-- /.description-block -->
                            </div>
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.card-footer -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
@endsection
