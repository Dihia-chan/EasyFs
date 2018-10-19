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
    <title>Ela - Bootstrap Admin Dashboard Template</title>

    <link href="../../css/lib/chartist/chartist.min.css" rel="stylesheet">
  <link href="../../css/lib/owl.carousel.min.css" rel="stylesheet" />
    <link href="../../css/lib/owl.theme.default.min.css" rel="stylesheet" />
    <!-- Bootstrap Core CSS -->
    <link href="../../css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../../css/helper.css" rel="stylesheet">
    <link href="../../css/style.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:** -->
    <!--[if lt IE 9]>
    <script src="https:**oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https:**oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
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
                    <!--<a class="navbar-brand" href="index.html">
                        
                        <b><img src="images/logo.png" alt="homepage" class="dark-logo" /></b>
                        
                        
                        <span><img src="images/logo-text.png" alt="homepage" class="dark-logo" /></span>
                    </a> -->
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
                            <a class="nav-link dropdown-toggle text-muted  " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="images/users/5.jpg" alt="user" class="profile-pic" /></a>
                            <div class="dropdown-menu dropdown-menu-right animated zoomIn">
                                <ul class="dropdown-user">
                                    <li><a href="#"><i class="ti-user"></i> Profile</a></li>
                                    <li><a href="../../index.php"><i class="fa fa-power-off"></i> Logout</a></li>
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
                        <li> <a  href="../../principale.php" aria-expanded="false"><i class="fa 
                                fa-tachometer"></i><span class="hide-menu">Dashboard</span></a>
                        </li>
                        <li class="nav-label">Apps</li>
                        <li> <a  href="modification.php" aria-expanded="false">
                            <i class="ti-user"></i><span class="hide-menu">Gestion des comptes</a>
                        </li>
                        <li> <a  href="../extension/gestion.php" aria-expanded="false"><i class="fa fa-wpforms"></i><span class="hide-menu">Gestion des extension</a>
                        </li>
                        <li> <a  href="../CDR/cdr.php" aria-expanded="false"><i class="ti-reload"></i><span class="hide-menu">Historique des appeles</a>
                        </li>
                        <li> <a  href="../charts/DispUser.php" aria-expanded="false"><i class="fa fa-bar-chart"></i><span class="hide-menu">Statistiques</a>
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
                        <li class="breadcrumb-item"><a href="../../principale.php">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
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
      

        
        $req = "SELECT * FROM `users` WHERE `username`= 'admin'";
        $exec_req = mysqli_query($db,$req);
        $rep = mysqli_fetch_assoc($exec_req);
         ?> 
  
     <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title"><i>Compte "admin"</i></h3>
                           
            <form class="form-horizontal p-t-20">
                <div class="form-group row">
                    <label for="exampleInputuname3" class="col-sm-3 control-label">Nom d'utilisateur</label>
                   <div class="col-sm-9">
                       <div class="input-group">
                           <div class="input-group-addon"><i class="ti-user"></i></div>
                           <input type="text" class="form-control" id="exampleInputuname3" value=<?php echo $rep['username']; ?> disabled>
                        </div>
                    </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputuname3" class="col-sm-3 control-label">Nom </label>
                        <div class="col-sm-9">
                            <div class="input-group">
                               <div class="input-group-addon"><i class="ti-user"></i></div>
                               <input type="text" class="form-control" id="exampleInputuname3" placeholder="Username" value=<?php echo $rep['nom']; ?>>
                            </div>
                        </div>
                        </div>
                        <div class="form-group row">
                           <label for="exampleInputuname3" class="col-sm-3 control-label"> Prénom
                           </label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="ti-user"></i></div>
                                        <input type="text" class="form-control" id="exampleInputuname3" placeholder="Username" value=<?php echo $rep['prenom']; ?>>
                                </div>
                            </div>
                            </div>
                            <div class="form-group row">
                               <label for="exampleInputEmail3" class="col-sm-3 control-label">Email</label>
                               <div class="col-sm-9">
                                   <div class="input-group">
                                       <div class="input-group-addon"><i class="ti-email"></i></div>
                                          <input type="email" class="form-control" id="exampleInputEmail3" placeholder="Enter email" value=<?php echo $rep['addrMail']; ?>>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputPassword4" class="col-sm-3 control-label">Mot de passe</label>
                                        <div class="col-sm-9">
                                            <div class="input-group">
                                                <div class="input-group-addon"><i class="ti-lock"></i></div>
                                                <input type="password" class="form-control" id="exampleInputpwd4" placeholder="Enter pwd">
                                            </div>
                                        </div>
                                    </div>
                                   <div class="form-group row">
                                        <label for="web" class="col-sm-3 control-label">Description</label>
                                        <div class="col-sm-9">
                                            <div class="input-group">
                                                <div class="input-group-addon"><i class="ti-world"></i></div>
                                                <textarea rows="8" cols="30"  name='descp' form="frm" class='formfld'>
               										 <?php echo $rep['descp']; ?>
              									</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    

                                    <div class="form-group row m-b-0">
                                        <div class="offset-sm-3 col-sm-9">
                                            <button type="submit" class="btn btn-info waves-effect waves-light">Modifier</button>
                                             <button type="reset" class="btn btn-info waves-effect waves-light">Supp</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

        </div>
        <!-- End Page wrapper  -->
    </div>
    <!-- End Wrapper -->
<script type="text/javascript">
    function delete_confirm(id) 
{
    if(confirm("Voulez vous vraiment supprimer ce contenu ?")) 
    { 
        alert('Suppression effectuée'); 
        location.href= 'supp.php?id='id; 
    } 
    return false;
}
}
</script>
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

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

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