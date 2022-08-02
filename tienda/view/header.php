
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
                         <a href="cart.php" class="site-cart">
                      <span class="icon icon-shopping_cart"></span>
                      <span class="count"><?php
                      echo (empty($_SESSION['carrito']))?0:count($_SESSION['carrito']);
                      ?></span>
                    </a>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</nav>
	</header>

                   