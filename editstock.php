<?php
include('classes/stockclass.php');

$obj=new Stock ;
if (isset($_POST['submit'])) {
	$medicine=$_POST['drugname'];
	$quantity=$_POST['quantity'];
	$date=$_POST['date'];
	// $medicon_id=$_POST['medicon_id'];
	 $obj->updatestockData($medicine,$quantity,$date,$_GET['editid']);
	header( "location:stock.php");
}
  $medicine=$obj->getAllmediconData();

  // var_dump($medicine);
  // die();

  $stock=$obj->getAllstockData();
  // var_dump($medicon);
  // die();

if(isset($_GET['editid']))
{
	$singal = $obj->getSinglestockData($_GET['editid']);

	
	
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



	<title>Stock</title>

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
	<!-- <a href="logout.php">LogOut</a> -->
			<!-- working place -->
		<div class="row">
			<div class="col-md-12">
				
				<div class="panel panel-primary" data-collapsed="0">
				
					<div class="panel-heading">
						<div class="panel-title">
							<h1 style="margin-left:200px; font-size: 50px;  ">Edit_Stock</h1>
						</div>
						
						
					</div>
					
					<div class="panel-body">

						
						<form action="" method="POST" role="form" class="form-horizontal form-groups-bordered">

								<div class="form-group">
								<label class="col-sm-3 control-label">Medicine</label>
								
								<div class="col-sm-5">
									<select class="form-control" name="drugname" >
										<option>Choose medicine</option>
										<?php foreach($medicine as $medicines):?>
											<?php 
											if ($singal['medicon_id']==$medicines['medicon_id'])
											 {
												$selected='selected';

											}else{
												$selected='';
											}
											?>

											<option value="<?php echo $medicines['medicon_id'];?>"<?php echo $selected;?>><?php echo $medicines['drugname'];?></option>
											<?php endforeach;?>
								
										
									</select>
								</div>
							</div>
							
							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label">
								Quantity</label>
								
								<div class="col-sm-5">
									<input type="text" name="quantity" class="form-control" id="field-1" placeholder="Enter Quqntity."required value="<?php echo $singal['quantity']?>">
								</div>
							</div>

							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label">Date</label>
								
								<div class="col-sm-5">
									<input type="date" name="date" class="form-control" id="field-1" placeholder=""required value="<?php echo $singal['date']?>">
								</div>
							</div>
							
							
							
							<div class="form-group">
								<div class="col-sm-offset-3 col-sm-5">
									<button style="border-radius: 30px" type="submit" name="submit" class="btn btn-success">Update</button>
								</div>
							</div>
							
		
						</form>
						
					</div>
					<div class="col-md-12">
				
				
						
						
				
				
			</div>
				
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