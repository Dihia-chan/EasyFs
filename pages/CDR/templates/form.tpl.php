<div id="main">
<table class="cdr cdr-main">
<tr>
<td>

<form method="post" enctype="application/x-www-form-urlencoded" action="">
<fieldset>
<legend class="title">Voir les enregistrements des appels effectués</legend>
<table width="100%">
<tr>
<th>Trier par</th>
<th>Termes de recherche</th>
<th>&nbsp;</th>
</tr>
<tr>
<td><input <?php if (empty($_REQUEST['order']) || $_REQUEST['order'] == 'calldate') { echo 'checked="checked"'; } ?> id="id_order_calldate" type="radio" name="order" value="calldate">&nbsp;<label for="id_order_calldate">Date</label></td>
<td>De&nbsp;
<input type="text" name="startday" id="startday" size="2" maxlength="2" value="<?php if (isset($_REQUEST['startday'])) { echo htmlspecialchars($_REQUEST['startday']); } else { echo date('d', time()); /* 01 */ } ?>">
<select name="startmonth" id="startmonth">
<?php
$months = array('01' => 'Janvier', '02' => 'Février', '03' => 'Mars', '04' => 'Avril', '05' => 'Маi', '06' => 'Juin', '07' => 'Juillet', '08' => 'Août', '09' => 'Septembre', '10' => 'Оctobre', '11' => 'Novembre', '12' => 'Décembre');
foreach ($months as $i => $month) {
	if ((is_blank($_REQUEST['startmonth']) && date('m') == $i) || (isset($_REQUEST['startmonth']) && $_REQUEST['startmonth'] == $i)) {
		echo '<option value="'.$i.'" selected="selected">'.$month.'</option>';
	} else {
		echo '<option value="'.$i.'">'.$month.'</option>';
	}
}
?>
</select>
<select name="startyear" id="startyear">
<?php
for ( $i = 2000; $i <= date('Y'); $i++) {
	if ((empty($_REQUEST['startyear']) && date('Y') == $i) || (isset($_REQUEST['startyear']) && $_REQUEST['startyear'] == $i)) {
		echo '<option value="'.$i.'" selected="selected">'.$i.'</option>';
	} else {
		echo '<option value="'.$i.'">'.$i.'</option>';
	}
}
?>
</select>&nbsp;A
<!--<input type="text" name="starthour" id="starthour" size="2" maxlength="2" value="<?php if (isset($_REQUEST['starthour'])) { echo htmlspecialchars($_REQUEST['starthour']); } else { echo '00'; } ?>">
:
<input type="text" name="startmin" id="startmin" size="2" maxlength="2" value="<?php if (isset($_REQUEST['startmin'])) { echo htmlspecialchars($_REQUEST['startmin']); } else { echo '00'; } ?>">&ensp;
Par&ensp;-->
<input type="text" name="endday" id="endday" size="2" maxlength="2" value="<?php if (isset($_REQUEST['endday'])) { echo htmlspecialchars($_REQUEST['endday']); } else { echo '31'; } ?>">
<select name="endmonth" id="endmonth">
<?php
foreach ($months as $i => $month) {
	if ((is_blank($_REQUEST['endmonth']) && date('m') == $i) || (isset($_REQUEST['endmonth']) && $_REQUEST['endmonth'] == $i)) {
		echo '<option value="'.$i.'" selected="selected">'.$month.'</option>';
	} else {
		echo '<option value="'.$i.'">'.$month.'</option>';
	}
}
?>
</select>
<select name="endyear" id="endyear">
<?php
for ( $i = 2000; $i <= date('Y'); $i++) {
	if ((empty($_REQUEST['endyear']) && date('Y') == $i) || (isset($_REQUEST['endyear']) && $_REQUEST['endyear'] == $i)) {
		echo '<option value="'.$i.'" selected="selected">'.$i.'</option>';
	} else {
		echo '<option value="'.$i.'">'.$i.'</option>';
	}
}
?>
</select>&nbsp;
<!--<input type="text" name="endhour" id="endhour" size="2" maxlength="2" value="<?php if (isset($_REQUEST['endhour'])) { echo htmlspecialchars($_REQUEST['endhour']); } else { echo '23'; } ?>">
:
<input type="text" name="endmin" id="endmin" size="2" maxlength="2" value="<?php if (isset($_REQUEST['endmin'])) { echo htmlspecialchars($_REQUEST['endmin']); } else { echo '59'; } ?>">-->
&emsp;
<select id="id_range" name="range" onchange="selectRange(this.value);">
	<option class="head" value="">Sélectionnez une période...</option>
	<option value="td">Aujourd'hui</option>
	<option value="yd">Hier</option>
	<option value="3d">Les 3 derniers jours</option>
	<option value="tw">Semaine en cours</option>
	<option value="pw">Semaine précédente</option>
	<option value="3w">Les 3 dernières semaines</option>
	<option value="tm">Mois en cours</option>
	<option value="pm">Mois précédent</option>
	<option value="3m">3 derniers mois</option>
