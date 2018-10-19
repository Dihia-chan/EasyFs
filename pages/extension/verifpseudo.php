<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml"> 
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
$result = mysqli_query($db,"SELECT * FROM `extension` WHERE `id`=".$_GET["id"]); 
$ss =mysqli_num_rows($result) ;
if($ss >=1 ) 
echo "<span style=\"color:red;\">extension already exists :(</span>";
else 
echo "<span style=\"color:green;\">extension is available :)</span>"; 
?> 


</body> 
</html>