<?php

function show_header($header){
echo '<h1>'.$header.'</h1>';

}

function insert_p($text){
echo '<p>'.$text.'</p>';
}

function insert_image($link)
{
  echo ' <img src="images/'.$link.'" alt=""> ';
}

function create_button($excel_version){



  $sql="SELECT example_file, exercise_file from articles_info where excel_version=".$excel_version."";
  $result=query($sql);

  if(row_count($result)==1){
    $row = fetch_array($result);
    $example = $row['example_file'];
    $exercise_file= $row['exercise_file'];
    if(logged_in()){
      echo '
      <div class="">
      <div style="height: 50px;"></div>
       <button type="submit" class="btn btn-outline-info"  >
         <a href="files/'.$example.'" download>Скачать пример </a>
       </button>
       <button type="submit" class="btn btn-outline-info">
       <a href="files/'.$exercise_file.'" download>Скачать упражнения </a>
     </button>

     <button type="submit" class="btn btn-outline-info">
      <a href="testing.php">Пройти тест </a>
     </button>
     <div style="height: 50px;"></div>
      </div>
      ';

    }
    else if(!logged_in()) {
      echo '<div class="alert alert-danger alert-dismissible " role="alert">
      <strong> Внимание!</strong>Для доступа к скачиванию и тестам
       вы должны выполнить <a href="login.php"> вход </a> на сайт
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      </button>
      </div>';

      echo '

      <div class="">
      <div style="height: 50px;"></div>
       <button onclick="" type="submit" class="btn btn-outline-info"  >
       <a href="#" >Скачать пример </a>
       </button>
       <button onclick="" type="submit" class="btn btn-outline-info">
      <a href="#" >Скачать упражнения</a>
     </button>

     <button type="submit" onclick="" class="btn btn-outline-info">
    <a href="#" >Пройти тест</a>
     </button>
     <div style="height: 50px;"></div>
      </div>
      ';
      //redirect('login.php');
    }

  }

}




function create_content($header){

  $sql="SELECT article_id from articles_info where excel_version=".$header."";
  $result=query($sql);
  $row = fetch_array($result);
  $art_id= $row['article_id'];

  $sql2="SELECT text_block, image  from articles_content where  article_id=".$art_id."";
  $result2=query($sql2);

while($result3 = mysqli_fetch_array($result2)){

    insert_image($result3['image']);
    insert_p($result3['text_block']);

}


}


function comments(){
  if(logged_in()==false)
  echo '<div class="alert alert-danger alert-dismissible " role="alert">
  <strong> Внимание! </strong> Чтобы оставить комментарий, вы должны <a href="login.php"> войти
  </a>на сайт
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true">&times;</span>
  </button>
  </div>';

    echo '

    <hr>
     <div class="comments col-md-9" id="comments">
    <h3>Комментарии:</h3>
    <div class="comment mb-2 row" style="padding-left: 20px;">

    ';


        $sql="SELECT comment, user_id, date, article_id from comments order by date desc";
        $result=query($sql);

      while($res=mysqli_fetch_array($result)){


          $user_id=$res['user_id'];
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

                         <div class="comment-content col-md-11 col-sm-10">
                             <h4 class=" comment-meta text-primary" >'.$username.'</h4>
                             <h5 class="small text-muted"> '.$date. '</h5>
                             <div class="comment-body">
                                 <p style="padding-left:25px;">
'.$comment.'
                                 </p>
                                 <hr>
                             </div>
                         </div>
<hr>
          ';

  }
echo "</div>";

}

function show_theory($header){


  $sql="SELECT article_name from articles_info where excel_version=".$header."";
  $result=query($sql);

  if(row_count($result)==1){
    $row = fetch_array($result);
    $art_name= $row['article_name'];
    show_header($art_name);
  }

create_content($header);
create_button($header);
comments();
echo '<hr>';
}

function show_inputs(){

  $sql="SELECT excel_version from articles_info";
  $result=query($sql);
  while($result2 = mysqli_fetch_array($result)){
  echo '<input type="submit" name="excel'.$result2['excel_version'].'"
   value="Excel '.$result2['excel_version'].' " class="btn btn-outline-info" />';
  }
  if(isset($_POST['excel2007'])) show_theory('2007');
  if(isset($_POST['excel2010'])) show_theory('2010');

}


function show_results($student_email)
{
  $sql='sndl';
  // code...
}

?>
