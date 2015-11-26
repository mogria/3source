<!DOCTYPE html>
<html>
    <head>
        <title>3source</title>
        {!! HTML::style('css/droid-sans-mono-dotted-font.css') !!}
        {!! HTML::style('css/app.css') !!}
        {!! HTML::script('js/jquery-2.1.4.min.js') !!}
        {!! HTML::script('js/spritely-0.6.8/src/jquery.spritely.js') !!}
        {!! HTML::script('js/trailer.js') !!}
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
