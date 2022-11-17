<?php
//database conection  file
include('dbconnection.php');
//Code for deletion
if (isset($_GET['delid'])) {
  $rid = intval($_GET['delid']);
  $sql = mysqli_query($con, "delete from tbllectures where ID=$rid");
  echo "<script>alert('Data deleted');</script>";
  echo "<script>window.location.href = 'lecture_view.php'</script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- css style sheet -->
  <link rel="stylesheet" href="css/pUser.css" />
  <link rel="stylesheet" href="css/sReg.css" />
  <!-- font awesome file link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css" />
  <!-- Boxicons CSS -->
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
  <title>Admin Portal</title>
</head>

<body>
  <div class="sidebar close">
    <div class="logo-details">
      <a href="userP-Home.html" class="logo"><img src="img/logo.png" alt="logo" /></a>
      <span class="logo_name">LeArN</span>
    </div>
    <ul class="nav-links">
      <li>
        <a href="">
          <i class="bx bxs-grid"></i>
          <span class="link_name">Dashboard</span>
        </a>
        <ul class="sub-menu blank">
          <li><a href="" class="link_name">Dashboard</a></li>
        </ul>
      </li>
      <li>
        <div class="icon-link">
          <a href="">
            <i class="bx bxs-user-detail"></i>
            <span class="link_name">Student</span>
          </a>
          <i class="bx bxs-chevron-down arrow"></i>
        </div>
        <ul class="sub-menu">
          <li class="link-name"><a href="#">Student</a></li>
          <li><a href="student_reg.html">Student Regitration</a></li>
          <li><a href="studentEnrlmnt.html">Student Enrollment</a></li>
          <li><a href="studentUpDlt.html">Student Update/Delete</a></li>
        </ul>
      </li>
      <li>
        <div class="icon-link">
          <a href="">
            <i class="bx bx-laptop"></i>
            <span class="link_name">Course</span>
          </a>
          <i class="bx bxs-chevron-down arrow"></i>
        </div>
        <ul class="sub-menu">
          <li class="link-name"><a href="#">Course</a></li>
          <li><a href="addCourse.html">Add Course</a></li>
          <li><a href="upDltCourse.html">Update/Delete Course</a></li>
        </ul>
      </li>
      <li>
        <div class="icon-link">
          <a href="class.html">
            <i class="bx bxs-school"></i>
            <span class="link_name">Class</span>
          </a>

        </div>
        <ul class="sub-menu blank">
          <li class="link-name"><a href="class.html">Class</a></li>
        </ul>
      </li>
      <li>
        <div class="icon-link">
          <a href="">
            <i class="bx bx-bell"></i>
            <span class="link_name">Notification</span>
          </a>
          <i class="bx bxs-chevron-down arrow"></i>
        </div>
        <ul class="sub-menu">
          <li class="link-name"><a href="notification.html">Notification</a></li>
          <li><a href="notification.html">Add Notification</a></li>
          <li><a href="upNotification.html">Update Notification</a></li>
        </ul>
      </li>
      <li>
        <div class="icon-link">
          <a href="">
            <i class="bx bx-bell"></i>
            <span class="link_name">Tutor</span>
          </a>
          <i class="bx bxs-chevron-down arrow"></i>
        </div>
        <ul class="sub-menu">
          <li class="link-name"><a href="#">Tutor</a></li>
          <li><a href="lectureReg.html">Add Tutor</a></li>
          <li><a href="lectureUpDlt.html">Update/ Delete Tutor</a></li>
        </ul>
      </li>
      <li>
        <div class="icon-link">
          <a href="">
            <i class="bx bx-file-blank"></i>
            <span class="link_name">Files</span>
          </a>
          <i class="bx bxs-chevron-down arrow"></i>
        </div>
        <ul class="sub-menu">
          <li class="link-name"><a href="#">Files</a></li>
          <li><a href="addFiles.html">Upload Files</a></li>
          <li><a href="upDltFiles.html">Update/Delete Files </a></li>
        </ul>
      </li>
      <li>
        <div class="icon-link">
          <a href="">
            <i class="bx bxs-user"></i>
            <span class="link_name">Staff</span>
          </a>
          <i class="bx bxs-chevron-down arrow"></i>
        </div>
        <ul class="sub-menu">
          <li class="link-name"><a href="#">Staff Regitration</a></li>
          <li><a href="staffReg.html">Staff Regitration</a></li>
          <li><a href="staffUpDlt.html">Update/Delete Staff</a></li>
        </ul>
      </li>
      <li>
        <div class="icon-link">
          <a href="attendance.html">
            <i class="bx bx-calendar-check"></i>
            <span class="link_name">Attendance</span>
          </a>
        </div>
        <ul class="sub-menu blank">
          <li class="link-name "><a href="attendance.html">Attendance</a></li>
        </ul>
      </li>
      <li>
        <div class="icon-link">
          <a href="Payment.html">
            <i class="bx bx-money"></i>
            <span class="link_name">Payment</span>
          </a>
        </div>
        <ul class="sub-menu blank">
          <li><a href="Payment.html" class="link_name">Payment</a></li>
        </ul>
      </li>

    </ul>
  </div>
  <header class="header">
    <div class="toggle">
      <i class='bx bx-menu'></i>
    </div>

    <nav class="navbar">
      <ul>
        <li><a href=""><img src="../img/user2.jpg" alt=""></a></li>
        <li><a href=""><i class="bx bx-bell"></i></a></li>
        <li><a href="#"><i class='bx bx-log-out-circle'></i></a></li>

      </ul>
      </div>
    </nav>
  </header>
  <!-- Student Registration form section starts -->



  <section class="student-reg">



    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <style>
      body {
        color: #566787;
        background: #f5f5f5;
        font-family: 'Roboto', sans-serif;
      }

      .table-responsive {
        margin: 30px 0;
      }

      .table-wrapper {
        min-width: 1000px;
        background: #fff;
        padding: 20px;
        box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
      }

      .table-title {
        font-size: 15px;
        padding-bottom: 10px;
        margin: 0 0 10px;
        min-height: 45px;
      }

      .table-title h2 {
        margin: 5px 0 0;
        font-size: 24px;
      }

      .table-title select {
        border-color: #ddd;
        border-width: 0 0 1px 0;
        padding: 3px 10px 3px 5px;
        margin: 0 5px;
      }

      .table-title .show-entries {
        margin-top: 7px;
      }

      .search-box {
        position: relative;
        float: right;
      }

      .search-box .input-group {
        min-width: 200px;
        position: absolute;
        right: 0;
      }

      .search-box .input-group-addon,
      .search-box input {
        border-color: #ddd;
        border-radius: 0;
      }

      .search-box .input-group-addon {
        border: none;
        border: none;
        background: transparent;
        position: absolute;
        z-index: 9;
      }

      .search-box input {
        height: 34px;
        padding-left: 28px;
        box-shadow: none !important;
        border-width: 0 0 1px 0;
      }

      .search-box input:focus {
        border-color: #3FBAE4;
      }

      .search-box i {
        color: #a0a5b1;
        font-size: 19px;
        position: relative;
        top: 8px;
      }

      table.table tr th,
      table.table tr td {
        border-color: #e9e9e9;
      }

      table.table th i {
        font-size: 13px;
        margin: 0 5px;
        cursor: pointer;
      }

      table.table td:last-child {
        width: 130px;
      }

      table.table td a {
        color: #a0a5b1;
        display: inline-block;
        margin: 0 5px;
      }

      table.table td a.view {
        color: #03A9F4;
      }

      table.table td a.edit {
        color: #FFC107;
      }

      table.table td a.delete {
        color: #E34724;
      }

      table.table td i {
        font-size: 19px;
      }

      .pagination {
        float: right;
        margin: 0 0 5px;
      }

      .pagination li a {
        border: none;
        font-size: 13px;
        min-width: 30px;
        min-height: 30px;
        padding: 0 10px;
        color: #999;
        margin: 0 2px;
        line-height: 30px;
        border-radius: 30px !important;
        text-align: center;
      }

      .pagination li a:hover {
        color: #666;
      }

      .pagination li.active a {
        background: #03A9F4;
      }

      .pagination li.active a:hover {
        background: #0397d6;
      }

      .pagination li.disabled i {
        color: #ccc;
      }

      .pagination li i {
        font-size: 16px;
        padding-top: 6px
      }

      .hint-text {
        float: left;
        margin-top: 10px;
        font-size: 13px;
      }
    </style>


    <div class="container-xl">
      <div class="table-responsive">
        <div class="table-wrapper">
          <div class="table-title">
            <div class="row">
              <div class="col-sm-5">
                <h2> Lecture <b> View </b></h2>
              </div>
              <div class="col-sm-7" align="right">
                <a href="lecture_reg.php" class="btn btn-secondary"><i class="material-icons">&#xE147;</i> <span>Add New Student</span></a>

              </div>
            </div>
          </div>
          <table class="table table-striped table-hover">
            <thead>
              <tr>
                <th>#</th>
                <th>tID</th>
                <th>tName</th>
                <th>address</th>
                <th>phone</th>
                <th>nic</th>
                <th>email</th>
                <th>ProfilePicture</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $ret = mysqli_query($con, "select * from tbllectures");
              $cnt = 1;
              $row = mysqli_num_rows($ret);
              if ($row > 0) {
                while ($row = mysqli_fetch_array($ret)) {

              ?>
                  <!--Fetch the Records -->
                  <tr>
                    <td><?php echo $cnt; ?></td>
                    <td><?php echo $row['tID']; ?> </td>
                    <td><?php echo $row['tName']; ?></td>
                    <td><?php echo $row['address']; ?></td>
                    <td><?php echo $row['phone']; ?></td>
                    <td> <?php echo $row['nic']; ?></td>
                    <td> <?php echo $row['email']; ?></td>
                    <td> <img style="width: 25px;background-size:100% 100%;" src="media/<?php  echo $row['pPic'];?>" name="ProfilePic"/></td>
                    <td>
                      <a href="lecture_edit.php?editid=<?php echo htmlentities($row['ID']); ?>" class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                      <a href="lecture_view.php?delid=<?php echo ($row['ID']); ?>" class="delete" title="Delete" data-toggle="tooltip" onclick="return confirm('Do you really want to Delete ?');"><i class="material-icons">&#xE872;</i></a>
                    </td>
                  </tr>
                <?php
                  $cnt = $cnt + 1;
                }
              } else { ?>
                <tr>
                  <th style="text-align:center; color:red;" colspan="6">No Record Found</th>
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

</body>

</html>