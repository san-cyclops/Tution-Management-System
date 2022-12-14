<?php
//database conection  file
include('dbconnection.php');
//Code for deletion
if (isset($_GET['delid'])) {
  $rid = intval($_GET['delid']);
  $sql = mysqli_query($con, "delete from tblstudents where ID=$rid");
  echo "<script>alert('Data deleted');</script>";
  echo "<script>window.location.href = 'student_view.php'</script>";
}
$search = $_GET['search'] ?? '';
if ($search) {
  // $sql = "SELECT * FROM tbllectures WHERE tName LIKE %$search% ";
  $statement = $dbh->prepare("SELECT * FROM tblstudents WHERE StudentName LIKE '%$search%' OR RFIDNumber LIKE '%$search%'");
  // $statement->bindValue(':tName',"%$search%");

} else {
  $statement = $dbh->prepare('SELECT * FROM tblstudents');
}
$statement->execute();
$student = $statement->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- Bootstrap -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- css style sheet -->
  <link rel="stylesheet" href="css/pUser.css" />
  <link rel="stylesheet" href="css/sReg.css" />
  <link rel="stylesheet" href="css/view.css" />
  <!-- font awesome file link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css" />
  <!-- Boxicons CSS -->
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
  <title>Admin Portal</title>
</head>

<body>
  <div class="sidebar close">
    <div class="logo-details">
      <a href="admin_Home.php" class="logo"><img src="img/logo.png" alt="logo" /></a>
      <span class="logo_name">LeArN</span>
    </div>
    <ul class="nav-links">
      <li>
        <a href="admin_Home.php">
          <i class="bx bxs-grid"></i>
          <span class="link_name">Dashboard</span>
        </a>
        <ul class="sub-menu blank">
          <li><a href="admin_Home.php" class="link_name">Dashboard</a></li>
        </ul>
      </li>
      <li>
        <div class="icon-link">
          <a href="student_view.php">
            <i class="bx bxs-user-detail"></i>
            <span class="link_name">Student</span>
          </a>
        </div>
        <ul class="sub-menu blank">
          <li class="link-name"><a href="student_view.php">Student</a></li>
        </ul>
      </li>
      <li>
        <a href="">
          <i class='bx bx-user-plus'></i>
          <span class="link_name">Enrollment</span>
        </a>
        <ul class="sub-menu blank">
          <li class="link-name"><a href="#">Enrollment</a></li>
        </ul>
      </li>
      <li>
        <a href="course_view.php">
          <i class="bx bx-laptop"></i>
          <span class="link_name">Course</span>
        </a>
        <ul class="sub-menu blank">
          <li class="link-name"><a href="course_view.php">Course</a></li>
        </ul>
      </li>
      <li>
        <a href="class.html">
          <i class="bx bxs-school"></i>
          <span class="link_name">Class</span>
        </a>
        <ul class="sub-menu blank">
          <li class="link-name"><a href="class.html">Class</a></li>
        </ul>
      </li>
      <li>
        <a href="allNotification.html">
          <i class="bx bx-bell"></i>
          <span class="link_name">Notification</span>
        </a>
        <ul class="sub-menu black">
          <li class="link-name">
            <a href="allNotification.html">Notification</a>
          </li>
        </ul>
      </li>
      <li>
        <a href="lecture_view.php">
          <i class='bx bxs-user-voice'></i></i>
          <span class="link_name">Tutor</span>
        </a>
        <ul class="sub-menu blank">
          <li class="link-name"><a href="allTutor.html">Tutor</a></li>
        </ul>
      </li>
      <li>
        <a href="allFile.html">
          <i class="bx bx-file-blank"></i>
          <span class="link_name">Files</span>
        </a>
        <ul class="sub-menu blank">
          <li class="link-name"><a href="allFile.html">Files</a></li>
        </ul>
      </li>
      <li>
        <a href="allStaff.html">
          <i class="bx bxs-user"></i>
          <span class="link_name">Staff</span>
        </a>
        <ul class="sub-menu blank">
          <li class="link-name"><a href="allStaff.html">Staff</a></li>
        </ul>
      </li>
      <li>
        <a href="attendance.html">
          <i class="bx bx-calendar-check"></i>
          <span class="link_name">Attendance</span>
        </a>
        <ul class="sub-menu blank">
          <li class="link-name"><a href="attendance.html">Attendance</a></li>
        </ul>
      </li>
      <li>
        <a href="Payment.html">
          <i class="bx bx-money"></i>
          <span class="link_name">Payment</span>
        </a>
        <ul class="sub-menu blank">
          <li><a href="Payment.html" class="link_name">Payment</a></li>
        </ul>
      </li>
    </ul>
  </div>
  <header class="header">
    <div class="toggle">
      <i class="bx bx-menu"></i>
    </div>
    <nav class="navbar">
      <ul>
        <li><a href=""><img src="img/user2.jpg" alt=""></a></li>
        <li><a href=""><i class="bx bx-bell"></i></a></li>
        <li><a href="#"><i class='bx bx-log-out-circle'></i></a></li>
      </ul>
      </div>
    </nav>
  </header>
  <!-- Student Registration form section starts -->
  <section class="student-reg">
    <div class="container-xl">
      <div class="table-responsive">
        <div class="table-wrapper">
          <div class="table-title">
            <div class="row">
              <div class="col-sm-4">
                <h2> Student <b> View </b></h2>
              </div>
              <div class="col-sm-4">
                <form action="">
                  <div class="input-group mb-4">
                    <input type="text" class="form-control" placeholder="Search for Student" value="<?php echo $search ?>" name="search">
                    <button class="btn btn-outline-secondary" type="submit">Search</button>
                  </div>
                </form>
              </div>
              <div class="col-sm-4" align="right">
                <a href="student_reg.php" class="btn btn-secondary"><i class="material-icons">&#xE147;</i> <span>Add New</span></a>

              </div>
            </div>
          </div>
          <table class="table table-striped table-hover">
            <thead>
              <tr>
                <th>#</th>
                <th>RFIDNumber</th>
                <th>StudentID</th>
                <th>StudentName</th>
                <th>NIC</th>
                <th>Address</th>
                <th>ContactNumber</th>
                <th>ProfilePicture</th>
              </tr>
            </thead>
            <tbody>
              <?php

              foreach ($student as $i => $student) {

              ?>
                <!--Fetch the Records -->
                <tr>
                  <td><?php echo $i + 1; ?></td>
                  <td><?php echo $student['RFIDNumber']; ?> </td>
                  <td><?php echo $student['StudentID']; ?></td>
                  <td><?php echo $student['StudentName']; ?></td>
                  <td><?php echo $student['NIC']; ?></td>
                  <td> <?php echo $student['Address']; ?></td>
                  <td> <?php echo $student['ContactNumber']; ?></td>
                  <td> <img style="width: 25px;background-size:100% 100%;" src="<?php echo $student['ProfilePicture']; ?>" name="ProfilePic" /></td>
                  <td>
                    <a href="student_edit.php?editid=<?php echo htmlentities($student['ID']); ?>" class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                    <a href="student_view.php?delid=<?php echo ($student['ID']); ?>" class="delete" title="Delete" data-toggle="tooltip" onclick="return confirm('Do you really want to Delete ?');"><i class="material-icons">&#xE872;</i></a>
                  </td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>




  </section>

  <!-- student Registration form section ends -->
  <!-- custom js file -->
  <script src="js/userP.js"></script>

  <!-- Bootstrap -->
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

</body>

</html>