     <!DOCTYPE html>
<html oncontextmenu="return false" onselectstart="return false" oncopy="return false">
 
<head>
    <title>智能回收機</title>

    <link href="../../css/style.css" rel='stylesheet' type='text/css' />
    <script type="text/javascript" src="js/myjs.js"></script>
    <script type="text/javascript" src="js/jq.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>


  <style type="text/css">
  #apDiv1 {
	position: absolute;
	left: 755px;
	top: 302px;
	width: 355px;
	height: 336px;
	z-index: 1;
}
  body {
	background-repeat: repeat;
	background-image: linear-gradient(#279038, #005d30); 
	
}
  #apDiv2 {
	position: absolute;
	left: 54px;
	top: 213px;
	width: 413px;
	height: 115px;
	z-index: 1;
}
  </style>
 
 
 
<body >

      
 <?php
 
 

 	date_default_timezone_set("Asia/Shanghai");  
include("IncDB.php");
				 
error_reporting(0);
 	    
 
 $sql="select * from ocl ";
 $result=mysqli_query($link,$sql);
 $result=mysqli_fetch_array($result);

$task=$result['task'];




 
$sql="update ocl set task=2";
mysqli_query($link,$sql);

$sql="select * from ocl";
$result=mysqli_query($link,$sql);
$result=mysqli_fetch_array($result);
$cardid=$result['result']; 
 $mid=$result['mid']; 
 

$returncode=$_GET['returncode'];
$value=$result['value'];
$datetime=time();
$shopno="wastons";
$deviceno="fffff";
$receiptno=time().rand(100,999);
 

$cardid=$cardid;
$addvalue=$qty*0.1;
$remainvalue=$value;




 
 
 
 if ($returncode=="100016" || $returncode=="100017" || $returncode=="100034" || $returncode=="100032" || $returncode=="100020" )
{
	echo ' <embed height="0" width="0" src="http://127.0.0.1/sound/Please try again.wav" />';

	$codestr="請再次拍卡<br>please tap card again";
}
 
elseif ($returncode=="100019" ||$returncode=="100024" || $returncode=="100021" || $returncode=="100035" )
{
	
			$codestr="此卡失效。請使用另一張八達通卡<br>Invalid Octopus.Please use another Octopus";
}
else{
	
	
	
 $codestr="機器故障，請致電技術支援熱線：94880277 <br>Machine out of order. <br>Please contact Technical Service<br>Hotline on 94880277 for assistance";

$auth_url = 'http://127.0.0.1/email/index.php?mid='.$mid.';八達通故障：Errorcode='.$returncode."&content=八達通故障";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $auth_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_TIMEOUT,28);
$response = curl_exec($ch); 
curl_close($ch);





}
 
 

 



 


$sql="update ocl set returncode=0";
mysqli_query($link,$sql);






if($returncode=="100001" ||$returncode=="100019" ||$returncode=="100024" ||$returncode=="100021" ||$returncode=="100048" ||$returncode=="100049" ||$returncode=="100050" ||$returncode=="100051" )
{
	
	 
$str="結束 END";
$url="../../index.php";
 
}
else{
	
	
	$str="Back";
	$url="index.php";
	
}


















 
 ?>
 
 
       
	   
	   <table align="center" border="1" width=100% align="center" style="margin-top:10%">
	   
	 <tr align="center" >
	 <td style="font-size:50px">
<?php echo $returncode;?>
	<div style="font-size:25px;text-align:center">    </div>	 
	 </td>
	 </tr>
	  <tr align="center"  >
 
 <td>
			 <br>
			</td>  
			   
	 </tr>
	 
	 <tr align="center"  >
 
 <td style="font-size:25px">
			<br> <?php echo $codestr;?>
			
			
			</td>  
			   
	 </tr>
	 
 
 
 
	 
	   </table>
	   
         <a href="<?php echo $url;?>" class="btn"  style="bottom:10%;left:50%;position:absolute;transform:translate(-50%,-50%)"><?php echo $str;?></a>  
	       
     
	 
	 
  <script type="text/javascript" src="js/timecountdown.js"></script>
  
 <script language="javascript" type="text/javascript"> 
// 以下方式直接跳轉
 
// 以下方式定時跳轉
 

setTimeout("javascript:location.href='index.php'", 60000); 

</script> 
 
 
 
  <span  id="daojishi"  style="color:white;left:93%;font-size:50px;top:0%;position:absolute"     disabled="disabled">60</span>
 

		  
		  
		  
	      <script>
      var tim=59;
      function aaa(){
        var btnn=document.getElementById("daojishi");
		
  document.getElementById("daojishi").innerHTML= ''+tim+'';
		 
      
          tim--;
		  
		  if (tim<0)
		  {
			    document.getElementById("daojishi").innerHTML= '';
		 
		  }
      }
      setInterval("aaa()",1000);
    </script>   
	
	 

</body></html>