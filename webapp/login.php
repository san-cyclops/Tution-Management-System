 <?php
    session_start();
    //database conection  file
    include('dbconnection.php');
    $required_msg = '';
    if (isset($_POST['but_submit'])) {

        $uname = mysqli_real_escape_string($con, $_POST['txt_uname']);
        $password = mysqli_real_escape_string($con, $_POST['txt_pwd']);


        if ($uname != "" && $password != "") {

            $sql_query = "select * from tblusers where Email='" . $uname . "' and password='" . $password . "'";
            $result = mysqli_query($con, $sql_query);
            #$row = mysqli_fetch_array($result);

            //$count = $row['cntUser'];
            //$userRole = $row['userRole'];

             while ($row = mysqli_fetch_array($result)) :
                 $email = $row['Email'];
                 $userRole = $row['userRole'];
             endwhile;

            if ($email == $uname) {
                $_SESSION['uname'] = $uname;
                $_SESSION['userRole'] = $userRole;
                header('Location: admin_Home.php');
            } else {
                echo "Invalid username and password";
                $required_msg = '<span id="modal_errors_1" class="error-message">
                Invalid username and password
                </span>';
            }
        }
    }
    ?>
 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8" />
     <meta http-equiv="X-UA-Compatible" content="IE=edge" />
     <meta name="viewport" content="width=device-width, initial-scale=1.0" />
     <!-- css style sheet -->
     <link rel="stylesheet" href="css\login.css" />
     <title>Document</title>
 </head>

 <body>
     <section>
         <form method="post" action="">
             <div class="box">
                 <div class="square" style="--i: 0"></div>
                 <div class="square" style="--i: 1"></div>
                 <div class="square" style="--i: 2"></div>
                 <div class="square" style="--i: 3"></div>
                 <div class="container">
                     <div class="form">
                         <h2>LOGIN</h2>
                         <a class="logo">
                             <img src="img/logo.png" alt="logo" /><span>eArN</span></a>
                         <div class="inputBox">
                             <input type="text" id="txt_uname" name="txt_uname" placeholder="Username" required/>
                         </div>
                         <div class="inputBox">
                             <input type="password" id="txt_pwd" name="txt_pwd" placeholder="Password" />
                         </div>
                         <div class="inputBox">
                             <input id="but_submit" type="submit" name="but_submit" value="Login" />
                         </div>
                         <div class="inputBox">

                             <a class="forget" href = "javascript:;" onclick = "this.href='loginreset.php?value=' + document.getElementById('txt_uname').value">Forget Password ?</a>


                         </div></br>
                         <?= $required_msg ?>
                     </div>
                 </div>
             </div>
         </form>
     </section>
 </body>

 </html>