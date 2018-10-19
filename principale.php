<?php  

    
    // connexion à la base de données
    $db_username = 'root';
    $db_password = 'mysqlPFE';
    $db_name     = 'freeswitchcdr';
    $db_host     = 'localhost';
    $db = mysqli_connect($db_host, $db_username, $db_password,$db_name)
        or die('could not connect to database');
    $appelT =  array(6,7,8,9,10,11,12,13,14,15,16,17,18);
    $appel =  array(6,7,8,9,10,11,12,13,14,15,16,17,18);
    $vm =  array(6,7,8,9,10,11,12,13,14,15,16,17,18);
    $voice =  array(6,7,8,9,10,11,12,13,14,15,16,17,18);
    $br =  array(6,7,8,9,10,11,12,13,14,15,16,17,18);
    
    $date=date("Y-m-d");
    for ($i=6; $i <=18 ; $i++) { 
        # code..*/
        $requete="SELECT * FROM `cdr` ORDER BY `calldate` DESC" ;
        $exec_requete = mysqli_query($db,$requete);
        if ($i<=9)
            $y=$date." 0".$i;
        else
            $y=$date." ".$i;
   
        $bv=0;$call=0;$b=0;$v=0;$t=0;

        while ( $rep = mysqli_fetch_assoc($exec_requete) )  {
            ereg("[0-9]{4}-[01]?[0-9]-[0-9]{1,2} [0-9]{1,2}", $rep['calldate'] , $mat);
        //echo $mat[0].'<br>';
             if (($mat[0]==$y) && ($rep['lastapp']=="bridge"))
                $b++;
            if (($mat[0]==$y) && ($rep['lastapp']=="voicemail"))
                $v++;
            else if (($mat[0]==$y) && ($rep['lastapp']=="ivr"))
                     $bv++;
                  else if ($mat[0]==$y)
                  $call++;

        }
        $vm[$i]=$bv ;
        $appel[$i]=$call;
        $appelT[$i]=$v+$bv+$call;
        $br[$i]=$b;
        $voice[$i]=$v;
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <style>
#chartdiv {
  width: 100%;
  height: 500px;
}                                       
</style>

<!-- Resources -->
<script src="js/lib/amcharts/amcharts.js"></script>
<script src="js/lib/amcharts/serial.js"></script>
<script src="js/lib/amcharts/export.min.js"></script>
<link rel="stylesheet" href="js/lib/amcharts/export.css" type="text/css" media="all" />
<script src="js/lib/amcharts/light.js"></script>



<script type="text/javascript" src="js/lib/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['heure', 'Appels Totals', 'Reçu' , 'Boite vocale' , 'SVI'],
['6h',<?php echo $appelT[6]; ?>,<?php echo $br[6]; ?>,<?php  echo $voice[6]; ?>,<?php echo $vm[6] ?>],
['7h',<?php echo $appelT[7]; ?>,<?php echo $br[7]; ?>,<?php  echo $voice[7]; ?>,<?php echo $vm[7] ?>],
['8h',<?php echo $appelT[8]; ?>,<?php echo $br[8]; ?>,<?php  echo $voice[8]; ?>,<?php echo $vm[8] ?>],
['9h',<?php echo $appelT[9]; ?>,<?php echo $br[9]; ?>,<?php  echo $voice[9]; ?>,<?php echo $vm[9] ?>],
['10h',<?php echo $appelT[10];?>,<?php echo $br[10];?>,<?php  echo $voice[10];?>,<?php echo $vm[10] ?>],
['11h',<?php echo $appelT[11];?>,<?php echo $br[11];?>,<?php  echo $voice[11];?>,<?php echo $vm[11] ?>],
['12h',<?php echo $appelT[12];?>,<?php echo $br[12];?>,<?php  echo $voice[12];?>,<?php echo $vm[12] ?>],
['13h',<?php echo $appelT[13];?>,<?php echo $br[13];?>,<?php  echo $voice[13];?>,<?php echo $vm[13] ?>],
['14h',<?php echo $appelT[14];?>,<?php echo $br[14];?>,<?php  echo $voice[14];?>,<?php echo $vm[14] ?>],
['15h',<?php echo $appelT[15];?>,<?php echo $br[15];?>,<?php  echo $voice[15];?>,<?php echo $vm[15] ?>],
['16h',<?php echo $appelT[16];?>,<?php echo $br[16];?>,<?php  echo $voice[16];?>,<?php echo $vm[16] ?>],
['17h',<?php echo $appelT[17];?>,<?php echo $br[17];?>,<?php  echo $voice[17];?>,<?php echo $vm[17] ?>],
['18h',<?php echo $appelT[18];?>,<?php echo $br[18];?>,<?php  echo $voice[18];?>,<?php echo $vm[18] ?>]
          
        ]);

        var options = {
          pointSize: 10 ,
          pointShape: {type : 'triangle' , rotation: 180} ,
          curveType: 'function' ,
          color: ['red' ,'green','orange'],
          title: "Nombre d'appels",
          hAxis: {title: 'Heure',  titleTextStyle: {color: '#333'}},
          vAxis: {minValue: 4}
        };

        var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>
