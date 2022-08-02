<?php 
include('../../tienda/php/conexion.php');

$estado = 0;
$id = $_POST['id'];
$query = "UPDATE  pedidos set estadoPedido= '$estado'  WHERE id = '$id' ";

$result = mysqli_query($conexion, $query);



$url = $_SERVER['HTTP_REFERER'];
   header("LOCATION:$url");

?>