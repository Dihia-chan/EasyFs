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
                        <li> <a  href="../../principale.php" aria-expanded="false"><i class="fa 
                                fa-tachometer"></i><span class="hide-menu">Dashboard</span></a>
                        </li>
                        <li class="nav-label">Apps</li>
                        <li> <a  href="modification.php" aria-expanded="false">
                        <i class="ti-user"></i><span class="hide-menu">Gestion des comptes</span></a>
                        </li>
                        <li> <a  href="../extension/gestion.php" aria-expanded="false"><i class="fa fa-wpforms"></i><span class="hide-menu">Gestion des extension</span></a>
                        </li>
                        <li> <a  href="gestion.php" aria-expanded="false"><i class="ti-volume"></i><span class="hide-menu">Gestion du SVI</span></a>
                        </li>
                        <li> <a  href="../blacklist/blacklist.php" aria-expanded="false"><i class="ti-na"></i><span class="hide-menu">Liste noire</span></a>
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
<?php 
			$doc = new DomDocument();
			$doc->formatOutput = true;
			// on crée la racine <include> et on l'insère dans le document
			$include = $doc->createElement('include');
			$doc->appendChild($include);

			// <--! creer elt menu ->
			$menu=$doc->createElement('menu');
			$menu->setAttribute('name', $_POST['id']);
			$menu->setAttribute('greet-long' , 'phrase:'.$_POST['macrol']);
			$menu->setAttribute('greet-short' , 'phrase:'.$_POST['macroc']);
			$menu->setAttribute('invalid-sound', 'svi/'.$_POST['invalid_sound']);
			$menu->setAttribute('exit-sound' , 'svi/'.$_POST['exitsound']);
			$menu->setAttribute('confirm-macro' , '');
			$menu->setAttribute('confirm-key' , '');
			$menu->setAttribute('tts-engine', 'flite');
			$menu->setAttribute('tts-voice' , $_POST['voix']);
			$menu->setAttribute('confirm-attempts', $_POST['nbrC']);
			$menu->setAttribute('timeout' , $_POST['timeout']);
			$menu->setAttribute('inter-digit-timeout' , $_POST['timeoutd']);
			$menu->setAttribute('max-failures' , $_POST['fail']);
			$menu->setAttribute('max-timeouts' , $_POST['maxtimeout']);
			$menu->setAttribute('digit-len' , '4');
			$include->appendChild($menu); 
			// entry
			
			if ($_POST['digit1'] != ""){
			//si pas enfant balise unitaire
			$entry1=$doc->createElement('entry');
			$entry1->setAttribute('action', 'menu-exec-app' );
			$entry1->setAttribute('digits', $_POST['digit1'] );
			$entry1->setAttribute('param', 'transfer '.$_POST['destination1'].' XML default' );   
			$menu->appendChild($entry1);
			}

			if ($_POST['digit2'] != ""){
			//si pas enfant balise unitaire
			$entry2=$doc->createElement('entry');
			$entry2->setAttribute('action', 'menu-exec-app' );
			$entry2->setAttribute('digits', $_POST['digit2'] ); 
			$entry2->setAttribute('param', 'transfer '.$_POST['destination2'].' XML default' );  
			$menu->appendChild($entry2);
			}

			if ($_POST['digit3'] != ""){
			//si pas enfant balise unitaire
			$entry3=$doc->createElement('entry');
			$entry3->setAttribute('action', 'menu-exec-app' );
			$entry3->setAttribute('digits', $_POST['digit3'] );
			$entry3->setAttribute('param', 'transfer '.$_POST['destination3'].' XML default' );   
			$menu->appendChild($entry3);
			}

			if ($_POST['digit4'] != ""){
			$entry4=$doc->createElement('entry');
			$entry4->setAttribute('action', 'menu-exec-app' );
			$entry4->setAttribute('digits', $_POST['digit4'] );
			$entry4->setAttribute('param', 'transfer '.$_POST['destination4'].' XML default' );   
			$menu->appendChild($entry4);
			}


			if ($_POST['digit5'] != ""){
			$entry5=$doc->createElement('entry');
			$entry5->setAttribute('action', 'menu-exec-app' );
			$entry5->setAttribute('digits', $_POST['digit5'] );
			$entry5->setAttribute('param', 'transfer '.$_POST['destination5'].'XML default' );   
			$menu->appendChild($entry5);
			}

			//si pas enfant balise unitaire
			$entry6=$doc->createElement('entry');
			$entry6->setAttribute('action', 'menu-top' );
			$entry6->setAttribute('digits', '9' );   
			$menu->appendChild($entry6);
			
			//fichier dialplan

			$dialplan = new DomDocument();
			$dialplan->formatOutput = true;
			// on crée la racine <include> et on l'insère dans le document
			$include = $dialplan->createElement('include');
			$dialplan->appendChild($include);

			$extension = $dialplan->createElement('extension');
			$extension->setAttribute('name' , $_POST['id']);
			$include->appendChild($extension);

			$condition = $dialplan->createElement('condition');
			$condition->setAttribute('field' , 'destination_number');
			$condition->setAttribute('expression' ,'^'.$_POST['extension'].'$');
			$extension->appendChild($condition);


			$action1 = $dialplan->createElement('action');
			$action1->setAttribute('application' , 'answer');
			$condition->appendChild($action1);


			$action2 = $dialplan->createElement('action');
			$action2->setAttribute('application' , 'ivr');
			$action2->setAttribute('data' , $_POST['id']);
			$condition->appendChild($action2);

			
			$doc->save("/usr/local/freeswitch/conf/ivr_menus/".$_POST['id'].".xml");
			$dialplan->save("/usr/local/freeswitch/conf/dialplan/default/".$_POST['id'].".xml");

			exec("perl single_command.pl reloadxml")  ;


			$db_username = 'root';
            $db_password = 'mysqlPFE';
            $db_name     = 'freeswitchcdr';
            $db_host     = 'localhost';
            $db = mysqli_connect($db_host, $db_username, $db_password,$db_name)
             or die('could not connect to database');

            $id=$_POST['id'];
            $extension=$_POST['extension'];
            $macl=$_POST['macrol'];
            $macc=$_POST['macroc'];


 $r ="UPDATE `svi` SET `num`='".$extension."',`macrol`='".$macl."',`macroc`='".$macc."',`digit1`='".$_POST['digit1']."',`digit2`='".$_POST['digit2']."',`digit3`='".$_POST['digit3']."',`digit4`='".$_POST['digit4']."',`digit5`='".$_POST['digit5']."',`destination1`='".$_POST['destination1']."',`destination2`='".$_POST['destination2']."',`destination3`='".$_POST['destination3']."',`destination4`='".$_POST['destination4']."',`destination5`='".$_POST['destination5']."',`descp1`='".$_POST['descp1']."',`descp2`='".$_POST['descp2']."',`descp3`='".$_POST['descp3']."',`descp4`='".$_POST['descp4']."',`descp5`='".$_POST['descp5']."',`timeout`='".$_POST['timeout']."',`nbrC`='".$_POST['nbrC']."',`timeoutd`='".$_POST['timeoutd']."',`fail`='".$_POST['fail']."',`maxtimeout`='".$_POST['maxtimeout']."',`descpm`='".$_POST['descpm']."' WHERE `nom`='".$id."'" ;
   $exec = mysqli_query($db,$r);

 

?>

<!-- Main content -->
    <div id='main_content'>

       

       <div class="alert alert-success" role="alert">
          <h3 align="center">SVI modifié avec succès</h3>
       </div>
       <dir align="center">
        <button type="button" class="btn btn-success btn-rounded m-b-10 m-l-5">
            <a href="gestion.php">Retour</a>
        </button>
       </dir>

      </div>
   </div>
  </div>
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
    <script src="../../js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
  
    <script src="../../js/custom.min.js"></script>

</body>

</html>