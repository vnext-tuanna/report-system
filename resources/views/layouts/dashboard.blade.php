<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('layouts.includes.head')
<body id="body-pd">
@include('layouts.includes.header')
<div class="container-fluid wrapper-container-fluid">
    <main class="main">

        @yield('content')
    </main>
</div>
@stack('modal')
@include('layouts.includes.footer')
@include('layouts.includes.script')
</body>
</html>
