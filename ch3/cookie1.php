
<?php
if(!isset($_COOKIE["MyCookie"])){
    $Msg = "I am Cookie.";
    //Create cookie MyCookie.
    setcookie('MyCookie',$Msg,time()+3600);
    //Cookie will expire in one hour.
   
    echo "<a href='cookie1.php'>
         Click Here to see Cookie</a>";
}else{
   echo $_COOKIE["MyCookie"];

   /********* Output *********
          I am Cookie.
   **************************/
}
?>

