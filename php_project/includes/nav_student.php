
<?php include('functions/theory_generation.php'); ?>
<nav class="navbar navbar-inverse navbar-fixed-top justify-content-between">
   <div class="container">
     <div class="navbar-header">
       <button type="button" class="navbar-toggle collapsed"
        data-toggle="collapse" data-target="#navbar"
         aria-expanded="false" aria-controls="navbar">
         <span class="sr-only">Toggle navigation</span>
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
       </button>
       <a class="navbar-brand" href="student.php">
<img src="logo.png" height=30 alt="">
      </a>
     </div>
     <div id="navbar" class="collapse navbar-collapse">
       <ul class="nav navbar-nav">
         <li><a href="student.php">Теория</a></li>
         <li><a href="testing.php">Тесты</a></li>
         <li><a href="statistics.php">Моя статистика</a></li>
         <li><a href="com.php">Общение</a></li>
         <li><a href="links.php">Ссылки</a></li>

         <li><a href="logout.php">Выход</a></li>

       </ul>
       <ul class="nav navbar-nav navbar-right">
           <li>
             <form class="form-inline" action='student_search.php' method="post" >
               <div class="form-group mx-sm-3 mb-2">
                  <input class="form-control " type=text name="search" placeholder="Введите что-нибудь..." aria-label="Search">
                </div>

                <div class="form-group mx-sm-3 mb-2">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Поиск</button>
       </div>
              </form>
           </li>
           <li><a href="statistics.php">
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
</a>
           </li>
         </ul>




     </div>
   </div>
 </nav>
