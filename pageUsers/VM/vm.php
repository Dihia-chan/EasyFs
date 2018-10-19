<?php 
 session_start();
$x=$_SESSION['id'];
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
    <!-- Bootstra../../p Core CSS -->
    <link href="../../css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../../css/helper.css" rel="stylesheet">
   
    
    <link href="../../css/css/style.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="table.css">



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
                        <!-- Logo text *-->
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
                                    <li><a href="#"><i class="ti-user"></i> Profil</a></li>
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
                        <li> <a  href="../../principaleUser.php" aria-expanded="false"><i class="fa 
                                fa-tachometer"></i><span class="hide-menu">Dashboard</span></a>
                        </li>
                        <li class="nav-label">Apps</li>
                        <li> <a  href="../extension/liste.php" aria-expanded="false"><i class="ti-mobile"></i><span class="hide-menu">Liste des extensions</span></a>
                        </li>
                        <li> <a  href="vm.php" aria-expanded="false"><i class="fa fa-microphone"></i><span class="hide-menu">Messages vocaux</span></a>
                        </li>
                        <li> <a  href="../CDR/cdr.php" aria-expanded="false"><i class="ti-reload"></i><span class="hide-menu">Historique des appels</span></a>
                        </li>
                        <li> <a  href="../charts/DispUser.php" aria-expanded="false"><i class="fa fa-bar-chart"></i><span class="hide-menu">Statistiques</span></a>
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
                        <li class="breadcrumb-item"><a href="../../principaleUser.php">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
            <div class="row">
            <div class="col-12">
            <div class="card">
            <div class="card-body">
            <div class="card-content">
     <!-- Main content -->
     <?php  
         // connexion à la base de données
        $db_username = 'root';
        $db_password = 'mysqlPFE';
        $db_name     = 'freeswitchcdr';
        $db_host     = 'localhost';
        $db = mysqli_connect($db_host, $db_username, $db_password,$db_name)
          or die('could not connect to database');
               
        $req = "SELECT * FROM `extension` WHERE `id` IN (SELECT `extension` FROM `extuser` WHERE `username`='".$x."')";
        $exec_req = mysqli_query($db,$req);

      
       
            
      
         //print_r($rep).'<br>';
        

   
      ?> 
    
  
            <div class="card-body">
                <div class="table-responsive">
                   
      <?php
          while ( $rep1 = mysqli_fetch_assoc($exec_req) ) { 
            $requete="SELECT * FROM `voicemail_msgs` WHERE `username`=".$rep1['id']." ORDER BY `created_epoch` DESC" ;
            $exec_requete = mysqli_query($db,$requete);                    
                echo  "<table class='table table-hover '>
                        <h3 color='blue'><strong>".$rep1['id']."</strong></h3> ";
       ?>                
                        <thead>
                            <tr>
                                <th width="20%">Nom de l'appelant</th>
                                <th width="20%">Numéro de l'appelant </th>
                                <th width="20%">Durée</th>
                                <th width="28%">Messages</th>
                                <th width="12%"><img src="s.jpg" width="40%" alt="supp"></th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php   
                           while ( $rep = mysqli_fetch_assoc($exec_requete) )  {
                             preg_match("(/VM.*)", $rep['file_path'] , $mat);
                             preg_match("(msg.*)", $rep['file_path'] , $id);
                             echo "<tr><td>".$rep['cid_name']."</td><td>".$rep['cid_number']."</td>
                             <td>".$rep['message_len']."</td><td><audio controls='controls'><source 
                             src='".$mat[0]."' type='audio/wav'> </audio></td><td><a href='supp.php?
                             id=".$id[0]."&pth=".$rep['file_path']."'><img src='s.jpg' width='40%' alt='supp'/></a></td>
                             </tr>";

                         }
                        ?>           
                        </tbody>
                        </table> <br><br><br><br>
                    <?php
                }
            
                    ?>
                </div>
            </div>

        
            </div>
            <!-- End Container fluid  -->
            </div>
      </div>
    </div> 
    </div>
    </div>  
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