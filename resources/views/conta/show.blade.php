@extends('layout' )
<?php $i=0;
$parcial=0;?>
@section('content')
    <head>

        <style>
            .footer:hover{
                cursor: pointer;
            }

            body{
                background-image: none;
            }

           
            
            /*.cabecalho{
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
                position:fixed; text-align: center; width:100%;
                background-color: white;
                margin:auto;
                font-family: 'Yeon Sung', cursive;
            }
            links.button,links.a{
                background-color: black;
                color:black;
                margin-right:3em;
            }*/
        </style>


    </head>
    @section('barra')
    <nav class="links">
        <div style="float:left;">
        <a class="text-white h4 footer" href="/conta/showAll/{{$cliente->id}}">Todos</a>
        <a class="text-white h4 footer" href="/conta/show/{{$cliente->id}}">Pendentes</a>
        <a class="text-white h4 footer" data-toggle="modal" data-target="#modalPagamento">Últimos Pagamentos</a>
        </div>
        <div style="float:right">
            <a data-toggle="modal" class="text-white h4 footer" data-target="#modalExemplo">Efetuar Pagamento</a></div>
        </div>
    </nav>
    @endsection('barra')




    <div style=" width:90%; margin: 3em auto; text-align:center; margin-top:100px;">

        <form action="/conta/showData/{{$cliente->id}}">
            <div class="input-group-prepend" style="text-align: center; color:black;">
                <div class="input-group-prepend" >
                    <label style="color:black;" id="button-addon1">Início</label>
                </div>
                <input style="text-align: center; color:black;" type="date" name="dataInicial"  class="form-control soma " aria-describedby="button-addon1">
                <!--</div>
                <div class="input-group-prepend font-effect-stonewash" style="text-align: center; color:black; width:20%;">-->
                <div class="input-group-prepend" >
                    <label style="color:black;" id="button-addon1">Fim</label>
                </div>
                <input style="text-align: center; color:black;" type="date" name="dataFinal"  class="form-control soma"  aria-describedby="button-addon1">
                <button type="submit">Filtrar</button>
            </div>
            <!--<label for="dataInicial">Início</label><input type="date" name="dataInicial">
            <label for="dataFinal">Fim</label><input type="date" name="dataFinal">-->

        </form>
        <div>
            <table class="table  table-hover" style="width:100%; margin:auto;">
                <thead>
                <tr>
                    <th colspan="2" class="cabecalho font-effect-stonewash">{{$cliente->Nome}}</th>
                    <th colspan="2" class="cabecalho font-effect-stonewash" style="font-size: 2em;" >{{$cliente->telefone}}</th>
                </tr>

                <tr>
                    <th style="text-align: center; width:20%;" >Data</th>
                    <th style="text-align: center; width:60%;" >Itens</th>
                    <th style="text-align: center; width:10%;" >Total</th>
                    <!-- <th style="text-align: center; visibility: hidden; width:5%;"  aria-hidden="true">Resta</th>-->
                    <th style="text-align: center; width:5%;" >Add</th>
                </tr>
                </thead>
                <tbody>
                <form action="/pagamento/parcial/{{$conta->id}}">
                    <input type="hidden" name="cliente" value="{{$cliente->id}}">
                    @foreach($pedidos as $pedido)
                        @if($pedido->resta == 0)
                            <tr style="background-color:    #CCFFD0;" class="table-hover">
                        @else
                            @if($pedido->resta < $pedido->valorTotal )
                                <tr class="table-warning">
                            @else
                                <tr class="table-danger">
                                    @endif
                                    @endif
                                    <td scope="col" style="text-align: center; color:black; width:20%;" >{{ \Carbon\Carbon::parse($pedido->created_at)->format('d/m/Y')}}</td>
                                    <td scope="col" style="text-align: center; color:black; width:50%;" >{{$itens[$i]}}</td>
                                    <td scope="col" style="text-align: center; color:black; width:20%;" >{{'R$ '.number_format($pedido->valorTotal, 2, ',', '.')}}</td>
                                <!-- <td  scope="col" style="text-align: center; color:black;">{{$pedido->resta}}</td>-->

                                    <p hidden>{{$parcial+=$pedido->resta}}</p>
                                    @if($pedido->resta == 0)
                                        <td scope="col" style="text-align: center; color:black; width:20%;" >Pago</td>
                                    @else

                                        <td scope="col" style="text-align: center; color:black; width:5%;" >
                                            <div class="btn-group-toggle" data-toggle="checkbox">
                                                <label class="btn btn-primary active" style="background-color: #49B35D;" onClick="mudarCor(this,'parcial{{$pedido->id}}')">
                                                    <input type="checkbox" checked value="{{$pedido->id}}" id="parcial{{$pedido->id}}" name="pedido[]" onClick="somaPedido({{$pedido->resta}},'parcial{{$pedido->id}}')"> Pagar
                                                </label>
                                            </div>
                                        @endif
                                        <!--<td scope="col" style="text-align: center; color:black;"><input type="checkbox" checked value="{{$pedido->id}}" id="parcial{{$pedido->id}}" name="pedido[]" onload="somaPedido({{$pedido->resta}},'parcial{{$pedido->id}}')" onClick="somaPedido({{$pedido->resta}},'parcial{{$pedido->id}}')"></td>-->

                                        <?php $i++ ?>
                                </tr>
                                @endforeach

                                <tr>
                                    <th scope="col" style="text-align: center;" >Valor Total</th>
                                    <td scope="col" style="text-align: center;" >{{'R$ '.number_format($pedido->valorTotal, 2, ',', '.')}}</td>
                                    <!--<td scope="col" >Parcial</td>-->
                                    <td scope="col" colspan="2" style="text-align: center; color:black; width:5%;">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <button style="color:black;" class="btn btn-outline-secondary" type="submit" id="button-addon1">Pagar</button>
                                            </div>
                                            <input style="text-align: center; color:black;" type="text"  id="parcial"  value="{{$parcial}}"  name="somaParcial" class="form-control soma" aria-label="Example text with button addon" aria-describedby="button-addon1">
                                        </div></td>
                                </tr>
                </form>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal Pagamento-->
    <div class="modal fade" id="modalPagamento" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="text-align:center;">
                    <h5 class="modal-title" style="text-align:center; margin:auto; color:#3EA001; font-family: 'Yeon Sung', cursive" id="exampleModalLabel" class=" ">Últimos Pagamentos</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table shadow p-3 mb-5 bg-white rounded table-hover" style="width:100%; margin:0;">

                        @foreach($pagamentos as $pagamento)
                            <form action="/pagamento/{{$pagamento->id}}/destroy">
                                <tr style="color:#81FF62;">
                                    <td scope="col" style="text-align: center; color:#3EA001;">{{ \Carbon\Carbon::parse($pagamento->dataPagamento)->format('d/m/Y')}}</td>
                                    <td scope="col" style="text-align: center; color:#3EA001;">{{'R$ '.number_format($pagamento->valor, 2, ',', '.')}}</td>
                                </tr>
                            </form>
                        @endforeach
                    </table>

                </div>
            </div>
        </div>
        <div class="card card-body">

        </div>
    </div>



    <!-- Modal -->
    <div class="modal fade" id="modalExemplo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel" class=" ">Pagamento</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/pagamento/store/{{$conta ->id}}">
                        <input type="text" class="form-control" name="pagamento" value="0.00">
                        <input type="hidden" name="cliente" value="{{$cliente->id}}">
                        <button type="submit">Confirmar</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button type="button" class="btn btn-primary">Salvar mudanças</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        function mudarCor(botao, name) {
            var linha = document.getElementById(name);
            if(linha.checked) {
                botao.style.backgroundColor = '#49B35D';
            }else{
                botao.style.backgroundColor = '#B35B6A';
                botao.style.color = 'white';
            }
        }

        function somaPedido(valor, name){
            var linha = document.getElementById(name);
            var total = parseFloat(document.getElementById('parcial').value);
            var valor = parseFloat(valor);
            console.log(linha);
            if(total==0){
                total = valor;
            }else{
                if(linha.checked){
                    total+=valor;
                }else {
                    total -= valor;
                }
            }
            document.getElementById('parcial').value = total;
        }


    </script>

@endsection('content')
