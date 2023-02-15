<html>
<head></head>
<body>
<div align="center">
<h1 style="text-align:center"><u>Insert Data</u></h1>
<form method="post" action="sample.php" >
<input type="text" name="name">
<input type="submit" value="submit" name=submit>
</div>
<div align="center">
<form method="post" action="sample.php">
<h1 style="text-align:center"><u>UPDATE DATA</u></h1>
<input type="text" name="search_id" >
<input type="submit" name="search" value="Search">
<input type="submit" name="view" value="view">
</form>
</div>
<?php
$con=mysqli_connect("localhost","root","","sample");
if(isset($_POST["submit"]))
{
if($con)
{
echo $name=$_POST["name"];
$qry="INSERT INTO studentname(name) VALUES ('$name')";
if(mysqli_query($con, $qry))
{
echo "Data inserted successfully<br>";
}
}
}
if(isset($_POST["search"]))
{
$id=$_POST["search_id"];
$qry="select*from studentname where id='$id'";
$data=mysqli_query($con, $qry);
?>
<h1 style="text-align:center"><u>STUDENT DETAILS</u></h1>
<table align="center" border="1">
<tr>
<th>ID</th>
<th>Name</th>
</tr>
<?php
$res=mysqli_fetch_array($data);
?>
<tr>
<td><?php echo $res['id'];?></td>
<td><?php echo $res['name'];?></td>
<td><a href="sample_update.php?id=<?php echo $res['id'];?>">update</a></td>
<td><a href="sample_delete.php?id=<?php echo $res['id'];?>">Delete</a></td>
</tr>
</table>
<?php
}
if(isset($_POST["view"]))
{
$qry="select*from studentname";
$data=mysqli_query($con, $qry);
20MCA133 WEB PROGRAMMING LAB
44
?>
<h1 style="text-align:center"><u>STUDENT DETAILS</u></h1>
<table align="center" border="1">
<tr>
<th>ID</th>
<th>Name</th>
</tr>
<?php
while($res=mysqli_fetch_array($data))
{
?>
<tr>
<td><?php echo $res['id'];?></td>
<td><?php echo $res['name'];?></td>
</tr>
<?php
}
}
?>
</table>
</body>
</html>
Sample-update.php
<html>
<head></head>
<title<Student Registration</title>
<body>
<?php
$id=$_GET['id'];
$con=mysqli_connect("localhost","root","","sample");
$qry="select*from studentname where id='$id'";
$res=mysqli_query($con, $qry);
if($res){
$r=mysqli_fetch_array($res);
?>
<form method="post" action="sample_update.php" >
<h1 style="text-align:center"><u>UPDATE</u></h1>
<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
<table align="center">
<tr>
<td>Student ID</td>
<td>:</td>
<td><input type="text" name="sid" value="<?php echo $r['id'];?>"></td></tr>
<tr>
<td>Name of Student</td>
<td>:</td>
<td><input type="text" name="name" value="<?php echo $r['name'];?>"></td></tr>
<tr>
<td colspan="2" style="text-align:right"><input type="submit" value="update"
name="update"></td></tr>
</table>
</form>
<?php }
if(isset($_POST["update"]))
{
$id=$_POST["id"];
$sname=$_POST["name"];
$qry1="update studentname set name='$sname' where id='$id'";
if(mysqli_query($con, $qry1))
{
echo "Data updated successfully<br>";
}
}
?>
</body>
</html>
Sample_delete.php
<?php
$con=mysqli_connect("localhost","root","","sample");
$id=$_GET["id"];
if($con)
{
$qry1="delete from studentname where id='$id'";
if(mysqli_query($con, $qry1))
{
echo "Data Removed<br>";
}
}
?>