</select>
</td>

<!-------------------------------------------------------->

<input <?php if ( (empty($_REQUEST['need_html']) && empty($_REQUEST['need_chart']) && empty($_REQUEST['need_chart_cc']) && empty($_REQUEST['need_minutes_report']) && empty($_REQUEST['need_asr_report']) && empty($_REQUEST['need_csv'])) || ( ! empty($_REQUEST['need_html']) &&  $_REQUEST['need_html'] == 'true' ) ) { echo 'checked="checked"'; } ?> type="checkbox" id="id_need_html" name="need_html" value="true">&ensp;<br>


<!--<td><label for="id_result_limit">Nombre de lignes</label>&ensp;</td>
<td>
<hr>
<input id="id_result_limit" list="list_result_limit" value="<?php 
if (isset($_REQUEST['limit']) ) { 
	echo htmlspecialchars($_REQUEST['limit']);
} else {
	echo $db_result_limit;
} ?>" name="limit" size="6" autocomplete="off">
<datalist id="list_result_limit">
	<option value="100"></option>
	<option value="500"></option>
	<option value="1000"></option>
	<option value="2000"></option>

</datalist>
</td>-->


<? if ($display_search['channel'] == 1) { ?>
<tr>
<td><input <?php if (isset($_REQUEST['order']) && $_REQUEST['order'] == 'channel') { echo 'checked="checked"'; } ?> type="radio" id="id_order_channel" name="order" value="channel">&nbsp;<label for="id_order_channel">Canal entrant</label></td>
<td><input class="margin-left0" type="text" name="channel" id="channel" value="<?php if (isset($_REQUEST['channel'])) { echo htmlspecialchars($_REQUEST['channel']); } ?>">
<input <?php if ( isset($_REQUEST['channel_neg'] ) && $_REQUEST['channel_neg'] == 'true' ) { echo 'checked="checked"'; } ?> type="checkbox" name="channel_neg" value="true" id="id_channel_neg"> <label for="id_channel_neg">Ne pas</label> &ensp;
<input <?php if (isset($_REQUEST['channel_mod']) && $_REQUEST['channel_mod'] == 'contains') { echo 'checked="checked"'; } ?> type="radio" name="channel_mod" value="contains" id="id_channel_mod2"> <label for="id_channel_mod2">Contient</label> &ensp;
<input <?php if (isset($_REQUEST['channel_mod']) && $_REQUEST['channel_mod'] == 'exact') { echo 'checked="checked"'; } ?> type="radio" name="channel_mod" value="exact" id="id_channel_mod4"> <label for="id_channel_mod4">Est égal</label>
</td>
</tr>
<? } ?>

<tr>
<td><input <?php if (isset($_REQUEST['order']) && $_REQUEST['order'] == 'src') { echo 'checked="checked"'; } ?> type="radio" id="id_order_src" name="order" value="src">&nbsp;<label for="id_order_src">Numéro de l'appelant</label></td>
<td><input class="margin-left0" type="text" name="src" id="src" value="<?php if (isset($_REQUEST['src'])) { echo htmlspecialchars($_REQUEST['src']); } ?>">
<input <?php if ( isset($_REQUEST['src_neg'] ) && $_REQUEST['src_neg'] == 'true' ) { echo 'checked="checked"'; } ?> type="checkbox" name="src_neg" value="true" id="id_src_neg"> <label for="id_src_neg">Ne pas</label> &ensp;
<input <?php if (isset($_REQUEST['src_mod']) && $_REQUEST['src_mod'] == 'contains') { echo 'checked="checked"'; } ?> type="radio" name="src_mod" value="contains" id="id_src_mod2"> <label for="id_src_mod2">Contient</label> &ensp; 
<input <?php if (isset($_REQUEST['src_mod']) && $_REQUEST['src_mod'] == 'exact') { echo 'checked="checked"'; } ?> type="radio" name="src_mod" value="exact" id="id_src_mod4"> <label for="id_src_mod4">Est égal</label> 
</td>
</tr>

