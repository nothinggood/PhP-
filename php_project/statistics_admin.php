<?php include('includes/header.php'); ?>


<?php
 include('includes/nav_admin.php');
?>
	<div class="jumbotron">
		<h2 class="text-center">
    Статистика
		</h2>
<br>

<?php
if(isset($_POST['sort_by_mark'])){
  echo '
  <table class="table table-inverse">
    <thead>
      <tr>
        <th>Студент</th>
        <th>Название теста</th>
        <th style="color: darkviolet;">Оценка</th>
        <th>Дата прохождения</th>
      </tr>
    </thead>
    <tbody>
  ';

  $sql="SELECT  test_id, note, user_id, date from statistics order by note asc";
  $result=query($sql);

while($result3 = mysqli_fetch_array($result)){

    $user_id=$result3['user_id'];

    $sql2='SELECT first_name, last_name from users where id='.$user_id;
    $result2=query($sql2);
    $row2=fetch_array($result2);

    $test_id=$result3['test_id'];
    $sql1='SELECT test_name from testing where test_id='.$test_id;
    $result1=query($sql1);
    $row1=fetch_array($result1);

    $user_firstn=$row2['first_name'];
    $user_lastn=$row2['last_name'];
    $test_name=$row1['test_name'];
    $note=$result3['note'];
    $date=$result3['date'];
if($note<4) $color='red';
else
if($note>4 && $note<8) $color='blue';
else $color='green';
    echo '
    <tr>
          <td>'.$user_lastn.'  '.$user_firstn.'</td>
          <td>'.$test_name.'</td>
          <td style="color:'.$color.';">'.$note.'</td>
          <td>'.$date.'</td>
    </tr>';

}
echo '</tbody>
</table>';
}
 ?>

<?php
  if(isset($_POST['all'])){
    echo '
    <table class="table table-inverse">
      <thead>
        <tr>
          <th>Студент</th>
          <th>Название теста</th>
          <th>Оценка</th>
          <th>Дата прохождения</th>
        </tr>
      </thead>
      <tbody>
    ';
  $sql="SELECT  test_id, note, user_id, date from statistics ";
  $result=query($sql);

while($result3 = mysqli_fetch_array($result)){

    $user_id=$result3['user_id'];

    $sql2='SELECT first_name, last_name from users where id='.$user_id;
    $result2=query($sql2);
    $row2=fetch_array($result2);

    $test_id=$result3['test_id'];
    $sql1='SELECT test_name from testing where test_id='.$test_id;
    $result1=query($sql1);
    $row1=fetch_array($result1);

    $user_firstn=$row2['first_name'];
    $user_lastn=$row2['last_name'];
    $test_name=$row1['test_name'];
    $note=$result3['note'];
    $date=$result3['date'];
if($note<4) $color='red';
else
if($note>4 && $note<8) $color='blue';
else $color='green';
    echo '
    <tr>
          <td>'.$user_lastn.'  '.$user_firstn.'</td>
          <td>'.$test_name.'</td>
          <td style="color:'.$color.';">'.$note.'</td>
          <td>'.$date.'</td>
    </tr>';

}
echo '</tbody>
</table>';
}

   if(isset($_POST['sort_by_test'])){
     echo '
     <table class="table table-inverse">
       <thead>
         <tr>
           <th>Студент</th>
           <th style="color:violet;">Название теста</th>
           <th>Оценка</th>
           <th>Дата прохождения</th>
         </tr>
       </thead>
       <tbody>
     ';
   $sql="SELECT  test_id, note, user_id, date from statistics ";
   $result=query($sql);

 while($result3 = mysqli_fetch_array($result)){

     $user_id=$result3['user_id'];

     $sql2='SELECT first_name, last_name from users where id='.$user_id;
     $result2=query($sql2);
     $row2=fetch_array($result2);

     $test_id=$result3['test_id'];
     $sql1='SELECT test_name from testing where test_id='.$test_id;
     $result1=query($sql1);
     $row1=fetch_array($result1);

     $user_firstn=$row2['first_name'];
     $user_lastn=$row2['last_name'];
     $test_name=$row1['test_name'];
     $note=$result3['note'];
     $date=$result3['date'];
 if($note<4) $color='red';
 else
 if($note>4 && $note<8) $color='blue';
 else $color='green';
     echo '
     <tr>
           <td>'.$user_lastn.'  '.$user_firstn.'</td>
           <td>'.$test_name.'</td>
           <td style="color:'.$color.';">'.$note.'</td>
           <td>'.$date.'</td>
     </tr>';

 }
 echo '</tbody>
 </table>';
 }

 if(isset($_POST['sort_by_date'])){
   echo '
   <table class="table table-inverse">
     <thead>
       <tr>
         <th>Студент</th>
         <th >Название теста</th>
         <th>Оценка</th>
         <th style="color:darkviolet;">Дата прохождения</th>
       </tr>
     </thead>
     <tbody>
   ';
 $sql="SELECT  test_id, note, user_id, date from statistics order by date asc ";
 $result=query($sql);

while($result3 = mysqli_fetch_array($result)){

   $user_id=$result3['user_id'];

   $sql2='SELECT first_name, last_name from users where id='.$user_id;
   $result2=query($sql2);
   $row2=fetch_array($result2);

   $test_id=$result3['test_id'];
   $sql1='SELECT test_name from testing where test_id='.$test_id;
   $result1=query($sql1);
   $row1=fetch_array($result1);

   $user_firstn=$row2['first_name'];
   $user_lastn=$row2['last_name'];
   $test_name=$row1['test_name'];
   $note=$result3['note'];
   $date=$result3['date'];
if($note<4) $color='red';
else
if($note>4 && $note<8) $color='blue';
else $color='green';
   echo '
   <tr>
         <td>'.$user_lastn.'  '.$user_firstn.'</td>
         <td>'.$test_name.'</td>
         <td style="color:'.$color.';">'.$note.'</td>
         <td>'.$date.'</td>
   </tr>';

}
echo '</tbody>
</table>';
}

