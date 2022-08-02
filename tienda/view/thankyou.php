<?php
session_start();
include('../php/conexion.php');
if (!isset($_SESSION['carrito'])) {
  header('Location: ../index.php');
}

if($conexion === false){
  die("ERROR: Could not connect. " . mysqli_connect_error());
}
if (!isset($_SESSION['usuario'])) {

  $nombre = $_POST['c_fname'];
  $email = $_POST['c_email_address'];
  $telefono = $_POST['c_diff_phone'];
  $direccion = $_POST['c_diff_address'];
  $descripcion = $_POST['descripcionPedido'];
  $Precio = $_POST['precioFinal'];
  $estado = true;
  $fecha = date('Y-m-d h:m:s');





  // Attempt insert query execution
$sql = "INSERT INTO pedidos (NombreCliente, TelefonoCliente, DireccionCliente, DescripcionPedido, PrecioPedido, estadoPedido, FechaPedido) 
VALUES ('$nombre','$telefono','$direccion', '$descripcion', '$Precio','$estado','$fecha')";


if(mysqli_query($conexion, $sql)){
    echo "Records inserted successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conexion);
}
 
// Close connection
mysqli_close($conexion);

    

  unset($_SESSION['carrito']);
} else {
  $nombre = $_POST['c_fname'];
  $email = $_POST['c_email_address'];
  $telefono = $_POST['c_diff_phone'];
  $direccion = $_POST['c_diff_address'];
  $descripcion = $_POST['descripcionPedido'];
  $Precio = $_POST['precioFinal'];
  $estado = true;
  $fecha = date('Y-m-d h:m:s');





   // Attempt insert query execution
$sql = "INSERT INTO pedidos (NombreCliente, TelefonoCliente, DireccionCliente, DescripcionPedido, PrecioPedido, estadoPedido, FechaPedido) 
VALUES ('$nombre','$telefono','$direccion', '$descripcion', '$Precio','$estado','$fecha')";


if(mysqli_query($conexion, $sql)){
    echo "Records inserted successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conexion);
}
 
// Close connection
mysqli_close($conexion);


  unset($_SESSION['carrito']);
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <title>Tienda</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700">
  <link rel="stylesheet" href="../libs/fonts/icomoon/style.css">

  <link rel="stylesheet" href="../libs/css/bootstrap.min.css">
  <link rel="stylesheet" href="../libs/css/magnific-popup.css">
  <link rel="stylesheet" href="../libs/css/jquery-ui.css">
  <link rel="stylesheet" href="../libs/css/owl.carousel.min.css">
  <link rel="stylesheet" href="../libs/css/owl.theme.default.min.css">
  <link rel="stylesheet" href="../libs/css/aos.css">
  <link rel="stylesheet" href="../libs/css/style.css">

</head>

<body>

  <div class="site-wrap">
    <?php include("header.php"); ?>

    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center">
            <span class="icon-check_circle display-3 text-success"></span>
            <h2 class="display-3 text-black">ORDEN REALIZADA CON EXITO!</h2>
            <p class="lead mb-5">Pase a tienda a recoger su pedido a SUCURSAL BALCONES</p>
            <p class="lead mb-5">Av. Adolfo López Mateos 102, Balcones del norte, Escobedo.</p>
            <p><a href="catalogo.php" class="btn btn-sm btn-primary btn-outline-warning">Regresar a la tienda</a></p>
          </div>
        </div>
      </div>
    </div>


  </div>

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/main.js"></script>

</body>

</html>