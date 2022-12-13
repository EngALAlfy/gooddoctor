@extends('layout.panel')

@section('title')
    @lang('all.recipe_num') {{ $recipe->id }}
@endsection

@section('page_title')
    @lang('all.recipe_num') {{ $recipe->id }}
@endsection

@push('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('recipes.index') }}">@lang('all.recipes')</a></li>
@endpush

@section('breadcrumb_title')
    @lang('all.recipe_num') {{ $recipe->id }}
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header p-2">
                        <ul class="nav nav-pills">
                            <li class="nav-item"><a class="nav-link active" href="#recipe-info"
                                    data-toggle="tab">@lang('all.recipe')</a>
                            </li>
                            <li class="nav-item"><a class="nav-link  " href="#design"
                                    data-toggle="tab">@lang('all.recipe-design')</a></li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane active" id="recipe-info">
                                <div class="card card-secondary">
                                    <div class="card-body">
                                        @if (!$recipe->drugs || count($recipe->drugs) <= 0)
                                            <div class="alert alert-info m-l-10 m-r-10">
                                                <h6><i class="icon fas fa-info"></i> @lang('all.no_data')</h6>
                                            </div>
                                        @else
                                            <ul dir="ltr" class="text-left">
                                                @foreach ($recipe->drugs as $drug)
                                                    <li class="drug-recipe">

                                                        <div class="d-flex justify-content-between">
                                                            <span><a href="{{ route('drugs.show', $drug) }}"
                                                                    target="_blank">
                                                                    {{ $drug->name }}</a></span>

                                                            <span><a href="{{ route('drugs.show', $drug) }}"
                                                                    target="_blank">{{ $drug->ar_name }}</a></span>
                                                            <span> {{ $drug->pivot->amount }}</span>
                                                            <span>
                                                                {{ trans_choice('all.repeat_every_x_hours', $drug->pivot->repeat_every_hours, ['x' => $drug->pivot->repeat_every_hours]) }}</span>

                                                            <span>{{ $drug->pivot->info }}</span>
                                                            <button class="btn btn-tool">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </div>

                                                    </li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="design">
                                <div class="row justify-content-center">
                                    <div class="m-0 p-0" id="recipe">
                                        <div class="card m-0 p-0"
                                            style="background-color: #e6e6e6;width: 148mm;height: 210mm;">
                                            <div class="border"
                                                style="background-color: #e6e6e6;width: 148mm;height: 210mm;background-image: url('{{ $recipe_template }}')">

                                                @foreach ($recipe_items as $item)
                                                    <p class="recipe-design-item text-center"
                                                        data-card="{{ $item }}"
                                                        style="
                                                        font-family:'{{ ${$item . '_font'} }}';
                                                        font-size:{{ ${$item . '_font_size'} }}px;
                                                        color:{{ ${$item . '_color'} }};
                                                        position: absolute;
                                                        top:{{ ${$item . '_top_position'} }}mm;
                                                        right:{{ ${$item . '_left_position'} }}mm">

                                                        @if ($item == 'phone')
                                                            <i class="fa fa-phone"></i>
                                                        @endif
                                                        @if ($item == 'whatsapp')
                                                            <i class="fab fa-whatsapp"></i>
                                                        @endif
                                                        {!! str_replace("\n", '<br/>', ${$item}) !!}
                                                    </p>
                                                @endforeach

                                                <ul dir="ltr" class="text-left"
                                                    style="
                                            font-family:'{{ $drugs_font }}';
                                            font-size:{{ $drugs_font_size }}px;
                                            color:{{ $drugs_color }};
                                            position: absolute;
                                            top:{{ $drugs_top_position }}mm;
                                            left:{{ $drugs_left_position }}mm">
                                                    @foreach ($recipe->drugs as $drug)
                                                        <li class="drug-recipe">
                                                            @if ($drug->name)
                                                                {{ $drug->name }}
                                                            @endif
                                                            @if ($drug->ar_name)
                                                                - {{ $drug->ar_name }}
                                                            @endif
                                                            @if ($drug->pivot->amount)
                                                                - {{ $drug->pivot->amount }}
                                                            @endif
                                                            @if ($drug->pivot->repeat_every_hours)
                                                                -
                                                                {{ trans_choice('all.repeat_every_x_hours', $drug->pivot->repeat_every_hours, ['x' => $drug->pivot->repeat_every_hours]) }}
                                                            @endif
                                                            @if ($drug->pivot->info)
                                                                - {{ $drug->pivot->info }}
                                                            @endif
                                                        </li>
                                                    @endforeach
                                                </ul>

                                            </div>
                                        </div>
                                        <div class="no-print m-t-10"></div>
                                        <div class="card m-0 p-0"
                                            style="background-color: #e6e6e6;width: 148mm;height: 210mm;">
                                            <div class="border"
                                                style="background-color: #e6e6e6;width: 148mm;height: 210mm;background-image: url('{{ $recipe_template }}')">

                                                @foreach ($recipe_items as $item)
                                                    <p class="recipe-design-item text-center"
                                                        data-card="{{ $item }}"
                                                        style="
                                                        font-family:'{{ ${$item . '_font'} }}';
                                                        font-size:{{ ${$item . '_font_size'} }}px;
                                                        color:{{ ${$item . '_color'} }};
                                                        position: absolute;
                                                        top:{{ ${$item . '_top_position'} }}mm;
                                                        right:{{ ${$item . '_left_position'} }}mm">

                                                        @if ($item == 'phone')
                                                            <i class="fa fa-phone"></i>
                                                        @endif
                                                        @if ($item == 'whatsapp')
                                                            <i class="fab fa-whatsapp"></i>
                                                        @endif
                                                        {!! str_replace("\n", '<br/>', ${$item}) !!}
                                                    </p>
                                                @endforeach

                                                <ul dir="ltr" class="text-left"
                                                    style="
                                            font-family:'{{ $drugs_font }}';
                                            font-size:{{ $drugs_font_size }}px;
                                            color:{{ $drugs_color }};
                                            position: absolute;
                                            top:{{ $drugs_top_position }}mm;
                                            left:{{ $drugs_left_position }}mm">
                                                    @foreach ($recipe->drugs as $drug)
                                                        <li class="drug-recipe">
                                                            @if ($drug->name)
                                                                {{ $drug->name }}
                                                            @endif
                                                            @if ($drug->ar_name)
                                                                - {{ $drug->ar_name }}
                                                            @endif
                                                            @if ($drug->pivot->amount)
                                                                - {{ $drug->pivot->amount }}
                                                            @endif
                                                            @if ($drug->pivot->repeat_every_hours)
                                                                -
                                                                {{ trans_choice('all.repeat_every_x_hours', $drug->pivot->repeat_every_hours, ['x' => $drug->pivot->repeat_every_hours]) }}
                                                            @endif
                                                            @if ($drug->pivot->info)
                                                                - {{ $drug->pivot->info }}
                                                            @endif
                                                        </li>
                                                    @endforeach
                                                </ul>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-6"><a class="btn btn-block btn-warning mb-2"
                                            href="{{ route('settings.recipe-design') }}" target="_blank"><i
                                                class="fa fa-edit mr-2"></i>@lang('all.edit') @lang('all.recipe-design')</a></div>
                                    <div class="col-md-6"><button class="btn btn-block btn-primary mb-2"
                                            id="print-recipe"><i class="fa fa-print mr-2"></i>@lang('all.print_recipe')</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>




        </div>
    </div>
@endsection

@push('styles')
    @for ($i = 1; $i <= 5; $i++)
        <style>
            @font-face {
                font-family: '{{ $i }}.ttf';
                src: url('{{ asset('assets/fonts/' . $i . '.ttf') }}');
                font-weight: 400;
                font-style: normal
            }

            #font-{{ $i }} {
                font-family: '{{ $i }}.ttf';
            }
        </style>
    @endfor

    <style>
        .drug-recipe::marker {
            content: 'R/ ';
            font-size: 24px;
            font-style: italic;
            font-weight: 500;
        }
    </style>
@endpush

@push('scripts')
    <script src="{{ asset('assets/custom/js/print/jQuery.print.min.js') }}"></script>

    <script>
        $('#print-recipe').click(function() {
            $('#recipe').print({
                stylesheet: "{{ asset('assets/custom/css/print-recipe.css') }}"
            });
        });
    </script>
@endpush
