<?php
include "config.php";
// Uploads files
if(isset($_POST['save'])) { // if save button on the form is clicked
  $imagename=$_FILES["imagename"]["name"];
  echo $imagename;
  move_uploaded_file($_FILES["imagename"]["tmp_name"],"media/".$_FILES["imagename"]["name"]);
  $sql = "INSERT INTO imageupload (filename) VALUES ('$imagename')";
  if (mysqli_query($conn, $sql)) 
  {
    echo "<script>alert('Image uploaded successfully');</script>";
  }
  else {
    echo "<script>alert('Failed to upload image.');</script>";
  }
}
?>

<!DOCTYPE HTML>
<html lang="en">
<head>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 <title>How to update images in Mysql and php</title>
 <!--Bootstrap -->
 <link rel="stylesheet" href="css/bootstrap.css" type="text/css">
</head>
<body>
 <p><br></p>
 <div class="container">
  <h3>How to update images in Mysql and php</h3>
  <form class="form-horizontal row-fluid" name="insertproduct" method="post" enctype="multipart/form-data">
    <div class="control-group"> 
      <label class="control-label" for="basicinput">Upload Image</label>
      <div class="controls">
        <input type="file" name="imagename" id="imagename" value="" class="span8 tip" required>
      </div>
    </div>
    <div class="form-group row pt-3">
      <div class="col-12">
        <button type="submit" class="btn btn-success" name="save">
          <i class="fa fa-plus "></i> Upload
        </button>
      </div>
    </div>
  </form>

  <table id="" class="table table-bordered">
    <thead>
      <tr>
        <th>ID</th>
        <th>Image</th>
        <th>Image Name</th>
        <th>Action</th>
      </tr>
    </thead>

    <tbody>

      <?php 
      $sql = "SELECT * from imageupload  order by id desc";
      $query = $dbh -> prepare($sql);
      $query->execute();
      $results=$query->fetchAll(PDO::FETCH_OBJ);
      $cnt=1;
      if($query->rowCount() > 0)
      {
        foreach($results as $result)
        {
          ?>	
          <tr>
            <td><?php echo $cnt;?></td>
            <td><img class="" src="media/<?php  echo $result->filename;?>" alt="Image" width="100" height="80"></td>
            <td><?php echo ($result->filename) ?></td>
            <td class="text-center"><a href="update.php?imageid=<?php echo ($result->id) ?>" class="btn btn-primary">Update</a></td>
          </tr>
          <?php
          $cnt=$cnt+1;
        }
      } ?>
    </tbody>
  </table>
</div> 
</body>
</html>





