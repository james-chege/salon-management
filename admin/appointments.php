<?php 
session_start();
require_once("../db.php");
if(isset($_SESSION['id_user']) || isset($_SESSION['id_company'])) { 
  header("Location: index.php");
  exit();
}
// $connect = mysqli_connect("localhost","","", "");
$query1 = "SELECT * FROM users1";
$result2 = mysqli_query($connect, $query1);
?>

<!DOCTYPE html>

<html>

<head>

  <meta charset="utf-8">

  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title>Salon Expert</title>

  <!-- Tell the browser to be responsive to screen width -->

  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <!-- Bootstrap 3.3.7 -->

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">

  <!-- Font Awesome -->

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- Ionicons -->

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">

  <!-- Theme style -->

  <link rel="stylesheet" href="../css/AdminLTE.min.css">

  <link rel="stylesheet" href="../css/_all-skins.min.css">

  <!-- Custom -->

  <link rel="stylesheet" href="../css/custom.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->

  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->



  <!-- Google Font -->

  <link rel="stylesheet"

        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

</head>

<body class="hold-transition skin-green sidebar-mini">

<div class="wrapper">



  <header class="main-header">



    <!-- Logo -->

    <a href="index.php" class="logo logo-bg">

      <!-- mini logo for sidebar mini 50x50 pixels -->

      <span class="logo-mini"><b>J</b>P</span>

      <!-- logo for regular state and mobile devices -->

      <span class="logo-lg"><b>Salon Expert</b></span>

    </a>



    <!-- Header Navbar: style can be found in header.less -->

    <nav class="navbar navbar-static-top">

      <!-- Navbar Right Menu -->

      <div class="navbar-custom-menu">

        <ul class="nav navbar-nav">



          <?php if(empty($_SESSION['id_admin']) && empty($_SESSION['id_company'])) { ?>

          <li>

            <a href="login.php">Login</a>

          </li>

          <li>

            <a href="sign-up.php">Sign Up</a>

          </li>  

          <?php } else { 
            if(isset($_SESSION['id_admin'])) { 
          ?>        

          <li>

            <a href="index.php">Dashboard</a>

          </li>
          <li>

            <a href="users.php">Clients</a>

          </li>

           <li>

            <a href="appointments.php">Add Appointment</a>

          </li>

          <?php
          } else if(isset($_SESSION['id_admin'])) { 
          ?>        

          <li>

            <a href="company/index.php">Dashboard</a>

          </li>
          <li>

          <a href="password.php">Credentials</a>

          </li>

          <?php } ?>

          <li>

            <a href="logout.php">Logout</a>

          </li>

          <?php } ?>          

        </ul>

      </div>

    </nav>

  </header>



  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper" style="margin-left: 0px;">



    <section class="content-header">

      <div class="container">

        <div class="row latest-job margin-top-50 margin-bottom-20 bg-white">

          <h1 class="text-center margin-bottom-20">CREATE AN APPOINTMENT</h1>
          <div>
          <?php 

            //If User Failed To log in then show error message.

            if(isset($_SESSION['RegisterMemberError'])) {

              ?>
              <div class="alert alert-danger">
                  <p>That number is already taken! Try Again!</p>
                </di>

            <?php

            unset($_SESSION['RegisterMemberError']); }

            ?>
          </div>
          <form method="post" id="registerCandidates" action="add-appointment.php" enctype="multipart/form-data">

            <div class="col-md-12 latest-job ">

              <div class="form-group">

                <label>Client</label>
                      <!-- <input type="number" name="member_number" class="form-control btn-sm input-lg" minlength="1" maxlength="10" placeholder="Member Number" required> -->
                    <select name="client_number" class="form-control input-lg" >

                        <?php while($row1 = mysqli_fetch_array($result2)):; ?>

                            <option value="<?php echo $row1[5]; ?>"><?php echo $row1[1]; echo " "; echo $row1[2]; echo "("; echo $row1[5]; echo ")";?></option>

                        <?php endwhile;?>

                    </select>

              </div>

              <div class="form-group">

                <label>Description</label>

                <input class="form-control input-lg" type="text" id="lname" name="appointment" placeholder="description *" required>

              </div>

              <div class="form-group">
              <label for="date">Appointment Date</label>
                <input class="form-control input-lg" type="date" id="dob" min="2018-08-25" max="2040-01-31" name="appointment_date" placeholder="Date Of appointment" required>
              </div>

              <div class="form-group">

                <button class="btn btn-flat btn-success">Add</button>

              </div>



            </div>            

          </form>

          

        </div>

      </div>

    </section>



    



  </div>

  <!-- /.content-wrapper -->



  <footer class="main-footer" style="margin-left: 0px;">

    <div class="text-center">

      <strong>Copyright &copy; <a href="#"></a>.</strong> All rights

    reserved.

    </div>

  </footer>



  <!-- /.control-sidebar -->

  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->

  <div class="control-sidebar-bg"></div>



</div>

<!-- ./wrapper -->



<!-- jQuery 3 -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Bootstrap 3.3.7 -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>

<!-- AdminLTE App -->

<script src="js/adminlte.min.js"></script>



<script type="text/javascript">
      function validatePhone(event) {
        //event.keycode will return unicode for characters and numbers like a, b, c, 5 etc.
        //event.which will return key for mouse events and other events like ctrl alt etc. 
        var key = window.event ? event.keyCode : event.which;
        if(event.keyCode == 8 || event.keyCode == 46 || event.keyCode == 37 || event.keyCode == 39) {
          // 8 means Backspace
          //46 means Delete
          // 37 means left arrow
          // 39 means right arrow
          return true;
        } else if( key < 48 || key > 57 ) {
          // 48-57 is 0-9 numbers on your keyboard.
          return false;
        } else return true;
      }
</script>



<script type="text/javascript">
  $('#dob').on('change', function() {
    var today = new Date();
    var birthDate = new Date($(this).val());
    var age = today.getFullYear() - birthDate.getFullYear();
    var m = today.getMonth() - birthDate.getMonth();
    if(m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
      age--;
    }
    $('#age').val(age);
  });
</script>

<script type="text/javascript">
  $(function(){
    $(".alert:visible").fadeOut(4000);
  });
</script>

</body>

</html>
