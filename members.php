<link rel="stylesheet" type="text/css" href="style.css"> 
<?php 
 // Connects to your Database 
  
$mary = $_GET['question'];
if($mary == "yes"){
header("Location: create_topic.php");
}
else
{
 $con = mysql_connect("localhost", "", "") or die(mysql_error()); 
 
 mysql_select_db("") or die(mysql_error()); 
 
 
 
 
 
 
 if(isset($_COOKIE['ID_my_site'])) 
 
 { 
        
    $email = $_COOKIE['ID_my_site']; 
 
    $pass = $_COOKIE['Key_my_site']; 
 
        $check = mysql_query("SELECT * FROM users WHERE email = '$email'")or die(mysql_error()); 
 
    while($info = mysql_fetch_array( $check ))   
 
        { 
 
if ($email == "jmcdermott7255@stu.d214.org"){
$admin = 1;
}
//if the cookie has the wrong password, they are taken to the login page 
 
        if ($pass != $info['password']) 
 
            {           header("Location: login.php"); 
 
            } 
 
 
 
 //otherwise they are shown the admin area   
 
    else
 
            {

  
echo "<a href='index.html'>" . "Home" . "</a>";
echo "<br>";
include 'linksformembers.html';
if ($admin ==1){
echo "<h1>" . "You are an Admin of this site" . "</h1>";
}
echo "Hello, $username. How are you today?";
echo"<a href=profile.php>" . "<h1>" . "My Profile" . "</h1>" . "</a>";
echo "<br>";
echo "<h1>" . "My Recent Posts" . "</h1>";
echo "<br>";
echo $recentposts;
echo "<h1>" . "Admin Announcements" . "</h1>";
include('adminnews.html');
echo "<br>";
echo "<a href=postinglevel.php>" . "<h1>" . "Posting level" . "</h1>";
if ($admin == 1){
echo "<h1>" . "Admin Options:" . "</h1>";
echo "<a href=viewquestion.php>View all recent forum posts</a>";
echo "<br>";
echo "<a href=viewadmins.php>View list of admins</a>";
}
echo "<br>";
echo "<br>";
echo "<br>";
echo "<a href=logout.php>Logout</a>"; 
 
             
} 
 
        } 
 
        } 
 
 else
 
  
 
 //if the cookie does not exist, they are taken to the login screen 
 
 {           
 
  
 
 header("Location: login.php"); 
 } 
}
 ?> 