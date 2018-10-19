 <?php  
         // connexion à la base de données
        $db_username = 'root';
        $db_password = 'mysqlPFE';
        $db_name     = 'freeswitchcdr';
        $db_host     = 'localhost';
        $db = mysqli_connect($db_host, $db_username, $db_password,$db_name)
          or die('could not connect to database');
       
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
    <!-- Bootstra../../p Core CSS -->
    <link href="../../css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../../css/helper.css" rel="stylesheet">
   
    
    <link href="../../css/css/style.css" rel="stylesheet">

<script language="JavaScript" type="text/javascript" src="jquery-1.11.1.js"></script>
<link rel="stylesheet" type="text/css" href="../../css/tableB.css" >

<script type="text/javascript"> 
function writediv(texte) 
{ 
document.getElementById('pseudobox').innerHTML = texte; 
} 

function verifPseudo(id) 
{ 
if(id != '') 
{ 
 if(texte = file('verifpseudo.php?id='+escape(id))) 
{ 
if(texte == 1) 
writediv('<span style="color:#cc0000"><b>'+id+' :</b> ce pseudo est deja pris</span>'); 
else if(texte == 2) 
writediv('<span style="color:#1A7917"><b>'+id+' :</b> ce pseudo est libre</span>'); 
else 
writediv(texte); 
} 
} 

} 

function file(fichier) 
{ 
if(window.XMLHttpRequest) // FIREFOX 
xhr_object = new XMLHttpRequest(); 
else if(window.ActiveXObject) // IE 
xhr_object = new ActiveXObject("Microsoft.XMLHTTP"); 
else 
return(false); 
xhr_object.open("GET", fichier, false); 
xhr_object.send(null); 
if(xhr_object.readyState == 4) return(xhr_object.responseText); 
else return(false); 
} 
</script>

