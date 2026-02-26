<?php 
$link=mysqli_connect('127.0.0.1','root','chushengfeng123'); 

 //mysql_query('set names utf8');
if(!$link) 
{ 
die("<center>error link</center>"); 
} 
if(!mysqli_select_db($link,'hbssj')) 
{ 
die("<center>error link</center>"); 
} 
?>