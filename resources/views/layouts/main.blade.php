{{--<html>--}}
{{--<head>--}}
    {{--<title>@yield('title')</title>--}}

    {{--@include('includes.head')--}}
{{--</head>--}}
{{--<body>--}}
{{--@include('includes.header')--}}


{{--@yield('content')--}}

{{--@include('includes.footer')--}}
{{--@include('includes.foot')--}}

{{--</body>--}}
{{--</html>--}}




    @section('header')
       @include('includes.header')
    @show

    @yield('content')

    @section('footer')
        @include('includes.footer')
    @show
