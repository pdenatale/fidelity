<?php session_start(); ?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset-utf-8" />
<title>Fidelity</title>
	<link href="css/fileuploader.css" rel="stylesheet" type="text/css">	
	<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
</head>
<body>

	<script type="text/javascript">
        function submitform()
        {
            var file = $('.qq-upload-file').html();
        	$('#logo').val(file);
          	document.forms["promo-form"].submit();
        }
    </script>

	<p>&nbsp;</p>
	<div id="content">
		<h1>Add your Promo</h1>

		<?php
		include 'lib/dbConn.php';
		include 'lib/strUtils.php';

		if(isset($_POST['addPromo']) )
		{
			//Realy nasty, each field has to be validated
			
			$name = stripslashes( $_REQUEST['name'] );
			$logo_img = stripslashes( $_REQUEST['logo'] );
			$address = stripslashes( $_REQUEST['address'] );
			$discount = stripslashes( $_REQUEST['discount'] );
			$distanceKm = stripslashes( $_REQUEST['distanceKm'] );
			$shortDesc = stripslashes( $_REQUEST['shortDesc'] );
			$longDesc = stripslashes( $_REQUEST['longDesc'] );
			$from = stripslashes( $_REQUEST['from'] );	
			$to =	stripslashes( $_REQUEST['to'] );		
			
			$insert = "INSERT INTO promotion(id_brand, name,logo_img,address,discount,distanceKm,shortDesc,longDesc,dateFrom,dateTo)
			VALUES(".$_SESSION["valid_id"].",'".$name."','".$logo_img."','".$address."','".$discount."'
			,".$distanceKm.",'".$shortDesc."','".$longDesc."','".$from."','".$to."')";
	
			mysql_query($insert);
			?>
			<script type="text/javascript"> top.location.href='promotion.php'</script>
			<?	
		}
		?>

		<form id="promo-form" name="promo-form" action="addPromo.php"
			method="post">
			<p>
				<label for="name">Promo Name: </label> <input type="text"
					name="name" id="name" />
			</p>
			<p>
					<div id="logo_image"></div>
					<ul id="separate-list"></ul>
					<input type="hidden" name="logo" id="logo" value="" />
			</p>
			<p>
				<label for="address">Address: </label> 
				<input type="address" name="address" id="address" />
			</p>
			<p>
				<label for="discount">Discount: </label> 
				<input type="text" name="discount" id="discount" />
			</p>
			<p>
				<label for="distanceKm">Distance: </label> 
				<input type="text" name="distanceKm" id="distanceKm" />
			</p>
			<p>
				<label for="shortDesc">Short Description: </label> 
				<textarea type="text" name="shortDesc" id="shortDesc"  rows="2" cols="20" maxlength="99"> </textarea>
			</p>
			<p>
				<label for="longDesc">Long Description: </label> 
				<input type="text" name="longDesc" id="longDesc" />
			</p>
			<p>
				<label for="from">Date from: </label> 
				<input type="text" name="from" id="from" />
			</p>
			<p>
				<label for="to">Date to: </label> 
				<input type="text" name="to" id="to" />
			</p>
			<input type="hidden" id="addPromo" name="addPromo" value="Add Promo" />
			<p>
				<a href="javascript: submitform()">Add Promo</a>
			</p>
		</form>
	</div>
	
	<script src="js/fileuploader.js" type="text/javascript"></script>
    <script>        
        function createUploader(){            
            var uploader = new qq.FileUploader({
                element: document.getElementById('logo_image'),
                listElement: document.getElementById('separate-list'),
                action: 'php.php'
            });           
        }     
        window.onload = createUploader;  
    </script> 
    
</body>
</html>
