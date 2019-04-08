<?php include('includes/header.php'); ?>
<?php include('includes/nav_admin.php'); ?>


	<div class="jumbotron">
		<h1 class="text-center">
			Hey, admin
			<?php
			if(logged_in()){

			}
				else
				redirect(" index.php");
			 ?>
		</h1>
	</div>
	<div class="container">
		<div class="card border-0 shadow my-5" id='hide'>
			<div class="card-body p-5">

				<h1 class="font-weight-light">Привет! Здесь ты можешь изучить решение уравнений матричным методом с помощью Excel! </h1>
				<p class="lead">Здесь ты можешь найти материал по версиям Excel</p>
			</div>
	<div class="display-inline">
	
	 <form class="" action="admin.php" method="post">
		 <?php  show_inputs(); ?>
	 </form>

	</div>
	</div>
		</div>


	<?php include('includes/footer.php'); ?>
