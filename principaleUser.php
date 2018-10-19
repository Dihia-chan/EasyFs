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

    <link href="css/lib/chartist/chartist.min.css" rel="stylesheet">
	<link href="css/lib/owl.carousel.min.css" rel="stylesheet" />
    <link href="css/lib/owl.theme.default.min.css" rel="stylesheet" />
    <!-- Bootstrap Core CSS -->
    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/ss.css">
 
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
                        <b><img src="images/logo.png" alt="homepage" class="dark-logo" /></b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <span><img src="images/logo-text.png" alt="homepage" class="dark-logo" /></span>
                    </a>
                </div>
                <!-- End Logo -->
                <div class="navbar-collapse">
                    <!-- toggle and nav items -->
                    <ul class="navbar-nav mr-auto mt-md-0">
                        <!-- This is  -->
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted  " href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
                        <li class="nav-item m-l-10"> <a class="nav-link sidebartoggler hidden-sm-down text-muted  " href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                      
                    </ul>
                    <!-- User profile -->
                    <ul class="navbar-nav my-lg-0">

                        <!-- Profile -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted  " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="images/users/5.jpg" alt="user" class="profile-pic" /></a>
                            <div class="dropdown-menu dropdown-menu-right animated zoomIn">
                                <ul class="dropdown-user">
                                    <li><a href="#"><i class="ti-user"></i> Profile</a></li>
                                    <li><a href="index.php"><i class="fa fa-power-off"></i> Déconnection</a></li>
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
                        <li> <a  href="principaleUser.php" aria-expanded="false"><i class="fa 
                           fa-tachometer"></i><span class="hide-menu">Dashboard</span></a>
                        </li>
                        <li class="nav-label">Apps</li>
                        <li> <a  href="pageUsers/compte/user.php" aria-expanded="false"><i class="ti-mobile"></i><span class="hide-menu">Liste des extensions</span></a>
                        </li>
                        <li> <a  href="pageUsers/extension/liste.php" aria-expanded="false"><i class="ti-mobile"></i><span class="hide-menu">Liste des extensions</span></a>
                        </li>
                        <li> <a  href="pageUsers/VM/vm.php" aria-expanded="false"><i class="fa fa-microphone"></i><span class="hide-menu">Messages vocaux</span></a>
                        </li>
                        <li> <a  href="pageUsers/CDR/cdr.php" aria-expanded="false"><i class="ti-reload"></i><span class="hide-menu">Historique des appels</span></a>
                        </li>
                        <li> <a  href="pageUsers/charts/DispUser.php" aria-expanded="false"><i class="fa fa-bar-chart"></i><span class="hide-menu">Statistiques</span></a>
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
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active"><a href="principale.php">Dashboard</a></li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
              <?php  
                 // connexion à la base de données
                  $db_username = 'root';
                  $db_password = 'mysqlPFE';
                  $db_name     = 'freeswitchcdr';
                  $db_host     = 'localhost';
                  $db = mysqli_connect($db_host, $db_username, $db_password,$db_name)
                     or die('could not connect to database');
        
       
                  $req1 = "SELECT * FROM `extension` WHERE `id` IN (SELECT `extension` FROM `extuser` WHERE `username`='".$x."')";
                  $exec_req1 = mysqli_query($db,$req1);

                  $req2 = "SELECT * FROM `extension` WHERE `id`=";
                  $exec_req2 = mysqli_query($db,$req2);
                  $rep2 = mysqli_num_rows($exec_req2);

                  $req3 = "SELECT * FROM `cdr` ";
                  $exec_req3 = mysqli_query($db,$req3);
                  $rep3 = mysqli_num_rows($exec_req3);

                  $req = "SELECT * FROM `users` WHERE `username`='".$_GET['id']."'";
                  $exec_req = mysqli_query($db,$req);
                  $rep = mysqli_num_rows($exec_req);
       echo $_GET['id'];

              ?>
               
      <!--  <div class='row' style='padding: 0 10px;'>
            <div class='col-xs-12 col-sm-4 col-md-4 col-lg-4'>    
                <div class='row' style='padding: 6px;'>     
                    <div class='col-md-12 hud_box' style='padding: 0;'>
                        <span class='hud_title' onclick="document.location.href='/app/voicemails/voicemail_messages.php';">Messagerie Vocale</span><span class='hud_stat' onclick="$('#hud_'+0+'_details').slideToggle('fast');">0</span><span class='hud_stat_title' onclick="$('#hud_'+0+'_details').slideToggle('fast');">Nouveaux messages</span>
                        <div class='hud_details' id='hud_0_details'>
                            <table class='tr_hover' cellpadding='2' cellspacing='0' border='0' width='100%'>
                                <tr>    
                                    <th class='hud_heading' width='50%'>Messagerie Vocale</th>  
                                    <th class='hud_heading' style='text-align: center;' width='50%'>
                                    Nouveau</th>    
                                    <th class='hud_heading' style='text-align: center;'>Total</th>
                                </tr>
                                <tr href='/app/voicemails/voicemail_messages.php?voicemail_uuid=8202c950-661e-4529-8088-b4510cd2c206' style='cursor: pointer;'>  
                                    <td class='row_style0 hud_text'>
                                        <a href='/app/voicemails/voicemail_messages.php?voicemail_uuid=8202c950-661e-4529-8088-b4510cd2c206'>1000</a>
                                    </td>  
                                    <td class='row_style0 hud_text' style='text-align: center;'>0
                                    </td>  
                                    <td class='row_style0 hud_text' style='text-align: center;'>0
                                    </td>
                                </tr>
                                <tr href='/app/voicemails/voicemail_messages.php?voicemail_uuid=a9670532
                                -0e2c-447d-a44d-0d56ab27a082' style='cursor: pointer;'>  
                                    <td class='row_style1 hud_text'>
                                        <a href='/app/voicemails/voicemail_messages.php?voicemail_uuid=a9670532-0e2c-447d-a44d-0d56ab27a082'>1111</a>
                                    </td>  
                                    <td class='row_style1 hud_text' style='text-align: center;'>0
                                    </td>  
                                    <td class='row_style1 hud_text' style='text-align: center;'>0
                                    </td>
                                </tr>
                            </table>
                        </div>           
                        <span class='hud_expander' onclick="$('#hud_'+0+'_details').slideToggle('fast');
                        "><span class='glyphicon glyphicon-option-horizontal'>
                        </span>
                    </span>        
                </div>  
            </div>
        </div>-->

   
            


      




                   





            </div>
            <!-- End Container fluid  -->
            
        </div>
        <!-- End Page wrapper  -->
    </div>
    <!-- End Wrapper -->
    <!-- All Jquery -->
    <script src="js/lib/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="js/lib/bootstrap/js/popper.min.js"></script>
    <script src="js/lib/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="js/jquery.slimscroll.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--stickey kit -->
    
    <!--Custom JavaScript -->
    <script src="js/custom.min.js"></script>
    <script src="jquery-1.11.1.js"></script>

</body>

</html>