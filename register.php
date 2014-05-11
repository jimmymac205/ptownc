 <?php 
 // Connects to your Database 
$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['pass'];
$hash = md5( rand(0,1000) ); // Generate random 32 character hash and assign it to a local variable.  
// Example output: f4552671f8909587cf485ea990207f3b   
  
mysql_connect("localhost", "", "") or die(mysql_error()); 
 
 mysql_select_db("") or die(mysql_error()); 
 
 
 //This code runs if the form has been submitted
 
 if (isset($_POST['submit'])) { 
 
 
 
 //This makes sure they did not leave any fields blank
 
 if (!$_POST['username'] | !$_POST['pass'] | !$_POST['pass2'] | !$_POST['email']) {
 
        die('You did not complete all of the required fields');
 
    }
 
 
 
 // checks if the username is in use
 
    if (!get_magic_quotes_gpc()) {
 
        $_POST['username'] = addslashes($_POST['username']);
 
    }
 
 $usercheck = $_POST['username'];
 
 $check = mysql_query("SELECT username FROM users WHERE username = '$usercheck'") 
 
or die(mysql_error());
 
 $check2 = mysql_num_rows($check);
 
 
 
 //if the name exists it gives an error
 
 if ($check2 != 0) {
 
        die('Sorry, the username '.$_POST['username'].' is already in use.');
 
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
 
    if ($_POST['pass'] != $_POST['pass2']) {
 
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
$message = "Thank you for registering for Engineer Your Problem. 
---------------------------------
Username: $username
 
Password: $password
---------------------------------
Thank you so much for registering!
 
- The guys at Engineer Your Problem
 
----------------------------------------------------------------------------------------------------
 Please do not reply to this email. It goes to a non-existent email box.";
$from = "noreply@engineeryourproblem.com";
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
 
 
  
 <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
 
 <table border="0">
 
 <tr><td>Username:</td><td>
 
 <input type="text" name="username" maxlength="60">
 
 </td></tr>
 
 <tr><td>Password:</td><td>
 
 <input type="password" name="pass" maxlength="15">
 
 </td></tr>
 
 <tr><td>Confirm Password:</td><td>
 
 <input type="password" name="pass2" maxlength="15">
 
 </td></tr>
<tr><td>Email</td><td>
 <input type="text" name="email">
</td></tr>
<tr><th colspan=2><input type="submit" name="submit"
value="Register"></th></tr> </table>
 
 </form>
 
 
 <?php
 
 }
 ?> 
