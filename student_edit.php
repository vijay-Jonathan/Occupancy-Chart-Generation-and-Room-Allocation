

<?php
session_start();
//  include('studentLogin.php');  
include('connection.php');

$sid=$_SESSION['sid'];

        $sql = "SELECT * FROM student_info WHERE sid='$sid'";
        $run_query=mysqli_query($conn,$sql);
        $row=mysqli_fetch_array($run_query);
        $name=$row['sname'];
        $ele = $name;
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Timetable companion</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="dashbord_student.php">Student Area</a>
    <a href="/"  id="logo"
                                                 title="Return to the Amrita Vishwa Vidyapeetham home page"><img
                                        src="assets/img/amrita.jpg" class="img-reponsive"
                                        alt="Amrita Vishwa Vidyapeetham"></a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="student_edit.php">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Dashboard</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="timetable  ">
          <a class="nav-link" href="dashbord_student.php">
            <i class="fa fa-table"></i>
            <span class="nav-link-text">My Timetable</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="timetable  ">
          <a class="nav-link" href="dashbord_student_class.php">
            <i class="fa fa-table"></i>
            <span class="nav-link-text">My Classroom Timetable</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="timetable  ">
          <a class="nav-link" href="notify.php">
          <i class="fa fa-fw fa-whatsapp"></i>
            <span class="nav-link-text">Notifications</span>
          </a>
        </li>
        <!-- <?php include'sidenav.php'; ?> -->
      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
          <!-- <li><a href="#">Hello <?php echo $name; ?></a></li> -->
          <li><a href="index.php"><?php echo $name;  //echo getLoggedMemberID();// name of the login ?></a></li>
             <i class="fa fa-fw fa-sign-out"></i><li>Logout</li></li> 
        </li>
      </ul>
    </div>
  </nav>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="dashbord_student.php">Dashboard</a>
        </li>
         <li class="breadcrumb-item active"><?php echo $name; ?></li>
      </ol>
     
     <!-- center area -->
     <div class="page-header">
		<h1><?php echo  $name; ?></h1>
	</div>
 

  <div class="panel panel-info">
				<div class="panel-heading">
					<h3 class="panel-title">
						<i class="glyphicon glyphicon-info-sign"></i>
						<!-- <?php echo '<h3>Your info</h3>' ?> -->
					</h3>
				</div>
        <form action = 'update.php' method = 'POST'>
				<div class="panel-body">
					
          <div class="form-group">
							<label for="name"><?php echo 'Your Name' ?></label>
              <div class="speech">
							  <input type="text" id="snam" name="sname" value="<?php echo $ele; ?>" class="form-control">
                <img onclick="startDictation()" src="https://i.imgur.com/cHidSVu.gif" />
						  </div>
            </div>
						<div class="form-group">
							<label for="email"><?php echo 'Email' ?></label>
							<input type="email" id="semail" name="semail" value="<?php echo $row['semail']; ?>" class="form-control">
						</div>
            <div class="form-group">
							<label for="password"><?php echo 'Password' ?></label>
							<input type="text" id="email" name="spassword" value="<?php echo $row['spassword']; ?>" class="form-control">
						</div>
            <div class="form-group">
							<label for="snumber"><?php echo 'Contact No :' ?></label>
							<input type="number" id="snumber" name="snumber" value="<?php echo $row['snumber']; ?>" class="form-control">
						</div>
            <div class="form-group">
							<label for="email"><?php echo 'Roll NO :' ?></label>
							<input type="text" id="email" name="sroll" value="<?php echo $row['sroll']; ?>" class="form-control">
						</div>
            <div class="form-group">
							<label for="email"><?php echo 'Address' ?></label>
							<input type="text" id="saddr" name="saddr" value="<?php echo $row['saddr']; ?>" class="form-control">
						</div>
            
            <div class="form-group">
							<label for="email"><?php echo 'Date Of Birth' ?></label>
							<input type="date" id="email" name="sdob" value="<?php echo $row['sdob']; ?>" class="form-control">
						</div>
            <div class="form-group">
							<label for="email"><?php echo 'Branch' ?></label>
							<input type="text" id="email" name="sbranch" value="<?php echo $row['sbranch']; ?>" class="form-control">
						</div>
            <div class="form-group">
							<label for="email"><?php echo 'SEM' ?></label>
							<input type="text" id="email" name="ssem" value="<?php echo $row['ssem']; ?>" class="form-control">
						</div>
            <div class="col-md-4 col-md-offset-4">
								<button type="submit" id="update-profile" class="btn btn-success btn-block"><i class="glyphicon glyphicon-ok"></i> <?php echo 'Update profile' ?></button>
							</div>

						<div class="row">
           
							
              </form>
						</div>
					</fieldset>
				</div>
			</div>


      <script>
function startDictation() {

  if (window.hasOwnProperty('webkitSpeechRecognition')) {

    var recognition = new webkitSpeechRecognition();

    recognition.continuous = false;
    recognition.interimResults = false;
    recognition.lang = "en-US";
    recognition.start();

    recognition.onresult = function (e) {
      document.getElementById('snam').value = e.results[0][0].transcript;
      recognition.stop();
      header('speechstudent.php');
    };
    recognition.onerror = function(e) {
      recognition.stop();
    }
  }
}
</script>








     <!-- center area ends -->
      <!-- <?php checkdetailsStudent(); ?>  -->

      <!-- <div class="row">

        <div class="col-12">
          <?php //include '.php'; ?>


           <?php //include 'main.php'; ?> 
        </div>
      </div> -->
    </div>

    <!-- /.container-fluid-->
    

    <!-- /.content-wrapper-->
    
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

      <div class="modal-dialog" role="document">
        <div class="modal-content">

          <div class="modal-header">

            <h5 class="modal-title" id="exampleModalLabel">Hello <?php echo getLoggedMemberID(); ?></h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Here are some quick options:
            <a href="<?php echo PREPEND_PATH; ?>membership_profile.php" class="btn btn-primary btn-block"><i class="fa fa-user"></i> <strong>My profile</strong></a>
               <?php if(getLoggedAdmin()){ ?>
               <a href="<?php echo PREPEND_PATH; ?>admin/pageHome.php" class="btn btn-danger btn-block navbar-btn btn-sm visible-xs btn-sm"><i class="fa fa-cog"></i> <strong><?php echo $Translation['admin area']; ?></strong></a>
               <?php } ?>
               <?php if(!$_GET['signIn'] && !$_GET['loginFailed']){ ?>
               <?php if(getLoggedMemberID() == $adminConfig['anonymousMember']){ ?>
               <p class="navbar-text navbar-right">&nbsp;</p>
               <a href="<?php echo PREPEND_PATH; ?>index.php?signIn=1" class="btn btn-success navbar-btn btn-sm navbar-right"><strong><?php echo $Translation['sign in']; ?></strong></a>
               <p class="navbar-text navbar-right">
                <?php echo $Translation['not signed in']; ?>
              </p>
              <?php }else{ ?>
              <ul class="nav navbar-nav navbar-right hidden-xs" style="min-width: 330px;">
              </ul>
              <ul class="nav navbar-nav visible-xs">
              </ul>
              <?php } ?>
              <?php } ?>
            <!--login/logout area ends-->
          </div>

          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Back</button>
            <a class="btn btn-primary" href="index.php?signOut=1">Logout</a>
          </div>
          
        </div>
      </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
  </div>
</body>
</html>
