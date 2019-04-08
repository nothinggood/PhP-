<?php
$connection=mysqli_connect('localhost','root','','first_project');
$connection->query("SET NAMES utf8");
function row_count($result){
  return mysqli_num_rows($result);
}

function query($query){
  global $connection;
  return mysqli_query($connection,$query);
}

function escape($string){
  global $connection;
  return mysqli_real_escape_string($connection, $string);
}

function fetch_array($result){
  global $connection;
  return mysqli_fetch_array($result);
}

function confirm($result){
  global $connection;
  if(!$result){
    die("QUERY FAILED".mysqli_error($connection));
  }
}
?>
