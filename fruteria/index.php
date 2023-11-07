<?php
session_start();
$compraRealizada = "";

//Nuevo cliente
if (isset($_GET['cliente'])) {
    $_SESSION['cliente'] = $_GET['cliente'];
    $_SESSION['pedidos'] = [];
}

if (!isset($_SESSION['cliente'])) {
    require_once('bienvenida.php');
    exit();
}


if (isset($_POST['accion']) && $_POST['accion'] == "Anotar") {
    if (isset($_POST['fruta']) && isset($_POST['cantidad'])) {
        if (isset($_SESSION['pedidos'][$_POST['fruta']])) {
            $_SESSION['pedidos'][$_POST['fruta']] += $_POST['cantidad'];
        } else {
            $_SESSION['pedidos'][$_POST['fruta']] = $_POST['cantidad'];
        }
    }
}

if (isset($_POST['accion']) && $_POST['accion'] == "Terminar") {
    require_once('despedida.php');
    $compraRealizada = htmlTablaPedidos();   
    session_destroy();
    exit();
}

$compraRealizada = htmlTablaPedidos();
require_once('compra.php');
function htmlTablaPedidos()
{
    $msg = "";
    if (count($_SESSION['pedidos']) > 0) {
        $msg .= "Este es tu pedido: ";
        $msg .= "<table style='border: 1px solid black;'>";
        foreach ($_SESSION['pedidos'] as $clave => $valor) {
            $msg .= "<tr><td><b>" . $clave . "</b><td></td><td>" . $valor . "</td></tr>";
        }
        $msg .= "</table>";
    }
    return $msg;
}
