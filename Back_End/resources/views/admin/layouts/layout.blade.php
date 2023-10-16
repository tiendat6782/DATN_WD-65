@extends('admin.layouts.head')
<body>
    @yield('contain')
</body>
</html>
@if(session('msg'))
    <script>
        alert('{{ session('msg') }}');
    </script>
@endif