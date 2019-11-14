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
 	$quantity=$_POST['quantity'];
 	$remaning=$_POST['remaning'];
 $obj->updatemediconData($drugname,$category,$company,$Manufacturedate,
 	$expirydate,$price,$retailsprice,$quantity,$remaning,$_GET['editid']);
	header( "location:showmedicine.php");

 	// $obj->SaveMedicalData($drugname,$category,$company,$Manufacturedate,$expirydate,$price,$retailsprice,$quantity);

 }
 $point=$obj->getAllcategoryData();
 $company=$obj->getAllcompanyData();
 $medicon=$obj->getAllmediconData();
 // var_dump( $show);
 // die();
if(isset($_GET['editid']))
{
	$singal = $obj->getSinglemediconData($_GET['editid']);
	// var_dump($singal);
	// die();
	
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



	<title>Edit_Medicon</title>

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
							<h1 style="margin-left:200px; font-size: 50px;  "> Edit_Medicine</h1>
						</div>
						
						
					</div>
					
					<div class="panel-body">
						
						<form action="" method="POST" role="form" class="form-horizontal form-groups-bordered">
							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label">
								Drug_Name</label>
								
								<div class="col-sm-5">
									<input type="text" name="drugname" class="form-control" id="field-1" placeholder="Enter Drug_Name"required value="<?php echo $singal['drugname']?>">
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
								<label for="field-1" class="col-sm-3 control-label">Category</label>
								
								
								<div class="col-sm-5">
									<select class="form-control" name="categoryname" required>
										<option  value="1"> Choose Category</option>
										<?php foreach( $point as  $points):?>
											<?php 
											if ($singal['category']==$points['category_id'])
											 {
												$selected='selected';
											}else{
												$selected='';
											}
											?>

											<option value="<?php echo  $points['category_id'];?>"<?php echo $selected?>><?php echo $points['categoryname'];?></option>
											<?php endforeach;?>
								
										
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-3 control-label">Company</label>
								
								<div class="col-sm-5">
									<select class="form-control" name="companyname" required>
										<option>Choose company</option>
										<?php foreach($company as $companys):?>
											<?php 
											if ($singal['company']==$companys['company_id']) 
											{
											   $selected='selected';
											}
											else{
												$selected='';

											}
											?>

											<option value="<?php echo $companys['company_id'];?>" <?php echo $selected ?>><?php echo $companys['companyname'];?></option>
											<?php endforeach;?>
								
										
									</select>
								</div>
							</div>
							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label">Manufacture_Date</label>
								
								<div class="col-sm-5">
									<input type="date" name="manufacturedate" class="form-control" id="field-1" placeholder="Enter Manufacture_Date"required value="<?php echo $singal['Manufacturedate']?>">
								</div>
							</div>
							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label">Expiry_Date</label>
								
								<div class="col-sm-5">
									<input type="date" name="expirydate" class="form-control" id="field-1" placeholder="Enter Expiry_Date"required value="<?php echo $singal['expirydate']?>">
								</div>
							</div>
							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label">Price</label>
								
								<div class="col-sm-5">
									<input type="text" name="price" class="form-control" id="field-1" placeholder="Enter price"required value="<?php echo $singal['price']?>">
								</div>
							</div>
							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label">Retails-price</label>
								
								<div class="col-sm-5">
									<input type="text" name="retailsprice" class="form-control" id="field-1" placeholder="Enter Retails_price"required value="<?php echo $singal['retailsprice']?>">
								</div>
							</div>
								<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label">remaning</label>
								
								<div class="col-sm-5">
									<input type="text" name="remaning" class="form-control" id="field-1" placeholder="Enter Retails_price"required value="<?php echo $singal['remaning']?>">
								</div>
							</div>
							
							<div class="form-group">
								<div class="col-sm-offset-3 col-sm-5">
									<button type="submit" name="submit" class="btn btn-success" style="border-radius: 10px;">UpDate</button>
								</div>
							</div>
							
		
						</form>
						
					</div>
					<div class="col-md-6">
				
				
				
				
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