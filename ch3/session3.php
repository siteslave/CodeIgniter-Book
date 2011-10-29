<?php
session_start(); // Start session

session_unset(); // Unset session
session_destroy(); // Destroy session

echo "Your name is: ".$_SESSION["myname"];

?>