<?php
session_start();// Start session
// Set session name myname=Satit Rianpit
$_SESSION["myname"] = "Satit Rianpit";

echo "<a href='session2.php'>
      Click Here to see session.</a>";
?>