<html>
    <head>
        <title>등용문 - @yield('title')</title>
    </head>
    <body>
        @section('sidebar')
            master parent sidebar.
        @show

        <div class="container">
            @yield('content')
        </div>
    </body>
</html>
