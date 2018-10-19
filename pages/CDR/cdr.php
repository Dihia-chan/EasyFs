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
 

</head>

<body class="fix-header fix-sidebar" align="right">
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
                                    <li><a href="../../index.php"><i class="fa fa-power-off"></i> Déconnexion</a></li>
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
                        <li> <a  href="../extension/gestion.php" aria-expanded="false"><i class="fa fa-wpforms"></i><span class="hide-menu">Gestion des extensions</span></a>
                        </li>
                        <li> <a  href="../SVI/svi.php" aria-expanded="false"><i class="ti-volume"></i><span class="hide-menu">Gestion du SVI</span></a>
                        </li>
                        <li><a href="../blacklist/blacklist.php" aria-expanded="false"><i class="ti-na"></i><span class="hide-menu">Liste noire</span></a>
                        </li>
                        <li> <a  href="cdr.php" aria-expanded="false"><i class="ti-reload"></i><span class="hide-menu">Historique des appels</span></a>
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
      
<?php //error_reporting(E_ALL | E_STRICT); ini_set('display_errors', 'On');

require_once 'inc/config.inc.php';
require_once 'inc/func.inc.php';
require_once 'inc/version.inc.php';

require_once 'templates/header.tpl.php';
require_once 'templates/form.tpl.php';


try {
	$dbh = new PDO("$db_type:host=$db_host;port=$db_port;dbname=$db_name", $db_user, $db_pass, $db_options);
}
catch (PDOException $e) {
	echo "\nPDO::errorInfo():\n";
	print $e->getMessage();
}

// Connecting, selecting database
foreach ( array_keys($_REQUEST) as $key ) {
	$_REQUEST[$key] = preg_replace('/;/', ' ', $_REQUEST[$key]);
	$_REQUEST[$key] = substr($dbh->quote($_REQUEST[$key]),1,-1);
}

$startmonth = is_blank($_REQUEST['startmonth']) ? date('m') : sprintf('%02d', $_REQUEST['startmonth']);
$startyear = is_blank($_REQUEST['startyear']) ? date('Y') : $_REQUEST['startyear'];

if (is_blank($_REQUEST['startday'])) {
	$startday = '01';
} elseif (isset($_REQUEST['startday']) && ($_REQUEST['startday'] > date('t', strtotime("$startyear-$startmonth-01")))) {
	$startday = $_REQUEST['startday'] = date('t', strtotime("$startyear-$startmonth"));
} else {
	$startday = sprintf('%02d',$_REQUEST['startday']);
}
$starthour = is_blank($_REQUEST['starthour']) ? '00' : sprintf('%02d',$_REQUEST['starthour']);
$startmin = is_blank($_REQUEST['startmin']) ? '00' : sprintf('%02d',$_REQUEST['startmin']);

$startdate = "'$startyear-$startmonth-$startday $starthour:$startmin:00'";
$start_timestamp = mktime( $starthour, $startmin, 59, $startmonth, $startday, $startyear );

$endmonth = is_blank($_REQUEST['endmonth']) ? date('m') : sprintf('%02d', $_REQUEST['endmonth']); 
$endyear = is_blank($_REQUEST['endyear']) ? date('Y') : $_REQUEST['endyear'];  

if (is_blank($_REQUEST['endday']) || (isset($_REQUEST['endday']) && ($_REQUEST['endday'] > date('t', strtotime("$endyear-$endmonth-01"))))) {
	$endday = $_REQUEST['endday'] = date('t', strtotime("$endyear-$endmonth"));
} else {
	$endday = sprintf('%02d',$_REQUEST['endday']);
}
$endhour = is_blank($_REQUEST['endhour']) ? '23' : sprintf('%02d',$_REQUEST['endhour']);
$endmin = is_blank($_REQUEST['endmin']) ? '59' : sprintf('%02d',$_REQUEST['endmin']);

$enddate = "'$endyear-$endmonth-$endday $endhour:$endmin:59'";
$end_timestamp = mktime( $endhour, $endmin, 59, $endmonth, $endday, $endyear );

#
# asterisk regexp2sqllike
#
if ( is_blank($_REQUEST['src']) ) {
	$src_number = NULL;
} else {
	$src_number = asteriskregexp2sqllike( 'src', '' );
}

