<?php
include_once '../../bootstrap.php';
include_once 'config.php';
?>

	<!doctype html>
<html>
	<head>
		<meta charset="ISO-8859-1">
		<title><?php echo($config['moduloName']); ?></title>
		<link rel="stylesheet" href="../../css/bootstrap.css">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	</head>
	<body>
<?php


$FormController = new \system\core\FormController();
$FormController->setForm('forms/cadastrar/novopedidotoque')->getForm();


?>
<script src="../../js/jquery.js"></script>
<script src="../../js/bootstrap.js"></script>
<script src="../../js/jquery.dataTables.js"></script>
<script src="../../js/my-data-table.js"></script>
<script src="../../js/my-alert.js"></script>
<script src="../../js/my-createitempedido.js"></script>
<script src="../../js/jquery.validate.js"></script>

	</body>
</html>