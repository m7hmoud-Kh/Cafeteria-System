@include('website.includes.header')

@include('website.includes.nav')

<div class="container">
    @include('website.includes.hero')

    @yield('content')
</div>

@include('website.includes.footer')
