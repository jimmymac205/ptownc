<link href="css/style.css" rel="stylesheet" type="text/css">
 <?php 
 // Connects to your Database 
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$code = $_POST['code'];
$password = $_POST['password'];
$hash = md5( rand(0,1000) ); // Generate random 32 character hash and assign it to a local variable.  
// Example output: f4552671f8909587cf485ea990207f3b   
  
mysql_connect("localhost", "", "") or die(mysql_error()); 
 
 mysql_select_db("") or die(mysql_error()); 
 
 
 //This code runs if the form has been submitted
 
 if (isset($_POST['submit'])) { 
 
 
 
 //This makes sure they did not leave any fields blank
 
 if (!$_POST['firstname'] | !$_POST['lastname'] | !$_POST['email'] | !$_POST['code'] | !$_POST['password']) {
 
        die('You did not complete all of the required fields');
 
    }
 
 
 
// 
 
// Checks email
 
 
     
 
 $emailcheck = $_POST['email'];
 
 $check = mysql_query("SELECT email FROM users WHERE email = '$emailcheck'") 
 
or die(mysql_error());
 
 $check2 = mysql_num_rows($check);
 
 
 
 //if the name exists it gives an error
 
 if ($check2 != 0) {
 
        die('Sorry, the email '.$_POST['email'].' is already in use.');
 
                }
 
 
 
 // this makes sure both passwords entered match
 
    if ($_POST['password'] != $_POST['confpassword']) {
 
        die('Your passwords did not match. ');
 
    }
 
 
 
    // here we encrypt the password and add slashes if needed
 
    $_POST['pass'] = md5($_POST['pass']);
 
    if (!get_magic_quotes_gpc()) {
 
        $_POST['pass'] = addslashes($_POST['pass']);
 
        $_POST['username'] = addslashes($_POST['username']);
 
            }
 
 
 
 // now we insert it into the database
 
    $insert = "INSERT INTO users (username, password, email, security, answer)
 
            VALUES ('".$_POST['username']."', '".$_POST['pass']."', '".$_POST['email']."', '$hash' ,'')";
 
    $add_member = mysql_query($insert);
 
$to = "$email";
$subject = "Your account info";
$message = "Thank you for registering for PHSConnect!. 
---------------------------------
Username: $username
 
Password: $password

After this email, your password will be encrypted and won't be sent in plain text to you. This is to maintain your security in case of an attack.
---------------------------------
Thank you so much for registering!
 
- PHSConnect
 
----------------------------------------------------------------------------------------------------
 Please do not reply to this email. It goes to a non-existent email box.";
$from = "noreply@phsconnection.com";
$headers = "From:" . $from;
mail($to,$subject,$message,$headers);
     
?>
 
 
 
  
 <h1>Registered</h1>
 
 <p>Thank you, you have registered - you you can <a href='login.php'> login. </a></p>
 
  <?php 
 } 
 
 else
 {  
 ?>

<?php
 
 }
 ?> 
