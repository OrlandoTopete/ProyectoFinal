<?php
session_start();
include("../php/conexion.php");

if (isset($_POST['btnAccion'])) {

  switch ($_POST['btnAccion']) {
    case 'Agregar':


      if (is_numeric(openssl_decrypt($_POST['id'], COD, KEY))) {
        $ID = openssl_decrypt($_POST['id'], COD, KEY);
      } else {
        echo "<script>alert('error')</script>";
      }
      if (is_string(openssl_decrypt($_POST['imagen'], COD, KEY))) {
        $IMAGEN = openssl_decrypt($_POST['imagen'], COD, KEY);
      } else {
        echo "<script>alert('error');</script>";
      }
      if ($_POST['cantidad'] >= 1) {
        $CANTIDAD = $_POST['cantidad'];
      } else {
        echo "<script>alert('error');</script>";
      }
      if (is_string(openssl_decrypt($_POST['precio'], COD, KEY))) {
        $PRECIO = openssl_decrypt($_POST['precio'], COD, KEY);
      } else {
        echo "<script>alert('error');</script>";
      }
      if (is_string(openssl_decrypt($_POST['nombre'], COD, KEY))) {
        $NOMBRE = openssl_decrypt($_POST['nombre'], COD, KEY);
      } else {
        echo "<script>alert('error');</script>";
      }


      if (isset($_SESSION['carrito'])) {
        $idProductos = array_column($_SESSION['carrito'], "ID");
        if (in_array($ID, $idProductos)) {
          echo "<script>alert('El producto ha sido seleccionado');</script>";
        } else {

          $numeroProductos = count($_SESSION['carrito']);
          $producto = array(
            'ID' => $ID,
            'NOMBRE' => $NOMBRE,
            'IMAGEN' => $IMAGEN,
            'PRECIO' => $PRECIO,
            'CANTIDAD' => $CANTIDAD
          );
          $_SESSION['carrito'][$numeroProductos] = $producto;
        }
      } else {
        $producto = array(
          'ID' => $ID,
          'NOMBRE' => $NOMBRE,
          'IMAGEN' => $IMAGEN,
          'PRECIO' => $PRECIO,
          'CANTIDAD' => $CANTIDAD
        );
        $_SESSION['carrito'][0] = $producto;
      }


      break;

    case "Eliminar":
      if (is_numeric(openssl_decrypt($_POST['id'], COD, KEY))) {
        $ID = openssl_decrypt($_POST['id'], COD, KEY);
        foreach ($_SESSION['carrito'] as $indice => $producto) {
          if ($producto['ID'] == $ID) {
            unset($_SESSION['carrito'][$indice]);
            echo "<script>alert('Eliminado con exito');</script>";
          }
        }
      }
      break;

    default:
      # code...
      break;
  }
}
// var_dump($_SESSION['carrito']);

?>
<!DOCTYPE html>
<html lang="es">

