<?php
include('../../tienda/php/conexion.php');

$query = "SELECT * FROM pedidos where estadoPedido='1' ORDER BY FechaPedido DESC ";

$result = mysqli_query($conexion, $query)



?>


<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900" rel="stylesheet" />


  <title>Gerente</title>

  <!-- Bootstrap, CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />

  <!-- CSS -->
  <link rel="stylesheet" href="assets/css/fontawesome.css" />
  <link rel="stylesheet" href="assets/css/style.css" />
  <link rel="stylesheet" href="assets/css/owl.css" />
  <link rel="stylesheet" href="assets/css/lightbox.css" />
</head>

<body>
  <div id="page-wraper">
    <!-- Sidebar Menu -->
    <div class="responsive-nav">
      <i class="fa fa-bars" id="menu-toggle"></i>
      <div id="menu" class="menu">
        <i class="fa fa-times" id="menu-close"></i>
        <div class="container">
          <div class="image">
            <a href="#"><img src="assets/images/perfil_01.jpg" alt="" /></a>
          </div>
          <div class="author-content">
            <h4>Orlando Daniel</h4>
            <span>Gerente</span>
          </div>
          <nav class="main-nav" role="navigation">
            <ul class="main-menu">
              <li><a href="#section1">Pedidos</a></li>
              <li><a href="#section2"></a></li>
              <li><a href="#section3"></a></li>
            </ul>
            <li><a href="http://localhost/Website-Arduino/login/gerente/views/productos.html"></a></li>
          </nav>
          <div class="social-network">
            <ul class="soial-icons">
              <li>
                <a href="#"><i class="fa fa-facebook"></i></a>
              </li>
              <li>
                <a href="#"><i class="fa fa-twitter"></i></a>
              </li>
              <li>
                <a href="#"><i class="fa fa-linkedin"></i></a>
              </li>
              <li>
                <a href="#"><i class="fa fa-dribbble"></i></a>
              </li>
              <li>
                <a href="#"><i class="fa fa-rss"></i></a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <section class="section about-me" data-section="section1">
      <div class="container">
        <div class="section-heading">
          <h2>Pedidos</h2>


          <table class="grilla table table-bordered" id="tablajson">
            <thead>
              <tr>
                <th>ID</th>
                <th>Nombre Cliente</th>
                <th>Telefono Cliente</th>
                <th>Descripcion Pedido</th>
                <th>Precio</th>

                <th>Fecha y Hora Pedido</th>
                <th>Estado Pedido</th>
                <th>Acción</th>

              </tr>
            </thead>

            <tbody>
              <?php while ($registro = $result->fetch_assoc()) { ?>
                <tr>

                  <td><?php echo $registro['id']; ?></td>
                  <td><?php echo $registro['NombreCliente']; ?></td>
                  <td><?php echo $registro['TelefonoCliente']; ?></td>
                  <td><?php echo $registro['DescripcionPedido']; ?></td>
                  <td>$<?php echo $registro['PrecioPedido']; ?></td>
                  <td><?php echo $registro['FechaPedido']; ?></td>
                  <td><?php echo $registro['estadoPedido']; ?></td>
                  <td>
                    <form action="./actualizar.php" method="POST">
                      <input type="hidden" name="id" value="<?php echo $registro['id'] ?>">
                      <button  type="submit" clbuttonss="btn btn-success">Finalizar Pedido</a>
                    </form>
                  </td>
                </tr>
              <?php } ?>

            </tbody>
          </table>



        </div>
        <div class="left-image-post">
          <div class="row">
            <div class="col-md-6">


            </div>
          </div>
          <div class="col-md-6">
            <div class="right-text">
              <h4></h4>
              <p>

              </p>
            </div>
          </div>
        </div>
      </div>
  </div>
  </section>

  <section class="section my-services" data-section="section2">
    <div class="container">
      <div class="section-heading">
        <h2></h2>
        <div class="line-dec"></div>
        <span></span>

        <p>

        </p>
      </div>
    </div>
    </div>
    </div>
  </section>

  <section class="section my-work" data-section="section3">
    <div class="container">
      <div class="section-heading">
        <h2></h2>
        <div class="line-dec"></div>
        <span></span>
      </div>
      <div class="row">
        <div class="isotope-wrapper">
          <form class="isotope-toolbar">
            <label><input type="radio" data-type="*" checked="" name="isotope-filter" />
              <span></span></label>
            <label><input type="radio" data-type="people" name="isotope-filter" />
              <span></span></label>
            <label><input type="radio" data-type="nature" name="isotope-filter" />
              <span></span></label>
            <label><input type="radio" data-type="animals" name="isotope-filter" />
              <span></span></label>
          </form>

        </div>
      </div>
    </div>
    </div>
  </section>

  <!-- Scripts -->
  <!-- Bootstrap, JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <script src="assets/js/isotope.min.js"></script>
  <script src="assets/js/owl-carousel.js"></script>
  <script src="assets/js/lightbox.js"></script>
  <script src="assets/js/custom.js"></script>
  <script>
    $(".main-menu li:first").addClass("active");

    var showSection = function showSection(section, isAnimate) {
      var direction = section.replace(/#/, ""),
        reqSection = $(".section").filter(
          '[data-section="' + direction + '"]'
        ),
        reqSectionPos = reqSection.offset().top - 0;

      if (isAnimate) {
        $("body, html").animate({
            scrollTop: reqSectionPos
          },
          800
        );
      } else {
        $("body, html").scrollTop(reqSectionPos);
      }
    };

    var checkSection = function checkSection() {
      $(".section").each(function() {
        var $this = $(this),
          topEdge = $this.offset().top - 80,
          bottomEdge = topEdge + $this.height(),
          wScroll = $(window).scrollTop();
        if (topEdge < wScroll && bottomEdge > wScroll) {
          var currentId = $this.data("section"),
            reqLink = $("a").filter("[href*=\\#" + currentId + "]");
          reqLink
            .closest("li")
            .addClass("active")
            .siblings()
            .removeClass("active");
        }
      });
    };

    $(".main-menu").on("click", "a", function(e) {
      e.preventDefault();
      showSection($(this).attr("href"), true);
    });

    $(window).scroll(function() {
      checkSection();
    });
  </script>
</body>

</html>