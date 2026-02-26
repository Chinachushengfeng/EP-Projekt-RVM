<?php 


 $mid=select("machineinformation","mid");
 
 
 function selectword($ziduan)
{
	global $link;
	

$sql="select *  from word  where word='$ziduan'"; 

$result=mysqli_query($link,$sql);  
$result=mysqli_fetch_array($result);
 
return $result['toword'];
 
 
}


 function num($sqlstr)
{


	global $link;
 
 
$sql="select *  from $sqlstr  "; 

$result=mysqli_query($link,$sql);  
$total=mysqli_num_rows($result);
 
return $total;
 
}


 function select($sqlstr,$ziduan)
{
	global $link;
	

$sql="select *  from $sqlstr  "; 

$result=mysqli_query($link,$sql);  
$result=mysqli_fetch_array($result);
 
return $result[$ziduan];
 
 
}





?>