<!DOCTYPE html>
<html>
    <head>
        <title>3source</title>
        {!! HTML::style('css/droid-sans-mono-dotted-font.css') !!}
        {!! HTML::style('css/app.css') !!}
        {!! HTML::script('js/all.js') !!}
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div id="container">
            <div id="content">
                @yield('content')
            </div>
        </div>
    </body>
</html>
