<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@include('includes.head')

<body>

    @include('includes.success')
    
    <main class="container py-3">
        @yield('content')
    </main>

    @include('includes.nav')

</body>
</html>
