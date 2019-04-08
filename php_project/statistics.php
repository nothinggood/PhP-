<?php include('includes/header.php'); ?>


<?php
 include('includes/nav_student.php');



if(isset($_POST['my_result'])){

$ot = 0;
$not = 0;
   if ($_POST['q1'] == 'c') $ot++;
    else $not++;
   if ($_POST['q2'] == 'c') $ot++;
    else $not++;
   if ($_POST['q3'] == 'b') $ot++;
    else $not++;
   if ($_POST['q4'] == 'b') $ot++;
    else $not++;

$email=$_SESSION['email'];

$sql='SELECT test_id from testing where test_name="Решение систем уравнений матричным методом в Excel 2007" ';
$result=query($sql);
$row=fetch_array($result);
$test_id=$row['test_id'];
$note=$ot*10/4;
$sql2='SELECT id from users where email="'.$email.'"';
$result2=query($sql2);
$row2=fetch_array($result2);
$user_id=$row2['id'];
$date = date('Y-m-d H:i:s');
$sql3="INSERT INTO statistics(test_id, note, user_id) ";
$sql3.=" VALUES('$test_id','$note','$user_id');";
$result3=query($sql3);

}

?>
	<div class="jumbotron">
		<h2 class="text-center">
      Твои результаты,
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
       ?>, такие:
		</h2>
    <table class="table table-inverse">
      <thead>
        <tr>
          <th >Название теста</th>
          <th>Оценка</th>
          <th>Дата прохождения</th>
        </tr>
      </thead>
      <tbody>

<?php
  $email=$_SESSION['email'];
  $sql2='SELECT id from users where email="'.$email.'"';
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

 ?>

</tbody>
</table>
	</div>
	<?php include('includes/footer.php'); ?>
