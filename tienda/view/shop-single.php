<?php
include("../php/conexion.php");
if (isset($_GET['id'])) {
  $Query = "SELECT*FROM productos where id=" . $_GET['id'];
  $resultado = mysqli_query($conexion, $Query) or die($conexion->error);
  if (mysqli_num_rows($resultado) > 0) {
    $fila = mysqli_fetch_row($resultado);
  } else {
    header("Location: ../index.php");
  }
} else {
  header("Location: ../index.php");
}
?>
<!DOCTYPE html>
<html lang="es">

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
          <div class="col-md-6">
            <img src="<?php echo $fila[4]; ?>" alt="<?php echo $fila[1]; ?>" class="img-fluid">
          </div>
          <div class="col-md-6">
            <h2 class="text-black"><?php echo $fila[1]; ?></h2>
            <p><?php echo $fila[3]; ?></p>
            <p><strong class="colorTexto h4">$<?php echo $fila[2]; ?></strong></p>

            <div class="mb-5">
              <div class="input-group mb-3" style="max-width: 120px;">
                <div class="input-group-prepend">
                  
                  <button class="btn btn-outline-warning js-btn-minus" id='aumentar' onclick="menos()" value="aumentar">&minus;</button>
                </div>
                <input type="number" class="form-control text-center" id="catidad5"  value="1" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
                <div class="input-group-append">
                  <button class="btn btn-outline-warning js-btn-minus" id='disminuir' onclick="mas()" value="disminuir" type="button">&plus;</button>
                </div>
              </div>

            </div>
            <?php
            $imagen = $fila[2];
            ?>
            <form action="cart.php" method="POST" >
              <input type="hidden" name="id" id="id" value="<?php echo openssl_encrypt($fila[0], COD, KEY); ?>">
              <input type="hidden" name="imagen" id="imagen" value="<?php echo openssl_encrypt($fila[4], COD, KEY); ?>">
              <input type="hidden" name="nombre" id="nombre" value="<?php echo openssl_encrypt($fila[1], COD, KEY); ?>">
              <input type="hidden" name="precio" id="precio" value="<?php echo openssl_encrypt($fila[2], COD, KEY); ?>">
              <input type="hidden" name="cantidad" id="catidad2" value="1">
              <input type="hidden" name="prueba" id="prueba" value="<?php echo $imagen; ?>">
              <button class="buy-now btn btn-sm btn-primary btn-warning" name="btnAccion" value="Agregar" type="submit">Agregar al carrito</button>

            </form>
          </div>
        </div>
      </div>
    </div>


  </div>

  <script src="../js/jquery-3.3.1.min.js"></script>
  <script src="../js/jquery-ui.js"></script>
  <script src="../js/popper.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script src="../js/owl.carousel.min.js"></script>
  <script src="../js/jquery.magnific-popup.min.js"></script>
  <script src="../js/aos.js"></script>

  <script type="text/javascript">
    var valor = document.getElementById('catidad5').value;
    console.log(valor);

    function mas() {
      valor++
      console.log(valor)
      document.getElementById('catidad5').value = valor
      document.getElementById('catidad2').value = valor;
    }

    function menos() {
      valor--
      console.log(valor)
      document.getElementById('catidad5').value = valor
      document.getElementById("catidad2").value = valor;
      
    }
  </script>

</body>

</html>