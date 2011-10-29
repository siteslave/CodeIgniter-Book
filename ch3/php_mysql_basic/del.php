
<?php
//database connection
include 'configure.php';
//not set id
if(!isset($_REQUEST["id"])){
   echo "Error. no id.";
   exit();
}
//generate sql query
$_sql = "DELETE FROM tbluser
         WHERE id=".$_REQUEST["id"];
//execute query
$_result = mysql_query($_sql);
echo "Data deleted.";

?>

