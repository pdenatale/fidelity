<?php session_start(); ?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset-utf-8" />
<title>Fidelity</title>
<link rel="stylesheet" href="css/stylie.css" type="text/css"
	media="screen" />
	<link href="css/fileuploader.css" rel="stylesheet" type="text/css">	
	<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
</head>
<body>

	<script type="text/javascript">
        function submitform()
        {
            var file = $('.qq-upload-file').html();
            if(file !=null)
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
		
		if(isset($_POST['editPromo']) )
		{
			//Realy nasty, each field has to be validated

			$id = stripslashes( $_REQUEST['editPromo'] );
			$name = stripslashes( $_REQUEST['name'] );
			$logo_img = stripslashes( $_REQUEST['logo'] );
			$address = stripslashes( $_REQUEST['address'] );
			$discount = stripslashes( $_REQUEST['discount'] );
			$distanceKm = stripslashes( $_REQUEST['distanceKm'] );
			$shortDesc = stripslashes( $_REQUEST['shortDesc'] );
			$longDesc = stripslashes( $_REQUEST['longDesc'] );
			$from = stripslashes( $_REQUEST['from'] );
			$to =	stripslashes( $_REQUEST['to'] );

			$update = "UPDATE  promotion SET name='".$name."',logo_img='".$logo_img."',address='".$address."',discount='".$discount."',distanceKm='".$distanceKm."',shortDesc='".$shortDesc."',longDesc='".$longDesc."',dateFrom='".$from."',dateTo='".$to."'
			 WHERE id=$id";
			echo $update;
 			mysql_query($update);

 			?>
			<script type="text/javascript"> top.location.href='promotion.php'</script>
			<?			
 	
		}

		

		if(isset($_GET['e_id']) )
		{
			$sql = "SELECT * FROM promotion WHERE id=".$_GET['e_id'];
			$result = mysql_query($sql);
			$row = mysql_fetch_array($result);
		}
		?>

		<form id="promo-form" name="promo-form" action="editPromo.php"
			method="post">
			<p>
				<label for="name">Promo Name: </label> <input type="text"
					name="name" id="name" value="<? echo $row['name']?>" />
			</p>
			<p>
					<div id="logo_image"></div>
					<ul id="separate-list"><?echo $row['logo_img']?></ul>
					<input type="hidden" name="logo" id="logo" value="<? echo $row['logo_img']?>" />
			</p>
			<p>
				<label for="address">Address: </label> 
				<input type="address" name="address" id="address"value="<? echo $row['address']?>" />
			</p>
			<p>
				<label for="discount">Discount: </label> 
				<input type="text" name="discount" id="discount" value="<? echo $row['discount']?>"/>
			</p>
			<p>
				<label for="distanceKm">Distance: </label> 
				<input type="text" name="distanceKm" id="distanceKm" value="<? echo $row['distanceKm']?>"/>
			</p>
			<p>
				<label for="shortDesc">Short Description: </label> 
				<textarea type="text" name="shortDesc" id="shortDesc"  rows="2" cols="20" maxlength="99"> <? echo $row['shortDesc']?></textarea>
			</p>
			<p>
				<label for="longDesc">Long Description: </label> 
				<input type="text" name="longDesc" id="longDesc" value="<? echo $row['longDesc']?>"/>
			</p>
			<p>
				<label for="from">Date from: </label> 
				<input type="text" name="from" id="from" value="<? echo $row['dateFrom']?>"/>
			</p>
			<p>
				<label for="to">Date to: </label> 
				<input type="text" name="to" id="to" value="<? echo $row['dateTo']?>" />
			</p>
			<input type="hidden" id="editPromo" name="editPromo" value="<? echo $row['id']?>" />
			<p>
				<a href="javascript: submitform()">Edit Promo</a>
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
