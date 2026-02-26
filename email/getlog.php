
<?php
 header("Content-type: text/html; charset=utf8"); 
 date_default_timezone_set("PRC");
include("IncDB.php");

$sql="select * from log order by dateline desc ";
$result=mysqli_query($link,$sql);
 

while($it=mysqli_fetch_array($result) )
{
	echo $it['log'] ;
	echo '<br>';
}

?>