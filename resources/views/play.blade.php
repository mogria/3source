<!DOCTYPE html>
<html ng-app="3source">
    <head>
        <title>Play 3source</title>
        {!! HTML::style('css/droid-sans-mono-dotted-font.css') !!}
        {!! HTML::style('css/app.css') !!}
        {!! HTML::script('js/all.js') !!}
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div id="game" ng-view>
        </div>

        <script type="text/ng-template" id="home.html">
            @include('play/home')
        </script>
    </body>
</html>
