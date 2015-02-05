<?php
include_once '../../bootstrap.php';



$login = new \system\app\AcceptFormUsuario();

$login->setpost($_POST)->doLogin();


?>