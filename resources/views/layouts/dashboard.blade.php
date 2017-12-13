<!doctype html>
<html class="no-js" lang="en">

    @include('layouts.partials.head')

    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <!-- Page -->

        <div class="app" id="app">
            @include('layouts.partials.dashboard-header')
            @include('layouts.partials.sidebar')
            <article class="content dashboard-page">
                @yield('content')
            </article>
        </div>

        <!-- Reference block for JS -->
        <div class="ref" id="ref">
            <div class="color-primary"></div>
            <div class="chart">
                <div class="color-primary"></div>
                <div class="color-secondary"></div>
            </div>
        </div>

        <form style="display: none" id="confirmDelete" method="POST">
            {{ csrf_field() }}
            <input name="_method" type="hidden" value="DELETE">
        </form>
        @include('layouts.partials.scripts')
        @stack('scripts')

        @if (isset($firstTimeLogin) && $firstTimeLogin)
            @include('modals.first-time-login')
        @endif
    </body>
</html>
