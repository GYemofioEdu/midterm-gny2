<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    @include('includes.head')
<body>
    <div id="app" class="container">
        <header class="container">
            @include('includes.menu')
        </header>

        <main class="py-4">
            @yield('content')
        </main>

        @include('includes.footer')
    </div>
</body>
</html>
