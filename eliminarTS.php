<?php
function __autoload($nombre_clase) {
	include 'classes/'.$nombre_clase .'.class.php';
}

$db = new Controlador();
$db->elmTS($_GET['id']);
?>