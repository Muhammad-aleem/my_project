<?php
include('classes/medicineclass.php');
$obj=new Medicon;
 if (isset($_POST['submit'])) {
 	$drugname=$_POST['drugname'];
 	$category=$_POST['categoryname'];
 	$company=$_POST['companyname'];
 	$Manufacturedate=$_POST['manufacturedate'];
 	$expirydate=$_POST['expirydate'];
 	$price=$_POST['price'];
 	$retailsprice=$_POST['retailsprice'];
 	$obj->SaveMedicalData($drugname,$category,$company,$Manufacturedate,$expirydate,$price,$retailsprice);

 }
 $point=$obj->getAllcategoryData();
 $company=$obj->getAllcompanyData();
 $medicon=$obj->getAllmediconData();
 // var_dump($medicon);
 // die();
  if (isset($_GET['delid'])) 
{
	$obj->deletemediconData($_GET['delid']);
	header( "location:showmedicon.php");
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name="description" content="Neon Admin Panel" />
	<meta name="author" content="" />

	

	<title>view medicine</title>

	<link rel="stylesheet" href="assets/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css">
	<link rel="stylesheet" href="assets/css/font-icons/entypo/css/entypo.css">
	<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic">
	<link rel="stylesheet" href="assets/css/bootstrap.css">
	<link rel="stylesheet" href="assets/css/neon-core.css">
	<link rel="stylesheet" href="assets/css/neon-theme.css">
	<link rel="stylesheet" href="assets/css/neon-forms.css">
	<link rel="stylesheet" href="assets/css/custom.css">

	<script src="assets/js/jquery-1.11.3.min.js"></script>

	<!--[if lt IE 9]><script src="assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
	
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->


</head>
<body class="page-body" data-url="http://neon.dev">

<div class="page-container"><!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->
	
	<?php include('navbar.php');?>

	<div class="main-content">					
		<h2  style="margin-left: 200px;font-size: 40px;">View_Medicon</h2>
		<br />
		<!-- <a style="margin-left: 850px;" href="logout.php">Log Out<span style="font-size: 10px;" class=" glyphicon glyphicon-log-out" ></span></a> -->
		
		
		<div class="row">
			<div class="col-md-12">
				
				<div class="panel panel-primary" data-collapsed="0">
				
					<div class="panel-heading">
						<div class="panel-title">
						
						</div>
						
						<div class="panel-options">
							<a href="#sample-modal" data-toggle="modal" data-target="#sample-modal-dialog-1" class="bg"><i class="entypo-cog"></i></a>
							<a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
							<a href="#" data-rel="reload"><i class="entypo-arrows-ccw"></i></a>
							<a href="#" data-rel="close"><i class="entypo-cancel"></i></a>
						</div>
					</div>
					
					<div class="panel-body">
							<table class="table table-striped">
					<thead>
						<tr>
							<th>#</th>
							<th>Drug_Name</th>
							<th>Category</th>
							<th>Company</th>
							<th>Manufacturedate</th>
							<th>Expiry_date</th>
							<th>price</th>
							<th>Retails_Price</th>
							<th>Quqntity</th>
							<th>Remaning</th>
							<th>Sold</th>
						
						
							<th colspan="2"> Action</th>
						</tr>
					</thead>
					
					<tbody>
						<?php foreach ($medicon as $medicons):?>
						
						<tr>
							<td><?php echo $medicons['medicon_id'];?></td>
							 <td><?php echo $medicons['drugname'];?></td>
							<td><?php echo $medicons['categoryname'];?></td>
							<td><?php echo $medicons['companyname'];?></td>
							<td><?php echo $medicons['Manufacturedate'];?></td>
							<td><?php echo $medicons['expirydate'];?></td>
							<td><?php echo $medicons['price'];?></td>
				            <td><?php echo $medicons['retailsprice'];?></td>
				            <td><?php echo $medicons['quantity'];?></td>
				            <td><?php echo $medicons['remaning'];?></td>
				            <td><?php echo $medicons['sold'];?></td>
				 
							

							
							<td><a class="btn btn-danger"  class="icon" id="delete" href="showmedicon.php?delid=<?php echo $medicons['medicon_id' ];?>"><i style="font-size: 10px; margin-top: 5px;" class="glyphicon glyphicon-trash" ></i></a></td>

							<td><a class="btn btn-success " class="icon" id="edit" href="editmedicine.php?editid=<?php echo $medicons['medicon_id' ];?>"><i style="font-size: 10px;  margin-top: 5px;" class="glyphicon glyphicon-edit" ></i></a></td>
						
						
						</tr>
						<?php endforeach;?>
						
					
					</tbody>
				</table>
						
						
						
					</div>
				
				</div>
			
			</div>
		</div>
		
		
		
		
	
	<!-- Bottom scripts (common) -->
	<script src="assets/js/gsap/TweenMax.min.js"></script>
	<script src="assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js"></script>
	<script src="assets/js/bootstrap.js"></script>
	<script src="assets/js/joinable.js"></script>
	<script src="assets/js/resizeable.js"></script>
	<script src="assets/js/neon-api.js"></script>


	<!-- Imported scripts on this page -->
	<script src="assets/js/bootstrap-switch.min.js"></script>
	<script src="assets/js/neon-chat.js"></script>


	<!-- JavaScripts initializations and stuff -->
	<script src="assets/js/neon-custom.js"></script>


	<!-- Demo Settings -->
	<script src="assets/js/neon-demo.js"></script>

</body>
</html>