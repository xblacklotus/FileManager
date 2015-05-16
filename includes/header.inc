<?php
session_start();
function __autoload($nombre_clase) {
    include 'classes/'.$nombre_clase .'.class.php';
}
if(isset($_POST['ingresar']))
{
    $user = trim($_POST['user']);
    $pass = trim($_POST['pass']);
    $usuario=new Usuario($user,$pass);
    echo $usuario->user();
    $cont=new Controlador();
    $cont->loguearse($user,$pass);
}
if(isset($_POST['registrar']))
{
    $user = trim($_POST['user']);
    $pass = trim($_POST['pass']);
    $pass1 = trim($_POST['pass1']);
    if($pass!==$pass1)
        header("Location: Registrarse.php");
    $nombre = trim($_POST['nombre']);
    $apellido = trim($_POST['apellido']);
    $correo = trim($_POST['correo']);
    $servicio = trim($_POST['servicio']);
    $usuario=new Usuario($user,$pass);    
    $cont=new Controlador();
    if($cont->registrarUsuario($nombre,$apellido,$user,$pass,$correo,$servicio))
        echo "entra";
    else
        echo "no entra";
}


?>  
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>.:FileManager:.</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <link href="scripts/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    <link href="assets/stylesheet.css" rel="stylesheet" type="text/css"/>
    <link href="https://fonts.googleapis.com/css?family=Didact+Gothic|Source+Sans+Pro:200" rel="stylesheet" type="text/css">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="scripts/html5shiv.js"></script>
        <script src="scripts/respond.min.js"></script>
        <style>.container {max-width: 960px}</style>
        <![endif]-->
    </head>