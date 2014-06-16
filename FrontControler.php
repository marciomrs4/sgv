<?php
require_once 'bootstrap.php';

$modulo = $_GET['urlModulo'];
$action = $_GET['urlAction'];
$value  = $_GET['urlValue'];


$_SESSION['projeto'] = $configGlobal['projectName'];

$_SESSION['modulo']= $modulo;

$_SESSION['action'] = $action;

$_SESSION[$modulo.'/'.$action] = $action;

$_SESSION['value'] = $value;

$_SESSION['moduloTemp'] = $modulo;
$_SESSION['actionTemp'] = $action;
$_SESSION['valueTemp'] = $value;

header('location: '.$_SERVER['HTTP_REFERER']);


?>