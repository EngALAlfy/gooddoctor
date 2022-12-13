<footer class="main-footer d-flex justify-content-between">
    <ul class="navbar-nav float-right" style="flex-direction: row;">

        <li class="nav-item d-none d-sm-inline-block px-2">
            <a target="_blank" href="{{ route('help') }}" class="text-muted nav-link  p-0">@lang('all.help')</a>
        </li>

        <li class="nav-item d-none d-sm-inline-block border-right px-2">
            <button onclick="introJs().start();" class="nav-link px-1 py-0 btn btn-sm btn-outline-info"><i class="fa fa-play mr-2"></i>@lang('all.start_tour')</button>
        </li>
    </ul>

    <div class="d-inline-block" style="">
        @php
            $emojies = [12 , 13  , 15 ,16 ,19,21,22,25,26 , 36 , 38 , 67];
            $emoji = '&#1285' . $emojies[rand(0 , count($emojies) - 1)];
        @endphp
        <a class="text-muted" target="_blank" href="{{route('copyright')}}">صنع بواسطة {!!$emoji!!} الالفي.كوم</a>
    </div>

    <div id="time" style="cursor: not-allowed" class="float-left d-none d-sm-inline-block"></div>
</footer>
