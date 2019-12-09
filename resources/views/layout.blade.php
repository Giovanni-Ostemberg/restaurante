
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Just+Another+Hand|Yeon+Sung&display=swap&effect=stonewash" rel="stylesheet">
    <link href="resources/css/pagina.css" rel="stylesheet">
    <style>
        .principal{
            position:fixed;
            top:0;
            width:100%
        }
        a{
            margin: 0 2em;
            display: inline;
            width:100%;
        }
        h1{
            text-align: center;
            background-color: darkslateblue;
            color:white;
            margin-bottom: 0;
        }

        .cabecalho{
            text-align: left;
            font-family: 'Yeon Sung', cursive;
            font-size: 3em;
        }
        td,th{
            font-size: 1.5em;
            font-family: 'Yeon Sung', cursive;
            color:black;

        }
        .soma{

            font-size: 1em;
            height: 2em;
        }
        label{
            margin: 0 1em;
            font-size: 1em;
            font-family: 'Yeon Sung', cursive;
            color:black;
        }
        input{
            font-family: 'Yeon Sung', cursive;

        }
        .links{
            text-align: center;
            bottom: 0;
            position: fixed;
            background-color: black;
            width:100%;
            padding: 0.5em;
            margin:auto;
            font-family: 'Yeon Sung', cursive;
        }
        links.button,links.a{
            background-color: black;
            color:black;
            margin-right:3em;
            width:150px;
        }
    </style>

</head>
<body>
<nav class="navbar navbar-dark bg-dark principal">
    <div><a href="/" class="text-white h4">Início</a></div>
    <div style="float:Right;">
        <a class="text-white h4" href="/pedidos">Pedidos</a>
        <a class="text-white h4" href="/produtos">Produtos</a>
        <a class="text-white h4" href="/clientes">Clientes</a>
        <a class="text-white h4" href="/contas">Contas</a>
    </div>


</nav>
@yield('content')
<footer>@yield('barra')</footer>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>
