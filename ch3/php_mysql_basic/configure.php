
<?php
/*
*
*Database setting.
*	host: 		localhost
*	username: 	root
*	password: 	123456
* 	database: 	test
*/
@mysql_connect('localhost','root','123456') 
			or die('Error to connect: '.mysql_error());

//select database.
@mysql_selectdb('test');

//set thai support.
@mysql_query('SET NAMES tis620');

?>