<? if ($display_search['clid'] == 1) { ?>
<tr>
<td><input <?php if (isset($_REQUEST['order']) && $_REQUEST['order'] == 'clid') { echo 'checked="checked"'; } ?> type="radio" id="id_order_clid" name="order" value="clid">&nbsp;<label for="id_order_clid">Nom de l'appelant</label></td>
<td><input class="margin-left0" type="text" name="clid" id="clid" value="<?php if (isset($_REQUEST['clid'])) { echo htmlspecialchars($_REQUEST['clid']); } ?>">
<input <?php if ( isset($_REQUEST['clid_neg'] ) && $_REQUEST['clid_neg'] == 'true' ) { echo 'checked="checked"'; } ?> type="checkbox" name="clid_neg" value="true" id="id_clid_neg"> <label for="id_clid_neg">Ne pas</label> &ensp;
<input <?php if (isset($_REQUEST['clid_mod']) && $_REQUEST['clid_mod'] == 'contains') { echo 'checked="checked"'; } ?> type="radio" name="clid_mod" value="contains" id="id_clid_mod2"> <label for="id_clid_mod2">Contient</label> &ensp; 
<input <?php if (isset($_REQUEST['clid_mod']) && $_REQUEST['clid_mod'] == 'exact') { echo 'checked="checked"'; } ?> type="radio" name="clid_mod" value="exact" id="id_clid_mod4"> <label for="id_clid_mod4">Est égal</label> 
</td>
</tr>
<? } ?>

<tr>
<td><input <?php if (isset($_REQUEST['order']) && $_REQUEST['order'] == 'dst') { echo 'checked="checked"'; } ?> type="radio" id="id_order_dst" name="order" value="dst">&nbsp;<label for="id_order_dst">Numéro de destination</label></td>
<td><input class="margin-left0" type="text" name="dst" id="dst" value="<?php if (isset($_REQUEST['dst'])) { echo htmlspecialchars($_REQUEST['dst']); } ?>">
<input <?php if ( isset($_REQUEST['dst_neg'] ) &&  $_REQUEST['dst_neg'] == 'true' ) { echo 'checked="checked"'; } ?> type="checkbox" name="dst_neg" value="true" id="id_dst_neg"> <label for="id_dst_neg">Ne pas</label> &ensp;
<input <?php if (isset($_REQUEST['dst_mod']) && $_REQUEST['dst_mod'] == 'contains') { echo 'checked="checked"'; } ?> type="radio" name="dst_mod" value="contains" id="id_dst_mod2"> <label for="id_dst_mod2">Contient</label> &ensp; 
<input <?php if (isset($_REQUEST['dst_mod']) && $_REQUEST['dst_mod'] == 'exact') { echo 'checked="checked"'; } ?> type="radio" name="dst_mod" value="exact" id="id_dst_mod4"> <label for="id_dst_mod4">Est égal</label> 
</td>
</tr>

