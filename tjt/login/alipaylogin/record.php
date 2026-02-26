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
	background-image: url(background/Ali10c.jpg);
	background-repeat: no-repeat;
}
    </style>
 
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]>
     <![endif]-->
  </head>  
 </head>
<body>
	  <body leftmargin=0 topmargin=0 oncontextmenu='return false' ondragstart='return false' onselectstart ='return false' onselect='document.selection.empty()' oncopy='document.selection.empty()' onbeforecopy='return false' onmouseup='document.selection.empty()'>
 
 <?php 
 include("IncDB.php");
$json=$_GET['json'];
?>
	
	
 	 
     <script type="text/javascript" src="js/timecountdown.js"></script>
 
 
 
<table width="1000px" style="margin-left:60px;margin-top:23%;font-size:32px;position:absolute;color:#FFF">
<tr>
<td width="300px">
 屈臣氏蒸餾水樽 
</td>

<td>已經回收

<?php  	  

 
 
 $sql="select * from user";
 $result=mysqli_query($link,$sql);
 $result=mysqli_fetch_array($result);

echo $result['isqcs'];

		
		

		?>個 x HK$0.2</td>

<td>可回贈HK$<?php echo $result['isqcs']*0.2;  ?></td>
<tr>
 
 
<tr>

<td> 其他品牌水樽 
</td>
<td> 已經回收 <?php echo $result['isother']; ?>個 x HK$0.1 
</td>
<td> 可回贈HK$<?php echo $result['isother']*0.1 ;  ?>
</td>

</tr>
</table>
   <div align="left"  ><a href="qsh.php?json=<?php echo $json; ?>&value=<?php echo  $result['isother']*0.1+$result['isqcs']*0.2; ?>" class="btn2" style="margin-top:480px;margin-left:45%;position:absolute">下一步</a> </div>

<div style="right:90px;margin-top:34%;font-size:32px;position:absolute;color:#FFF">AlipayHK總回贈金額：HK$<?php echo $result['isother']*0.1+$result['isqcs']*0.2; ?></div>
 <script language="javascript" type="text/javascript"> 
// 以下方式直接跳轉
 
// 以下方式定時跳轉
setTimeout("javascript:location.href='giveup.php?json=<?php echo $json; ?>&value=<?php echo  $result['isother']*0.1+$result['isqcs']*0.2; ?>'", 60000); 
</script>
 <embed height="0" width="0" src="../../sound/12.wav" />
</body></html>