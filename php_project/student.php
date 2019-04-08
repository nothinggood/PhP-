<?php include('includes/header.php'); ?>
<?php include('includes/nav_student.php'); ?>

<div class="jumbotron">
  <h1 class="text-center">
    Hey,
    <?php
    if(logged_in()){
      if(isset($_SESSION['email'])){
        $email=$_SESSION['email'];
        $sql='SELECT user_name FROM users WHERE email="'.$email.'"';
        $result=query($sql);
        $row=fetch_array($result);
        $name=$row['user_name'];
        echo $name;
      }
    }
      else
      redirect("index.php");
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

 <form class="" action="student.php" method="post">
   <?php  show_inputs(); ?>
 </form>

</div>
</div>
  </div>

<?php include('includes/footer.php'); ?>
