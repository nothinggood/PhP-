<?php include('includes/header.php'); ?>
<?php include('includes/nav_admin.php'); ?>

<?php
function comment_work()
{

    echo'  <hr>
    <form action="comments.php"  method="post">

       <div class="comments col-md-9" id="comments">
      <h3>Комментарии:</h3>
      <div class="comment mb-2 row" style="padding-left: 20px;">
    ';
    $sql="SELECT id, comment, user_id, date, article_id from comments order by date desc";
    $result=query($sql);

    while($res=mysqli_fetch_array($result)){
      $user_id=$res['user_id'];
      $comment_id=$res['id'];
      $comment=$res['comment'];
      $date=$res['date'];
      $article_id=$res['article_id'];

      $sql1="SELECT article_name from articles_info where article_id=$article_id";
      $result1=query($sql1);
      $row1=fetch_array($result1);

      $sql2="SELECT user_name from users where id=$user_id";
      $result2=query($sql2);
      $row2=fetch_array($result2);

      $art_name=$row1['article_name'];
      $username=$row2['user_name'];
      $comment=$res['comment'];
      $date=$res['date'];

      echo '
    <div class="form-check">

                     <div class="comment-content col-md-11 col-sm-10">
                         <h4 class=" comment-meta text-primary" >'.$username.'</h4>
                         <h5 class="small text-muted"> '.$date. '</h5>
                         <div class="comment-body">
                     <p style="padding-left:25px;">
                     <input class="form-check-input position-static" type="checkbox" id="blankCheckbox"  name="'.$comment_id.'">

    '.$comment.'
                             </p>
                             <hr>
                         </div>

                     </div>

                     </div>
    <hr>
    ';
    }
    echo '</div>
    <br>
      <input class="btn btn-outline-info " type="submit" name="delete_comments" value="Удалить выбранные комментарии">

    </form>
    <br><br><br>
    ';

      if(isset($_POST["delete_comments"])){
        $sql="SELECT id, date from comments ";
        $result=query($sql);

        while($res=mysqli_fetch_array($result)){
          $com_id=$res['id'];
          if(isset($_POST[$com_id])){

            $sql='DELETE FROM `comments` WHERE id='.$com_id;
            $end=query($sql);
          }

        }





redirect('comments.php');
}

}


 ?>
<div class="jumbotron">

  <h2 class="text-center">
    Здесь ты можешь удалять комментарии,
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
  </h2>
</div>
<div class="container">
  <div class="card border-0 shadow my-5" id='hide'>
<div class="display-inline">

  <?php
comment_work();
  ?>


 <?php
   ?>
</div>
</div>
  </div>

<?php include('includes/footer.php'); ?>
