<link rel="stylesheet" type="text/css" href="style.css"> 
<?php 
 // Connects to your Database 
 
 mysql_connect("localhost", "", "") or die(mysql_error()); 
 
 mysql_select_db("") or die(mysql_error()); 
 
 
 //Checks if there is a login cookie
 
 if(isset($_COOKIE['ID_my_site']))
 
 
 //if there is, it logs you in and directes you to the members page
 
 { 
    $email = $_COOKIE['ID_my_site']; 
 
    $pass = $_COOKIE['Key_my_site'];
 
        $check = mysql_query("SELECT * FROM users WHERE email = '$email'")or die(mysql_error());
 
    while($info = mysql_fetch_array( $check ))  
 
        {
 
        if ($pass != $info['password']) 
 
            {
 
                        }
 
        else
 
            {
 
            header("Location: members.php");
 
 
 
            }
 
        }
 
 }
 
 
 //if the login form is submitted 
 
 if (isset($_POST['submit'])) { // if form has been submitted
 
 
 
 // makes sure they filled it in
 
    if(!$_POST['email'] | !$_POST['password']) {
 
        die('Please fill in all the required forms');
 
    }
 
    // checks it against the database
 
 
 
    if (!get_magic_quotes_gpc()) {
 
        $_POST['email'] = addslashes($_POST['email']);
 
    }
 
    $check = mysql_query("SELECT * FROM users WHERE email = '".$_POST['email']."'")or die(mysql_error());
 
 
 
 //Gives error if user dosen't exist
 
 $check2 = mysql_num_rows($check);
 
 if ($check2 == 0) {
 
        die('That user does not exist in our database. <a href=register.html>Click Here to Register</a>');
 
                }
 
 while($info = mysql_fetch_array( $check ))     
 
 {
 
 $_POST['password'] = stripslashes($_POST['password']);
 
    $info['password'] = stripslashes($info['password']);
 
    $_POST['password'] = md5($_POST['password']);
 
 
 
 //gives error if the password is wrong
 
    if ($_POST['password'] != $info['password']) {
 
        die('Incorrect password, please try again.');
 
    }
 
  
 else
 
 { 
 
  
 // if login is ok then we add a cookie 
 
     $_POST['email'] = stripslashes($_POST['email']); 
 
     $hour = time() + 3600; 
 
 setcookie(ID_my_site, $_POST['email'], $hour); 
 
 setcookie(Key_my_site, $_POST['password'], $hour);  
 
  
 
 //then redirect them to the members area 
 
 
 
header("Location: members.php"); 
 

 } 
 
 } 
 
 } 
 
 else
 
{    
 
  
 
 // if they are not logged in 
 
 ?> 
 
 <?php 
 
 } 
 
  
 
 ?> 