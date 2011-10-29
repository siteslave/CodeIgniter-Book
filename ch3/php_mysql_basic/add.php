
<?php
// include configuration file.
include 'configure.php';

if(!isset($_REQUEST["act"]))
{
  // Show form for add data.
  echo "
       <form action='' method=POST>
       First name:
       <input type='TEXT' size=10 name='fname'>
       Last name:
       <input type='TEXT' size=10 name='lname'> 
       <input type='SUBMIT' value='Save' name='act'>
   </form>
       ";
}else{
   if($_REQUEST["fname"] == "" || $_REQUEST["lname"] == ""){
       echo "Data incomplete.";
       exit();
   }

   // Generate sql query
   $_sql = "INSERT INTO tbluser(fname, lname)
            VALUES('".$_REQUEST["fname"]."',    
            '".$_REQUEST["lname"]."')";

    //Execute query
    $_result = mysql_query($_sql);
    echo "Data saved..";
}
?>


