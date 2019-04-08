
<?php include('functions/theory_generation.php'); ?>
<nav class="navbar navbar-inverse navbar-fixed-top justify-content-between">
   <div class="container">
     <div class="navbar-header">
       <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
         <span class="sr-only">Toggle navigation</span>
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
       </button>
       <a class="navbar-brand" href="admin.php">
<img src="logo.png" height=30 alt="">
      </a>
     </div>
     <div id="navbar" class="collapse navbar-collapse">
       <ul class="nav navbar-nav">
         <li><a href="comments.php">Комментарии</a></li>
         <li><a href="statistics_admin.php">Статистика</a></li>
         <li><a href="login.php">Выход</a></li>
       </ul>

       <form class="form-inline " action='admin_search.php' method="post" >
         <div class="form-group mx-sm-3 mb-2">

            <input class="form-control " type=text name="search" placeholder="Введите что-нибудь..." aria-label="Search">
          </div>

          <div class="form-group mx-sm-3 mb-2">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Поиск</button>
 </div>
        </form>

     </div>
   </div>
 </nav>
