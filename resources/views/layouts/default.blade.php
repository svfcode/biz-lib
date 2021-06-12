@include('layouts.head')

@include('components.nav')
@include('components.breadcrumbs')

<main class="content flex-grow">
    @yield('content')
</main>

@include('layouts.footer')
