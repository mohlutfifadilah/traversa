<!DOCTYPE html>
<html lang="en">
    @include('template.head')
<body>
    @include('template.nav')

    @yield('content')

    @include('template.footer')
    <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/tw-elements.umd.min.js"></script>
    @include('sweetalert::alert')
</body>
</html>
