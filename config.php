<?php
/**********************************************************************
 *Contains all the basic Configuration
 *dbHost = Host of MySQL DataBase Server
 *dbUser = Username of DataBase
 *dbName = Name of DataBase
 **********************************************************************/
$dbHost = 'localhost';
$dbUser = 'root';
$dbPass = 'Charizard18';
$dbName = 'booking';
$dbC = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName)
or die('Error Connecting to MySQL DataBase');
?>