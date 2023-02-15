<form  method="post" >
 

  
    <input type="text" placeholder="Enter Username" id="uname" name="uname" required>

  
    <input type="password" placeholder="Enter Password" id="psw" name="psw" required>

    <input type="submit" value="Login" onclick="login.php">
    

  
</form>








<?php

 $conn =  mysqli_connect('localhost', 'root', '',"student2");
         
         // Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
//echo "Connected successfully";

 

      if($_SERVER["REQUEST_METHOD"] == "POST" )
 {
   $uname = $_POST["uname"]; 

    $pwd = $_POST["psw"]; 

$sql = "SELECT *  FROM login where uname='$uname' and psw='$pwd'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
echo "login successful";
}
else
{
echo"wrong username ,password";
}
}
?>

