<?php
session_start();
error_reporting(0);
include "config.php";
// Uploads files
$imgid=intval($_GET['imageid']);
if(isset($_POST['submit'])) { // if save button on the form is clicked
	$aimage=$_FILES["imagename"]["name"];
	move_uploaded_file($_FILES["imagename"]["tmp_name"],"media/".$_FILES["imagename"]["name"]);
	$sql="update imageupload set filename=:aimage where id=:imgid";
	$query = $dbh->prepare($sql);
	$query->bindParam(':imgid',$imgid,PDO::PARAM_STR);
	$query->bindParam(':aimage',$aimage,PDO::PARAM_STR);
	$query->execute();
	if( $query->execute()){
		echo '<script>alert(" image has been Updated.")</script>';

	}else{
		echo '<script>alert("Something went wrong please try a.")</script>';
	}
}
?>

<!DOCTYPE HTML>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Image Upload</title>
	<!--Bootstrap -->
	<link rel="stylesheet" href="css/bootstrap.css" type="text/css">
</head>
<body>
	<p><br></p>
	<div class="container">
		<div class="card col-md-8">
			<form class="form-horizontal" name="image" method="post" enctype="multipart/form-data">
				<?php 
				$imgid=intval($_GET['imageid']);
				$sql = "SELECT * from imageupload where id=:imgid";
				$query = $dbh -> prepare($sql);
				$query -> bindParam(':imgid', $imgid, PDO::PARAM_STR);
				$query->execute();
				$results=$query->fetchAll(PDO::FETCH_OBJ);
				$cnt=1;
				if($query->rowCount() > 0)
				{
					foreach($results as $result)
					{ 
						?>  
						<div class="form-group ml-4">
							<label for="focusedinput" class=" control-label">Current Image </label>
							<div class="">
								<img src="media/<?php  echo $result->filename;?>" width="200">
							</div>
						</div>

						<div class="form-group ml-4">
							<label for="focusedinput" class=" control-label">New Image</label>
							<div class="">
								<input type="file" name="imagename" id="imagename" required>
							</div>
						</div>  
						<?php 
					}
				} ?>

				<div class="row mb-4 ml-4" >
					<div class="col-sm-8 col-sm-offset-2">
						<button type="submit" name="submit" class="btn-primary btn">Update</button>
					</div>
				</div>
			</form>
		</div>
	</div> 
</body>
</html>





