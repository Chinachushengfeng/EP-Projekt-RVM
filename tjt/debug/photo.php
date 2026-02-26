<!DOCTYPE html>
<html lang="en" oncontextmenu="return false" onselectstart="return false" oncopy="return false">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>  RVM</title> 
    <link rel="stylesheet" type="text/css" href="./css/debug.css"> 
    <script type="text/javascript" src="./js/myjs.js"></script>
 
	
</head>
<style type="text/css">
#apDiv1 {
	position: absolute;
	left: 691px;
	top: 1340px;
	width: 95px;
	height: 344px;
	z-index: 1;
}
body,td,th {
	font-family: Lato, sans-serif;
}
body {
	background-image :url(img/bg.jpg);
	background-repeat: repeat;
	font-family: "Arial Black", Gadget, sans-serif;
}
#apDiv2 {
	position: absolute;
	left: 34px;
	top: 262px;
	width: 135px;
	height: 305px;
	z-index: 2;
}

#apDiv3 {
	margin-top:550px;
 margin-left:-1121px ;
	
	
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

a:link{text-decoration: none;color: #004607}

a:active{text-decoration:blink}

a:hover{text-decoration:underline;color:  #004607}

a:visited{text-decoration: none;color:  #004607}

</style> 
<body> 
 <br><br><br><br> 
    <!-- 調試頁面 -->
	 
  

	  <img src='img/video.png' width=100% style="margin-top:-95px;margin-left:-8px;position:absolute;z-index:-1"></img><!-- 輪播圖 -->
	
	
	
 	<br><br><br><br><br><br>
  	<br><br><br><br><br><br> 	
	<br><br><br><br><br><br>
	
	
                <?php 
			 
			 
			 include('IncDB.php');
	
	
	$sql="update command set command='3'";
	mysqli_query($link,$sql);
			 
		 
			 
			 
		echo '<div align="center">拍照時間：'.date('Y-m-d H:i:s',fileatime('remote/1.jpg')).'</div>';
		    
  ?>
				
				 
				</div>
			 <br><br>
				<div align="center">
 <img  src="remote/1.jpg" width=60%  > </img>
 
 
 
				</div>
		<div style="margin-left:20px;font-size:40px"><a href="index.html">  <-BACK </a></div>
		 
</body>

</html>