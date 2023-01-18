<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Recargas</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" type="text/css" href="{{ URL::to('css/app.css') }}">

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
            header {
                background: rgba(0,0,0,0.7);
                width: 100%;
                position: fixed;
                z-index: 100;
            }
            nav {
            float: left;
            }
            nav ul {
            list-style: none;
            overflow: hidden; 
            }
            nav ul li {
            float: left;
            font-family: Arial, Helvetica, sans-serif;;
            font-size: 20px;
            }
            nav ul li a {
            display: block; 
            padding: 20px;
            color: #fff;
            text-decoration: none;
            }
            nav ul li:hover {
            background: #eca023;
            }

            /* container */
            .container {
                padding-top: 120px
            }
            
        </style>
    </head>
    <body>
        <header>
            <nav>
                <ul>
                <li><a href="/">Inicio</a></li>
                <li><a href="/clients">Clientes</a></li>
             </ul>
            </nav>
        </header>
        <div class="container">
            @yield('content')
        </div>
    </body>
</html>