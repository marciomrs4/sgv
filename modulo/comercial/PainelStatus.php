<?php
include_once '..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'/bootstrap.php';
include_once 'config.php';

include '..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'componente/topo.php';


?>

    <div class="row">

        <div class="col-md-8">

            <div class="panel panel-primary">
                <div class="panel-heading">Mostrar Pedido:
                    <div class="form-inline">
                        <select class="form-control" name="status">
                            <?php
                            $tbTipoProduto = new \system\model\TbStatusPedido();
                            foreach($tbTipoProduto->listAllAssoc() as $dados):?>
                            <option value="<?php echo($dados['stp_codigo']);?>"><?php echo($dados['stp_descricao']);?></option>
                            <?php endforeach; ?>
                        </select>
                        <button class="form-control" id="painelprincipal">Atualizar</button>
                    </div>
                </div>
                <div class="panel-body">



                        <p id="principal">...</p>


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
                    </select></div>
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
                    </select></div>
                <div class="panel-body">
                    <span id="terceario"></span>
                </div>
         </div>


        </div>
    </div>

</div>


<div class="modal fade in" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: hidden">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">Informacoes</h4>
            </div>
            <div class="modal-body">
                <span id="novo"></span>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default close" data-dismiss="modal">OK</button>
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

        function timer() {


            //$load("#tempo").html(count);

            if (count > 1)
                count--;
            else

                setTimeout("timer();", 6000);

            var codigo_secundario = $valor("select[name='status_secundario']").val();

            $load.post('../administracao/action/statuspedidopainel.php',
                {stp_codigo: codigo_secundario},
                function (data) {
                    $load("#secundario").html(data);
                }, 'html');

            var codigo_terceario = $valor("select[name='status_terceario']").val();

            $load.post('../administracao/action/statuspedidopainel.php',
                {stp_codigo: codigo_terceario},
                function (data) {
                    $load("#terceario").html(data);
                }, 'html');

        }

        $load("#painelprincipal").click(function () {

            var codigo = $valor("select[name='status']").val();

            $load.post('action/statuspedidopainel.php',
            {stp_codigo: codigo},
            function (data) {
                $load("#principal").html(data);
            }, 'html');


        });


        //Este acao faz a alteracao do status
        $load("#principal").on('click','.ok',function(){

            var pedido = $load(this).val();
            var status = $load(this).next().val();

            $load.post('action/alterarstatuspedidopainel.php',
                    {stp_codigo: status,
                     ped_codigo: pedido},

                    function (data) {
                        $load("#novo").html(data);
                    }, 'html');

            $load("#myModal").show(1000);

                var codigo = $valor("select[name='status']").val();

            $load.post('action/statuspedidopainel.php',
                    {stp_codigo: codigo},
                    function (data) {
                        $load("#principal").html(data);
                    }, 'html');



            });

    $load('.close').click(function(){
        $load("#myModal").hide(1000);
    });

</script>

<script>
    timer();
</script>

</body>
</html>