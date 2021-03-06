<?php 



session_start();

require_once("../db.php");

$query = "SELECT * FROM centers";

if(empty($_SESSION['id_super'])){

  header("Location: index.php");
  exit();

}


$result = mysqli_query($connect, $query);

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

      <span class="logo-mini"><b>F</b>P</span>

      <!-- logo for regular state and mobile devices -->

      <span class="logo-lg"><b>Salon Expert</b></span>

    </a>



    <!-- Header Navbar: style can be found in header.less -->

    <nav class="navbar navbar-static-top">

      <!-- Navbar Right Menu -->

      <div class="navbar-custom-menu">

        <ul class="nav navbar-nav">

          <li>

            <a href="users.php">Clients</a>

          </li>

          <li>

            <a href="dashboard.php">Dashboard</a>

          </li>

          <li>

            <a href="logout.php">Logout</a>

          </li>
        </ul>

      </div>

    </nav>

  </header>



  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper" style="margin-left: 0px;">



    <section class="content-header">

      <div class="container">

        <div class="row latest-job margin-top-50 margin-bottom-20 bg-white">

          <h1 class="text-center margin-bottom-20">CREATE ATTENDANT PROFILE</h1>

          <form method="post" id="registerCandidates" action="add-attendant.php" enctype="multipart/form-data">

            <div class="col-md-12 latest-job ">

              <div class="form-group">

                <input class="form-control input-lg" type="text" id="fname" name="fname" placeholder="Fullname *" required>

              </div>

              <div class="form-group">

                <input class="form-control input-lg" type="text" id="fname" name="username" placeholder="Usename *" required>

              </div>

              <div class="form-group">

                <input class="form-control input-lg" type="password" id="password" name="password" placeholder="Password" required>

              </div>

              <div class="form-group">

                <input class="form-control input-lg" type="password" id="cpassword" name="cpassword" placeholder="confirm" required>

              </div>

              

              <div class="form-group">

                <button class="btn btn-flat btn-success">Register</button>

              </div>



            </div>            

            <div class="col-md-6 latest-job ">

            

             

            </div>

          </form>

          

        </div>

      </div>

    </section>



    



  </div>

  <!-- /.content-wrapper -->



  <footer class="main-footer" style="margin-left: 0px;">

    <div class="text-center">

      <strong>Copyright &copy; <a href="#">Saints</a>.</strong> All rights reserved.

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



<script>

  $("#registerCandidates").on("submit", function(e) {

    e.preventDefault();

    if( $('#password').val() != $('#cpassword').val() ) {

      $('#passwordError').show();

    } else {

      $(this).unbind('submit').submit();

    }

  });

</script>

</body>

</html>

