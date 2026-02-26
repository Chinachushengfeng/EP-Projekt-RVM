<!DOCTYPE html>
<!-- saved from url=(0033)http://www.bootcss.com/p/flat-ui/ -->
<html lang="en" class="dk_fouc has-js"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <title>Flat UI</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Loading Bootstrap -->
    <link href="./Flat UI_files/bootstrap.min.css" rel="stylesheet">
  
    <!-- Loading Flat UI --> 
    <link rel="stylesheet" type="text/css" href="css/style2.css">
    <!-- Loading Flat UI -->
    <link href="./Flat UI_files/flat-ui.css" rel="stylesheet"> 
    <style type="text/css">
    body,td,th {
	font-family: Lato, sans-serif;
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
background-color: #005D30;

			background-repeat: repeat;
			background-image: linear-gradient(#279038, #005d30);
}
    </style>
 
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]>
     <![endif]-->
  </head>  
 </head>
<body>
	  <body leftmargin=0 topmargin=0 oncontextmenu='return false' ondragstart='return false' onselectstart ='return false' onselect='document.selection.empty()' oncopy='document.selection.empty()' onbeforecopy='return false' onmouseup='document.selection.empty()'>
 
 
	
	<img src="background/yichang.png" width="80%" style="margin-left:10%;margin-top:10%"></img>
 	  
     <script type="text/javascript" src="js/timecountdown.js"></script>
 
   <div align="left"  ><a href="../../index.php" class="btn2" style="margin-top:120px;margin-left:450px;position:absolute">結束回收</a> </div>
      
<div align="center" style="margin-top:30px;margin-left:0px;color:#fff;font-size:20px;font-weight:bold">回收編號：<?php 


date_default_timezone_set("PRC");	  
  include("IncDB.php");
     
  $sql="select * from command ";
  $result=mysqli_query($link,$sql);
  $result=mysqli_fetch_array($result);

$mid= strtoupper($result['mid']);
// echo  strtoupper($result['latitude']);

  $errorcode=$_GET['errorcode'];




 if ($errorcode=="consult22005204")
{
$tc="TC_2" ;
}

elseif ($errorcode=="consult12007306")
{
$tc="TC_3" ;
}

elseif ($errorcode=="consult12007321")
{
$tc="TC_4" ;
}

elseif ($errorcode=="consult00000004")
{
$tc="TC_5" ;
}

elseif ($errorcode=="consult00000007")
{
$tc="TC_6" ;
}


 

elseif ($errorcode=="consult00000021")
{
$tc="TC_7" ;
}

elseif ($errorcode=="consultnetproblem")
{
$tc= "TC_8";
}

elseif ($errorcode=="consult00000900")
{
$tc= "TC_9";
}

elseif ($errorcode=="consult12014152")
{
$tc= "TC_10";
}

elseif ($errorcode=="consult12014155")
{
$tc= "TC_11";
}
elseif ($errorcode=="consult12014156")
{
$tc="TC_12" ;
}
elseif ($errorcode=="00000011")
{
$tc= "TC_14";
}
elseif ($errorcode=="22005204")
{
$tc= "TC_15";
}
elseif ($errorcode=="12007306")
{
$tc="TC_16" ;
}
elseif ($errorcode=="12007321")
{
$tc= "TC_17";
}
elseif ($errorcode=="12007700")
{
$tc= "TC_18";
}
elseif ($errorcode=="00000004")
{
$tc= "TC_19";
}

elseif ($errorcode=="00000007")
{
$tc= "TC_20";
}
  
elseif ($errorcode=="00000021")
{
$tc= "TC_21";
}
  
elseif ($errorcode=="createnetproblem")
{				     
$tc= "TC_22";
}
elseif ($errorcode=="00000900")
{
$tc= "TC_23";
}
elseif ($errorcode=="12014152")
{
$tc= "TC_24";
}
elseif ($errorcode=="12014155")
{
$tc= "TC_25";
}
elseif ($errorcode=="12014156")
{
$tc= "TC_26";
}

 
 
 elseif ($errorcode=="12007201")
{
$tc="TC_29" ;
} 
 elseif ($errorcode=="00000004")
{
$tc="TC_30" ;
} 
 elseif ($errorcode=="00000007")
{
$tc="TC_31" ;
} 
 elseif ($errorcode=="00000021")
{
$tc="TC_32" ;
} 
 elseif ($errorcode=="querynetproblem")
{
$tc="TC_33" ;
} 
 elseif ($errorcode=="00000900")
{
$tc="TC_34" ;
} 
 elseif ($errorcode=="12014152")
{
$tc="TC_35" ;
} 

 elseif ($errorcode=="12014155")
{
$tc="TC_36" ;
} 

 elseif ($errorcode=="12014156")
{
$tc="TC_37" ;
} 
 
elseif ($errorcode=="consultnull")
{
$tc="NULL" ;
} 




$str=$mid.$tc.date("YmdHis");


 
echo $str;
 
$sql="select * from command ";
$result=mysqli_query($link,$sql);
$result=mysqli_fetch_array($result);
$alipayid=$result['transactionid'];



 

 // $auth_url = 'http://hk04aswirvmuat.eastasia.cloudapp.azure.com/qcsqcs/urlget/alp.php?transactionid='.$alipayid.'&qcserrorcode='.$str  ;
 
 
 
// $ch = curl_init();
// curl_setopt($ch, CURLOPT_URL, $auth_url);
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// curl_setopt($ch, CURLOPT_CONNECTTIMEOUT,5); 
// $response = curl_exec($ch); 
// curl_close($ch); 
 




               ?></div>
      
 <script language="javascript" type="text/javascript"> 
// 以下方式直接跳转
 
// 以下方式定时跳转
setTimeout("javascript:location.href='../../../tjt/index.php'", 60000); 
</script>
 <embed height="0" width="0" src="../../sound/12.wav" />
</body></html>