</head>
<body>

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
                            <li> <a  href="../../principale.php" aria-expanded="false"><i class="fa 
                                fa-tachometer"></i><span class="hide-menu">Dashboard</span></a>
                            </li>
                         <li class="nav-label">Apps</li>
                        <li> <a  href="../users/modification.php" aria-expanded="false">
                        <i class="ti-user"></i><span class="hide-menu">Gestion des comptes</span></a>
                        </li>
                        <li> <a  href="../extension/gestion.php" aria-expanded="false"><i class="fa fa-wpforms"></i><span class="hide-menu">Gestion des extensions</span></a>
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
            <div class="card-content">

		<form method='post' name='frm' action='affich.php'>
            <table width='100%' border='0' cellpadding='0' cellspacing='0'>
				<tr>
					<td align='left' valign='top'>		
						<h1><i><b>Menu SVI</b></i></h1><br>	
					</td>
					<td align='right' nowrap='nowrap' valign='top'>
					<input type='button' class='btn btn-inverse' name='' alt='Retour'                   onclick="window.location='gestion.php'" value='Retour'>
					</td>
				</tr>
				<tr>
					<td colspan='2' align='left' valign='top'>		
						Le Menu SVI joue le role d'un guide vocal ou un texte prédéfini qui présente à l'appelant des options à choisir. Chaque option est configurée avec une destination correspondante. 		<br><br>	
					</td>
				</tr>
			</table>
			<table width='100%' border='0' cellpadding='0' cellspacing='0'>
				<tr>
					<td width='30%' class='vncellreq' valign='top' align='left' nowrap>
						Nom
					</td>
					<td width='70%' class='vtable' align='left'>
						<input class='formfld' type='text' name='id' maxlength='255' required='required'  onKeyUp="verifPseudo(this.value)">
                        <div id="pseudobox"></div>
						<br />
						Choisir un nom pour le menu SVI
					</td>
				</tr>
				<tr>
					<td class='vncellreq' valign='top' align='left' nowrap>
						Extension
					</td>
					<td class='vtable' align='left'>
  						<input class='formfld' type='text' name='extension' maxlength='255' value='' required='required'>
						<br />
						Choisir le numéro d'extension.
					</td>
				</tr>
				<tr>
					<td class='vncellreq' valign='top' align='left' nowrap>
					Message Long
					</td>
					<td class='vtable' align='left'>
				  		<select name='macrol' class='formfld' >
							<optgroup label='Phrases'>
								<?php 
									$requete1="SELECT * FROM `macrol` ";
        						    $exec_requete1 = mysqli_query($db,$requete1);

									while ($rep1 = mysqli_fetch_assoc($exec_requete1)) {
									   echo "<option value='".$rep1['macrol']."'>".$rep1['macrol']."</option>";
									}

								?>
							</optgroup>
						</select>
						<br />
						Le message long est joué une fois lorsque l'on entre dans le menu.
					</td>
				</tr>
				<tr>
					<td class='vncellreq' valign='top' align='left' nowrap>
						Message Court
					</td>
					<td class='vtable' align='left'>
						<select name='macroc' id='ivr_menu_greet_short' class='formfld'>
							<optgroup label='Phrases'>
								<?php 
								$requete2="SELECT * FROM `macroc` ";
        						$exec_requete2 = mysqli_query($db,$requete2);

									while ($rep2 = mysqli_fetch_assoc($exec_requete2)) {
									   echo "<option value='".$rep2['macroc']."'>".$rep2['macroc']."</option>";
									}

								?>
							</optgroup>
						</select>
						<br>Le message court est joué lors du retour dans le menu, donc à la suite du message long.
					</td>
				</tr>
				<tr>		
					<td class='vncellreq' valign='top'>Options</td>		
					<td class='vtable' align='left'>			
						<table border='0' cellpadding='0' cellspacing='0'>
							<tr>
		    					<td class='vtable'>Digit</td>
								<td class='vtable'>Destination</td>
								<td class='vtable'>Description</td>
							</tr>
							<tr>
           					 	<td class='formfld' align='left'>
           						 	<input class='formfld' style='width:70px' type='text' name='digit1' maxlength='255' value=''>
    							</td>
    							<td class='formfld' align='left' nowrap='nowrap'>

	    							<select name='destination1' class='formfld' style='width: 200px;' onchange="">
		    							<optgroup label='Extensions'>
										<?php
											//  extension selected     
       										$req = "SELECT * FROM `extension` ";
        									$exec_req = mysqli_query($db,$req);
											while ( $rep = mysqli_fetch_assoc($exec_req) ) {
												echo "<option value='".$rep['id']."' >".$rep['id']."</option>";
											}

										?>
		    							</optgroup>
										<option value='' selected='selected'></option>
	   							 	</select>
	   							 </td>
    							<td class='formfld' align='left'>
	    						<input class='formfld' style='width:100px' type='text' name='descp1' maxlength='255' value="">
    							</td>
    						</tr>
    						<tr>
           					 	<td class='formfld' align='left'>
           						 	<input class='formfld' style='width:70px' type='text' name='digit2' maxlength='255' value=''>
    							</td>
    							<td class='formfld' align='left' nowrap='nowrap'>

	    							<select name='destination2' class='formfld' style='width: 200px;' onchange="">
		    							<optgroup label='Extensions'>
										<?php
											//  extension selected     
        									$req = "SELECT * FROM `extension` ";
        									$exec_req = mysqli_query($db,$req);
											while ( $rep = mysqli_fetch_assoc($exec_req) ) {
												echo "<option value='".$rep['id']."' >".$rep['id']."</option>";
											}

										?>
		    							</optgroup>
										<option value='' selected='selected'></option>
	   							 	</select>
	   							</td>
    							<td class='formfld' align='left'>
	    						<input class='formfld' style='width:100px' type='text' name='descp2' maxlength='255' value="">
    							</td>
    						</tr>
    						<tr>
           					 	<td class='formfld' align='left'>
           						 	<input class='formfld' style='width:70px' type='text' name='digit3' maxlength='255' value=''>
    							</td>
    							<td class='formfld' align='left' nowrap='nowrap'>

	    							<select name='destination3' class='formfld' style='width: 200px;' onchange="">
		    							<optgroup label='Extensions'>
										<?php
											//  extension selected     
        									$req = "SELECT * FROM `extension` ";
        									$exec_req = mysqli_query($db,$req);
											while ( $rep = mysqli_fetch_assoc($exec_req) ) {
												echo "<option value='".$rep['id']."' >".$rep['id']."</option>";
											}

										?>
		    							</optgroup>
										<option value='' selected='selected'></option>
	   							 	</select>
    							</td>
    							<td class='formfld' align='left'>
	    						<input class='formfld' style='width:100px' type='text' name='descp3' maxlength='255' value="">
    							</td>
    						</tr>
    						<tr>
           					 	<td class='formfld' align='left'>
           						 	<input class='formfld' style='width:70px' type='text' name='digit4' maxlength='255' value=''>
    							</td>
    							<td class='formfld' align='left' nowrap='nowrap'>

	    							<select name='destination4' class='formfld' style='width: 200px;' onchange="">
		    							<optgroup label='Extensions'>
										<?php
											//  extension selected     
        									$req = "SELECT * FROM `extension` ";
        									$exec_req = mysqli_query($db,$req);
											while ( $rep = mysqli_fetch_assoc($exec_req) ) {
												echo "<option value='".$rep['id']."' >".$rep['id']."</option>";
											}

										?>
		    							</optgroup>
										<option value='' selected='selected'></option>
	   							 	</select>
    							</td>
    							<td class='formfld' align='left'>
	    						<input class='formfld' style='width:100px' type='text' name='descp4' maxlength='255' value="">
    							</td>
    						</tr>
    						<tr>
           					 	<td class='formfld' align='left'>
           						 	<input class='formfld' style='width:70px' type='text' name='digit5' maxlength='255' value=''>
    							</td>
    							<td class='formfld' align='left' nowrap='nowrap'>

	    							<select name='destination5' class='formfld' style='width: 200px;' required="required">
		    							<optgroup label='Extensions'>
										<?php
											//  extension selected     
        									$req = "SELECT * FROM `extension` ";
        									$exec_req = mysqli_query($db,$req);
											while ( $rep = mysqli_fetch_assoc($exec_req) ) {
												echo "<option value='".$rep['id']."' >".$rep['id']."</option>";
											}

										?>
		    							</optgroup>
										<option value='' selected='selected'></option>
	   							 	</select>
    							</td>
    							<td class='formfld' align='left'>
	    						<input class='formfld' style='width:100px' type='text' name='descp5' maxlength='255' value="">
    							</td>
    						</tr>
    
						</table>
					</td>
				</tr>
				<tr>
					<td class='vncellreq' valign='top' align='left' nowrap>
						Timeout
					</td>
					<td class='vtable' align='left'>
 						 <input class='formfld' type='number' name='timeout' maxlength='255' min='1' step='1' value='5000' required='required'>
						<br />
						Le temps en millisecondes à attendre après le message ou la marco de confirmation.
					</td>
				</tr>
				<tr>
					<td width="30%" class='vncellreq' valign='top' align='left' nowrap>
						Audio si Invalide
					</td>
					<td width="70%" class='vtable' align='left'>
						<select name='invalid_sound' class='formfld' style='width: 350px;'  >
							<optgroup label='Enregistrement'>
								<?php 
								$requete3="SELECT * FROM `invalid` ";
        						$exec_requete3 = mysqli_query($db,$requete3);

									while ($rep3 = mysqli_fetch_assoc($exec_requete3)) {
									   echo "<option value='".$rep3['enrg']."'>".$rep3['invalid']."</option>";
									}

								?>
							</optgroup>
						</select>
						<br />
						Joué quand une option invalide est choisie.
					</td>
				</tr>
				<tr>
					<td class='vncellreq' valign='top' align='left' nowrap>
						Audio de sortie
					</td>
					<td class='vtable' align='left'>
						<select name='exitsound' class='formfld' style='width: 350px;' >
							<optgroup label='Music'>
								<?php 
								$requete4="SELECT * FROM `exitm` ";
        						$exec_requete4 = mysqli_query($db,$requete4);

									while ($rep4 = mysqli_fetch_assoc($exec_requete4)) {
									   echo "<option value='".$rep4['enrg']."'>".$rep4['exitm']."</option>";
									}

								?>
							</optgroup>
							<optgroup label='Enregistrement'>
								<?php 
								$requete5="SELECT * FROM `exits` ";
        						$exec_requete5 = mysqli_query($db,$requete5);

									while ($rep5 = mysqli_fetch_assoc($exec_requete5)) {
									   echo "<option value='".$rep5['enrg']."'>".$rep5['exits']."</option>";
									}

								?>
							</optgroup>

						</select>
						<br />
						Joué lorsque l'on quitte ce menu.
					</td>
				</tr>
				<tr>
					<td class='vncellreq' valign='top' align='left' nowrap>
						Voix TTS
					</td>
					<td class='vtable' align='left'>
						<select name='voix' class='formfld' style='width: 350px;' required="required">
							<optgroup label='Voix'>
								<?php 
								$requete6="SELECT * FROM `voix` ";
        						$exec_requete6 = mysqli_query($db,$requete6);

									while ($rep6 = mysqli_fetch_assoc($exec_requete6)) {
									   echo "<option value='".$rep6['voix']."'>".$rep6['voix']."</option>";
									}

								?>
							</optgroup>
						</select>
						<br />
						Voix du Text-To-Speech (texte vers parole)
					</td>
				</tr>
				<tr>
					<td class='vncellreq' valign='top' align='left' nowrap>
						Essais de Confirmation
					</td>
					<td class='vtable' align='left'>
 						 <input class='formfld' type='number' name='nbrC' maxlength='25' min='1' step='1' value='1' required='required'>
						<br />
						Nombre maximum de tentatives de confirmation authorisées.
					</td>
				</tr>
				<tr>
					<td class='vncellreq' valign='top' align='left' nowrap>
						Timeout Inter-Digit
					</td>
					<td class='vtable' align='left'>
  						<input class='formfld' type='number' name='timeoutd' maxlength='255' min='1' step='1' value='2000' required='required'>
						<br />
						Le temps en millisecondes à attendre entre deux digits.
					</td>
				</tr>
				<tr>
					<td class='vncellreq' valign='top' align='left' nowrap>
						Echecs Max
					</td>
					<td class='vtable' align='left'>
  						<input class='formfld' type='number' name='fail' maxlength='255' min='0' step='1' value='1' required='required'>
						<br />
						Nombre maximum de tentatives avant de sortir.
					</td>
				</tr>
				<tr>
					<td class='vncellreq' valign='top' align='left' nowrap>
						Timeouts Max
					</td>
					<td class='vtable' align='left'>
 						 <input class='formfld' type='number' name='maxtimeout' maxlength='255' min='0' step='1' value='1' required='required'>
						<br />
						Nombre maximum de timeouts avant de sortir.
					</td>
				<tr>
					<td class='vncellreq' valign='top' align='left' nowrap>
						Description
					</td>
					<td class='vtable' align='left'>
						<textarea class='formfld'  name='descpm'></textarea>
						<br />
						Entez une description.
					</td>
				</tr>
				<tr align="right"> 
                    <td colspan="2">
                        <input type="reset" value="Restaurer" class="btn btn-info waves-effect waves-light"> 
                        <input type='submit' class="btn btn-success" value='Crée'>    
                    </td> 
                </tr> 			

			</table>
		<br><br>
	</form>

            <!-- End Container fluid  -->
          </div></div></div></div></div>  
        </div>
        <!-- End Page wrapper  -->
    </div>
    <!-- End Wrapper -->
<script>

    function verifEx(champ)
{
   var regex = /^0\d{9}$/;
   if(!regex.test(champ.value))
   {
      surligne(champ, true);
      alert("Veuillez saisire une extension de 10 chiffre");
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