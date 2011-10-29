<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

<?php
//database connection
include 'configure.php';
// Select data in tbluser
$result = mysql_query('SELECT * FROM tbluser');
//display user information
while($row = mysql_fetch_assoc($result)){
     echo $row["id"]." ";//field id
	 echo $row["fname"]." ";//field fname
	 echo $row["lname"];//field lname
	 //Show edit , del link
     echo " <a href=edit.php?id=".$row["id"]."> 
            edit</a> | 
          <a href=del.php?id=".$row["id"].">
          del</a> <br />";
}

?>

</body>
</html>