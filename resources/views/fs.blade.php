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

        button {
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
    </style>
</head>
<body>
<div class="flex-center position-ref full-height">
    <div class="content">
        <div class="title m-b-md">
            FSearch
        </div>
        <p>Search for a content in files...</p>
        <form action="{{route('fs.search')}}" method="post">
            <input required type="text" placeholder="/path/to/dir" name="path">
            <input required type="text" placeholder="Search for..." name="content">
            <button type="submit">Search</button>
        </form>
    </div>
</div>
</body>
</html>
