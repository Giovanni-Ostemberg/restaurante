<?php $i=0;
$parcial=0;?>
<?php $__env->startSection('content'); ?>
    <head>

        <style>
            .footer:hover{
                cursor: pointer;
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
    <?php $__env->startSection('barra'); ?>
    <nav class="links">
        <div style="float:left;">
        <a class="text-white h4 footer" href="/conta/showAll/<?php echo e($cliente->id); ?>">Todos</a>
        <a class="text-white h4 footer" href="/conta/show/<?php echo e($cliente->id); ?>">Pendentes</a>
        <a class="text-white h4 footer" data-toggle="modal" data-target="#modalPagamento">Últimos Pagamentos</a>
        </div>
        <div style="float:right">
            <a data-toggle="modal" class="text-white h4 footer" data-target="#modalExemplo">Efetuar Pagamento</a></div>
        </div>
    </nav>
    <?php $__env->stopSection(); ?>




    <div style=" width:90%; margin: 3em auto; text-align:center; margin-top:100px;">

        <form action="/conta/showData/<?php echo e($cliente->id); ?>">
            <div class="input-group-prepend" style="text-align: center; color:black;">
                <div class="input-group-prepend" >
                    <label style="color:black;" class="font-effect-stonewash" id="button-addon1">Início</label>
                </div>
                <input style="text-align: center; color:black;" type="date" name="dataInicial"  class="form-control soma " aria-describedby="button-addon1">
                <!--</div>
                <div class="input-group-prepend font-effect-stonewash" style="text-align: center; color:black; width:20%;">-->
                <div class="input-group-prepend" >
                    <label style="color:black;" class="font-effect-stonewash" id="button-addon1">Fim</label>
                </div>
                <input style="text-align: center; color:black;" type="date" name="dataFinal"  class="form-control soma"  aria-describedby="button-addon1">
                <button type="submit" class="font-effect-stonewash">Filtrar</button>
            </div>
            <!--<label for="dataInicial">Início</label><input type="date" name="dataInicial">
            <label for="dataFinal">Fim</label><input type="date" name="dataFinal">-->

        </form>
        <div>
            <table class="table  table-hover" style="width:100%; margin:auto;">
                <thead>
                <tr>
                    <th colspan="2" class="cabecalho font-effect-stonewash"><?php echo e($cliente->Nome); ?></th>
                    <th colspan="2" class="cabecalho font-effect-stonewash" style="font-size: 2em;" ><?php echo e($cliente->telefone); ?></th>
                </tr>

                <tr>
                    <th style="text-align: center; width:20%;" class="font-effect-stonewash">Data</th>
                    <th style="text-align: center; width:60%;" class="font-effect-stonewash">Itens</th>
                    <th style="text-align: center; width:10%;" class="font-effect-stonewash">Total</th>
                    <!-- <th style="text-align: center; visibility: hidden; width:5%;" class="font-effect-stonewash" aria-hidden="true">Resta</th>-->
                    <th style="text-align: center; width:5%;" class="font-effect-stonewash">Add</th>
                </tr>
                </thead>
                <tbody>
                <form action="/pagamento/parcial/<?php echo e($conta->id); ?>">
                    <input type="hidden" name="cliente" value="<?php echo e($cliente->id); ?>">
                    <?php $__currentLoopData = $pedidos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pedido): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($pedido->resta == 0): ?>
                            <tr style="background-color:    #CCFFD0;" class="table-hover">
                        <?php else: ?>
                            <?php if($pedido->resta < $pedido->valorTotal ): ?>
                                <tr class="table-warning">
                            <?php else: ?>
                                <tr class="table-danger">
                                    <?php endif; ?>
                                    <?php endif; ?>
                                    <td scope="col" style="text-align: center; color:black; width:20%;" ><?php echo e(\Carbon\Carbon::parse($pedido->created_at)->format('d/m/Y')); ?></td>
                                    <td scope="col" style="text-align: center; color:black; width:50%;" ><?php echo e($itens[$i]); ?></td>
                                    <td scope="col" style="text-align: center; color:black; width:20%;" class="font-effect-stonewash"><?php echo e(money_format ( "R$ %n" , $pedido->valorTotal)); ?></td>
                                <!-- <td  scope="col" style="text-align: center; color:black;"><?php echo e($pedido->resta); ?></td>-->

                                    <p hidden><?php echo e($parcial+=$pedido->resta); ?></p>
                                    <?php if($pedido->resta == 0): ?>
                                        <td scope="col" style="text-align: center; color:black; width:20%;" class="font-effect-stonewash">Pago</td>
                                    <?php else: ?>

                                        <td scope="col" style="text-align: center; color:black; width:5%;" >
                                            <div class="btn-group-toggle" data-toggle="checkbox">
                                                <label class="btn btn-primary active" style="background-color: #49B35D;" onClick="mudarCor(this,'parcial<?php echo e($pedido->id); ?>')">
                                                    <input type="checkbox" checked value="<?php echo e($pedido->id); ?>" id="parcial<?php echo e($pedido->id); ?>" name="pedido[]" onClick="somaPedido(<?php echo e($pedido->resta); ?>,'parcial<?php echo e($pedido->id); ?>')"> Pagar
                                                </label>
                                            </div>
                                        <?php endif; ?>
                                        <!--<td scope="col" style="text-align: center; color:black;"><input type="checkbox" checked value="<?php echo e($pedido->id); ?>" id="parcial<?php echo e($pedido->id); ?>" name="pedido[]" onload="somaPedido(<?php echo e($pedido->resta); ?>,'parcial<?php echo e($pedido->id); ?>')" onClick="somaPedido(<?php echo e($pedido->resta); ?>,'parcial<?php echo e($pedido->id); ?>')"></td>-->

                                        <?php $i++ ?>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                <tr>
                                    <th scope="col" style="text-align: center;" class="font-effect-stonewash">Valor Total</th>
                                    <td scope="col" style="text-align: center;" class="font-effect-stonewash"><?php echo e(money_format ( "R$ %n" , $conta->saldoTotal)); ?></td>
                                    <!--<td scope="col" class="font-effect-stonewash">Parcial</td>-->
                                    <td scope="col" colspan="2" style="text-align: center; color:black; width:5%;" class="font-effect-stonewash">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <button style="color:black;" class="btn btn-outline-secondary" type="submit" id="button-addon1">Pagar</button>
                                            </div>
                                            <input style="text-align: center; color:black;" type="text"  id="parcial"  value="<?php echo e($parcial); ?>"  name="somaParcial" class="form-control soma" aria-label="Example text with button addon" aria-describedby="button-addon1">
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

                        <?php $__currentLoopData = $pagamentos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pagamento): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <form action="/pagamento/<?php echo e($pagamento->id); ?>/destroy">
                                <tr style="color:#81FF62;">
                                    <td scope="col" style="text-align: center; color:#3EA001;"><?php echo e(\Carbon\Carbon::parse($pagamento->created_at)->format('d/m/Y')); ?></td>
                                    <td scope="col" style="text-align: center; color:#3EA001;"><?php echo e(money_format ( "R$ %n" , $pagamento->valor)); ?></td>
                                </tr>
                            </form>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                    <h5 class="modal-title font-effect-stonewash" id="exampleModalLabel" class=" ">Pagamento</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/pagamento/store/<?php echo e($conta ->id); ?>">
                        <input type="text" class="form-control" name="pagamento" value="0.00">
                        <input type="hidden" name="cliente" value="<?php echo e($cliente->id); ?>">
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

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout' , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/giovanni/PhpStorm Projects/trabalho_web3/resources/views/conta/show.blade.php ENDPATH**/ ?>