<?php
//database conection  file
include('dbconnection.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';


//Code for deletion
if (isset($_GET['editid'])) {

    $idno = '0070502098';
    $statementmail = $dbh->prepare("SELECT a.id,b.RFIDNumber,b.StudentID,b.StudentName,b.NIC,b.ContactNumber,c.courseName,b.ParentEmailAddress,a.courseId from tblstdenroll a 
inner join tblstudents b on a.RFIDNumber=b.RFIDNumber inner join tblcourse c on a.courseId=c.id  inner join tblattendance d on 
a.ID = d.studentid");
    $statementmail->execute();
    $studentrec = $statementmail->fetchAll(PDO::FETCH_ASSOC);
    foreach ($studentrec as $i => $studentrec) {
        $message = "Student Name - " . $studentrec['StudentName'] . " RFID Number- " . $studentrec["RFIDNumber"] . " Class Time Notified";

        $mail = new PHPMailer(); // create a new object
        $mail->IsSMTP(); // enable SMTP
        $mail->SMTPDebug = 0; // debugging: 1 = errors and messages, 2 = messages only
        $mail->SMTPAuth = true; // authentication enabled
        $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
        $mail->Host = "smtp.gmail.com";
        $mail->Port = 465; // or 587
        $mail->IsHTML(true);
        $mail->Username = "ekanayakekanchanamala@gmail.com";
        $mail->Password = "rmqqcihbwzpqrham";
        $mail->SetFrom("ekanayakekanchanamala@gmail.com");
        $mail->Subject = "Notification ";
        $mail->Body = $message;
        $mail->AddAddress($studentrec['ParentEmailAddress']);

        if (!$mail->Send()) {
            echo "Mailer Error: " . $mail->ErrorInfo;
        } else {
            #echo "Message has been sent";
            echo "<script>alert('Notification has been sent');</script>";
            echo "<script>window.location.href = 'student_notification.php'</script>";
        }
    }

}
$search = $_GET['search'] ?? '';
if ($search) {
  // $sql = "SELECT * FROM tbllectures WHERE tName LIKE %$search% ";
  $statement = $dbh->prepare("SELECT a.id,b.RFIDNumber,b.StudentID,b.StudentName,b.NIC,b.ContactNumber,c.courseName,b.ParentEmailAddress,a.courseId from tblstdenroll a 
inner join tblstudents b on a.RFIDNumber=b.RFIDNumber inner join tblcourse c on a.courseId=c.id  inner join tblattendance d on 
a.ID = d.studentid WHERE b.StudentName LIKE '%$search%' OR b.RFIDNumber LIKE '%$search%'");
  // $statement->bindValue(':tName',"%$search%");

} else {
  $statement = $dbh->prepare('SELECT a.id,b.RFIDNumber,b.StudentID,b.StudentName,b.NIC,b.ContactNumber,c.courseName,b.ParentEmailAddress,a.courseId from tblstdenroll a 
inner join tblstudents b on a.RFIDNumber=b.RFIDNumber inner join tblcourse c on a.courseId=c.id  inner join tblattendance d on 
a.ID = d.studentid');
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
<style>
    .button {
        background-color: #4CAF50; /* Green */
        border: none;
        color: white;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        margin: 4px 2px;
        cursor: pointer;
    }

    .button1 {font-size: 10px;}
    .button2 {font-size: 12px;}
    .button3 {font-size: 16px;}
    .button4 {font-size: 20px;}
    .button5 {font-size: 24px;}
</style>
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
                <h2> Parent Notification Send <b> View </b></h2>
              </div>
              <div class="col-sm-4">
                <form action="">
                  <div class="input-group mb-4">
                    <input type="text" class="form-control" placeholder="Search for Student" value="<?php echo $search ?>" name="search">
                    <button class="btn btn-outline-secondary" type="submit">Search</button>
                  </div>
                </form>
              </div>

            </div>
          </div>
            <div class="col-sm-4">
                 <a href="attendance.php?editid=100" class="button button3" title="arrow" data-toggle="tooltip">Send Email to All Parent EmailAddress </a>
            </div>
          <table class="table table-striped table-hover">
            <thead>
              <tr>
                <th>#</th>
                <th>RFIDNumber</th>
                <th>StudentID</th>
                <th>StudentName</th>
                <th>NIC</th>
                <th>ContactNumber</th>
                <th>courseName</th>
                  <th>ParentEmailAddress</th>

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
                  <td> <?php echo $student['ContactNumber']; ?></td>
                  <td> <?php echo $student['courseName']; ?></td>
                    <td> <?php echo $student['ParentEmailAddress']; ?></td>


                  <td>


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