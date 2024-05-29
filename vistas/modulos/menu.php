<aside class="main-sidebar" id="barraMenu">

	 <section class="sidebar" >

		<ul class="sidebar-menu" id="contenidoMenu">

		<?php

		if($_SESSION["perfil"] == "administrador")
		{

			echo '

			<li>

				<a href="mapa">

					<i class="fa fa-user"></i>
					<span>mapa</span>

				</a>

			</li>
			<li>

				<a href="usuarios">

					<i class="fa fa-user"></i>
					<span>Usuarios</span>

				</a>

			</li>
			
			
			<li>

				<a href="vehiculos">

				<i class="fa fa-car"></i>
					<span>Vehiculos</span>

				</a>

			</li>

			<li>

				<a href="vigilantes">

				<i class="fa fa-group"></i>
					<span>Vigilantes</span>

				</a>

			</li>

			<li>

			<a href="mapeo-de-vehiculos">

			<i class="fa fa-area-chart"></i>
				<span>Mapeo de vehiculos</span>

			</a>

		</li>

		<li>

			<a href="create">

			<i class="fa fa-plus-square"></i>
				<span>crear islas</span>

			</a>

		</li>



			';

		}else{
			if($_SESSION["perfil"] == "Tenedor de la mascota")
			{

			echo '<li class="active">

				<a href="inicio">

					<i class="fa fa-home"></i>
					<span>Inicio</span>

				</a>

			</li>

			
			<li>

				<a href="mascotas">

					<i class="fa fa-product-hunt"></i>
					<span>Mascotas</span>

				</a>

			</li>';
		}
		}


		?>

		</ul>

	 </section>

</aside>