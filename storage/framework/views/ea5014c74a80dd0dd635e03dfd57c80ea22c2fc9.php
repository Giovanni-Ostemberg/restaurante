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
        margin-top:2em;
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

    .busca button{
        border-radius: 15px;
    }






</style>
</header>
<?php $__env->startSection('content'); ?>
    <div class="menu">
        <nav>
            <ul>
                <li><a href="/cliente/lista/A">A</a></li>
                <li><a href="/cliente/lista/B">B</a></li>
                <li><a href="/cliente/lista/C">C</a></li>
                <li><a href="/cliente/lista/D">D</a></li>
                <li><a href="/cliente/lista/E">E</a></li>
                <li><a href="/cliente/lista/F">F</a></li>
                <li><a href="/cliente/lista/G">G</a></li>
                <li><a href="/cliente/lista/H">H</a></li>
                <li><a href="/cliente/lista/I">I</a></li>
                <li><a href="/cliente/lista/J">J</a></li>
                <li><a href="/cliente/lista/K">K</a></li>
                <li><a href="/cliente/lista/L">L</a></li>
                <li><a href="/cliente/lista/M">M</a></li>
                <li><a href="/cliente/lista/N">N</a></li>
                <li><a href="/cliente/lista/O">O</a></li>
                <li><a href="/cliente/lista/P">P</a></li>
                <li><a href="/cliente/lista/Q">Q</a></li>
                <li><a href="/cliente/lista/R">R</a></li>
                <li><a href="/cliente/lista/S">S</a></li>
                <li><a href="/cliente/lista/T">T</a></li>
                <li><a href="/cliente/lista/U">U</a></li>
                <li><a href="/cliente/lista/V">V</a></li>
                <li><a href="/cliente/lista/W">W</a></li>
                <li><a href="/cliente/lista/X">X</a></li>
                <li><a href="/cliente/lista/Y">Y</a></li>
                <li><a href="/cliente/lista/Z">Z</a></li>
            </ul>
        </nav>
    </div>
    <div style="margin-top: 50px;" class="lista">
        <div class="busca"><form action="/cliente/busca"><input type="text" name="termo"> <button class="btn btn-primary" type="submit>">Buscar</button></form></div>
        <table class="table">
            <thead>
            <tr>
                <th class="cabecalho" style="font-size: 1em; text-align: center; font-family: 'Yeon Sung', cursive;">#</th>
                <th class="cabecalho" style="font-size: 1em; text-align: center; font-family: 'Yeon Sung', cursive;">Nome</th>
                <th scope="col" class="cabecalho" style="font-size: 1em; text-align: center; font-family: 'Yeon Sung', cursive;">Cpf</th>
                <th scope="col" class="cabecalho" style="font-size: 1em; text-align: center; font-family: 'Yeon Sung', cursive;">Endereço</th>
                <th scope="col" class="cabecalho" style="font-size: 1em; text-align: center; font-family: 'Yeon Sung', cursive;">Telefone</th>
                <th scope="col" class="cabecalho" style="font-size: 1em; text-align: center; font-family: 'Yeon Sung', cursive;">Conta</th>
                <th scope="col" class="cabecalho" style="font-size: 1em; text-align: center; font-family: 'Yeon Sung', cursive;">Modificar</th>
                <th scope="col" class="cabecalho" style="font-size: 1em; text-align: center; font-family: 'Yeon Sung', cursive;">Deletar</th>
            </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $clientes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cliente): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td style="font-size: 1.5em; text-align: center; font-family: 'Yeon Sung', cursive;"><?php echo e($cliente -> id); ?></td>
                    <td style="font-size: 1.5em; text-align: center; font-family: 'Yeon Sung', cursive;"><?php echo e($cliente -> Nome); ?></td>
                    <td style="font-size: 1.5em; text-align: center; font-family: 'Yeon Sung', cursive;"><?php echo e($cliente -> cpf); ?></td>
                    <td style="font-size: 1.5em; text-align: center; font-family: 'Yeon Sung', cursive;"><?php echo e($cliente -> endereco); ?></td>
                    <td style="font-size: 1.5em; text-align: center; font-family: 'Yeon Sung', cursive;"><?php echo e($cliente -> telefone); ?></td>
                    <td style="font-size: 1.5em; text-align: center; font-family: 'Yeon Sung', cursive;"><?php echo e($cliente -> conta_id); ?></td>
                    <td> <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalEdit<?php echo e($cliente->id); ?>">
                            Editar
                        </button>
                        <div class="modal fade" id="modalEdit<?php echo e($cliente->id); ?>" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="TituloModalCentralizado">Editar Cliente</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form method="POST" action="/cliente/update/<?php echo e($cliente->id); ?>">
                                        <div class="modal-body">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('PATCH'); ?>;
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">Cliente</span>
                                                </div>
                                                <input type="text" class="form-control" name="nome" value="<?php echo e($cliente->Nome); ?>">
                                            </div>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend" style="width:100%;">
                                                    <span class="input-group-text" id="basic-addon1">Cpf</span>

                                                    <input type="text"  class="form-control" name="cpf" value="<?php echo e($cliente->cpf); ?>">
                                                </div>
                                            </div>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend" style="width:100%;">
                                                    <span class="input-group-text" id="basic-addon1">Endereço</span>
                                                    <input type="text" class="form-control"  name="endereco" value="<?php echo e($cliente->endereco); ?>">
                                                </div>
                                            </div>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend" style="width:100%;">
                                                    <span class="input-group-text" id="basic-addon1">Telefone</span>
                                                    <input type="text" class="form-control"  name="telefone" value="<?php echo e($cliente->telefone); ?>">
                                                </div>
                                            </div>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend" style="width:100%;">
                                                    <span class="input-group-text" id="basic-addon1">Conta</span>
                                                    <input type="text" class="form-control"  name="conta" value="<?php echo e($cliente->conta_id); ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                            <button type="submit" class="btn btn-primary">Adicionar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td><form method="get" action="/cliente/<?php echo e($cliente->id); ?>/destroy">
                            <button class="btn btn-primary" type="submit">Excluir</button>
                        </form></td>

                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td colspan="3"></td>
                <td style="text-align:center;">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalCreate">
                        Novo Cliente
                    </button>
                </td>
            </tr>
            </tbody>
        </table>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modalCreate" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="TituloModalCentralizado">Inserir novo produto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="<?php echo e(route('clientes.store')); ?>">
                    <div class="modal-body">
                        <?php echo csrf_field(); ?>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">Cliente</span>
                            </div>
                            <input required type="text" class="form-control" name="nome">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend" style="width:100%;">
                                <span class="input-group-text" id="basic-addon1">Cpf</span>

                                <input required type="text"  class="form-control" name="cpf" pattern="\d{11}">
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend" style="width:100%;">
                                <span class="input-group-text" id="basic-addon1">Telefone</span>
                                <input type="text" required class="form-control"  name="telefone">
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend" style="width:100%;">
                                <span class="input-group-text" id="basic-addon1">Rua</span>
                                <input type="text" class="form-control" required  name="rua">
                            </div>
                            <div class="input-group-prepend" style="width:100%;">
                                <span class="input-group-text" id="basic-addon1">Número</span>
                                <input type="text" class="form-control" required name="numero">
                            </div>
                            <div class="input-group-prepend" style="width:100%;">
                                <span class="input-group-text" id="basic-addon1">Bairro</span>
                                <input type="text" class="form-control" required name="bairro">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Adicionar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    </div>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/giovanni/PhpStorm Projects/trabalho_web3/resources/views/cliente/index.blade.php ENDPATH**/ ?>