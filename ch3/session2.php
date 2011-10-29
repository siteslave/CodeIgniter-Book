<?php
session_start();// Start session

echo "Your name is: ".$_SESSION["myname"];
//Your name is: Satit Rianpit

echo "<a href='session3.php'>
       Click Here to destroy session</a>";
?>