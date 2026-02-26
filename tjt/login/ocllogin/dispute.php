
<!DOCTYPE html><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <title>屈臣氏</title>
  
    <!-- Loading Bootstrap -->
    <link href="../Flat UI_files/bootstrap.min.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
    <!-- Loading Flat UI --> 
    <style type="text/css">
    body,td,th { 
 


	font-family: Lato, sans-serif;
}
a:link {
	text-decoration: none;
}
a:visited {
	text-decoration: none;
}
a:hover {
	text-decoration: none;
}
a:active {
	text-decoration: none;
}



.img{
	
border-radius:10%;
 
	}






    body {
		background-repeat: repeat;
	background-image: linear-gradient(#279038, #005d30);  
}
    </style>
 
    <p>
      <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
      <!--[if lt IE 9]>
     <![endif]-->
      </head>
      
   
      
       
      
 
   
      
      
  </head>
  <body> 
 
 <div class="wenzi ">
 
 
</div>
 </div>
</p>
 <p>&nbsp;</p>
 <p>&nbsp;</p>
 <p>&nbsp;</p>
  
 
<div style="font-size:33px;margin-top:-42%;margin-left:30px"> 

<strong  >八達通號碼Octopus no.： </strong>	<span >  <?php 

  include("IncDB.php");
 
date_default_timezone_set("Asia/Shanghai");
 	

	error_reporting(0);
$sql="select * from ocl ";
 $result=mysqli_query($link,$sql);
$result=mysqli_fetch_array($result);
$lasttransaction=$result['lasttransaction'];




$tempstr=explode('=',$lasttransaction);
$octopus=substr($tempstr[2],0,-12); 
$ishide=substr($tempstr[3],0,1);

$value=substr($tempstr[1],0,14);
$remainvalue= number_format(($value*0.1),1);
 

echo $octopus;
 
if ($ishide=="1")
{
	$remainvaluestr="";
	
}
else{
	$remainvaluestr="<strong>八達通餘額 Octopus Remaining Value：$".$remainvalue."</strong> ";
	
	
}
 

?></span>
 <br>
 
<?php 

echo $remainvaluestr;

?> 
  
  
  
</div> 

 
 <br>
         <table width=90%    style="margin-top:1px;margin-left:  30px" >

			 
				<tr style="font-size:14px">
<td width="12%" align="left"   ><strong style="color:green; background-color:#fff;border-radius:10px">編號No.</strong></td>
<td width="15" align="left"  ><strong style="color:green; background-color:#fff;border-radius:10px">增值日期Transaction Date Time<strong></td>
 
<td width="20%" align="left"   ><strong style="color:green; background-color:#fff;border-radius:10px">增值金額Amount<strong></td>
<td width="20%" align="left"    ><strong style="color:green; background-color:#fff;border-radius:10px">設備號Device ID<strong></td> 

</tr>
	<hr>


	
	<?php 
	
  
	 
	 error_reporting(0);
$sql="select * from command ";
 $result=mysqli_query($link,$sql);
$result=mysqli_fetch_array($result);
$device=substr($result['device'],2,6);


 
$lasttransaction=explode("----------",$lasttransaction);



$lasttransaction=explode("|",$lasttransaction[3]);
  
$i=1;
 
$a=1;
 
while($lasttransaction[$i] && $a<=4)  //4行即最近四次數據

{
	 
	 if   ($device==strtoupper(dechex($lasttransaction[$i+2])))
	 {
		 $currentdevice="#";
	 }
	 else{
		  $currentdevice='';
	 }
	  
		 
			 
			 $strdate=substr($lasttransaction[$i+1],6,4).'/'.substr($lasttransaction[$i+1],0,5).' '.substr($lasttransaction[$i+1],10,20);
			 
					 echo '
					 
				<tr style="font-size:24px">
				<td width="344" align="left"   > '. $a. $currentdevice.'</td>
				<td width="4311" align="left" >'.  $strdate.'<strong></td>
				<td width="244" align="left" > +$'.number_format($lasttransaction[$i]*0.1,1).'</td>
				<td width="431" align="left" > '.strtoupper(dechex($lasttransaction[$i+2])).'<strong> </td>

				</tr>'; 

 

$i=$a*4+1;
 $a=$a+1;
 
 
}


//echo '<br>';

	 
	 
	 
	   
 
 
	
	 
 
 	
	 	
		?>	 
				 
        </table>



<hr>
 
 
<?php
 
 
 
	
	echo ' <a href="../../index.php" class="btn" style=" left:37%; top:70%; position: absolute; ">結束END</a> ';
 
 
  

?>
 
   
 
 
 
 
 
 <p>&nbsp;</p>
 <p>&nbsp;</p> 
 <p>
  

   <script type="text/javascript" src="js/timecountdown.js"></script>
 </p>
    <script language="javascript" type="text/javascript"> 
// 以下方式直接跳轉
 
// 以下方式定時跳轉
setTimeout("javascript:location.href='../index.php'", 60000); 
     </script>
 
  
</body></html>
