<?php include('includes/header.php'); ?>
<?php
if(logged_in()){
  if(isset($_SESSION['email'])){
    $email=$_SESSION['email'];
    $sql='SELECT user_name FROM users WHERE email="'.$email.'"';
    $result=query($sql);
    $row=fetch_array($result);
    $name=$row['user_name'];
    if($name!='admin')
    include('includes/nav_student.php');
  }
}
  else if(!logged_in())
  include('includes/nav.php');
 ?>
<?php  ?>


<div class="container">
  <div class="card border-0 shadow my-5" id='hide'>
    <div class="card-body p-5">

      <h1 class="font-weight-light">Лучшие ссылки по Excel </h1>
      <p class="lead">Здесь ты можешь найти материал по версиям Excel</p>
    </div>
<div class="jumbotron">
<a href="http://office-guru.ru/excel/samouchitel-excel-dlja-chainikov-1.html">1. Самоучитель по Excel 2007</a><br>
<a href="http://www.offisny.ru/excel.html">2. Самоучитель по Excel 2010</a><br>
<a href="http://ishmbuoo.narod.ru/GRCPI/lebedev_a-n-ponjatnyj_samouchitel_excel_2013-2014.pdf">3. Самоучитель по Excel 2013</a><br>
<a href="https://download.microsoft.com/download/0/F/A/0FA69201-3B9D-4601-88B3-2E766B7C1B55/EXCEL%202016%20QUICK%20START%20GUIDE.pdf">4. Самоучитель по Excel 2016</a><br>

</div>
</div>
  </div>

<?php include('includes/footer.php'); ?>
