<?php
include('classes/stockclass.php');

$obj=new Stock ;
if (isset($_POST['submit'])) {
	$medicine=$_POST['drugname'];
	$quantity=$_POST['quantity'];
	$date=$_POST['date'];
	// $medicon_id=$_POST['medicon_id'];
	
	$obj->SavestokData($medicine,$quantity,$date);
	
}
  $medicon=$obj->getAllmediconData();

  $stock=$obj->getAllstockData();
  // var_dump($stock);
  // die();
    if (isset($_GET['delid'])) 
{
	$obj->deletestockData($_GET['delid']);
	header( "location:stock.php");
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
							<h1 style="margin-left:200px; font-size: 50px;  ">Stock</h1>
						</div>
						
						
					</div>
					
					<div class="panel-body">

						
						<form action="stock.php" method="POST" role="form" class="form-horizontal form-groups-bordered">

								<div class="form-group">
								<label class="col-sm-3 control-label">Medicine</label>
								
								<div class="col-sm-5">
									<select class="form-control" name="drugname" required>
										<option>Choose medicine</option>
										<?php foreach($medicon as $medicons):?>

											<option value="<?php echo $medicons['medicon_id'];?>"><?php echo $medicons['drugname'];?></option>
											<?php endforeach;?>
								
										
									</select>
								</div>
							</div>
							
							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label">
								Quantity</label>
								
								<div class="col-sm-5">
									<input type="text" name="quantity" class="form-control" id="field-1" placeholder="Enter Quqntity."required>
								</div>
							</div>

							<div class="form-group">
								<label for="field-1" class="col-sm-3 control-label">Date</label>
								
								<div class="col-sm-5">
									<input type="date" name="date" class="form-control" id="field-1" placeholder=""required>
								</div>
							</div>
							
							
							
							<div class="form-group">
								<div class="col-sm-offset-3 col-sm-5">
									<button type="submit" name="submit" class="btn btn-default">submit</button>
								</div>
							</div>
							
		
						</form>
						
					</div>
					<div class="col-md-12">
				
				<table class="table table-striped">
					<thead>
						<tr>
							<th>#</th>
							<th>medicine_Name</th>
							<th>quantity</th>
							<th>date</th>
							
						
							<th colspan="2"> Action</th>
						</tr>
					</thead>
					
					<tbody>
						<?php foreach ($stock as $stocks):?>
						
						<tr>
							<td><?php echo $stocks['stock_id'];?></td>
							 <td><?php echo $stocks['drugname'];?></td>
							<td><?php echo $stocks['quantity'];?></td>
							<td><?php echo $stocks['date'];?></td>
							
				 
							

							
							<td><a class="btn btn-danger"  class="icon" id="delete" href="stock.php?delid=<?php echo $stocks['stock_id' ];?>"><i style="font-size: 10px; margin-top: 5px;" class="glyphicon glyphicon-trash" ></i></a></td>

							<td><a class="btn btn-success " class="icon" id="edit" href="editstock.php?editid=<?php echo $stocks['stock_id' ];?>"><i style="font-size: 10px;  margin-top: 5px;" class="glyphicon glyphicon-edit" ></i></a></td>
						
						
						</tr>
						<?php endforeach;?>
						
					
					</tbody>
				</table>
						
						
				
				
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