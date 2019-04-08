<?php include('includes/header.php'); ?>
<?php include('includes/nav_student.php'); ?>


	<div class="jumbotron">
		<h1 class="text-center">
			Какой тест хочешь пройти?
			<?php
			if(!logged_in())

				redirect(" index.php");
			 ?>
		</h1>

	</div>

  <div class="container">
    <div class="">
    <div style="height: 50px;"></div>
		<form class="" action="testing.php" method="post">
			<input type="submit" method='post'  name="test_excel_2007"
			 value=' Тест Excel 2007' class="btn btn-outline-info" / >
			<button type="submit" class="btn btn-outline-info">
			<a href="#" >Тест Excel 2010</a>
		</button>
		<button type="submit" class="btn btn-outline-info">
		 <a href="#">Тест Excel 2013</a>
		</button>
		</form>

    </div>

		<?php
	  function show_test($path)
	  {
	    include($path);
	  }

	  if(isset($_POST['test_excel_2007']))

		show_test('test_excel_2007.php');
	  ?>
    </div>
	<?php include('includes/footer.php'); ?>
