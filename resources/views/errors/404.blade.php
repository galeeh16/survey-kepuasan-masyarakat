<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Page Not Found</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('logobaru.png') }}" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        }
        .container {
            padding-top: 70px;
            width: 100%;
            height: 100%;
            text-align: center;
        }
        .img {
            width: 350px;
            margin: auto;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        p {
            font-size: 40px;
            color: #555;
            font-weight: 100;
        }   
        a {
            margin-top: 20px;
            display: inline-block;
            text-decoration: none;
            color: #555;
            border: 1px solid #999;
            border-radius: 5px;
            padding: 5px 10px;
            transition: all 0.3s ease;
        }     
        a:hover {
            background-color: #222;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="img">
            <img src="{{ asset('assets/images/error-404-colour.svg') }}" alt="Error 404">
        </div>
        <p>This requested URL was not found on this server.</p>
        <a href="{{ url('/') }}"><i class="fa fa-arrow-left" style="font-size: 14px;"></i> Return back to home</a>
    </div>
</body>
</html>