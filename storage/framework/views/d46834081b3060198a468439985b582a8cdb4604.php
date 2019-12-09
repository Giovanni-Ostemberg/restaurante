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
            width:100%;

        }

        .lista{
            margin-top:3em;
            float:right;
            width:90%;


        }
        .lista ul{
            list-style: none;
            width:100%;
            text-align:center;
            font-family: 'Yeon Sung', cursive;
            font-size: 2em;
            padding: 0;

        }

        .lista li{
            border-bottom: solid #6cb2eb;

        }
        .lista li:hover{
            background-color: #6cb2eb;
            color:white;
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
<?php $__env->startSection('content'); ?>
    <div class="menu">
        <nav>
            <ul>
                <li><a href="/pedido/lista/A">A</a></li>
                <li><a href="/pedido/lista/B">B</a></li>
                <li><a href="/pedido/lista/C">C</a></li>
                <li><a href="/pedido/lista/D">D</a></li>
                <li><a href="/pedido/lista/E">E</a></li>
                <li><a href="/pedido/lista/F">F</a></li>
                <li><a href="/pedido/lista/G">G</a></li>
                <li><a href="/pedido/lista/H">H</a></li>
                <li><a href="/pedido/lista/I">I</a></li>
                <li><a href="/pedido/lista/J">J</a></li>
                <li><a href="/pedido/lista/K">K</a></li>
                <li><a href="/pedido/lista/L">L</a></li>
                <li><a href="/pedido/lista/M">M</a></li>
                <li><a href="/pedido/lista/N">N</a></li>
                <li><a href="/pedido/lista/O">O</a></li>
                <li><a href="/pedido/lista/P">P</a></li>
                <li><a href="/pedido/lista/Q">Q</a></li>
                <li><a href="/pedido/lista/R">R</a></li>
                <li><a href="/pedido/lista/S">S</a></li>
                <li><a href="/pedido/lista/T">T</a></li>
                <li><a href="/pedido/lista/U">U</a></li>
                <li><a href="/pedido/lista/V">V</a></li>
                <li><a href="/pedido/lista/W">W</a></li>
                <li><a href="/pedido/lista/X">X</a></li>
                <li><a href="/pedido/lista/Y">Y</a></li>
                <li><a href="/pedido/lista/Z">Z</a></li>
            </ul>
        </nav>
    </div>
    <div class="lista">
        <div class="busca"><form action="/pedido/busca"><input type="text" name="termo"> <button class="btn btn-primary" type="submit>">Buscar</button></form></div>
    <div>
        <h1 text-align="center" style="background-color: #3490dc;">Clientes</h1>
    </div>
        <ul>
    <?php $__currentLoopData = $clientes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cliente): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <li data-toggle="modal" data-target="#modalPedido<?php echo e($cliente->id); ?>"  style="cursor:pointer;"><?php echo e($cliente->Nome); ?></li>


        <div class="modal fade" id="modalPedido<?php echo e($cliente->id); ?>" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="TituloModalCentralizado"><?php echo e($cliente->Nome); ?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="POST" action="<?php echo e(route('pedidos.store')); ?>">
                        <div class="modal-body">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" value="<?php echo e($cliente->conta_id); ?>" name="conta_id">
                            <input type="hidden" value="<?php echo e($cliente->id); ?>" name="cliente_id" id="clienteId<?php echo e($cliente->id); ?>">
                            <div class="input-group mb-3">
                                <table id="tabela<?php echo e($cliente->id); ?>">
                                    <tr>
                                        <td style="width:45%;" >
                                            <select class="form-control" id="produto0_<?php echo e($cliente->id); ?>"name="produto_id[]" onchange="sincronizaPreco('produto0_<?php echo e($cliente->id); ?>',<?php echo e($produtos); ?>,'preco0_<?php echo e($cliente->id); ?>'),calcularValor('quantidade0_<?php echo e($cliente->id); ?>','preco0_<?php echo e($cliente->id); ?>','linha0_<?php echo e($cliente->id); ?>', 'tabela<?php echo e($cliente->id); ?>','valorFinal<?php echo e($cliente->id); ?>',<?php echo e($cliente->id); ?>)">
                                                <?php $__currentLoopData = $produtos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $produto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($produto->id); ?>"  onclick="sincronizaPreco('<?php echo e($produto->preco); ?>', 'preco0_<?php echo e($cliente->id); ?>')"><?php echo e($produto->nome); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <option selected>Escolha</option>
                                            </select>

                                        </td>
                                        <td style="width:15%;">
                                            <input type="text " class="form-control" id="preco0_<?php echo e($cliente->id); ?>" name="produto_preco[]" onchange="calcularValor('quantidade0_<?php echo e($cliente->id); ?>','preco0_<?php echo e($cliente->id); ?>','linha0_<?php echo e($cliente->id); ?>', 'tabela<?php echo e($cliente->id); ?>','valorFinal<?php echo e($cliente->id); ?>',<?php echo e($cliente->id); ?>)">
                                        </td>
                                        <td style="width:15%;"><input onchange="calcularValor('quantidade0_<?php echo e($cliente->id); ?>','preco0_<?php echo e($cliente->id); ?>','linha0_<?php echo e($cliente->id); ?>', 'tabela<?php echo e($cliente->id); ?>','valorFinal<?php echo e($cliente->id); ?>',<?php echo e($cliente->id); ?>)" id="quantidade0_<?php echo e($cliente->id); ?>" class="form-control" name="quantidade[]" type="number" value="1"></td>
                                        <td style="width:20%;"><input class="form-control" type="text" name="valorTotal[]" value="0" id="linha0_<?php echo e($cliente->id); ?>"></td>
                                        <td style="width:10%; text-align: right;"><button class="btn btn-primary" style="width:80%;"type="button" onclick="removerLinha(this,'tabela<?php echo e($cliente->id); ?>')"> - </button> </td>
                                    </tr>
                                </table>
                            </div>

                            <div style="text-align:right; margin-bottom: 1em;">
                                <button type="button" class="btn btn-primary"  onclick="inserirNovo('tabela<?php echo e($cliente->id); ?>',<?php echo e($cliente->id); ?>)">+</button>
                            </div>
                            <div style="margin-bottom: 0.5em;">
                                <table>
                                    <tr>
                                        <td style="width:70%; text-align: right; padding: 1em;"><h5 style="padding-top: 0.5em;">Valor Total</h5></td>
                                        <td style="width:20%;"><input class="form-control" type="text" value="0" name="valorFinal[]" id="valorFinal<?php echo e($cliente->id); ?>"></td>
                                    </tr>
                                </table>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-primary">Adicionar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>


    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>

    <script language="JavaScript">
        function inserirNovo(idTabela, id){
            var table = document.getElementById(idTabela);
            var numOfRows = table.rows.length;
            var newRow = table.insertRow(numOfRows);
            var cell0 = newRow.insertCell(0);
            cell0.innerHTML='<select class="form-control" id="produto'+numOfRows+'_'+id+'" name="produto_id[]" onchange="sincronizaPreco(\'produto'+numOfRows+'_'+id+'\',<?php echo e($produtos); ?>,\'preco'+numOfRows+'_'+id+'\'),calcularValor(\'quantidade'+numOfRows+'_'+id+'\',\'preco'+numOfRows+'_'+id+'\',\'linha'+numOfRows+'_'+id+'\', \'tabela'+id+'\',\'valorFinal'+id+'\','+id+')">\n' +
                '                                                <?php $__currentLoopData = $produtos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $produto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>\n' +
                '                                                    <option value="<?php echo e($produto->id); ?>"  onclick="sincronizaPreco(\'<?php echo e($produto->preco); ?>\', \'preco0_'+id+'\')"><?php echo e($produto->nome); ?></option>\n' +
                '                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>\n' + '<option selected>Escolha</option>'+
                '                                            </select>';
            var cell1 = newRow.insertCell(1);
            cell1.innerHTML='<input type="text " class="form-control" id="preco'+numOfRows+'_'+id+'" name="produto_preco[]" onchange="calcularValor(\'quantidade'+numOfRows+'_'+id+'\',\'preco'+numOfRows+'_'+id+'\',\'linha'+numOfRows+'_'+id+'\', \'tabela'+id+'\',\'valorFinal'+id+'\','+id+')">\n';
            var cell2 = newRow.insertCell(2);
            cell2.innerHTML='<input class="form-control" name="quantidade[]" id ="quantidade'+numOfRows+'_'+id+'" type="number" value="1" onchange="calcularValor(\'quantidade'+numOfRows+'_'+id+'\',\'preco'+numOfRows+'_'+id+'\',\'linha'+numOfRows+'_'+id+'\', \'tabela'+id+'\',\'valorFinal'+id+'\','+id+')">';
            var cell3 = newRow.insertCell(3);
            cell3.innerHTML='<input type="text" class="form-control" name="valorTotal[]" value="0" id="linha'+numOfRows+'_'+id+'">';
            var cell4 = newRow.insertCell(4);
            var char = "'"
            var tabelaId = char.concat(idTabela, char);
            cell4.innerHTML="<button  class=\"btn btn-primary rem\" style=\"width:80%; float:right;\" type=\"button\" class=\"btn btn-primary\" onclick=\"removerLinha(this,"+tabelaId+")\"> - </button>";



        }
        function removerLinha(row,idTabela, valorLinha) {
            var x=row.parentNode.parentNode.rowIndex;
            document.getElementById(idTabela).deleteRow(x);
        }
        function calcularValor(quantidade, preco, linha, idTabela,idFinal, id){
            console.log(document.getElementById(idTabela).rows.length);

            var preco = document.getElementById(preco).value;
            var qtd = document.getElementById(quantidade).value;
            var valorTotal = preco * qtd;
            console.log(preco);
            console.log(qtd);
            console.log(valorTotal);
            console.log(idFinal);
            document.getElementById(linha).value = valorTotal;
            var i = 0;
            var valorFinal=0;
            while( i <= document.getElementById(idTabela).rows.length - 1){
                var id1 = "linha".concat(i,"_",id);
                console.log(id1);
                valorFinal += parseFloat(document.getElementById(id1).value);
                console.log(valorFinal);
                console.log(i);
                i++;
            }
            document.getElementById(idFinal).value = valorFinal;


        }
        function sincronizaPreco(id, item, preco){
            var index = document.getElementById(id).selectedIndex;
            var produto = item[index];
            console.log(produto);
            console.log(produto['preco']);
            console.log(document.getElementById(preco));
            document.getElementById(preco).value = produto['preco'];
        }
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/giovanni/PhpStorm Projects/trabalho_web3/resources/views/pedido/index.blade.php ENDPATH**/ ?>