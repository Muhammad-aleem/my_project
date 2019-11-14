<?php
include('classes/posclass.php');
$obj=new Pos;
if (isset($_POST['submit'])) {
	$medicine=$_POST['drugname'];
	 $qantity=$_POST['quantity'];
	$price=$_POST['price'];
	$obj->SaveposData($medicine,$qantity,$price);
}

$medicine=$obj->getAllmedicineData();
// var_dump($medicon);
// die();
// if(isset($_POST['getSinglemedicineData'])){
// 	$medicon=$obj->getSinglemedicineData($_POST['drugname']);
	

								
						 	


// 	$html='';
// 	$html.='';
// 	foreach($medicine as $section)
// 	{
// 		$html.=''.$section['price'].'/';
// 	}
// 	echo $html;
	
// 	exit;
// }


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name="description" content="Neon Admin Panel" />
	<meta name="author" content="" />



	<title>P_O_S</title>

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
							<h1 style="margin-left:200px; font-size: 50px;">P_O_S</h1>
						</div>
						
						
						
						
					</div>
					
					<div class="panel-body" id="container">

						
					<!-- 	<form action="pos.php" method="POST" role="form" id="show" class="form-horizontal form-groups-bordered">
				<div id="print">  
								<  -->
							
						<!-- 	<div class="col-md-4" id="">
							<div class="form-group">
								<label for="field-1" class="col-md-4 control-label">
								Medicine_Name</label>
								
								<div class="col-md-8">
									<input type="text" name="drugname" class="form-control" id="field-1" placeholder="Enter Medicine_Name" required="" >
								</div> -->
						<!-- 	</div>
							</div>
							<div class="col-md-4">
							<div class="form-group">
								<label for="field-1" class="col-sm-2 control-label">
								Quantity</label>
								
								<div class="col-md-6">
									<input type="text" name="quantity" class="form-control" id="field-1" placeholder="Enter Quqntity." required="" >
								</div>
							</div>
							</div>
							<div class="col-md-4 ">
							<div class="form-group">
								<label for="field-1" class="col-sm-1 control-label">
								Price</label>
								
								<div class="col-md-6">
									<input type="text" name="quantity" class="form-control" id="field-1" placeholder="Enter Price." required="" >
								</div>
							</div> -->
				<!-- 			</div>
				</div>
							<div class="form-group">
								<div class="col-sm-offset-3 col-sm-5">
									<button style="margin-left:550px"   id="add"  class="btn btn-success" >Add</button>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-offset-3 col-sm-5">
									<button type="submit" name="submit"   id="add"  class="btn btn-success" >Submit</button>
								</div>
							</div>
							
		
						</form> --> 
						<form action="pos.php" method="POST" role="form" id="show" class="form-horizontal form-groups-bordered">
				

<div id="sections">
  <div class="section">
  				<div class="col-md-4" >
						 	<div class="form-group">
								<label class="col-sm-3 control-label firstName">Medicine</label>
								
								<div class="col-md-7">
									<select class="form-control" name="drugname[]" id="drugname" onchange="myfunction()">
										<option>Choose Medicine</option>
										<?php foreach($medicine as $medicines):?>

											<option value="<?php echo $medicines['medicon_id'];?>"><?php echo $medicines['drugname'];?></option>
											<?php endforeach;?>
								
										
									</select>
								</div>
							</div>
			   </div>
			   <div class="col-md-4" >

							<div class="form-group">
								<label for="field-1 lastName" class="col-md-4 control-label">
								Quantity</label>
								
								<div class="col-md-8">
									
									<input name="quantity[]" id="lastName" class="form-control" value="" type="text" placeholder="Enter quantity" required="" />
								</div> 
						 	</div>
			   </div>
              
              <div id="dynamic-data">
                <div class="col-md-4" id="">

							<div class="form-group">
								<label for="field-1 lastName" class="col-md-4 control-label">
								Price</label>
								
								<div class="col-md-8">
									
									<input name="price[]" id="price" class="form-control" value="" type="text" placeholder="Enter price" required="" >
								</div> 
						 	</div>
			   </div>
			</div>
    <!--     <p>
            <label for="firstName">First Name:</label>
            <input name="firstName[]" id="firstName" value="" type="text" />
        </p> -->

        <!-- <p>
            <label for="lastName">Last Name:</label>
            <input name="lastName[]" id="lastName" value="" type="text" />
        </p> -->

        <button class="btn btn-danger remove " style="border-radius: 40px;margin-left: 800px"><a href="#" style="color: white; " class='remove'>Remove </a></button>

    
  </div>
</div>
<br>
 
  <button class="btn btn-success addsection" style="border-radius: 50px;margin-left: 800px"><a href="#" style="color: white" class='addsection'>Add </a></button> 

  	<div class="form-group">
								<div class="col-sm-offset-3 col-sm-5">
									<button  style="border-radius: 70px;"  type="submit" name="submit" class="btn btn-default" id="click">submit</button>
								</div>
							</div>

							

</form>
						
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

	
	<script type="text/javascript">
//define template
var template = $('#sections .section:first').clone();

//define counter
var sectionsCount = 1;

//add new section
$('body').on('click', '.addsection', function() {

    //increment
    sectionsCount++;

    //loop through each input
    var section = template.clone().find(':input').each(function(){

        //set id to store the updated section number
        var newId = this.id + sectionsCount;

        //update for label
        $(this).prev().attr('for', newId);

        //update id
        this.id = newId;

    }).end()

    //inject new section
    .appendTo('#sections');
    return false;
});

//remove section
$('#sections').on('click', '.remove', function() {
    //fade out section
    $(this).parent().fadeOut(300, function(){
        //remove parent element (main section)
        $(this).parent().parent().empty();
        return false;
    });
    return false;
});

	</script>

	<script type="text/javascript">
		$('.remove').hide();
		$('addsection').click (function(){
			$('.remove').show();
		});
              
		
	</script>
	/script>

	<script type="text/javascript">
	
		$('#click').click(function(){
			// $('#show').show();\
			// alert('');
		});
              
		
	</script>

<!-- <script type="text/javascript">
	function myfunction(){
			var drugname = $('#drugname option:selected').val(); 
			// var price=$('#price')
			// alert(drugname);

			$.ajax({
				url:'pos.php',
				type:'POST',
				data:'drugname='+drugname+'&getSinglemedicineData='+1,
				success:function(result)

				{
					// alert(result);
					
					$( '#price').html(result);
					$('#dynamic-data').html(result);

				}
				});

	}


</script> -->

</body>
</html>