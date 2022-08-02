<?php
session_start();
if (!isset($_SESSION['carrito'])) {
  header("Location:index.php");
}
$productos = $_SESSION['carrito'];

var_dump($_POST['pedido']);
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
  

	<header class="top-navbar">
		<nav class="navbar navbar-expand-lg navbar-light bg-warning">
			<div class="container">
				<a class="navbar-brand" href="http://localhost/Website-Arduino/di_pissa/">
					<img src="http://localhost/Website-Arduino/di_pissa/icons/pizza_icon.ico" alt="" />
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-rs-food" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
				  <span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbars-rs-food">
					<ul class="navbar-nav ml-auto">
          <li class="nav-item"><a class="nav-link" href="http://localhost/Website-Arduino/tienda/view/catalogo.php#">Ir a Productos</a></li>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</nav>
	</header>

  <div class="site-wrap">




    <div class="site-section">
      <div class="container">
       
     
        <div class="row">
        <?php if (!isset($_SESSION['usuario'])) {?>
          <div class="col-md-6 mb-5 mb-md-0">
            <h2 class="h3 mb-3 text-black">Detalles de Orden</h2>
            <div class="p-3 p-lg-5 border">

            
              <form action="thankyou.php" method="POST" >

              <div class="form-group row">
                <div class="col-md-12">
                  <label for="c_fname" class="text-black">Nombre y Apellido<span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="c_fname" name="c_fname" required>
                </div>
              </div>

              <div class="form-group row">
              <div class="col-md-12">
                  <label for="c_email_address" class="text-black">Correo Electronico <span class="text-danger">*</span></label>
                  <input type="email" class="form-control" id="c_email_address" name="c_email_address" required>
                </div>
              </div>

            

              <div class="form-group row">
              <div class="col-md-12">
                      <label for="c_diff_phone" class="text-black">Telefono <span class="text-danger">*</span></label>
                      <input type="text" class="form-control" id="c_diff_phone" name="c_diff_phone" placeholder="Número de Telefono" required>
              </div>  
              </div>

              <div class="form-group row">
                      <div class="col-md-12">
                        <label for="c_diff_address" class="text-black">Dirección <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="c_diff_address" name="c_diff_address" placeholder="Dirección" required>
                      </div>
                    </div>

              <div class="form-group">
                <input type="text" class="form-control" placeholder="Apartamento, suite, trabajo, etc. (opciónal)">
              </div>
              <div class="form-group ">

               </div>
              
            </div>
          </div>
        <?php }?>
          <div class="col-md-6">

            
            
            <div class="row mb-5">
              <div class="col-md-12">
                <h2 class="h3 mb-3 text-black">Tu Orden</h2>
                <div class="p-3 p-lg-5 border">
                <table class="table site-block-order-table mb-5">
                    <thead>
                      <th>Producto</th>
                      <th>Total</th>
                    </thead>
                <?php 
                  $total = 0;
                  
                  foreach ($_SESSION['carrito'] as $key => $producto) {
                   
                  $total=$total+($producto['PRECIO']*$producto['CANTIDAD']);
                  $subtotal = $total;
                  $totala = $total;
                  if (isset($_SESSION['usuario'])) {
                    $descuento=$total/10;
                    $totala=$total-$descuento;
                  }
                  
                ?>
                 
                    <tbody>
                      <tr>
                        <td><?php echo $producto['NOMBRE'];?></td>
                        <td><?php echo $producto['PRECIO'];?></td>
                      </tr>
                      
              <?php }?>
                    
                      <tr>
                        <td class="text-black font-weight-bold"><strong>Total</strong></td>
                        
                        <td class="text-black font-weight-bold"><strong>$<?php echo $_POST['precioFinal']?></strong></td>
                        <input type="hidden" name="precioFinal" value="<?php echo $_POST['precioFinal']?>">
                        <input type="hidden" name="descripcionPedido" value="<?php echo $_POST['pedido']?>">
                      </tr>
                    </tbody>
                  </table>

                  <div class="border p-3 mb-3">
                    <h3 class="h6 mb-0"><a class="colorTexto" data-toggle="collapse" href="#collapsebank" role="button" aria-expanded="false" aria-controls="collapsebank">Transferencia Bancaria</a></h3>

                    <div class="collapse" id="collapsebank">
                      <div class="py-2">
                        <p class="mb-0">No disponible</p>
                      </div>
                    </div>
                  </div>

                  <div class="border p-3 mb-3">
                    <h3 class="h6 mb-0"><a class="colorTexto" data-toggle="collapse" href="#collapsecheque" role="button" aria-expanded="false" aria-controls="collapsecheque">Cheque</a></h3>

                    <div class="collapse" id="collapsecheque">
                      <div class="py-2">
                        <p class="mb-0">No disponible</p>
                      </div>
                    </div>
                  </div>

                  <div class="border p-3 mb-5">
                    <h3 class="h6 mb-0"><a class="colorTexto" data-toggle="collapse" href="#collapsepaypal" role="button" aria-expanded="false" aria-controls="collapsepaypal">Paypal</a></h3>

                    <div class="collapse" id="collapsepaypal">
                      <div class="py-2">
                        <p class="mb-0">No disponible</p>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <?php if(!isset($_SESSION['usuario'])){?>
                    <button type="submit" class="btn btn-warning btn-lg py-3 btn-block" >Ordenar</button>
                    <?php }else{?>
                      <button type="submit" class="btn btn-warning btn-lg py-3 btn-block" onclick="window.location='thankyou.php'">Orden premium</button>
                    <?php }?>
                  </div>
                  </form>
                </div>
              </div>
            </div>

          </div>
        </div>
        <!-- </form> -->
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

  <script src="../js/main.js"></script>
    
  </body>
</html>