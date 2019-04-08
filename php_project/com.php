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
<div class="display-inline">

  <?php
    echo '
    <form class="" name="comments" method="post">
    Прокомментировать: <br>
    <textarea class="form-control" name="comment" rows="4" cols="50"></textarea>
    <br><br>
    <input class="btn btn-outline-info " type="submit" name="post_comment" value="Отправить">
    </form>
    <hr>

    ';

    if (logged_in()){
    if(isset($_POST['post_comment']))
    
    if( $_POST['comment']!=''){
        $email = $_SESSION['email'] ;
        $sql="SELECT id , user_name from users where email = '".escape($email)."'";
        $result=query($sql);

        if(row_count($result)==1){

          $row = fetch_array($result);


          $sql1="SELECT article_id from articles_info where excel_version=2007";
          $result1=query($sql1);
          $row1=fetch_array($result1);
          $id=$row['id'];
          $name=$row['user_name'];
          $comment=$_POST['comment'];
          $article_id=$row1['article_id'];
          $sqll="INSERT INTO `comments`( `comment`, `user_id`, `article_id`) VALUES ('".$comment."', '$id','$article_id')" ;
          $resultt=query($sqll);



        }
      }
      else echo '<div class="alert alert-danger alert-dismissible " role="alert">
        <strong> Внимание!</strong>Вы ничего не ввели, попробуйте ещё раз
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>';
      }
  ?>


 <?php
 comments();

   ?>
</div>
</div>
  </div>

<?php include('includes/footer.php'); ?>
