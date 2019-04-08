<?php
/************************ helper functions ********************************/
function clean($string){

  return htmlentities($string);

}

function redirect($location){

  return header("Location: {$location}");

}

function set_message($message){

  if(!empty($message)){
    $_SESSION['message']=$message;
  }
  else{
    $message="";
  }
}

function display_message(){

  if(isset($_SESSION['message']))
  echo $_SESSION['message'];
  unset($_SESSION['message']);
}

function token_generator(){

$token = $_SESSION['token']=md5(uniqid(mt_rand(),true));
return $token;

}

function email_exists($email){
  $sql="SELECT id from users where email='$email'";
  $result=query($sql);
  if(row_count($result)==1){
    return true;
  } else{
    return false;
  }
}

function username_exists($username){
  $sql="SELECT id from users where user_name='$username'";
  $result=query($sql);
  if(row_count($result)==1){
    return true;
  } else{
    return false;
  }
}

function send_email($email, $subject, $msg, $header){

return mail($email, $subject, $msg, $header);

}

/****************register user ****************/
  function validation_errors($error_message){
    $error_message=<<<DELIMITER

<div class="alert alert-danger alert-dismissible " role="alert">
<strong> WARNING!</strong> $error_message
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
DELIMITER;
return $error_message;
  }

  function validate_user_registration(){
    $errors=[];
    $min=3;
    $max=25;
    $remember=isset($_POST['remember']);



    if($_SERVER["REQUEST_METHOD"]=="POST"){

      $first_name       = clean($_POST['first_name']);
      $last_name        = clean($_POST['last_name']);
      $user_name        = clean($_POST['user_name']);
      $email            = clean($_POST['email']);
      $password         = clean($_POST['password']);
      $confirm_password = clean($_POST['confirm_password']);

      if (strlen($first_name)<$min){
        $errors[]="Your first name cannot be less than {$min} characters";
      }
      if (strlen($first_name)>$max){
        $errors[]="Your first name cannot  be more than {$max} characters";
      }
      if (empty($first_name)){
        $errors[]="Your first name cannot be empty";
      }

      if (strlen($last_name)<$min){
        $errors[]="Your last name cannot be less than {$min} characters";
      }
      if (strlen($last_name)>$max){
        $errors[]="Your last name cannot  be more than {$max} characters";
      }
      if (empty($last_name)){
        $errors[]="Your last name cannot be empty";
      }

      if (strlen($user_name)<$min){
        $errors[]="Your user name cannot be less than {$min} characters";
      }
      if (strlen($user_name)>$max){
        $errors[]="Your user name cannot  be more than {$max} characters";
      }
      if (empty($user_name)){
        $errors[]="Your user name cannot be empty";
      }

      if(email_exists($user_name)){
        $errors[]="Sorry, that username is already taken";

      }

      if(email_exists($email)){
        $errors[]="Sorry, that email is already exists";

      }
      if (strlen($email)>$max){
        $errors[]="Your email cannot be more than {$max} characters";
      }


      if (strlen($password)<$min){
        $errors[]="Your password cannot be less than {$min} characters";
      }
      if (strlen($password)>$max){
        $errors[]="Your password cannot  be more than {$max} characters";
      }

      if (strlen($confirm_password)<$min){
        $errors[]="Your confirm password cannot be less than {$min} characters";
      }
      if (strlen($confirm_password)>$max){
        $errors[]="Your confirm password cannot  be more than {$max} characters";
      }

      if($password!==$confirm_password){
        $errors[]="Your password fields do not match";
      }

      if(!empty($errors)){
        foreach($errors as $error){
          echo validation_errors($error);
        }
      }
      else {
        if(register_user($first_name, $last_name, $user_name, $email, $password )){
          $sql5='SELECT validation_code FROM users WHERE email="'.$email.'"';
          $result5=query($sql5);
          $row5 = fetch_array($result5);
          $validation_code = $row5['validation_code'];
          echo $validation_code;
          set_message("<p class='bg-success text-center'>Please click
          <a href='http://localhost/first_project/activate.php?email=$email&code=$validation_code'>
          here</a> to activate your account
          </p>");
          Header("Location:index.php");

        }
        else {
          set_message("<p class='bg-success text-center'>Sorry, we could not register the user</p>");
          Header("Location:index.php");

        }
      }
    } //post request
  }//function

function register_user($first_name, $last_name, $username, $email, $password ){

  $first_name=escape($first_name);
  $last_name=escape($last_name);
  $email=escape($email);
  $username=escape($username);
  $password=escape($password);

  if(email_exists($email))
    return false;
  else
    if(username_exists($username))
      return false;
    else {
      $password=md5($password);
      $validation_code = md5($username + microtime());

      $sql="INSERT INTO users(first_name, last_name, user_name, email, password, validation_code,active)";
      $sql.=" VALUES('$first_name', '$last_name', '$username', '$email', '$password', '$validation_code','0')";
      $result=query($sql);
      confirm($result);

      $subject="Activate account";
      $msg="Please, click the link below to activate your account
      http://localhost/first_project/activate.php?email=$email&$code=$validation_code";
      $header="From: noreply@yoyrwebsite.com";
      send_email($email, $subject, $msg, $header);

      return true;
    }
  //  else return false;

}

//*********************activate user functions************/
function activate_user(){
  if($_SERVER['REQUEST_METHOD']=="GET"){
    if(isset($_GET['email'])){
      $email=clean($_GET['email']);
      $validation=clean($_GET['code']);
      $sql="SELECT id FROM users WHERE email='".escape($_GET['email'])."' AND validation_code = '".escape($_GET['code'])."'";
      $result=query($sql);
      confirm($result);
      if(row_count($result)==1)
      {
        $sql2=" UPDATE users set active=1, validation_code=0 where email='".escape($email)."' and validation_code='".escape($validation)."'";
        $result2=query($sql2);
        confirm($result2);
        set_message( "<p class='bg-success '> Your account has been activated. Please, log in</p>");
        Header("Location: login.php");
      }
      else{
        set_message( "<p class='bg-danger '>Sorry, your account could not be activated</p>");
        Header("Location: login.php");


      }
    }
  }
}

/* nav generation */
function nav_generation(){
  $mail=validate_user_login();
  $sql="SELECT role from users where email='.$mail.' and active=1 ";
  $result=query($sql);
$user_role='';
  if(row_count($result)==1){

    $row = fetch_array($result);
    $user_role=$row['role'];

  }

    if($user_role==1)
      include("includes/nav_admin.php");
    else include("includes/nav_student.php");



}

/******* validate user login functions *************/
function validate_user_login(){
  $errors=[];
  $min=3;
  $max=25;

  if($_SERVER["REQUEST_METHOD"]=="POST"){
    $email      = clean($_POST['email']);
    $password   = clean($_POST['password']);
    $remember   = isset($_POST['remember']);

    if(empty($email))
      $errors[]="Email field cannot be empty";

    if(empty($password)){
      $errors[]="Password field cannot be empty";
    }
    if(!empty($errors)){
      foreach($errors as $error){
        echo validation_errors($error);
      }
    }
    else {
      $sql="SELECT role from users where email='".escape($email)."' and active=1 ";
      $result=query($sql);

      if(row_count($result)==1){

        $row = fetch_array($result);
        $user_role=$row['role'];

      }

      if(login_user($email,$password, $remember)){

        if($user_role==1)    redirect(" admin.php");
        else redirect("student.php");


      }
      else validation_errors("Your credentials are not correct");

    }
  return $email;
  }

}//functions




/*******  user login functions *************/
function login_user($email,$password, $remember){

  $sql="SELECT password , id from users where email='".escape($email)."' and active=1 ";
  $result=query($sql);

  if(row_count($result)==1){

    $row = fetch_array($result);
    $db_password=$row['password'];

    if(md5($password)===$db_password){


      if($remember == "on") {
        setcookie('email', $email, time()+86400);
         //cookie expires day

      }


      $_SESSION['email']=$email;

      return true;
    }
    else return false;
    return true;
  }
  else
   return false;
}//end of function

/*******  logged in function *************/

function logged_in(){
  if(isset($_SESSION['email']) || isset($_COOKIE['email']))
   return true;
  else
    return false;






}



/*************** recover password function **********//////
function recover_password(){

  if($_SERVER['REQUEST_METHOD']=="POST"){

   if(isset($_SESSION['token']) /* && $_POST['token']===$_SESSION['token']*/)
    {
      $email=clean($_POST['email']);

       if(email_exists($email)){

         $validation_code=md5($email+microtime());

         setcookie('temp_access_code', $validation_code, time()+60);

         $sql='UPDATE users SET validation_code="'.escape($validation_code).'" WHERE email="'.escape($email).'" ';
         $result=query($sql);
         confirm($result);

         $subject="Please, reset your password";
         $message=" Here is your password reset code {$validation_code}. Click here to reset your password http://localhost/code.php?email=$email&code=$validation_code ";
         $header= "From : noreply@yourwebsite.com";

         if(!send_email($email, $subject, $message, $header)){
           echo validation_errors("Email could not be sent");
         }

         set_message("<p class='bg-success text-center'>Please, check your email or spam folder for a password reset code</p>");
         header('Location: index.php');


       }

       else {
         echo validation_errors("This email does not exist");
       }

   }
   else  {
        Header("Location: index.php");
      }


  }


}
//post request


/*************Code validation **************/
 function validate_code()
{

  if(isset($_COOKIE['temp_access_code'])){

      if(!isset($_GET['email']) && !isset($_GET['code'])){

        header("Location: index.php ");

    }else
     if(empty($_GET['email']) || empty($_GET['code']) )
     {
        header("Location: index.php ");
    }

    else {

      if(isset($_POST['code'])){
        $validation_code = clean($_POST['code']);

        $sql="SELECT id from users where validation_code = '".escape($validation_code)."' and email='".escape($email)."' ";
        $result=query($sql);
          if(row_count($result)==1){
            header("Location: reset.php");
          }
          else {
            echo validation_errors("Sorry, wrong validation code");
          }

      }
    }
  }

  else{
    set_message("<p class='bg-danger text-center'>Sorry, your validation cookie is expired</p>");
    Header("Location: recover.php");
  }
}
