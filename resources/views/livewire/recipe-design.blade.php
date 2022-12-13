<div>
    <div class="row justify-content-center">
        <div class="col">
            <div style="position: sticky;top:60px">
                @foreach ($recipe_items as $item)
                    <div
                        class="{{ $item }}_settings recipe-design-settings card card-secondary d-none @if ($recipe_design_current_card_settings == $item . '_settings') d-block @endif">
                        <div class="card-header">
                            <h5 class="card-title">@lang('all.' . $item)</h5>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>@lang('all.top') ({{ ${$item . '_top_position'} }}mm)</label>
                                <input wire:model="{{ $item }}_top_position" max="210" min="0"
                                    type="range" class="custom-range">
                            </div>
                            <div class="form-group">
                                <label>@lang('all.left') ({{ ${$item . '_left_position'} }}mm)</label>
                                <input wire:model="{{ $item }}_left_position" max="150" min="0"
                                    type="range" class="custom-range custom-range-danger">
                            </div>
                            <div class="form-group">
                                <label>@lang('all.font_size') ({{ ${$item . '_font_size'} }}px)</label>
                                <input wire:model="{{ $item }}_font_size" max="300" min="20"
                                    type="range" class="custom-range custom-range-warning">
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>

        <div class="card m-0 p-0" style="background-color: #e6e6e6;width: 148mm;height: 210mm;">
            <div class="border m-0 p-0" style="background-color: #e6e6e6;width: 148mm;height: 210mm;background-image: url('{{ $recipe_template }}')"
                id="recipe">

                @foreach ($recipe_items as $item)
                    <p class="recipe-design-item text-center @if ($recipe_design_current_card_settings == $item . '_settings') border @endif"
                        data-card="{{ $item }}"
                        style="
                        font-family:'{{ ${$item . '_font'} }}';
                        font-size:{{ ${$item . '_font_size'} }}px;
                        color:{{ ${$item . '_color'} }};
                        position: absolute;
                        top:{{ ${$item . '_top_position'} }}mm;
                        @if($item == "drugs") left:{{ ${$item . '_left_position'} }}mm @else right:{{ ${$item . '_left_position'} }}mm @endif">
                        @if($item == "phone") <i class="fa fa-phone"></i> @endif
                        @if($item == "whatsapp") <i class="fab fa-whatsapp"></i> @endif
                        {!! str_replace("\n", '<br/>', ${$item}) !!}</p>
                @endforeach

            </div>
        </div>

        <div class="col">
            <div style="position: sticky;top:60px">
                <button class="btn btn-block btn-primary mb-2" id="print-recipe"><i
                        class="fa fa-print mr-2"></i>@lang('all.print_recipe')</button>

                @foreach ($recipe_items as $item)
                    <div
                        class="{{ $item }}_settings recipe-design-settings card card-secondary d-none @if ($recipe_design_current_card_settings == $item . '_settings') d-block @endif">
                        <div class="card-header">
                            <h5 class="card-title">@lang('all.' . $item)</h5>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>@lang('all.color')</label>
                                <input value="{{ ${$item . '_color'} }}" type="text"
                                    class="form-control colorpicker-element" data-id="{{ $item }}_color"
                                    data-original-title="" title="">
                            </div>
                            <div class="form-group">
                                <label for="font">@lang('all.font')</label>
                                <select id="font" wire:model="{{ $item }}_font" class="custom-select"
                                    placeholder="@lang('all.font')">

                                    <option value="sans-serif" id="sans-serif">@lang('all.font_num_0')</option>

                                    @for ($i = 1; $i <= 5; $i++)
                                        <option value="{{ $i }}.ttf" id="font-{{ $i }}">
                                            {{ __('all.font_num_' . $i) }}</option>
                                    @endfor

                                </select>
                                @error('font')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>

    </div>

    @push('styles')
        <link rel="stylesheet"
            href="{{ asset('assets/adminLTE/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.css') }}">
        <style>
            /* recipe-design-item cursor pointer */
            .recipe-design-item {
                cursor: pointer;
            }

            /*  font selector */
            #sans-serif {
                font-family: sans-serif;
            }
        </style>

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
    @endpush

    @push('scripts')
        <script src="{{ asset('assets/adminLTE/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js') }}"></script>
        <script src="{{ asset('assets/custom/js/print/jQuery.print.min.js') }}"></script>

        <script>
            $('.colorpicker-element').colorpicker();
            $('.colorpicker-element').on('colorpickerChange', function(e) {
                var var_name = $(this).data('id');
                @this.set(var_name, e.color.toString());
            });

            // recipe item on click show the settings card
            $('.recipe-design-item').click(function() {
                @this.set('recipe_design_current_card_settings', $(this).data('card') + '_settings');
            });


            $('#print-recipe').click(function() {
                $('#recipe').print({
                    stylesheet: "{{ asset('assets/custom/css/print-recipe.css') }}"
                });
            });
        </script>
    @endpush
</div>