<!-- Chart code -->
<script>
var chart = AmCharts.makeChart("chartdiv", {
    "theme": "light",
    "type": "serial",
    "dataProvider": [{
        "App": "6h",
        "SVI": <?php echo $vm[6] ?>,
        "Appel": <?php echo $appel[6] ?>
    }, {
        "App": "7h",
        "SVI": <?php echo $vm[7] ?>,
        "Appel": <?php echo $appel[7] ?>
    }, {
        "App": "8h",
        "SVI": <?php echo $vm[8] ?>,
        "Appel": <?php echo $appel[8] ?>
    }, {
        "App": "9h",
        "SVI": <?php echo $vm[9] ?>,
        "Appel": <?php echo $appel[8] ?>
    }, {
        "App": "10h",
        "SVI": <?php echo $vm[10] ?>,
        "Appel": <?php echo $appel[10] ?>
    },  {
        "App": "11h",
        "SVI": <?php echo $vm[11] ?>,
        "Appel": <?php echo $appel[11] ?>
    }, {
        "App": "12h",
        "SVI": <?php echo $vm[12] ?>,
        "Appel": <?php echo $appel[12] ?>
    }, {
        "App": "13h",
        "SVI": <?php echo $vm[13] ?>,
        "Appel": <?php echo $appel[13] ?>
    }, {
        "App": "14h",
        "SVI": <?php echo $vm[14] ?>,
        "Appel": <?php echo $appel[14] ?>
    }, {
        "App": "15h",
        "SVI": <?php echo $vm[15] ?>,
        "Appel": <?php echo $appel[15] ?>
    }, {
        "App": "16h",
        "SVI": <?php echo $vm[16] ?>,
        "Appel": <?php echo $appel[16] ?>
    }, {
        "App": "17h",
        "SVI": <?php echo $vm[17] ?>,
        "Appel": <?php echo $appel[17] ?>
    }, {
        "App": "18h",
        "SVI": <?php echo $vm[18] ?>,
        "Appel": <?php echo $appel[18] ?>
    }],
    "valueAxes": [{
        "stackType": "3d",
        "unit": "",
        "position": "left",
        "title": "Nombre d'appel par heure",
    }],
    "startDuration": 1,
    "graphs": [{
        "balloonText": "Nombre d'appels à [[category]] (SVI): <b>[[value]]</b>",
        "fillAlphas": 0.9,
        "lineAlpha": 0.2,
        "title": "SVI",
        "type": "column",
        "valueField": "SVI"
    }, {
        "balloonText": "Nombre d'appels à [[category]] (Appel): <b>[[value]]</b>",
        "fillAlphas": 0.9,
        "lineAlpha": 0.2,
        "title": "Appel",
        "type": "column",
        "valueField": "Appel"
    }],
    "plotAreaFillAlphas": 0.1,
    "depth3D": 60,
    "angle": 30,
    "categoryField": "App",
    "categoryAxis": {
        "gridPosition": "start"
    },
    "export": {
        "enabled": true
     }
});
jQuery('.chart-input').off().on('input change',function() {
    var property    = jQuery(this).data('property');
    var target      = chart;
    chart.startDuration = 0;

    if ( property == 'topRadius') {
        target = chart.graphs[0];
        if ( this.value == 0 ) {
          this.value = undefined;
        }
    }

    target[property] = this.value;
    chart.validateNow();
});
</script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <title>EasyFS - Admin</title>

    
    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
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
                                    <li><a href="index.php"><i class="fa fa-power-off"></i>Déconnexion</a></li>
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
                        <li><a href="pages/users/modification.php" aria-expanded="false">               <i class="ti-user"></i><span class="hide-menu">Gestion des comptes</span></a>
                        </li>
                        <li> <a href="pages/extension/gestion.php" aria-expanded="false"><i class="fa fa-wpforms"></i><span class="hide-menu">Gestion des extensions</span></a>
                        </li>
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="ti-volume"></i><span class="hide-menu">Gestion du SVI</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="pages/SVI/gestion.php">Gestion du SVI</a></li>
                                <li><a href="pages/SVI/sounds.php">Gestion des sons</a></li>
                            </ul>
                        </li>
                        <li> <a  href="pages/blacklist/blacklist.php" aria-expanded="false"><i class="ti-na"></i><span class="hide-menu">Liste noire</span></a>
                        </li>
                        <li> <a  href="pages/CDR/cdr.php" aria-expanded="false"><i class="ti-reload"></i><span class="hide-menu">Historique des appels</span></a>
                        </li>
                        <li> <a  href="pages/charts/DispUser.php" aria-expanded="false"><i class="fa fa-bar-chart"></i><span class="hide-menu">Statistiques</span></a>
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
             <?php  
       
                  $req1 = "SELECT * FROM `users` WHERE `etat`='oui'" ;
                  $exec_req1 = mysqli_query($db,$req1);
                  $rep1 = mysqli_num_rows($exec_req1);

                  $req2 = "SELECT * FROM `extension` ";
                  $exec_req2 = mysqli_query($db,$req2);
                  $rep2 = mysqli_num_rows($exec_req2);

                  $req3 = "SELECT * FROM `cdr` ";
                  $exec_req3 = mysqli_query($db,$req3);
                  //$rep3 = mysqli_num_rows($exec_req3);

                  $date=date("Y-m-d");
                  $x=0;
                  while ( $rep = mysqli_fetch_assoc($exec_req3))  {
                    ereg("[0-9]{4}-[01]?[0-9]-[0-9]{1,2}", $rep['calldate'] , $mat);
                    if ($mat[0] == $date )
                        $x++;
                    }

                  $req = "SELECT * FROM `users` WHERE `etat`='non'";
                  $exec_req = mysqli_query($db,$req);
                  $rep = mysqli_num_rows($exec_req);
       
              ?>
            <div class="container-fluid">
                <div class="row">
                     <div class="col-md-3">

                        <div class="card bg-primary p-20">
                            <div class="media widget-ten">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-user f-s-40 "></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <h2 class="color-white"><?php echo $rep1; ?></h2>
                                    <p class="m-b-0">Nombre de comptes actifs</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card bg-pink p-20">
                            <div class="media widget-ten">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-user f-s-40"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <h2 class="color-white"><?php echo $rep; ?></h2>
                                    <p class="m-b-0">Comptes désactivés</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card bg-success p-20">
                            <div class="media widget-ten">
                                <div class="media-left meida media-middle">
                                    <span><h1><i class="fa fa-whatsapp"></i></h1></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <h2 class="color-white"><?php echo $rep2; ?></h2>
                                    <p class="m-b-0">Nombre d'extensions</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card bg-danger p-20">
                            <div class="media widget-ten">
                                <div class="media-left meida media-middle">
                                    <span><h1><i class="fa fa-whatsapp"></i></h1></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <h2 class="color-white"><?php echo $x; ?></h2>
                                    <p class="m-b-0">Nombre d'appels du jour</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Nombre d'appels par heure: appels/SVI</h4>
                            <div id="chartdiv"></div>
                        </div>
                    </div>
                </div>
                

                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Nombre d'appels par heure: Appels totals/Reçu/Boite vocale/SVI</h4>
                            <div id="chart_div" ></div>
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
    <script src="js/lib/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="js/lib/bootstrap/js/popper.min.js"></script>
    <script src="js/lib/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="js/jquery.slimscroll.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>

    <script src="js/custom.min.js"></script>

</body>

</html>