if ( is_blank($_REQUEST['dst']) ) {
	$dst_number = NULL;
} else {
	$dst_number = asteriskregexp2sqllike( 'dst', '' );
}

if ( is_blank($_REQUEST['did']) ) {
	$did_number = NULL;
} else {
	$did_number = asteriskregexp2sqllike( 'did', '' );
}

$date_range = "calldate BETWEEN $startdate AND $enddate";
$mod_vars['channel'][] = is_blank($_REQUEST['channel']) ? NULL : $_REQUEST['channel'];
$mod_vars['channel'][] = empty($_REQUEST['channel_mod']) ? NULL : $_REQUEST['channel_mod'];
$mod_vars['channel'][] = empty($_REQUEST['channel_neg']) ? NULL : $_REQUEST['channel_neg'];
$mod_vars['src'][] = $src_number;
$mod_vars['src'][] = empty($_REQUEST['src_mod']) ? NULL : $_REQUEST['src_mod'];
$mod_vars['src'][] = empty($_REQUEST['src_neg']) ? NULL : $_REQUEST['src_neg'];
$mod_vars['clid'][] = is_blank($_REQUEST['clid']) ? NULL : $_REQUEST['clid'];
$mod_vars['clid'][] = empty($_REQUEST['clid_mod']) ? NULL : $_REQUEST['clid_mod'];
$mod_vars['clid'][] = empty($_REQUEST['clid_neg']) ? NULL : $_REQUEST['clid_neg'];
$mod_vars['dstchannel'][] = is_blank($_REQUEST['dstchannel']) ? NULL : $_REQUEST['dstchannel'];
$mod_vars['dstchannel'][] = empty($_REQUEST['dstchannel_mod']) ? NULL : $_REQUEST['dstchannel_mod'];
$mod_vars['dstchannel'][] = empty($_REQUEST['dstchannel_neg']) ? NULL : $_REQUEST['dstchannel_neg'];
$mod_vars['dst'][] = $dst_number;
$mod_vars['dst'][] = empty($_REQUEST['dst_mod']) ? NULL : $_REQUEST['dst_mod'];
$mod_vars['dst'][] = empty($_REQUEST['dst_neg']) ? NULL : $_REQUEST['dst_neg'];
$mod_vars['did'][] = $did_number;
$mod_vars['did'][] = empty($_REQUEST['did_mod']) ? NULL : $_REQUEST['did_mod'];
$mod_vars['did'][] = empty($_REQUEST['did_neg']) ? NULL : $_REQUEST['did_neg'];
$mod_vars['userfield'][] = is_blank($_REQUEST['userfield']) ? NULL : $_REQUEST['userfield'];
$mod_vars['userfield'][] = empty($_REQUEST['userfield_mod']) ? NULL : $_REQUEST['userfield_mod'];
$mod_vars['userfield'][] = empty($_REQUEST['userfield_neg']) ? NULL : $_REQUEST['userfield_neg'];
$mod_vars['accountcode'][] = is_blank($_REQUEST['accountcode']) ? NULL : $_REQUEST['accountcode'];
$mod_vars['accountcode'][] = empty($_REQUEST['accountcode_mod']) ? NULL : $_REQUEST['accountcode_mod'];
$mod_vars['accountcode'][] = empty($_REQUEST['accountcode_neg']) ? NULL : $_REQUEST['accountcode_neg'];
$result_limit = is_blank($_REQUEST['limit']) ? $db_result_limit : intval($_REQUEST['limit']);

if ( strlen($cdr_user_name) > 0 ) {
	$cdr_user_name = asteriskregexp2sqllike( 'cdr_user_name', substr($dbh->quote($cdr_user_name),1,-1) );
	if ( isset($mod_vars['cdr_user_name']) and $mod_vars['cdr_user_name'][2] == 'asterisk-regexp' ) {
		$cdr_user_name = " AND ( dst RLIKE '$cdr_user_name' or src RLIKE '$cdr_user_name' )";
	} else {
		$cdr_user_name = " AND ( dst = '$cdr_user_name' or src = '$cdr_user_name' )";
	}
}

$search_condition = '';

// Build the "WHERE" part of the query

