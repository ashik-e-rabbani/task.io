<?php

$server 	= "localhost";
$username 	= "root";
$password	= "";
$db 		= "task";

// creating connection

$conn = mysqli_connect($server,$username,$password,$db );

// check conn

if ( !$conn )
{
	die("Connection Failed : ". mysqli_connect_error());

}







?>