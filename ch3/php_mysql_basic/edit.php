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
if(!isset($_REQUEST["id"])){//submit without data
   echo "Error. no id.";
   exit();
}
if(!isset($_REQUEST['act']))//not set act's value
{
  //sql for select data in table
  $_sql = "SELECT * FROM tbluser 
          WHERE id=".$_REQUEST["id"];
  $_result = mysql_query($_sql);//execute query
  $_row = mysql_fetch_assoc($_result);//fetch data into array
//Show form for edit data 
   echo "
 	  <form action='' method='POST'>
    	<input type='hidden' name='id'     value='".$_REQUEST["id"]."'>
       First name: <input type='TEXT' name='fname' value='".$_row["fname"]."'>
       Last name: <input type='TEXT' name='lname' value='".$_row["lname"]."'>
      <input type='SUBMIT' value='Update' name='act'>
    </form>
   ";
}else{ 
  $_sql = "UPDATE tbluser SET
           fname='".$_REQUEST["fname"]."', 
           lname='".$_REQUEST["lname"]."' 
           WHERE id=".$_REQUEST["id"];
$_result = mysql_query($_sql);//execute query
echo "Data updated..";

}
?>


</body>
</html>