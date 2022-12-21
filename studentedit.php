//Query for data updation
/*$query = mysqli_query($con, "update  tblstudents set 
  RFIDNumber = :RFID , 
  StudentID=:StID, 
  StudentName=:StName, 
  NIC= :NIC, Address=:Address, Gender= :Gender, 
  Birthday=:Birthday, ContactNumber=:ContactNumber, 
  EmailAddress=:EmailAddress, Password=:Password, 
  ProfilePicture=:aimage, ParentName=:ParentName, ParentContactNumber=:ParentContactNumber, 
  ParentEmailAddress=:ParentEmailAddress  where ID=:eid");
  $stmt = $this->pdo->prepare($sql);

  $stmt->bindParam(':RFID', $RFIDNumber);
  $stmt->bindParam(':StID', $StudentID);
  $stmt->bindParam(':NIC', $NIC);
  $stmt->bindParam(':Address', $Address);
  $stmt->bindParam(':Gender', $Gender);
  $stmt->bindParam(':Birthday', $Birthday);
  $stmt->bindParam(':ContactNumber', $ContactNumber);
  $stmt->bindParam(':EmailAddress', $EmailAddress);
  $stmt->bindParam(':Password', $Password);
  $stmt->bindParam(':ParentName', $ParentName);
  $stmt->bindParam(':EmailAddress', $EmailAddress);
  $stmt->bindParam(':ParentContactNumber', $ParentContactNumber);
  $stmt->bindParam(':ParentEmailAddress', $ParentEmailAddress);
  $stmt->bindParam(':aimage', $aimage, PDO::PARAM_STR);
  $res = $stmt->execute();
  if ($res) {
    echo "<script>alert('You have successfully update the data');</script>";
    echo "<script type='text/javascript'> document.location ='student_view.php'; </script>";
  } else {
    echo "<script>alert('Something Went Wrong. Please try again');</script>";
  }
*/

  $sqls="update  tblstudents set RFIDNumber = :RFID , 
  StudentID=:StID, StudentName=:StName, NIC= :NIC, Address=:Address, Gender= :Gender, 
  Birthday=:Birthday, ContactNumber=:ContactNumber, EmailAddress=:EmailAddress, Password=:Password, 
  ProfilePicture=:aimage, ParentName=:ParentName, ParentContactNumber=:ParentContactNumber, 
  ParentEmailAddress=:ParentEmailAddress  where ID=:eid";