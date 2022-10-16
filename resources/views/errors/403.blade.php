<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Access Forbidden</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('logobaru.png') }}" />
    <style>
        body {
            background-color: #FEF0E0;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        }
        h1 {
            text-align: center;
            font-weight: 400;
            font-size: 100px;
            margin: 0;
            color: #E4546A;
            font-family: 'Arial';
        }
        h2 {
            text-align: center;
            font-weight: 300;
            font-size: 25px;
            margin-top: 0px;
            color: #575860;
        }
        div {
            margin: 100px auto;
            text-align: center;
        }
        .btn {
            text-decoration: none;
            text-align: center;
            margin: auto;
            display: inline-block;
            padding: 5px 20px;
            background-color: #4287f5;
            color: #fff;
            outline: none;
            border: none;
            border-radius: 4px;
            transition: 0.3s all ease;
            display: flex;
            justify-content: center;
            flex-direction: row;
            align-content: center;
            align-items: center;
            width: 140px;
        }
        .btn:hover {
            background-color: #1c58b8;
        }
        .img {
            width: 240px;
            margin: auto;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>
</head>
<body>
    <div>
        <div class="img">
            <img src="{{ asset('assets/images/computer.svg') }}" alt="Access denied" width="100%">
        </div>
        <h1>403</h1>
        <h2>Sorry, you don't have the permission to access this menu :(</h2>
        <a class="btn" href="{{ url('/') }}"><span style="font-size: 20px; margin-right: 5px;">&larr;</span> Back to home</a>
    </div>
</body>
</html>