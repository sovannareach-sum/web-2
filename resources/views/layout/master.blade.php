<html lang="en">
<head>
    @include('layout.head')
    @yield('styles')
    @yield('js')
</head>

<body>
    <nav>
        @include('layout.nav')
    </nav>
    <main>
        @yield('content')
    </main>
</body>

</html>