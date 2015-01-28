<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 26/01/15
 * Time: 00:37
 */

$tbUnidadeVenda = new \system\model\TbUnidadeVenda();

?>

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Selecionar Unidade de Venda:</h3>
    </div>
    <div class="panel-body">

        <form class="form-horizontal" action="action/unidadevenda.php" method="post" role="form">

            <div class="form-group">
                <label for="" class="col-sm-3 control-label">Selecione Unidade de Venda</label>
                <div class="col-sm-2">
                    <select name="uve_codigo" class="form-control">
                        <?php foreach($tbUnidadeVenda->listUnidadeVendaByName() as $dados): ?>
                            <option value="<?php echo($dados['uve_codigo']); ?>"><?php echo($dados['uve_nome']);?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>


            <div class="form-group">
                <div class="col-sm col-sm-3">
                    <button type="submit" class="btn btn-primary">
                        <span class="glyphicon glyphicon-floppy-saved"></span> Salvar
                    </button>
                </div>
            </div>

        </form>


    </div>
</div>