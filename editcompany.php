
<?php
include('classes/companyclass.php');
$obj=new  Data;

if (isset($_POST['submit'])) {
	$categoryname=$_POST['companyname'];

	$obj->updatecompanyData($categoryname,$_GET['editid']);
	header( "location:company.php");
}
$point=$obj->getAllcompanyData();


if(isset($_GET['editid']))
{
	$singal = $obj->getSinglecompanyData($_GET['editid']);
	// var_dump($singal);
	// die();
	
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>company</title>
</head>
<body>
	<center><h1><b>Company</b></h1></center>
	<form method="POST" accept=".php" >
		<center>
	<label><b>Name</b></label>
	<input type="text" name="companyname" placeholder="update the name.." value="<?php echo $singal ['companyname'];?>">
	<button  type="submit" name="submit" >update</button>
	</center>
	</form>
	


</body>
