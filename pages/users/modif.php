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
    <link href="../../css/css/style.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">

    <link rel="stylesheet" href="table.css">
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
                        <li> <a  href="../../principale.php" aria-expanded="false"><i class="fa 
                                fa-tachometer"></i><span class="hide-menu">Dashboard</span></a>
                        </li>
                         <li class="nav-label">Apps</li>
                        <li> <a  href="modification.php" aria-expanded="false">
                          <i class="ti-user"></i><span class="hide-menu">Gestion des comptes</span></a>
                        </li>
                        <li> <a  href="../extension/gestion.php" aria-expanded="false"><i class="fa fa-wpforms"></i><span class="hide-menu">Gestion des extensions</span></a>
                        </li>
                        <li> <a  href="../SVI/svi.php" aria-expanded="false"><i class="ti-volume"></i><span class="hide-menu">Gestion du SVI</span></a>
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
                        <li class="breadcrumb-item"><a href="../../principale.php">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
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
        
       
        $req = "SELECT * FROM `users` WHERE `username`='".$_GET['id']."'";
        $exec_req = mysqli_query($db,$req);
        $rep = mysqli_fetch_assoc($exec_req);
       
      ?> 

         <div class="row">
         <div class="col-12">
         <div class="card">
         <div class="card-body">
         <div class="card-content">
        <h1><i>Modification du compte</i></h1>
       <form name='frm' id='frm' method='post' action='ok.php' >
        <table border='0' width="100%" cellpadding='100' cellspacing='100'> 
          <tr>
            <td width='80%' valign='top'>
             
              <br><br>
                Afin de modifier les informations du compte de <strong>"<?php echo $rep['nom']." ".$rep['prenom'] ?> "</strong>, remplissez les champs dont vous voulez modifier. 
               <br><br>
            </td>
            <td width='20%' valign='top' align='right'>
              <input type='button' class='btn btn-inverse' name='back' alt='Retour' onclick="document.location.href='modification.php';" value='Retour'>
             </td>
          </tr>
        </table>
        <table border='0' width="100%" cellpadding="10%" cellspacing="20%">
        <tbody> 
          <tr>    
            <td class='vncellreq' width='30%'>Nom d'utilisateur</td>    
            <td class='vtable' width='70%' align='right'>
              <input style='display:none;' type='password' name='autocomplete'>
              <input type='text' class='formfld' required="required" name='user' value=<?php echo $rep['username']; ?>>
            </td>  
          </tr> 

          <tr>    
            <td class='vncellreq'>Mot de passe</td>   
            <td class='vtable'>
              <input style='display:none;' type='password' name='autocomplete'>
              <input type='password' class='formfld' autocomplete='off' name='mdp' id='password' 
              value=<?php echo $rep['mdp']; ?> required="required">
            </td>  
          </tr> 
          <tr>   
            <td class='vncellreq'>Courriel</td>   
            <td class='vtable'>
              <input type='text' class='formfld' name='addr' onblur="verifMail(this)" value=<?php echo $rep['addrMail']; ?>>
            </td>  
          </tr>  
          <tr>    
            <td class='vncellreq'>Prénom</td>    
            <td class='vtable'>
              <input type='text' class='formfld' name='prenom' value=<?php echo $rep['prenom']; ?>>
            </td>  
          </tr> 
          <tr>    
            <td class='vncellreq'>Nom</td>   
            <td class='vtable'>
              <input type='text' class='formfld' name='nom' required="required" value=<?php echo $rep['nom']; ?>>
            </td> 
          </tr> 
          <tr>
            <td class='vncellreq'>Actif</td>
            <td class='vtable'> 
              <select name="etat" class='formfld'>
                <option value="oui">Oui</option>
                <option value="non">Non</option>
              </select>
            </td>
          </tr>
          <tr>    
            <td class='vncellreq'>Description</td>   
            <td class='vtable'>
              <textarea rows="8" cols="30"  name='descp' form="frm"><?php echo $rep['descp']; ?></textarea> 
            </td>
          </tr> 
          <tr>
            <td>
              <input type="hidden" name="id" value=<?php echo $_GET['id']; ?>  >
            </td>
          </tr>
          <tr align="right"> 
            <td colspan="2">
              <input type="reset" value="Restaurer" class="btn btn-info waves-effect waves-light"> 
              <input type='submit' class="btn btn-success" value='Mise à jour'>    
            </td> 
          </tr>
         </tbody> 
        </table>
        
      </form>
      <script>
  
        function verifMail(champ)
        {
          var regex = /^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/;
          if(!regex.test(champ.value))
            {
              surligne(champ, true);
              alert("Veuillez entrer une adresse e-mail valide");
              return false;
             }
            else
              {
                surligne(champ, false);
                return true;
              }
        }

        function surligne(champ, erreur)
          {
            if(erreur)
            champ.style.backgroundColor = "#fba";
            else
            champ.style.backgroundColor = "";
          }

      </script>

     </div>
   </div></div></div></div></div>
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
   
    <script src="../../js/custom.min.js"></script>

</body>

</html>