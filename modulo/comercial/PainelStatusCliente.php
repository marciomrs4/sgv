<?php
include_once '..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'/bootstrap.php';
include_once 'config.php';

include '..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'componente/topo.php';


?>

    <div class="row">

        <div class="col-md-8">

            <div class="panel panel-primary">
                <div class="panel-heading">Mostrar Pedido:
                    <select class="form-control primary" name="status">
                        <?php
                        $tbTipoProduto = new \system\model\TbStatusPedido();
                        foreach($tbTipoProduto->listAllAssoc() as $dados):?>
                        <option value="<?php echo($dados['stp_codigo']);?>"><?php echo($dados['stp_descricao']);?></option>
                        <?php endforeach; ?>
                    </select>

                    <select class="form-inline" name="ordem">
                            <option value="1">Order Crescente</option>
                            <option value="2">Order Decrescente</option>
                    </select>

                </div>

                <div class="panel-body">


                    <div class="jumbotron">
                        <p id="principal">...</p>
                    </div>

                </div>
            </div>
        </div>



        <div class="col-md-4">

            <div class="panel panel-default">
                <!-- Default panel contents -->
                <div class="panel-heading">Ultimos Pedidos: <select class="form-control primary" name="status_secundario">
                        <?php
                        foreach($tbTipoProduto->listAllAssoc() as $dados):?>
                            <option value="<?php echo($dados['stp_codigo']);?>"><?php echo($dados['stp_descricao']);?></option>
                        <?php endforeach; ?>
                    </select>

                    <select class="form-inline" name="ordem_secundario">
                        <option value="1">Order Crescente</option>
                        <option value="2">Order Decrescente</option>
                    </select>

                </div>
                <div class="panel-body">
                    <span id="secundario"></span>
                </div>
            </div>

         <div class="panel panel-default">
                <!-- Default panel contents -->
                <div class="panel-heading">Ultimos Pedidos: <select class="form-control primary" name="status_terceario">
                        <?php
                        foreach($tbTipoProduto->listAllAssoc() as $dados):?>
                            <option value="<?php echo($dados['stp_codigo']);?>"><?php echo($dados['stp_descricao']);?></option>
                        <?php endforeach; ?>
                    </select>

                    <select class="form-inline" name="ordem_terceario">
                        <option value="1">Order Crescente</option>
                        <option value="2">Order Decrescente</option>
                    </select>

                </div>
                <div class="panel-body">
                    <span id="terceario"></span>
                </div>
         </div>


        </div>
    </div>

</div>



<?

?>
<script src="../../js/jquery.js"></script>
<script src="../../js/bootstrap.js"></script>
<script src="../../js/jquery.dataTables.js"></script>
<script src="../../js/maskMoney.min.js"></script>
<script src="../../js/my-maskMoney.js"></script>
<script src="../../js/my-data-table.js"></script>
<script src="../../js/my-alert.js"></script>
<script src="../../js/my-createitempedido.js"></script>
<script src="../../js/jquery.validate.js"></script>
<script src="../../js/my-printer.js"></script>
<script src="../../js/my-addvalorpedido.js"></script>

<script type="text/javascript">

    var $load = jQuery.noConflict();

        var count = 1;

        function timer()
        {


            //$load("#tempo").html(count);

            if(count > 1)
                count--;
            else

            setTimeout("timer();", 6000);

            var codigo = $valor("select[name='status']").val();
            var ordem = $valor("select[name='ordem']").val();

            $load.post('action/statuspedidopainelcliente.php',
                    {stp_codigo: codigo, ordenacao: ordem},
                    function(data){
                        $load("#principal").html(data);
                    },'html');

            var codigo_secundario = $valor("select[name='status_secundario']").val();
            var ordem_secundario = $valor("select[name='ordem_secundario']").val();

            $load.post('action/statuspedidopainelcliente.php',
                {stp_codigo: codigo_secundario, ordenacao: ordem_secundario},
                function(data){
                    $load("#secundario").html(data);
                },'html');

            var codigo_terceario = $valor("select[name='status_terceario']").val();
            var ordem_terceario = $valor("select[name='ordem_terceario']").val();

            $load.post('action/statuspedidopainelcliente.php',
                {stp_codigo: codigo_terceario, ordenacao: ordem_terceario},
                function(data){
                    $load("#terceario").html(data);
                },'html');





        }

</script>

<script>
    timer();

</script>

</body>
</html>