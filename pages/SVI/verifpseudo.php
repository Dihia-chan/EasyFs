<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html > 
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" /> 
<title>Document sans titre</title> 
</head> 

<body><?php 
// 
// VERIFICATION EN LIVE DU PSEUDO 
// 

// CONNECION SQL 
$db = mysqli_connect("localhost", "root", "mysqlPFE" , "freeswitchcdr"); 

// VERIFICATION 
$result = mysqli_query($db,"SELECT * FROM `svi` WHERE `nom`='".$_GET["id"]."'"); 
$ss =mysqli_num_rows($result) ;
if($ss >=1 ) 
echo "<span style=\"color:red;\">Nom exist déja :(</span>";
else 
echo "<span style=\"color:green;\">Nom available :)</span>"; 
?> 


</body> 
</html>