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
                <div class="title">Laravel 5</div>
                <div id="trailer">
                    <marquee class="pan"><<<   <    < </marquee>
                    <marquee class="pan">   <<<   <   </marquee>
                    <marquee class="pan"><  <   <<<  <</marquee>
                    <marquee class="pan"> <<  <<   <<<</marquee>
                </div>
                <div id="login">
                    <form>
                        <div class="form-group">
                            <label for="txtUsername">Email address</label>
                            <input type="text" class="form-control" id="txtUsername" placeholder="Username">
                        </div>
                        <div class="form-group">
                            <label for="txtPassword">Password</label>
                            <input type="password" class="form-control" id="txtPassword" placeholder="Password">
                        </div>
                        <button type="submit" class="btn btn-default">Login</button>
                        <button type="submit" class="btn btn-default">Register</button>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
