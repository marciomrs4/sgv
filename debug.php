<?php

/* $diretorio = new DirectoryIterator("C:\Zend\Apache2\htdocs\sgp");

//echo $diretorio->getFilename();

echo '<pre>';
var_dump($diretorio);
echo '</pre>';
 */

$iterator = new RecursiveDirectoryIterator("C:\Zend\Apache2\htdocs\sgp");
$recursiveIterator = new RecursiveIteratorIterator($iterator);
  
foreach ( $recursiveIterator as $entry ) {
    echo $entry->getFilename().'<br />';
}

/* 
foreach ( $diretorio as $entry ) {
	echo $entry->getFilename().'<br />';
}
 */