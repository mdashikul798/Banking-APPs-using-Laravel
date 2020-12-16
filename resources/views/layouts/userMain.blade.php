<!DOCTYPE html>
<html>
<head>
    @include('includes.head1')
    @yield('styles')
</head>

<body>
<div class="container">
    <div id="header">
        @include('includes.header1')
    </div>
    @yield('content')
    <div id="footer">
        @include('includes.footer1')
    </div>
</div>
@yield('scripts')
</body>
</html>