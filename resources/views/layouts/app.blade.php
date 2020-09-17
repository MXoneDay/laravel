<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

    @include('layouts.head')

    <body>
        @include('components.header')

        <main>
            <article>
                @yield('content')
            <article>
        </main>

        @include('components.footer')
    </body>
</html>
