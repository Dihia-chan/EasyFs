
<?php
 session_start();
$x=$_SESSION['id'];

  $db_username = 'root';
  $db_password = 'mysqlPFE';
  $db_name     = 'freeswitchcdr';
  $db_host     = 'localhost';
  $db = mysqli_connect($db_host, $db_username, $db_password,$db_name)
  or die('could not connect to database');

  $requete1="SELECT * FROM `cdr` WHERE `disposition`='NORMAL_CLEARING' ";
  $exec_requete1 = mysqli_query($db,$requete1);
  
  $rep1 = mysqli_num_rows($exec_requete1);
  $requete2="SELECT * FROM `cdr` WHERE `disposition`='ORIGINATOR_CANCEL' ";
  $exec_requete2 = mysqli_query($db,$requete2);
 // $rep2 = mysqli_fetch_assoc($exec_requete2);
  $rep2 = mysqli_num_rows($exec_requete2);
  $requete3="SELECT * FROM `cdr` WHERE `disposition`='NO_ANSWER' ";
  $exec_requete3 = mysqli_query($db,$requete3);
  $rep3 = mysqli_num_rows($exec_requete3);
  $requete4="SELECT * FROM `cdr` WHERE `disposition`='USER_BUSY' ";
  $exec_requete4 = mysqli_query($db,$requete4);
  $rep4 = mysqli_num_rows($exec_requete4);
  $requete5="SELECT * FROM `cdr` WHERE `disposition`='FAILED' ";
  $exec_requete5 = mysqli_query($db,$requete5);
  $rep5 = mysqli_num_rows($exec_requete5);
  $requete6="SELECT * FROM `cdr` WHERE `disposition`='UNALLOCATED_NUMBER' ";
  $exec_requete6 = mysqli_query($db,$requete6);
  $rep6 = mysqli_num_rows($exec_requete6);
  $requete7="SELECT * FROM `cdr` WHERE `disposition`='NO_ROUTE_DESTINATION' ";
  $exec_requete7 = mysqli_query($db,$requete7);
  $rep7 = mysqli_num_rows($exec_requete7);
  
  $requete8="SELECT * FROM `cdr` WHERE `lastapp`='voicemail'  ";
  $exec_requete8= mysqli_query($db,$requete8);
  $rep8 = mysqli_num_rows($exec_requete8);
  $requete9="SELECT * FROM `cdr` WHERE `lastapp`='bridge'  ";
  $exec_requete9= mysqli_query($db,$requete9);
  $rep9 = mysqli_num_rows($exec_requete9);
  $requete10="SELECT * FROM `cdr` WHERE `lastapp`='transfer'  ";
  $exec_requete10= mysqli_query($db,$requete10);
  $rep10 = mysqli_num_rows($exec_requete10);
  $requete11="SELECT * FROM `cdr` WHERE `lastapp`='ivr'  ";
  $exec_requete11= mysqli_query($db,$requete11);
  $rep11 = mysqli_num_rows($exec_requete11);
  
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <title>EasyFS - User</title>

    <link href="../../css/lib/chartist/chartist.min.css" rel="stylesheet">
  <link href="../../css/lib/owl.carousel.min.css" rel="stylesheet" />
    <link href="../../css/lib/owl.theme.default.min.css" rel="stylesheet" />
    <!-- Bootstrap Core CSS -->
    <link href="../../css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../../css/helper.css" rel="stylesheet">
    <link href="../../css/style.css" rel="stylesheet">
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Status d\'appel', 'Nombre'],

       
         <?php  echo "['Na pas attendu',".$rep2."],"; ?>
         <?php  echo "['Répondu',".$rep1."],"; ?>
         <?php  echo "['Non répondu',".$rep3."],"; ?>
         <?php  echo "['Occupé',".$rep4."],"; ?>
         <?php  echo "['Erreur',".$rep5."],"; ?>
         <?php  echo "['pas d&acute;abonn&eacute;',".$rep6."],"; ?>
         <?php  echo "['pas d&acute;itin&eacute;raire',".$rep7."],"; ?>

        ]);

        

        var options = {
          
          is3D: true,
        };


        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
  </script>

   <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Application', 'Nombre'],

       
         <?php  echo "['Boite Vocale',".$rep8."],"; ?>
         <?php  echo "['bridge',".$rep9."],"; ?>
         <?php  echo "['Appel refuse',".$rep10."],"; ?>
         <?php  echo "['IVR',".$rep11."],"; ?>

        ]);

        

        var options = {
          
          is3D: true,
         // colors:['red','#004411'],
        };


        var chart = new google.visualization.PieChart(document.getElementById('piechart2'));

        chart.draw(data, options);
      }
  </script>

