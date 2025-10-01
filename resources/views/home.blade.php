@extends('layouts.app')

@section('title', 'Home | Pilot Training | CabinCrew Training | Skylead Aviation | Hassan')

@section('meta')
    <meta name="description" content="Skylead Aviation Academy provides vocational Training in the fields of Aviation, Hospitality, Tours & Travel. Established in the year 2019 it is a private Institute for students who are looking forward to start a career in aviation and hospitality.">
    <meta property="og:title" content="Home | Pilot Training | CabinCrew Training | Skylead Aviation | Hassan">
    <meta property="og:description" content="Skylead Aviation Academy provides vocational Training in the fields of Aviation, Hospitality, Tours & Travel. Established in the year 2019 it is a private Institute for students who are looking forward to start a career in aviation and hospitality.">
    <meta property="og:url" content="{{ url('/') }}">
    <meta property="og:type" content="website">
@stop

@section('content')
    <div id="SITE_PAGES" class="JsJXaX SITE_PAGES">
        <div id="SITE_PAGES_TRANSITION_GROUP" class="AnQkDU">
            <div id="tuckg" class="dBAkHi tuckg">
                <div class="PFkO7r wixui-page" data-testid="page-bg"></div>
                <div class="HT5ybB">
                    <div id="Containertuckg" class="Containertuckg SPY_vo">
                        <!-- Include Sections -->
                        @include('sections.hero')
                        @include('sections.welcome')
                        @include('sections.programs')
                        @include('sections.why-skylead')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <!-- Home page specific scripts -->
    <script src="{{ asset('assets/js/home-slider.js') }}"></script>
@endsection