if(isset($_POST['sort_by_name'])){
  echo '
  <table class="table table-inverse">
    <thead>
      <tr>
        <th style="color:darkviolet;">Студент</th>
        <th >Название теста</th>
        <th>Оценка</th>
        <th ">Дата прохождения</th>
      </tr>
    </thead>
    <tbody>
  ';
$sql="SELECT  test_id, note, user_id, date from statistics order by user_id asc ";
$result=query($sql);

while($result3 = mysqli_fetch_array($result)){

  $user_id=$result3['user_id'];

  $sql2='SELECT first_name, last_name from users where id='.$user_id;
  $result2=query($sql2);
  $row2=fetch_array($result2);

  $test_id=$result3['test_id'];
  $sql1='SELECT test_name from testing where test_id='.$test_id;
  $result1=query($sql1);
  $row1=fetch_array($result1);

  $user_firstn=$row2['first_name'];
  $user_lastn=$row2['last_name'];
  $test_name=$row1['test_name'];
  $note=$result3['note'];
  $date=$result3['date'];
if($note<4) $color='red';
else
if($note>4 && $note<8) $color='blue';
else $color='green';
  echo '
  <tr>
        <td>'.$user_lastn.'  '.$user_firstn.'</td>
        <td>'.$test_name.'</td>
        <td style="color:'.$color.';">'.$note.'</td>
        <td>'.$date.'</td>
  </tr>';

}
echo '</tbody>
</table>';
}

if (isset($_POST['sort_by_student']) && isset($_POST['select']) ) {
  $name=$_POST['select'];

  echo '
  <h4>Статистика по студенту '.$name.' </h4>
  <table class="table table-inverse">
    <thead>
      <tr>

        <th >Название теста</th>
        <th>Оценка</th>
        <th ">Дата прохождения</th>
      </tr>
    </thead>
    <tbody>
  ';
$pos_index=strpos($name, ' ');

$first_name=substr($name, $pos_index+1);
$last_name=substr($name,0,$pos_index);


$sql2='SELECT id from users where first_name="'.$first_name.'"';

$result2=query($sql2);
$row2=fetch_array($result2);
$user_id=$row2['id'];

$sql="SELECT test_id, note, date from statistics where user_id=".$user_id."";
$result=query($sql);

while($result3 = mysqli_fetch_array($result)){

  $test_id=$result3['test_id'];
  $sql1='SELECT test_name from testing where test_id='.$test_id;
  $result1=query($sql1);
  $row1=fetch_array($result1);

  $test_name=$row1['test_name'];
  $note=$result3['note'];
  $date=$result3['date'];

  echo '
  <tr>
        <td>'.$test_name.'</td>
        <td>'.$note.'</td>
        <td>'.$date.'</td>
  </tr>';

}
echo '</tbody>
</table>';

}
  ?>



<form class="" action="statistics_admin.php" method="post">
<input name="all" type="submit" class="btn btn-outline-info" style='background-color: white; color: black;' value="Показать результат всех пользователей" >

<hr>
<input name="sort_by_name" type="submit" class="btn btn-outline-info" style='background-color: white; color: black;' value="Отсортировать по фамилии" >
<input name="sort_by_mark" type="submit" class="btn btn-outline-info" style='background-color: white; color: black;' value="Отсортировать по оценке" >
<input name="sort_by_date" type="submit" class="btn btn-outline-info" style='background-color: white; color: black;' value="Отсортировать по дате" >
<hr>
  <label for="sel1">Выберите студента: </label>
  <select class="form-control" name='select' id="sel1">
  <?php
  $sql="SELECT first_name, last_name from users where role=0";
  $result=query($sql);
  while($resultt=mysqli_fetch_array($result)){
    $first=$resultt['first_name'];
    $last=$resultt['last_name'];

echo '
<option>'.$last.' '.$first.'</option>

';
  }
   ?>
 </select><br>
  <input name="sort_by_student" type="submit" class="btn btn-outline-info"
  style='background-color: white; color: black;' value="Выбрать данные по студенту" >

</form>



	</div>


	<?php include('includes/footer.php'); ?>