foreach ($mod_vars as $key => $val) {
	if (is_blank($val[0])) {
		unset($_REQUEST[$key.'_mod']);
		$$key = NULL;
	} else {
		$pre_like = '';
		if ( $val[2] == 'true' ) {
			$pre_like = ' NOT ';
		}
		switch ($val[1]) {
			case "contains":
				$$key = "$search_condition $key $pre_like LIKE '%$val[0]%'";
			break;
			case "ends_with":
				$$key = "$search_condition $key $pre_like LIKE '%$val[0]'";
			break;
			case "exact":
				if ( $val[2] == 'true' ) {
					$$key = "$search_condition $key != '$val[0]'";
				} else {
					$$key = "$search_condition $key = '$val[0]'";
				}
			break;
			case "asterisk-regexp":
				$ast_dids = preg_split('/\s*,\s*/', $val[0], -1, PREG_SPLIT_NO_EMPTY);
				$ast_key = '';
				foreach ($ast_dids as $did) {
					if (strlen($ast_key) > 0 ) {
						if ( $pre_like == ' NOT ' ) {
							$ast_key .= " and ";
						} else {
							$ast_key .= " or ";
						}
						if ( '_' == substr($did,0,1) ) {
							$did = substr($did,1);
						}
					}
					$ast_key .= " $key $pre_like RLIKE '^$did\$'";
				}
				$$key = "$search_condition ( $ast_key )";
			break;
			case "begins_with":
			default:
				$$key = "$search_condition $key $pre_like LIKE '$val[0]%'";
		}
		if ( $search_condition == '' ) {
			if ( isset($_REQUEST['search_mode']) && $_REQUEST['search_mode'] == 'any' ) {
				$search_condition = ' OR ';
			} else {
				$search_condition = ' AND ';
			}
		}
	}
}

if ( isset($_REQUEST['disposition_neg']) && $_REQUEST['disposition_neg'] == 'true' ) {
	$disposition = (empty($_REQUEST['disposition']) || $_REQUEST['disposition'] == 'all') ? NULL : "$search_condition disposition != '$_REQUEST[disposition]'";
} else {
	$disposition = (empty($_REQUEST['disposition']) || $_REQUEST['disposition'] == 'all') ? NULL : "$search_condition disposition = '$_REQUEST[disposition]'";
}

if ( $search_condition == '' ) {
	if ( isset($_REQUEST['search_mode']) && $_REQUEST['search_mode'] == 'any' ) {
		$search_condition = ' OR ';
	} else {
		$search_condition = ' AND ';
	}
}

$where = "$channel $src $clid $did $dstchannel $dst $userfield $accountcode $disposition";

if ( isset($_REQUEST['lastapp_neg']) && $_REQUEST['lastapp_neg'] == 'true' ) {
	$lastapp = (empty($_REQUEST['lastapp']) || $_REQUEST['lastapp'] == 'all') ? NULL : "lastapp != '$_REQUEST[lastapp]'";
} else {
	$lastapp = (empty($_REQUEST['lastapp']) || $_REQUEST['lastapp'] == 'all') ? NULL : "lastapp = '$_REQUEST[lastapp]'";
}

if ( strlen($lastapp) > 0 ) {
	if ( strlen($where) > 8 ) {
		$where = "$where $search_condition $lastapp";
	} else {
		$where = "$where $lastapp";
	}
}

$duration = (!isset($_REQUEST['dur_min']) || is_blank($_REQUEST['dur_max'])) ? NULL : "duration BETWEEN '$_REQUEST[dur_min]' AND '$_REQUEST[dur_max]'";

if ( strlen($duration) > 0 ) {
	if ( strlen($where) > 8 ) {
		$where = "$where $search_condition $duration";
	} else {
		$where = "$where $duration";
	}
}

$billsec = (!isset($_REQUEST['bill_min']) || is_blank($_REQUEST['bill_max'])) ? NULL : "billsec BETWEEN '$_REQUEST[bill_min]' AND '$_REQUEST[bill_max]'";

if ( strlen($billsec) > 0 ) {
	if ( strlen($where) > 8 ) {
		$where = "$where $search_condition $billsec";
	} else {
		$where = "$where $billsec";
	}
}

