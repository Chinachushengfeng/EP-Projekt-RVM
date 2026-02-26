
<?php 
$link=mysqli_connect('127.0.0.1','root','chushengfeng123'); 

 //mysql_query('set names utf8');


 

if(!$link) 
{ 
die("<center>³ö´íÀ²222:1!</center>"); 
} 
if(!mysqli_select_db( $link,'qcs')) 
{ 
die("<center>³ö´íÀ²333:2!</center>"); 
} 

  
 
?> 