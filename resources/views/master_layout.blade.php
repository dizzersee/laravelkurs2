<html>
    <head>
        <title>@yield('title')</title>

        <style>
            body {
                background: antiquewhite;
            }

            .container {
                max-width: 800px;
                margin: 0 auto;

            }
        </style>
    </head>
    <body>
        <div class="container">
            @yield('content')
        </div>
    </body>
</html>
