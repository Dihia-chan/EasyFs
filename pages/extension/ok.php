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
    <title>EasyFS - Admin</title>

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
                            <a class="nav-link dropdown-toggle text-muted  " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="images/users/5.jpg" alt="user" class="profile-pic" /></a>
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
                            <li> <a  href="../../principale.php" aria-expanded="false"><i class="fa 
                                fa-tachometer"></i><span class="hide-menu">Dashboard</span></a>
                            </li>
                         <li class="nav-label">Apps</li>
                        <li> <a  href="../users/modification.php" aria-expanded="false">
                        <i class="ti-user"></i><span class="hide-menu">Gestion des comptes</span></a>
                        </li>
                        <li> <a  href="gestion.php" aria-expanded="false"><i class="fa fa-wpforms"></i><span class="hide-menu">Gestion des extensions</span></a>
                        </li>
                        <li> <a  href="../blacklist/blacklist.php" aria-expanded="false"><i class="ti-na"></i><span class="hide-menu">Liste noire</span></a>
                        </li>
                        <li> <a  href="../CDR/cdr.php" aria-expanded="false"><i class="fa fa-bar-chart"></i><span class="hide-menu">Historique des appels</span></a>
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
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
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
     
     <?php  
            $doc = new DomDocument();
            $doc->formatOutput = true;
            // on crée la racine <include> et on l'insère dans le document
            $include = $doc->createElement('include');
            $doc->appendChild($include);
            // <--! creer elt user ->
            $user=$doc->createElement('user');
            $user->setAttribute('id', $_POST['id']);
            $include->appendChild($user); 
            // params
            $params=$doc->createElement('params');
            $user->appendChild($params);
            //si pas enfant balise unitaire
            $param=$doc->createElement('param');
            $param->setAttribute('name', 'password' );
            $param->setAttribute('value', $_POST['mdp'] );   
            $params->appendChild($param);
            
            $param=$doc->createElement('param');
            $param->setAttribute('name', 'vm-password' );
            $param->setAttribute('value', $_POST['vmdp'] );  
            $params->appendChild($param);
            
            // variables
            $variables=$doc->createElement('variables');
            $user->appendChild($variables);
            
            //variable
            $variable=$doc->createElement('variable');
            $variable->setAttribute('name', 'toll_allow' );
            $variable->setAttribute('value', 'domestic,international,local' );   
            $variables->appendChild($variable);
            
            $variable=$doc->createElement('variable');
            $variable->setAttribute('name', 'accountcode' );
            $variable->setAttribute('value', $_POST['id'] );   
            $variables->appendChild($variable);
            
            $variable=$doc->createElement('variable');
            $variable->setAttribute('name', 'user_context' );
            $variable->setAttribute('value', 'default' );   
            $variables->appendChild($variable);
            
            $variable=$doc->createElement('variable');
            $variable->setAttribute('name', 'effective_caller_id_name' );
            $variable->setAttribute('value', $_POST['nom'] );   
            $variables->appendChild($variable);
            
            $variable=$doc->createElement('variable');
            $variable->setAttribute('name', 'effective_caller_id_number' );
            $variable->setAttribute('value', $_POST['num'] );   
            $variables->appendChild($variable);
            
            $variable=$doc->createElement('variable');
            $variable->setAttribute('name', 'outbound_caller_id_name' );
            $variable->setAttribute('value', '$${outbound_caller_name}' );   
            $variables->appendChild($variable);
            
            $variable=$doc->createElement('variable');
            $variable->setAttribute('name', 'outbound_caller_id_number' );
            $variable->setAttribute('value', '$${outbound_caller_id}' );   
            $variables->appendChild($variable);
            
            $variable=$doc->createElement('variable');
            $variable->setAttribute('name', 'callgroup' );
            $variable->setAttribute('value', 'techsupport' );   
            $variables->appendChild($variable);
            
            $doc->save("/usr/local/freeswitch/conf/directory/default/".$_POST['id'].".xml");
            exec("perl single_command.pl reloadxml")  ;

            $db_username = 'root';
            $db_password = 'mysqlPFE';
            $db_name     = 'freeswitchcdr';
            $db_host     = 'localhost';
            $db = mysqli_connect($db_host, $db_username, $db_password,$db_name)
             or die('could not connect to database');
            
            $etat = htmlspecialchars($_POST['etat']); 
            $descp = htmlspecialchars($_POST['descp']);
            $mdp = htmlspecialchars($_POST['mdp']);
            $vmdp = htmlspecialchars($_POST['vmdp']);
            $nom = htmlspecialchars($_POST['nom']); 
            $num = htmlspecialchars($_POST['num']);
      
        $requete="UPDATE `extension` SET `etat`='".$etat."',`mdp`='".$mdp."',`vmdp`='".$vmdp."',`addr`= '".$_POST['addr']."',`idnom`='".$nom."',`idnum`='".$num."',`descp`='".$descp."' WHERE `id`='".$_POST['id']."'";

        $exec_req = mysqli_query($db,$requete);

        echo $_POST['id'] ;
      ?> 
    <!-- Main content -->
   
        <div class="alert alert-success" role="alert">
          <h3 align="center">Informations modifiées avec succès</h3> 
       </div>
       <div align="center" >
         <button type="button" class="btn btn-success btn-rounded m-b-10 m-l-5">
        <a href="gestion.php">Retour</a>
       </button>
       </div>
 </div>
            <!-- End Container fluid  -->
          </div></div></div></div></div>  
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
   
    <script src="../../js/custom.min.js"></script>

</body>

</html>