</head>
<body class="fix-header fix-sidebar">
    <!-- Preloader - style you can find in spinners.css -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
      <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- Main wrapper  -->
    <div id="main-wrapper">
        <!-- header header  -->
        <div class="header">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <!-- Logo -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.html">
                        <!-- Logo icon -->
                        <b><img src="../../images/logo.png" alt="homepage" class="dark-logo" /></b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <span><img src="../../images/logo-text.png" alt="homepage" class="dark-logo" /></span>
                    </a>
                </div>
                <!-- End Logo -->
                <div class="navbar-collapse">
                    <!-- toggle and nav items -->
                    <ul class="navbar-nav mr-auto mt-md-0">
                        <!-- This is  -->
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted  " href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
                        <li class="nav-item m-l-10"> <a class="nav-link sidebartoggler hidden-sm-down text-muted  " href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                        <!-- Messages -->
                       
                        <!-- End Messages -->
                    </ul>
                    <!-- User profile and search -->
                    <ul class="navbar-nav my-lg-0">
                        <!-- Profile -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted  " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="../../images/users/5.jpg" alt="user" class="profile-pic" /></a>
                            <div class="dropdown-menu dropdown-menu-right animated zoomIn">
                                <ul class="dropdown-user">
                                    <li><a href="#"><i class="ti-user"></i> Profile</a></li>
                                    <li><a href="../../index.php"><i class="fa fa-power-off"></i>Déconnexion</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- End header header -->
        <!-- Left Sidebar  -->
        <div class="left-sidebar">
          <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="nav-devider"></li>
                        <li class="nav-label">Home</li>
                        <li> <a  href="../../principaleUser.php" aria-expanded="false"><i class="fa fa-tachometer"></i><span class="hide-menu">Dashboard</span></a>
                        </li>
                        <li class="nav-label">Apps</li>
                        <li> <a  href="../VM/vm.php" aria-expanded="false"><i class="fa fa-microphone"></i><span class="hide-menu">Messages vocaux</a>
                        </li>
                        <li> <a  href="../CDR/cdr.php" aria-expanded="false"><i class="ti-reload"></i><span class="hide-menu">Historique des appeles</a>
                        </li>
                        <li> <a  href="DispUser.php" aria-expanded="false"><i class="fa fa-bar-chart"></i><span class="hide-menu">Statistiques</a>
                        </li>


                    </ul>               
                </nav>

            </div>
        </div>
        <!-- End Left Sidebar  -->
        <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Dashboard</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
<div class="container-fluid">
 <div class="row">
  <div class="col-lg-6"> 
  <div class="card">
    <div class="card-title">
  <div >
   
    <p>Ce graphe reprsente le nombre total des appeles effectuer par rapport au status de l appele</p>
     <div id="piechart" style="width: 100%; height: 300px;"></div>
  </div></div></div></div>
  
  <div class="col-lg-6">
  <div class="card">
    <div class="card-block">
  <div >
    <p>Ce graphe reprsente le nombre total des appeles effectuer par rapport au type d'appele</p>
    <div id="piechart2" style="width: 100%; height: 300px;"></div>
  </div></div></div></div>
 </div>
</div>
   

            <!-- End Container fluid  -->
            
        </div>
        <!-- End Page wrapper  -->
    </div>
    <!-- End Wrapper -->
    <!-- All Jquery -->
    <script src="../../js/lib/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../../js/lib/bootstrap/js/popper.min.js"></script>
    <script src="../../js/lib/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="../../js/jquery.slimscroll.js"></script>
    <!--Menu sidebar -->
    <script src="../../js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="../../js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>


    <script src="../../js/lib/datamap/d3.min.js"></script>
    <script src="../../js/lib/datamap/topojson.js"></script>
    <script src="../../js/lib/datamap/datamaps.world.min.js"></script>
    <script src="../../js/lib/datamap/datamap-init.js"></script>

    <script src="../../js/lib/weather/jquery.simpleWeather.min.js"></script>
    <script src="../../js/lib/weather/weather-init.js"></script>
    <script src="../../js/lib/owl-carousel/owl.carousel.min.js"></script>
    <script src="../../js/lib/owl-carousel/owl.carousel-init.js"></script>


    <script src="../../js/lib/chartist/chartist.min.js"></script>
    <script src="../../js/lib/chartist/chartist-plugin-tooltip.min.js"></script>
    <script src="../../js/lib/chartist/chartist-init.js"></script>
    <!--Custom JavaScript -->
    <script src="../../js/custom.min.js"></script>

</body>

</html>