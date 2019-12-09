@extends('layout')
<header>
    <style>
        .menu{
            margin-top:3em;
            float:left;
            margin-left: 0;
            width:10%;
        }
        .menu ul{
            list-style:none;
            border:1px solid #c0c0c0;
        }

        .menu a{
            font-family: 'Yeon Sung', cursive;
            text-decoration: none;
            color:black;
        }

        .menu li{
            border-right:1px solid #c0c0c0;
        }

        .lista{
            margin-top:3em;
            float:right;
            width:90%;

        }

        .busca{
            width:100%;
            text-align:center;
            text-align:center;

        }

        .busca input{
            width:50%;
            margin-right: 1em;
            border-radius: 15px;
            border-color: #6cb2eb;
            text-align: center;
        }




    </style>
</header>
@section('content')

    @yield('barraLateral')
    <div class="menu">
    <nav>
        <ul>
            <li><a href="/conta/lista/A">A</a></li>
            <li><a href="/conta/lista/B">B</a></li>
            <li><a href="/conta/lista/C">C</a></li>
            <li><a href="/conta/lista/D">D</a></li>
            <li><a href="/conta/lista/E">E</a></li>
            <li><a href="/conta/lista/F">F</a></li>
            <li><a href="/conta/lista/G">G</a></li>
            <li><a href="/conta/lista/H">H</a></li>
            <li><a href="/conta/lista/I">I</a></li>
            <li><a href="/conta/lista/J">J</a></li>
            <li><a href="/conta/lista/K">K</a></li>
            <li><a href="/conta/lista/L">L</a></li>
            <li><a href="/conta/lista/M">M</a></li>
            <li><a href="/conta/lista/N">N</a></li>
            <li><a href="/conta/lista/O">O</a></li>
            <li><a href="/conta/lista/P">P</a></li>
            <li><a href="/conta/lista/Q">Q</a></li>
            <li><a href="/conta/lista/R">R</a></li>
            <li><a href="/conta/lista/S">S</a></li>
            <li><a href="/conta/lista/T">T</a></li>
            <li><a href="/conta/lista/U">U</a></li>
            <li><a href="/conta/lista/V">V</a></li>
            <li><a href="/conta/lista/W">W</a></li>
            <li><a href="/conta/lista/X">X</a></li>
            <li><a href="/conta/lista/Y">Y</a></li>
            <li><a href="/conta/lista/Z">Z</a></li>
        </ul>
    </nav>
    </div>
    <div class="lista">
    <div>
        <div class="busca"><form action="/conta/busca"><input type="text" name="termo"> <button class="btn btn-primary" type="submit>">Buscar</button></form></div>    <table class="table">
        <thead>
        <tr>
            <th scope="col" style="font-size: 1em; text-align: center; font-family: 'Yeon Sung', cursive;">#</th>
            <th scope="col" style="font-size: 1em; text-align: center; font-family: 'Yeon Sung', cursive;">Nome</th>
            <th scope="col" style="font-size: 1em; text-align: center; font-family: 'Yeon Sung', cursive;">Valor Atual</th>
            <th scope="col" style="font-size: 1em; text-align: center; font-family: 'Yeon Sung', cursive;">Último Pagamento</th>
        </tr>
        </thead>
        <tbody>
        @foreach($clientes as $cliente)
            <tr>

                <td style="font-size: 1.5em; text-align: center; font-family: 'Yeon Sung', cursive;">{{$cliente->id}}</td>


                <td  onclick="location.href='/conta/show/{{$cliente->id}}'" style=" cursor:pointer; font-size: 1.5em; text-align: center; font-family: 'Yeon Sung', cursive;">
                            {{$cliente->Nome}}
                </td>
                <td style="text-align: center;">{{$contas[($cliente->conta_id)-1]->saldoTotal}}</td>
                <td style="text-align: center;">{{\Carbon\Carbon::parse($contas[($cliente->conta_id)-1]->updated_at)->format('d/m/Y')}}</td>
            </tr>

        @endforeach
        </tbody>
    </table>
    </div>
    </div>

@endsection('content')
