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
 	$obj->SaveMedicalData($drugname,$category,$company,$Manufacturedate,$expirydate,$price,$retailsprice,$quantity);

 }
 $point=$obj->getAllcategoryData();
 $company=$obj->getAllcompanyData();
 $medicon=$obj->getAllmediconData();
 // var_dump( $show);
 // die();

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name="description" content="Neon Admin Panel" />
	<meta name="author" content="" />



	<title>Medicine</title>

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
 <form>

<div id="sections">
  <div class="section">
    <fieldset>
        <legend>User</legend>

        <p>
            <label for="firstName">First Name:</label>
            <input name="firstName[]" id="firstName" value="" type="text" />
        </p>

        <p>
            <label for="lastName">Last Name:</label>
            <input name="lastName[]" id="lastName" value="" type="text" />
        </p>

        <p><a href="#" class='remove'>Remove Section</a></p>

    </fieldset>
  </div>
</div>

<p><a href="#" class='addsection'>Add Section</a></p>

</form>


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

</body>
</html>