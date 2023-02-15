<html>
   <head>
      <title>Connecting MySQL Server</title>
   </head>
   <body>
<form method="post" action="db.php">
  <label for="fname">First name:</label><br>
  <input type="text" id="fname" name="fname" ><br>
  <label for="lname">Last name:</label><br>
  <input type="text" id="lname" name="lname" ><br><br>
  <input type="submit" value="Submit" >
 //<input type="submit" value="view"  onclick="display.php">
</form>
      <?php
         
         $conn =  mysqli_connect('localhost', 'root', '',"student1");
         
         // Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
//echo "Connected successfully";



        if($_SERVER["REQUEST_METHOD"] == "POST")
 {
$fname = $_POST["fname"]; 
    $lname = $_POST["lname"]; 
      
    $sql = "INSERT INTO stdtable1 VALUES ('$fname', '$lname')";

if ($conn->query($sql) === TRUE) {
  //echo "Data entered successfully";
}
 else
 {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

  }  
   
      ?>
   </body>
</html>
