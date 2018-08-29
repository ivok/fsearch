<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        form {
            margin: 50px auto;
            padding: 10px;
        }

        form input {
            width: 100%;
            clear: both;
            line-height: 40px;
            text-indent: 15px;
            margin: 10px 0px;
            border: 1px solid silver;
            border-radius: 4px;
            font-size: 1.23em;
        }

        .button {
            padding: 10px 15px;
            background: #2d995b;
            border: 1px solid #2a9055;
            border-radius: 4px;
            font-size: 1.1em;
            color: white;
        }

        button:hover {
            background: #2a9055;
            cursor: pointer;
        }

        ::placeholder {
            color: #c6c8ca;
        }
        table {
            clear: both;
            margin: 30px auto;
            border: 1px solid silver;
        }

        ul {
            list-style: none;
            padding: 0;
            margin: 0;
            text-indent: 0;
        }
    </style>
</head>
<body>
<div class="flex-center position-ref full-height">
    @if (Route::has('login'))
        <div class="top-right links">
            @auth
                <a href="{{ url('/home') }}">Home</a>
            @else
                <a href="{{ route('login') }}">Login</a>
                <a href="{{ route('register') }}">Register</a>
            @endauth
        </div>
    @endif

    <div class="content">
        <div class="title m-b-md">
            FSearch
        </div>
        <p>Search resutls</p>
            @if(is_array($result) && !empty($result))
            <table>
                @foreach ($result as $item)
                <tr>
                    <td style="text-align: left">
                        <strong>{{ $item['file'] }}</strong>
                        <ul>
                            @foreach($item['lines'] as $line)
                                <li>{{ $line }}</li>
                            @endforeach
                        </ul>
                    </td>
                </tr>
                @endforeach
            </table>
            @else
                <p style="margin: 30px auto; font-size: 1.4em"><big>{{ !empty($result) ? $result : 'Nothing found...' }}</big></p>
            @endif
        <a class="button" href="{{ route('fs.home') }}">Go back</a>
    </div>
</div>
</body>
</html>

