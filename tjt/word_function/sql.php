<?php 


 
 

 

 function select($ziduan)
{
	global $link;
	

$sql="select *  from word  where word='$ziduan'"; 

$result=mysqli_query($link,$sql);  
$result=mysqli_fetch_array($result);
 
return $result['toword'];
 
 
}





?>