<!doctype html> 
<html lang="en" class="no-js"> 
<head> 
  <meta charset="utf-8" /> 
  <title></title> 
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style.css" />
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
	background-image: url(images/02B.jpg);
	background-repeat: no-repeat;
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
 
</head>  
  <body leftmargin=0 topmargin=0 oncontextmenu='return false' ondragstart='return false' onselectstart='return false' onselect='document.selection.empty()' oncopy='document.selection.empty()' onbeforecopy='return false'>

 <div id="particles">
	<div class="intro">
 
  
  </div>
</div> 
</div>

<div id="particles">
	<div class="intro">
    <br>
    <br>
        <br>
            <br>
                <br>
	 
	  
 
 
 
<?php  


  
											$auth_url = 'http://127.0.0.1/tjt/oclftp/sftpdownload.php';
											 
											$ch = curl_init();
											curl_setopt($ch, CURLOPT_URL, $auth_url);
											curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
											curl_setopt($ch, CURLOPT_CONNECTTIMEOUT,5);
											$response = curl_exec($ch); 
											curl_close($ch); 

 
											 
															//上传，上传不会覆盖文件。无所谓
											 		
										if($response=="success")		//说明下载成功
										{			
 
 							 
										 $auth_url = 'http://127.0.0.1/tjt/oclftp/sftpupload.php';
										  	$ch = curl_init();
											curl_setopt($ch, CURLOPT_URL, $auth_url);
											curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
											curl_setopt($ch, CURLOPT_CONNECTTIMEOUT,5);
											$response = curl_exec($ch); 
											curl_close($ch); 
										}											
											 
 

  
 
  

   ?>
 
 <div class="btn2 " style="font-size:22px" >请稍后……<br>Please wait a moment   </div> 
 
 
 
 
  <script language="javascript" type="text/javascript"> 
// 以下方式直接跳转
 
// 以下方式定时跳转
 setTimeout("javascript:location.href='index.php'", 0); 
</script>
 
 
  
 
<p>&nbsp;</p>
</body> 
</html> 