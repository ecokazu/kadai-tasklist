<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>TaskList</title>
    </head>

    <body>
        {{--バリデーション--}}
        @include('commons.error_messages')

        @yield('content')
    </body>
</html>