if ( strlen($where) > 9 ) {
	$where = "WHERE $date_range AND ( $where ) $cdr_user_name";
} else {
	$where = "WHERE $date_range $cdr_user_name";
}

$order = empty($_REQUEST['order']) ? 'ORDER BY calldate' : "ORDER BY $_REQUEST[order]";
$sort = empty($_REQUEST['sort']) ? 'DESC' : $_REQUEST['sort'];
$group = empty($_REQUEST['group']) ? 'day' : $_REQUEST['group'];

// CSV - разделители -> ;
if ( isset($_REQUEST['need_csv']) && $_REQUEST['need_csv'] == 'true' ) {
	$csv_date = time();
	$csv_file = 'report_' . date('Y-m-d_H-i-s', $csv_date) . '_' . md5($csv_date.'-'.$where) . '.csv';
	//$csv_file = md5(time().'-'.$where).'.csv';
	if (!file_exists("$system_tmp_dir/$csv_file")) {
		$handle = fopen("$system_tmp_dir/$csv_file", "w");
		$query = "SELECT * FROM $db_table_name $where $order $sort LIMIT $result_limit";
		try {
			$sth = $dbh->query($query);
		}
		catch (PDOException $e) {
			print $e->getMessage();
		}
		if (!$sth) {
			echo "\nPDO::errorInfo():\n";
			print_r($dbh->errorInfo());
		}

		fwrite($handle,"calldate;clid;src;did;dst;dcontext;channel;dstchannel;lastapp;lastdata;duration;billsec;disposition;amaflags;accountcode;uniqueid;userfield");
		
		if ( isset($_REQUEST['use_callrates']) && $_REQUEST['use_callrates'] == 'true' ) {
			fwrite($handle,";callrate;callrate_dst");
		}
		fwrite($handle,"\n");
		
		while ($row = $sth->fetch(PDO::FETCH_ASSOC)) {
			$csv_line[0] 	= $row['calldate'];
			$csv_line[1] 	= $row['clid'];
			$csv_line[2] 	= $row['src'];
			$csv_line[3] 	= $row['did'];
			$csv_line[4] 	= $row['dst'];
			$csv_line[5] 	= $row['dcontext'];
			$csv_line[6]	= $row['channel'];
			$csv_line[7] 	= $row['dstchannel'];
			$csv_line[8] 	= $row['lastapp'];
			$csv_line[9]	= $row['lastdata'];
			$csv_line[10]	= $row['duration'];
			$csv_line[11]	= $row['billsec'];
			$csv_line[12]	= $row['disposition'];
			$csv_line[13]	= $row['amaflags'];
			$csv_line[14]	= $row['accountcode'];
			$csv_line[15]	= $row['uniqueid'];
			$csv_line[16]	= $row['userfield'];
			$data = '';
			if ( isset($_REQUEST['use_callrates']) && $_REQUEST['use_callrates'] == 'true' ) {
				$rates = callrates($row['dst'],$row['billsec'],$callrate_csv_file);
				$csv_line[17] = $rates[4];
				$csv_line[18] = $rates[2];
			}
			for ($i = 0; $i < count($csv_line); $i++) {
				$csv_line[$i] = str_replace( array( "\n", "\r" ), '', $csv_line[$i]);
				/* If the string contains a comma, enclose it in double-quotes. */
				if (strpos($csv_line[$i], ";") !== FALSE) { 	// ,
					$csv_line[$i] = "\"" . $csv_line[$i] . "\"";
				}
				if ($i != count($csv_line) - 1) {
					$data = $data . $csv_line[$i] . ";";
				} else {
					$data = $data . $csv_line[$i];
				}
			}
			unset($csv_line);
			fwrite($handle,"$data\n");
		}
		fclose($handle);
		$sth = NULL;
	}
	echo '<p class="dl_csv"><a class="btn_a_2" href="dl.php?csv='.base64_encode($csv_file).'">T&ecute;l&ecute;chargement CSV fichier</a></p>';
}

