<?php include("./includes/header.php");
 include("./includes/nav.php");
 ?>

<?php
if(isset($_POST['excel2007'])) show_theory('2007');
if(isset($_POST['excel2010'])) show_theory('2010'); ?>


  <?php include("./includes/footer.php"); ?>
