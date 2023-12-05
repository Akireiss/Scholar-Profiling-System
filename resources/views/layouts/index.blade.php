@include('layouts.header')

@include('layouts.admin.navbar')
@include('layouts.admin.sidebar')

<main id="main" class="main">
@yield('content')
</main>

@include('components.footer')
@include('layouts.footer')