if ( isset($_REQUEST['need_html']) && $_REQUEST['need_html'] == 'true' ) {
	$query = "SELECT count(*) FROM $db_table_name $where LIMIT $result_limit";
	try {
		$sth = $dbh->query($query);
	}
	catch (PDOException $e) {
		print $e->getMessage();
	}
	if (!$sth) {
		echo "\nPDO::errorInfo():\n";
		print_r($dbh->errorInfo());
	} else {
		$tot_calls_raw = $sth->fetchColumn();
		$sth = NULL;
	}
	if ( $tot_calls_raw ) {

		if ( $tot_calls_raw > $result_limit ) {
			echo '<p class="center title">Historique d&cute;appel - montr&ecute; '. $result_limit .' de la '. $tot_calls_raw .' appel </p><table class="cdr">';
		} else {
			echo '<p class="center title">Historique des appels - trouvés '. $tot_calls_raw .' appels </p><table class="cdr">';
		}

		$i = $h_step - 1;

		try {
		
		$query = "SELECT *, unix_timestamp(calldate) as call_timestamp FROM $db_table_name $where $order $sort LIMIT $result_limit";
		$sth = $dbh->query($query);
		if (!$sth) {
			echo "\nPDO::errorInfo():\n";
			print_r($dbh->errorInfo());
		}
		while ($row = $sth->fetch(PDO::FETCH_ASSOC)) {
			++$i;
			if ($i == $h_step) {
			?>
				<tr>
				<th class="record_col">Date</th>
				<th class="record_col">Statut</th>
				<?php
					if ( isset($display_column['clid']) and $display_column['clid'] == 1 ) {
						echo '<th class="record_col">CallerID</th>';
					}
				?>
				<th class="record_col">Numéro de l'appelant</th>
				<th class="record_col">Numéro de destination</th>
				<?php
					if ( isset($display_column['extension']) and $display_column['extension'] == 1 ) {
						echo '<th class="record_col">Extension</th>';
					}
				?>
				<th class="record_col">Durée</th>
				<?php
				if ( isset($_REQUEST['use_callrates']) && $_REQUEST['use_callrates'] == 'true' ) {
					echo '<th class="record_col">Taux</th>';
					// Показать Направление
					if ( isset($display_column['callrates_dst']) and $display_column['callrates_dst'] == 1 ) {
						echo '<th class="record_col">Destination</th>';
					}
				}
				
				?>				
				<th class="record_col">Application</th>
				<th class="record_col">En.canal</th>
			
				<th class="record_col">So.canal</th> 
				
			
			

				</tr>
		<?php
				$i = 0;
			}
			echo '<tr class="record">';
			formatCallDate($row['calldate'],$row['uniqueid']);
			formatDisposition($row['disposition'], $row['disposition']);
			if ( isset($display_column['clid']) and $display_column['clid'] == 1 ) {
				formatClid($row['clid']);
			}
			formatSrc($row['src'],$row['clid']);
			if ( isset($row['did']) and strlen($row['did']) ) {
				formatDst($row['did'], $row['dcontext'] . ' # ' . $row['dst'] );
			} else {
				formatDst($row['dst'], $row['dcontext'] );
			}
			if ( isset($display_column['extension']) and $display_column['extension'] == 1 ) {
				formatDst($row['dst'], $row['dcontext'] );
			}
			formatDuration($row['duration'], $row['billsec']);
			if ( isset($_REQUEST['use_callrates']) && $_REQUEST['use_callrates'] == 'true' ) {
				$rates = callrates($row['dst'],$row['billsec'],$callrate_csv_file);
				formatMoney($rates[4],2,htmlspecialchars($rates[2]));
				if ( isset($display_column['callrates_dst']) and $display_column['callrates_dst'] == 1 ) {
					echo '<td>'. htmlspecialchars($rates[2]) .'</td>';
				}
			}			
			formatApp($row['lastapp'], $row['lastdata']);
			formatChannel($row['channel']);
			
			formatChannel($row['dstchannel']);
			formatFiles($row);
			if ( isset($display_column['accountcode']) and $display_column['accountcode'] == 1 ) {
				formatAccountCode($row['accountcode']);
			}
			
			echo '</tr>';
		  }
		  }
		  catch (PDOException $e) {
		  	print $e->getMessage();
		  }
		  echo "</table>";
		  $sth = NULL;
    	}
      }


      $dbh = NULL;

     require_once 'templates/footer.tpl.php';
    ?>  



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
    <!--stickey kit -->
    <script src="../../js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
   
    <script src="../../js/custom.min.js"></script>

</body>

</html>