<head>
  <title>Tienda </title>
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


    <header class="top-navbar">
      <nav class="navbar navbar-expand-lg navbar-light bg-warning">
        <div class="container">
          <a class="navbar-brand" href="http://localhost/Website-Arduino/tienda/view/catalogo.php">
            <img src="http://localhost/Website-Arduino/di_pissa/icons/pizza_icon.ico" alt="" />
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-rs-food" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbars-rs-food">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item"><a class="nav-link" href="./catalogo.php">Ir a Productos</a></li>
          </div>
          </li>
          </ul>
        </div>
  </div>
  </nav>
  </header>


  <div class="site-section">
    <div class="container">
      <div class="row mb-5">



        <?php if (!empty($_SESSION['carrito'])) { ?>
          <table class="table table-bordered">
            <thead>
              <tr>
                <th width="20%" class="product-thumbnail">Imagen</th>
                <th width="20%" class="product-name">Nombre</th>
                <th width="20%" class="product-price">Precio</th>
                <th width="20%" class="product-quantity">Cantidad</th>
                <th width="10%" class="product-total">Total</th>
                <th width="10%" class="product-remove">Eliminar</th>
              </tr>
            </thead>



            <tbody id="tabla">

              <?php $total = 0; ?>
              <?php
              foreach ($_SESSION['carrito'] as $indice => $producto) {
              ?>
                <tr>
                  <td class="product-thumbnail">
                    <center>
                      <img src="<?php echo $producto['IMAGEN']; ?>" alt="Image" class="img-fluid" width="40%">
                    </center>
                  </td>
                  <td class="product-name">
                    <h2 class="h5 text-black"><?php echo $producto['NOMBRE']; ?></h2>
                  </td>

                  <td>$<?php echo $producto['PRECIO']; ?></td>

                  <td>
                    <div class="input-group mb-3" style="max-width: 120px;">

                      <input type="hidden" class="cantidades" value="<?php echo $producto['NOMBRE'] ?>" id="cantidadd2">
                      <input type="hidden" class="cantidades" value="<?php echo $producto['CANTIDAD'] ?>" id="cantidadd2">
                      <!-- <input type="hidden" class="nombre&cantidad" value="<?php echo $producto['CANTIDAD'] . " " . $producto['NOMBRE']; ?>"  id="cantidadd2"> -->
                      <input type="hidden" value="<?php echo $producto['PRECIO']; ?>" id="precio">




                      <div class="input-group-prepend">
                        <button class="btn btn-outline-warning js-btn-minus btnIncrementar" onclick="menos(this)" type="button">&minus;</button>
                      </div>

                      <input type="hidden" class="pedidoFinal" value="<?php echo $producto['CANTIDAD'] . " " . $producto['NOMBRE']  ?>">


                      <input type="test" class="form-control text-center txtcantidad" data-precio="<?php echo $producto['PRECIO']; ?>" data-id="<?php echo $producto['ID']; ?>" value="<?php echo $producto['CANTIDAD']; ?>" id="cantidadd" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">


                      <div class="input-group-append">
                        <button class="btn btn-outline-warning js-btn-plus btnIncrementar" onclick="mas(this)" type="button">&plus;</button>
                      </div>




                    </div>

                  </td>

                  <td>
                    <p id="cant" class="precioFinal">$ <?php echo $producto['CANTIDAD'] * $producto['PRECIO']; ?></p>
                  </td>

                  <td>


                    <form class="col-md-12" method="POST">
                      <input type="hidden" name="id" value="<?php echo openssl_encrypt($producto['ID'], COD, KEY); ?>">
                      <button type="submit" class="btn btn-primary btn-warning btn-sm" name="btnAccion" value="Eliminar">X</button>
                    </form>
                  </td>

                </tr>
                <?php $total = $total + ($producto['PRECIO'] * $producto['CANTIDAD']);
                $descuento = $total / 10;
                $totalDesc = $total - $descuento;

                ?>
              <?php } ?>
            </tbody>
          </table>


      </div>

      <div class="row">
        <div class="col-md-6">
          <div class="row mb-5">
            <div class="col-md-6 mb-3 mb-md-0">
            </div>
            <div class="col-md-6">
            </div>
          </div>

        </div>
        <div class="col-md-6 pl-5">
          <div class="row justify-content-end">
            <div class="col-md-7">
              <div class="row">
                <div class="col-md-12 text-right border-bottom mb-5">
                  <h3 class="text-black h4 text-uppercase">A Pagar</h3>
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-md-6">
                  <span class="text-black">Subtotal</span>
                </div>
                <div class="col-md-6 text-right">

                  <strong class="text-black">$<?php echo number_format($total, 2); ?></strong>
                </div>
              </div>
              <div class="row mb-5">
                <div class="col-md-6">
                  <span class="text-black">Total</span>
                </div>
                <div class="col-md-6 text-right">

                  <strong class="text-black" id="cant2">$<?php echo number_format($total, 2); ?></strong>

                </div>
              </div>

              <div class="row">
                <div class="col-md-12">
                  <form action="checkout.php" method="POST">
                    <input type="hidden" name="precioFinal" value="<?php echo number_format($total, 2); ?>" id="cant3">
                    <input type="hidden" name="pedido" id="inputCantidades" value="<?php echo number_format($total, 2); ?>">
                    <?php if (isset($_SESSION['usuario'])) { ?>



                      <button class="btn btn-primary btn-warning btn-lg py-3 btn-block" onclick="cantidadesDeProductos(this)" onclick="window.location='checkout.php'">Proceder a Ordenar</button>
                    <?php } else { ?>
                      <button class="btn btn-primary btn-warning btn-lg py-3 btn-block" onclick="cantidadesDeProductos(this)" onclick="window.location='checkout.php'">Prodecer a Ordenar</button>
                    <?php } ?>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php } ?>
</div>

<script src="../js/jquery-3.3.1.min.js"></script>
<script src="../js/jquery-ui.js"></script>
<script src="../js/popper.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/owl.carousel.min.js"></script>
<script src="../js/jquery.magnific-popup.min.js"></script>
<script src="../js/aos.js"></script>

<script type="text/javascript">
  var valor = document.getElementById('cantidadd').value;
  console.log(valor);

  function mas(e) {

    let td = e.parentElement.parentElement.parentElement;
    let inputHidden = td.children[0].children[1]
    let nombre = td.children[0].children[0]
    let pedido = td.children[0].children[4];

    let input = td.children[0].children[5];


    input.value = +input.value + 1
    inputHidden.value = +input.value
    pedido.value = input.value + " " + nombre.value;




    let precio = td.parentElement.children[4]
    let precioUni = +td.parentElement.children[2].textContent.trim().split('$')[1];
    // console.log(precioUni)
    precio.innerText = "$ " + input.value * precioUni
    actualizarTotal(precioUni)


  }

  function menos(e) {
    let td = e.parentElement.parentElement.parentElement;
    let input = td.children[0].children[5];
    let pedido = td.children[0].children[4];
    let inputHidden = td.children[0].children[1]
    let nombre = td.children[0].children[0]

    if (input.value == 1) return


    input.value = +input.value - 1
    inputHidden.value = +input.value
    pedido.value = input.value + " " + nombre.value;

    let precio = td.parentElement.children[4]
    let precioUni = +td.parentElement.children[2].textContent.trim().split('$')[1];
    // console.log(precioUni)
    precio.innerText = "$ " + input.value * precioUni
    actualizarTotal(-precioUni);



  }

  var parrafo = document.querySelector('#cant2')
  var parrafo2 = document.querySelector('#cant3')


  function actualizarTotal(valorTotal) {
    let valor = +parrafo.textContent.trim().split('$')[1];
    let inputForm = document.getElementById('inputCantidades');

    console.log(valor + valorTotal);
    parrafo.innerHTML = "$ " + (valor + valorTotal) + ".00";
    parrafo2.value = +(valor + valorTotal) + ".00";
    inputForm.value = +(valor + valorTotal) + ".00";

  }



  function cantidadesDeProductos() {
    let cantidades = document.querySelectorAll('.pedidoFinal')
    let array = [];

    // console.log(cantidades.length);
    for(var i = 0; i < cantidades.length; i++ ){
      array.push(cantidades[i].value);
      
    }
let pedido = array.join()
    let input = document.getElementById('inputCantidades');
    input.value = pedido;

  }


  // console.log("test.")
</script>

</body>

</html>