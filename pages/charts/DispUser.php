
<?php
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
  $requete6="SELECT * FROM `cdr` WHERE `disposition`='INVALID_GATEWAY' ";
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
    <title>EasyFS - Admin</title>

    <link href="../../css/lib/chartist/chartist.min.css" rel="stylesheet">
    <link href="../../css/lib/owl.carousel.min.css" rel="stylesheet" />
    <link href="../../css/lib/owl.theme.default.min.css" rel="stylesheet" />
    <!-- Bootstrap Core CSS -->
    <link href="../../css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../../css/helper.css" rel="stylesheet">
    <link href="../../css/style.css" rel="stylesheet">
    <script type="text/javascript" src="loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Status d\'appel', 'Nombre'],

       
         <?php  echo "['N\'a pas attendu',".$rep2."],"; ?>
         <?php  echo "['Répondu',".$rep1."],"; ?>
         <?php  echo "['Non répondu',".$rep3."],"; ?>
         <?php  echo "['Occupé',".$rep4."],"; ?>
         <?php  echo "['Extension invalide',".$rep6."],"; ?>
         <?php  echo "['Erreur',".$rep5."],"; ?>
         <?php  echo "['pas d&acute;itin&eacute;raire',".$rep7."],"; ?>

        ]);

        

        var options = {
          
          is3D: true,
        };


        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
  </script>

 
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Application', 'Nombre'],

       
         <?php  echo "['Boite Vocale',".$rep8."],"; ?>
         <?php  echo "['Appel reçu',".$rep9."],"; ?>
         <?php  echo "['Appel refusé',".$rep10."],"; ?>
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

  <?php 
            $db_username = 'root';
            $db_password = 'mysqlPFE';
            $db_name     = 'freeswitchcdr';
            $db_host     = 'localhost';
            $db = mysqli_connect($db_host, $db_username, $db_password,$db_name)
             or die('could not connect to database');

         
         $tab =  array(1,2,3,4,5,6,7,8,9,10,11,12 );

            for ($i=1; $i <= 12 ; $i++) { 
               $requete="SELECT * FROM `cdr` ORDER BY `calldate` DESC" ;
               $exec_requete = mysqli_query($db,$requete);
               
            if($i<10)
             $d="0".$i;
               else
                  $d=$i;
             $x=0;
            $date=date("Y")."-".$d;

           // echo $date.'madate<br>' ;           
          while ( $rep = mysqli_fetch_assoc($exec_requete))  {
               ereg("[0-9]{4}-[01]?[0-9]", $rep['calldate'] , $mat);
               //echo $mat[0].'<br>';
               if ($mat[0] == $date )
                 $x++;
              }
            
            $tab[$i] = $x ;
            //echo $x.'<br>';


         }

   
     ?>

   <!-- Styles -->
<style>
#chartdiv {
  width: 100%;
  height: 500px;
}                                      
</style>

<!-- Resources -->
<script src="../../js/lib/amcharts/amcharts.js"></script>
<script src="../../js/lib/amcharts/serial.js"></script>
<script src="../../js/lib/amcharts/export.min.js"></script>
<link rel="stylesheet" href="../../js/lib/amcharts/export.css" type="text/css" media="all" />
<script src="../../js/lib/amcharts/light.js"></script>

<!-- Chart code -->
<script>
var chart = AmCharts.makeChart("chartdiv", {
    "theme": "light",
    "type": "serial",
    "startDuration": 2,
    "dataProvider": [{
        "Mois": "Janvier",
        "visits": <?php echo $tab[1]; ?>,
        "color": "#FF0F00"
    }, {
        "Mois":"Fevrier",
        "visits": <?php echo $tab[2]; ?>,
        "color": "#FF6600"
    }, {
        "Mois": "Mars",
        "visits": <?php echo $tab[3]; ?>,
        "color": "#FCD202"
    }, {
        "Mois": "Avril",
        "visits": <?php echo $tab[4]; ?>,
        "color": "#04D215"
    }, {
        "Mois": "Mai",
        "visits": <?php echo $tab[5]; ?>,
        "color": "#0D8ECF"
    }, {
        "Mois": "Juin",
        "visits": <?php echo $tab[6]; ?>,
        "color": "#0D52D1"
    }, {
        "Mois": "Juillet",
        "visits": <?php echo $tab[7]; ?>,
        "color": "#2A0CD0"
    }, {
        "Mois": "Aout",
        "visits": <?php echo $tab[8]; ?>,
        "color": "#8A0CCF"
    }, {
        "Mois": "Septembre",
        "visits": <?php echo $tab[9]; ?>,
        "color": "#CD0D74"
    }, {
        "Mois": "Octobre",
        "visits": <?php echo $tab[10]; ?>,
        "color": "#754DEB"
    }, {
        "Mois": "Novembre",
        "visits": <?php echo $tab[11]; ?>,
        "color": "#DDDDDD"
    }, {
        "Mois": "Décembre",
        "visits": <?php echo $tab[12]; ?>,
        "color": "#333333"
    }],
    "valueAxes": [{
        "position": "left",
        "axisAlpha":0,
        "gridAlpha":0
    }],
    "graphs": [{
        "balloonText": "[[category]]: <b>[[value]]</b>",
        "colorField": "color",
        "fillAlphas": 0.85,
        "lineAlpha": 0.1,
        "type": "column",
        "topRadius":1,
        "valueField": "visits"
    }],
    "depth3D": 40,
   "angle": 30,
    "chartCursor": {
        "categoryBalloonEnabled": false,
        "cursorAlpha": 0,
        "zoomable": false
    },
    "categoryField": "Mois",
    "categoryAxis": {
        "gridPosition": "start",
        "axisAlpha":0,
        "gridAlpha":0

    },
    "export": {
      "enabled": true
     }

}, 0);
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
                        <li><a href="../users/modification.php" aria-expanded="false">
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
                        <li> <a  href="DispUser.php" aria-expanded="false"><i class="fa fa-bar-chart"></i><span class="hide-menu">Statistiques</span></a>
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
                  <div class="card-block">
                    <div >
                      <p>Ce graphe représente le nombre total des appels effectués par rapport à leur status. </p>
                     <div id="piechart" style="width: 100%; height: 300px;"></div>
                    </div>
                  </div>
                </div>
              </div>
  
              <div class="col-lg-6">
                <div class="card">
                  <div class="card-block">
                    <div >
                      <p>Ce graphe représente le nombre total des appels effectués par rapport à leur type. </p>
                      <div id="piechart2" style="width: 100%; height: 300px;"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-body">
                    <h2><i>Nombre d'appels / Mois</i></h2>
                    <div id="chartdiv"></div>
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
    
    <script src="../../js/custom.min.js"></script>

</body>

</html>