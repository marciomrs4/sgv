<?php
require_once '../../bootstrap.php';

include_once 'config.php';
include '../../componente/topo.php';
include '../../componente/menuprincipal.php';


include '../../modulo/relatorio/ModuloRelatorio.php';

#Instancia da Class AcceptRelatorio
$acceptForm = new \system\app\AcceptRelatorio();
$acceptForm->setpost($_POST);

$RelatorioName = 'Top Unidade de Venda';

#Form usado para Filtro de Busca
include 'forms/BuscarPainelBuscaDate.php';


$Grid = new \system\core\Grid();

$Grid->setDados($acceptForm->getGraficTopUnidadeVenda());
$Grid->setCabecalho(array('Unidade','Valor'));

$Number = new \system\core\NumberFormat();
$Grid->addFunctionColumn(function($var) use ($Number){
    return $Number->numberClient($var);
},1);

$Painel = new \system\core\Painel();
$Painel->setPainelColor('primary');
$Painel->setPainelTitle('Resultado')
       ->addGrid($Grid)->show();


?>

<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">Top Unidade de Venda</h3>
    </div>
    <div class="panel-body">

        <div id="container" style="height: 400px"></div>

    </div>
</div>


<!-- Inicio Rodap� -->
<footer>
    <nav class="navbar navbar-default navbar-fixed-bottom"
         role="navigation">

        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse"
                    data-target="#este">
                <span class="sr-only">Toggle navigation</span> <span
                    class="icon-bar"></span> <span class="icon-bar"></span> <span
                    class="icon-bar"></span>
            </button>


            <p class="navbar-text"><?php echo $configGlobal['tituloRodape']; ?></p>

        </div>
        <div class="nav navbar-right collapse navbar-collapse" id="este">
            <button class="btn btn-default btn-lg">
                <span class="glyphicon glyphicon-user"></span>
                <?php
                $tbUsuario = new \system\model\TbUsuario();
                $Usuario = $tbUsuario->getFormUser($_SESSION['usu_codigo']);
                echo $Usuario['usu_nome'];
                ?>
            </button>
        </div>


    </nav>
    <nav class="navbar navbar-default" role="navigation">
    </nav>

</footer>

</div>

<script src="../../js/jquery.js"></script>

<script>
    var $grafic = jQuery.noConflict();

    $grafic(document).ready(function () {
        $grafic('#container').highcharts({

            credits:{
                enabled: false
            },

            chart: {
                type: 'pie',
                options3d: {
                    enabled: true,
                    alpha: 45,
                    beta: 0
                }
            },
            title: {
                text: ''
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.y}</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    depth: 35,
                    dataLabels: {
                        enabled: true,
                        format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                    }
                }
            },
            series: [{
                type: 'pie',
                name: 'Valor',
                data: [
                    <?php foreach($acceptForm->getGraficTopUnidadeVenda() as $value){

                    echo '[',"'",$value[0],"'",',',$value[1],'],';

                    }

                    ?>
                ]
            }]
        });
    });

    $grafic(".panel-heading").click(
        function(){
            $grafic(this).next().toggle(1000);
        });


</script>

<script src="../../js/highcharts.js"></script>
<script src="../../js/highcharts-3d.js"></script>

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

</body>
</html>