<!--
<? if ($display_search['did'] == 1) { ?>
<tr>
<td><input <?php if (isset($_REQUEST['order']) && $_REQUEST['order'] == 'did') { echo 'checked="checked"'; } ?> type="radio" id="id_order_did" name="order" value="did">&nbsp;<label for="id_order_did">DID (s'il y a)</label></td>
<td><input class="margin-left0" type="text" name="did" id="did" value="<?php if (isset($_REQUEST['did'])) { echo htmlspecialchars($_REQUEST['did']); } ?>">
<input <?php if ( isset($_REQUEST['did_neg'] ) &&  $_REQUEST['did_neg'] == 'true' ) { echo 'checked="checked"'; } ?> type="checkbox" name="did_neg" value="true" id="id_did_neg"> <label for="id_did_neg">Ne pas</label> &ensp;
<input <?php if (isset($_REQUEST['did_mod']) && $_REQUEST['did_mod'] == 'contains') { echo 'checked="checked"'; } ?> type="radio" name="did_mod" value="contains" id="id_did_mod2"> <label for="id_did_mod2">Contient</label> &ensp; 
<input <?php if (isset($_REQUEST['did_mod']) && $_REQUEST['did_mod'] == 'exact') { echo 'checked="checked"'; } ?> type="radio" name="did_mod" value="exact" id="id_did_mod4"> <label for="id_did_mod4">Est égal</label> 
</td>
</tr>
<? } ?>-->

<? if ($display_search['dstchannel'] == 1) { ?>
<tr>
<td><input <?php if (isset($_REQUEST['order']) && $_REQUEST['order'] == 'dstchannel') { echo 'checked="checked"'; } ?> type="radio" id="id_order_dstchannel" name="order" value="dstchannel">&nbsp;<label for="id_order_dstchannel">Canal sortant</label></td>
<td><input class="margin-left0" type="text" name="dstchannel" id="dstchannel" value="<?php if (isset($_REQUEST['dstchannel'])) { echo htmlspecialchars($_REQUEST['dstchannel']); } ?>">
<input <?php if ( isset($_REQUEST['dstchannel_neg'] ) &&  $_REQUEST['dstchannel_neg'] == 'true' ) { echo 'checked="checked"'; } ?> type="checkbox" name="dstchannel_neg" value="true" id="id_dstchannel_neg"> <label for="id_dstchannel_neg">Ne pas</label> &ensp;
<input <?php if (isset($_REQUEST['dstchannel_mod']) && $_REQUEST['dstchannel_mod'] == 'contains') { echo 'checked="checked"'; } ?> type="radio" name="dstchannel_mod" value="contains" id="id_dstchannel_mod2"> <label for="id_dstchannel_mod2">Contient</label> &ensp; 
<input <?php if (isset($_REQUEST['dstchannel_mod']) && $_REQUEST['dstchannel_mod'] == 'exact') { echo 'checked="checked"'; } ?> type="radio" name="dstchannel_mod" value="exact" id="id_dstchannel_mod4"> <label for="id_dstchannel_mod4">Est égal</label> 
</td>
</tr>
<? } ?>




<tr>
<td><input <?php if (isset($_REQUEST['order']) && $_REQUEST['order'] == 'duration') { echo 'checked="checked"'; } ?> type="radio" id="id_order_duration" name="order" value="duration">&nbsp;<label for="id_order_duration">Durée</label></td>
<td><label for="id_dur_min">Entre</label>&nbsp;
<input type="text" name="dur_min" id="id_dur_min" value="<?php if (isset($_REQUEST['dur_min'])) { echo htmlspecialchars($_REQUEST['dur_min']); } ?>" size="3" maxlength="5">&ensp;
Et&ensp;
<input type="text" name="dur_max" id="id_dur_max" value="<?php if (isset($_REQUEST['dur_max'])) { echo htmlspecialchars($_REQUEST['dur_max']); } ?>" size="3" maxlength="5">
&nbsp;<label for="id_dur_max">Secondes</label>
</td>
</tr>

<? if ($display_search['lastapp'] == 1) { ?>
<tr>
<td><input <?php if (isset($_REQUEST['order']) && $_REQUEST['order'] == 'lastapp') { echo 'checked="checked"'; } ?> type="radio" id="id_order_lastapp" name="order" value="lastapp">&nbsp;<label for="id_order_lastapp">Application</label></td>
<td>
<input <?php if ( isset($_REQUEST['lastapp_neg'] ) && $_REQUEST['lastapp_neg'] == 'true' ) { echo 'checked="checked"'; } ?> class="margin-left0" type="checkbox" name="lastapp_neg" id="id_lastapp_neg" value="true"> <label for="id_lastapp_neg">Ne pas</label>&nbsp;
<select name="lastapp" id="lastapp">
<option <?php if (empty($_REQUEST['lastapp']) || $_REQUEST['lastapp'] == 'all') { echo 'selected="selected"'; } ?> value="all">Tout</option>
<option <?php if (isset($_REQUEST['lastapp']) && $_REQUEST['lastapp'] == 'Dial') { echo 'selected="selected"'; } ?> value="Dial">Composer un numéro</option>
<option <?php if (isset($_REQUEST['lastapp']) && $_REQUEST['lastapp'] == 'Hangup') { echo 'selected="selected"'; } ?> value="Hangup">Séparation</option>
<option <?php if (isset($_REQUEST['lastapp']) && $_REQUEST['lastapp'] == 'Playback') { echo 'selected="selected"'; } ?> value="Playback">Reproduction</option>
<option <?php if (isset($_REQUEST['lastapp']) && $_REQUEST['lastapp'] == 'RetryDial') { echo 'selected="selected"'; } ?> value="RetryDial">Recomposer</option>
<option <?php if (isset($_REQUEST['lastapp']) && $_REQUEST['lastapp'] == 'Queue') { echo 'selected="selected"'; } ?> value="Queue">La file d'attente</option>
<option <?php if (isset($_REQUEST['lastapp']) && $_REQUEST['lastapp'] == 'intercept') { echo 'selected="selected"'; } ?> value="intercept">interception</option>
<option <?php if (isset($_REQUEST['lastapp']) && $_REQUEST['lastapp'] == 'bridge') { echo 'selected="selected"'; } ?> value="bridge">connecté</option>
<option <?php if (isset($_REQUEST['lastapp']) && $_REQUEST['lastapp'] == 'hangup') { echo 'selected="selected"'; } ?> value="hangup">raccrocher</option>
<option <?php if (isset($_REQUEST['lastapp']) && $_REQUEST['lastapp'] == '') { echo 'selected="selected"'; } ?> value="">vide</option>
</select>
</td>
</tr>
<? } ?>

<tr>
<td><input <?php if (isset($_REQUEST['order']) && $_REQUEST['order'] == 'disposition') { echo 'checked="checked"'; } ?> type="radio" id="id_order_disposition" name="order" value="disposition">&nbsp;<label for="id_order_disposition">Statut de l'appel</label></td>
<td>
<input <?php if ( isset($_REQUEST['disposition_neg'] ) && $_REQUEST['disposition_neg'] == 'true' ) { echo 'checked="checked"'; } ?> class="margin-left0" type="checkbox" name="disposition_neg" id="id_disposition_neg" value="true"> <label for="id_disposition_neg">Ne pas</label>&nbsp;
<select name="disposition" id="disposition">
<option <?php if (empty($_REQUEST['disposition']) || $_REQUEST['disposition'] == 'NORMAL_CLEARING') { echo 'selected="selected"'; } ?> value="NORMAL_CLEARING">Répondu</option>
<option <?php if (isset($_REQUEST['disposition']) && $_REQUEST['disposition'] == 'all') { echo 'selected="selected"'; } ?> value="all">Tout</option>
<option <?php if (isset($_REQUEST['disposition']) && $_REQUEST['disposition'] == 'USER_BUSY') { echo 'selected="selected"'; } ?> value="USER_BUSY">Occupé</option>
<option <?php if (isset($_REQUEST['disposition']) && $_REQUEST['disposition'] == 'INVALID_GATEWAY') { echo 'selected="selected"'; } ?> value="INVALID_GATEWAY">Erreur</option>
<option <?php if (isset($_REQUEST['disposition']) && $_REQUEST['disposition'] == 'NO_ROUTE_DESTINATION') { echo 'selected="selected"'; } ?> value="NO_ROUTE_DESTINATION">Pas d'itinéraire</option>
<option <?php if (isset($_REQUEST['disposition']) && $_REQUEST['disposition'] == 'ORIGINATOR_CANCEL') { echo 'selected="selected"'; } ?> value="ORIGINATOR_CANCEL">Pas de réponse</option>

</select>
</td>
</tr>
<tr>
<td>
<select name="sort" id="sort">
<option <?php if (isset($_REQUEST['sort']) && $_REQUEST['sort'] == 'ASC') { echo 'selected="selected"'; } ?> value="ASC">ascendant</option>
<option <?php if (empty($_REQUEST['sort']) || $_REQUEST['sort'] == 'DESC') { echo 'selected="selected"'; } ?> value="DESC">en descendant</option>
</select>
</td>
<td>
<label for="group">Grouper par</label>&nbsp;
<select name="group" id="group">
<optgroup label="Informations sur le compte">
<option <?php if (isset($_REQUEST['group']) && $_REQUEST['group'] == 'accountcode') { echo 'selected="selected"'; } ?> value="accountcode">Numero du compte</option>
<option <?php if (isset($_REQUEST['group']) && $_REQUEST['group'] == 'userfield') { echo 'selected="selected"'; } ?> value="userfield">Description</option>
</optgroup>
<optgroup label="Date / heure">
<option <?php if (isset($_REQUEST['group']) && $_REQUEST['group'] == 'minutes1') { echo 'selected="selected"'; } ?> value="minutes1">Minute</option>
<option <?php if (isset($_REQUEST['group']) && $_REQUEST['group'] == 'minutes10') { echo 'selected="selected"'; } ?> value="minutes10">10 minutes</option>
<option <?php if (isset($_REQUEST['group']) && $_REQUEST['group'] == 'hour') { echo 'selected="selected"'; } ?> value="hour">Heure</option>
<option <?php if (isset($_REQUEST['group']) && $_REQUEST['group'] == 'hour_of_day') { echo 'selected="selected"'; } ?> value="hour_of_day">Heure du jour</option>
<option <?php if (isset($_REQUEST['group']) && $_REQUEST['group'] == 'day_of_week') { echo 'selected="selected"'; } ?> value="day_of_week">Jour de la semaine</option>
<option <?php if (empty($_REQUEST['group']) || $_REQUEST['group'] == 'day') { echo 'selected="selected"'; } ?> value="day">Jour</option>
<option <?php if (isset($_REQUEST['group']) && $_REQUEST['group'] == 'week') { echo 'selected="selected"'; } ?> value="week">Semaine (lun-dim)</option>
<option <?php if (isset($_REQUEST['group']) && $_REQUEST['group'] == 'month') { echo 'selected="selected"'; } ?> value="month">Mois</option>
</optgroup>
<optgroup label="Numéro de téléphone">
<option <?php if (isset($_REQUEST['group']) && $_REQUEST['group'] == 'clid') { echo 'selected="selected"'; } ?> value="clid">Nom de l'appelant</option>
<option <?php if (isset($_REQUEST['group']) && $_REQUEST['group'] == 'src') { echo 'selected="selected"'; } ?> value="src">Numéro de l'appelant</option>
<option <?php if (isset($_REQUEST['group']) && $_REQUEST['group'] == 'dst') { echo 'selected="selected"'; } ?> value="dst">Numéro de destination</option>
</optgroup>
<optgroup label="Tech. information">
<option <?php if (isset($_REQUEST['group']) && $_REQUEST['group'] == 'disposition') { echo 'selected="selected"'; } ?> value="disposition">Statut</option>
<option <?php if (isset($_REQUEST['group']) && $_REQUEST['group'] == 'disposition_by_day') { echo 'selected="selected"'; } ?> value="disposition_by_day">Statut par jours</option>
<option <?php if (isset($_REQUEST['group']) && $_REQUEST['group'] == 'disposition_by_hour') { echo 'selected="selected"'; } ?> value="disposition_by_hour">Statut par montre</option>
<option <?php if (isset($_REQUEST['group']) && $_REQUEST['group'] == 'dcontext') { echo 'selected="selected"'; } ?> value="dcontext">Contexte</option>
</optgroup>
</select>
</td>
</tr>
<tr>
<td>
&nbsp;
</td>
<td>
<input class="submit btnSearch margin-left0" type="submit" value="Trouver">
<input <?php if (empty($_REQUEST['search_mode']) || $_REQUEST['search_mode'] == 'all') { echo 'checked="checked"'; } ?> type="radio" id="id_search_mode_all" name="search_mode" value="all"> <label for="id_search_mode_all">Dans toutes les conditions</label>&ensp;
<input <?php if (isset($_REQUEST['search_mode']) && $_REQUEST['search_mode'] == 'any') { echo 'checked="checked"'; } ?> type="radio" id="id_search_mode_any" name="search_mode" value="any"> <label for="id_search_mode_any">Par n'importe laquelle des conditions</label>
</td>
</tr>
</table>
</fieldset>
</form>
</td>
</tr>
</table>
<a id="CDR"></a>

