@include('layouts.header')
@livewireStyles

@include('layouts.admin.navbar')
@include('layouts.admin.sidebar')

<main id="main" class="main">
@yield('content')
</main>

@include('components.footer')
@livewireScripts
@include('layouts.footer')
