<aside class="main-sidebar">

	<section class="sidebar">
		
		<ul class="sidebar-menu">

			<?php

			if ($_SESSION["profile"] == "Administrator") {
				
				echo '

					<li class="active">

						<a href="home">

							<i class="fa fa-home"></i>

							<span>Home</span>

						</a>

					</li>

					

				';
			}

			if($_SESSION["profile"] == "Administrator" || $_SESSION["profile"] == "Special"){

				echo '

					<li>

						<a href="categories">

							<i class="fa fa-th"></i>

							<span>Categories</span>

						</a>

					</li>

					<li>

						<a href="products">

							<i class="fa fa-product-hunt"></i>

							<span>Products</span>

						</a>

					</li>
				';

			}

			if($_SESSION["profile"] == "Administrator" || $_SESSION["profile"] == "Seller"){
				echo '
					
					<li>

						<a href="customers">

							<i class="fa fa-users"></i>

							<span>Customers</span>

						</a>

					</li>

				';
			}

			if($_SESSION["profile"] == "Administrator" || $_SESSION["profile"] == "Seller"){

			echo'


				<li class="treeview">

				<a href="#">

					<i class="fa fa-usd"></i>

					<span>Sales</span>

					<span class="pull-right-container">

						<i class="fa fa-angle-left pull-right"></i>

					</span>

				</a>

				<ul class="treeview-menu">

					<li>

						<a href="sales">

							<i class="fa fa-circle"></i>

							<span>Manage Sales</span>

						</a>

					</li>

					<li>

						<a href="create-sale">

							<i class="fa fa-circle"></i>

							<span>Create Sale</span>

						</a>

					</li> </ul>';

				}

				if($_SESSION["profile"] == "Administrator"){

					echo '<li>

						<a href="reports">

							<i class="fa fa-file"></i>

							<span>Sales Report</span>

						</a>

					</li>
					
					
					<li>

						<a href="users">

							<i class="fa fa-user"></i>

							<span>User Management</span>

						</a>

					</li>';

				}

				

		?>
			
		</ul>

	</section>
	<!-- Log on to codeastro.com for more projects! -->
</aside>