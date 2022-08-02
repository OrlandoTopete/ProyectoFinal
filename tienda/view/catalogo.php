<?php session_start();?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <title>Tienda</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700"> 
    <link rel="stylesheet" href="../libs/fonts/icomoon/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
        

        <div class="row mb-5">
          <div class="col-md-9 order-2">

            <div class="row">
              <div class="col-md-12 mb-5">
                <div class="float-md-left mb-4"><h2 class="text-black h5">Nuestros Productos</h2></div>
                <div class="d-flex">
                  <div class="dropdown mr-1 ml-md-auto">
                    <button type="button" class="btn btn-secondary btn-sm dropdown-toggle" id="dropdownMenuOffset" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Sucursales
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuOffset">
                      <a class="dropdown-item" href="#">Balcones</a>
                    </div>
                  </div>
                  <div class="btn-group">
                    <button type="button" class="btn btn-secondary btn-sm dropdown-toggle" id="dropdownMenuReference" data-toggle="dropdown">Pizzas</button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuReference">
                      <a class="dropdown-item" href="#">Pepperoni Especial</a>
                      <a class="dropdown-item" href="#">Vegetariana</a>
                      <a class="dropdown-item" href="#">Hawaiana</a>
                      <a class="dropdown-item" href="#">Suprema</a>
                      <a class="dropdown-item" href="#">Mexicana</a>
                      <a class="dropdown-item" href="#">Extraordinaria</a>
                      <a class="dropdown-item" href="#">3 carnes</a>
                      <a class="dropdown-item" href="#">Bonelizza</a>
                      <a class="dropdown-item" href="#">Chicharrón Ramos</a>
                      <a class="dropdown-item" href="#">Pepperoni</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row mb-5">
            <?php
              
              include('../php/conexion.php');
              $Query ="SELECT*FROM productos";
              $resutlado = mysqli_query($conexion,$Query) or die ($conexion->error);
              while($fila=mysqli_fetch_array($resutlado)){
            ?>
            <div class="col-sm-6 col-lg-4 mb-4" data-aos="fade-up">
                <div class="block-4 text-center border">
                  <figure class="block-4-image" height="800px">
                    <a href="shop-single.php?id=<?php echo $fila['Id']; ?>">
                    <img src="<?php echo $fila['Imagen']; ?>" alt="<?php echo $fila['Nombre']; ?>" class="img-fluid" height="800px"></a>
                  </figure>
                  <div class="block-4-text p-4">
                    <h3><a href="shop-single.php?id=<?php echo $fila['Id']; ?>"><?php echo $fila['Nombre']; ?></a></h3>
                    <p class="mb-0"><?php echo $fila['Descripcion']; ?></p>
                    <p class="text-asd font-weight-bold">$<?php echo $fila['Precio']; ?></p>
                  </div>
                </div>
              </div>
            <?php } ?>
              
            


            </div>
           
          </div>

          <div class="col-md-3 order-1 mb-5 mb-md-0">
            <div class="">
          
            </div>

            <div class="border p-4 rounded mb-4">
              <div class="mb-4">
                <h3 class="mb-3 h6 text-uppercase text-black d-block"><strong>Misión-Visión-Valores<strong></h3>
                <h3 class="mb-3 h6 text-uppercase text-black d-block">Misión</h3>
                <p>Mantener los mas altos estandares de calidad, para ser siempre la primera opción de compra. </p>
                
              </div>

              <div class="mb-4">
                <h3 class="mb-3 h6 text-uppercase text-black d-block">Visión</h3>
                <p>Ser una marca reconocida nacinalmente llevando nuestra sabor de norte a sur del país.</p>
              </div>

              <div class="mb-4">
                <h3 class="mb-3 h6 text-uppercase text-black d-block">Valores</h3>
                <p>Respeto, trabajo en equipo, liderazgo y desarrollo personal.</p>
              </div>

            </div>
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

  <script src="../js/main.js"></script>
    
  </body>
</html>