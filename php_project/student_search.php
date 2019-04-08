<?php include("./includes/header.php");



 include("./includes/nav_student.php");
 ?>
<?php

function insert_answer($title, $content)
{

  $sql1="SELECT excel_version from articles_info where article_name='".$title."'";

  $result1=query($sql1);

    while($result2 = mysqli_fetch_array($result1)){
      $excel_version=$result2['excel_version'];
      echo '<hr>
       <form class="form-inline " action="article.php" method="post" >
                          <div class="search-result">
                          <input class="hidden_input"  type="submit" name="excel'.$excel_version.'"
                          value="'.$title.'" />
                                <p>
                                '.$content.'
                              </p>
                          </div>
                          </form>
      ';
    }


}




if(isset($_POST['search'])){
  $searchq= $_POST['search'];
  //$searchq=preg_replace("[а-я]","", $searchq);
  //echo $searchq;
  $sql="SELECT articles_info.article_name ,
  articles_content.text_block
  from articles_info
  JOIN articles_content ON articles_info.article_id = articles_content.article_id
  where text_block LIKE '%".$searchq."%' ";
  $result=query($sql);

  if(row_count($result)==0){
    echo 'Попробуйте еще раз, мы ничего не нашли';
  }

    if(row_count($result)>0){
echo '
<div class="container bootstrap snippet">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-content"><h2> Результаты поиска</h2>
 ';

      while($result3 = mysqli_fetch_array($result)){
        insert_answer($result3['article_name'], $result3['text_block'] );

      }


echo '
</div>
</div>
</div>
</div>
</div>

';


    }



}

 ?>


<?php


 ?>

 <?php include("./includes/footer.php"); ?>
