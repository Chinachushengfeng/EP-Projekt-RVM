 
<link rel="stylesheet" href="css/style.css">
         <link rel="stylesheet" href="recycle/css/bootstrap.min.css"> 
        <link rel="stylesheet" href="recycle/css/fakeloader.css">
        
        <meta charset="utf-8" http-equiv="refresh" content="1;url=<?php


 $request=$_GET['request'];
 
 if ($request=="download")
 {
	 echo "downfile.php"  ;
 }
 elseif ($request=="upload"){
	 
		 echo "index.php" ;
		 
	
} 
		
		?>">
    <script src="recycle/jquery-1.9.1.min.js"></script> 
        <script src="recycle/js/jquery.min.js"></script>
        <script src="recycle/js/fakeloader.min.js"></script>
        
<style type="text/css">
body {
		background-repeat: repeat;
	background-image: linear-gradient(#279038, #005d30);  
}
</style>
</head>

 <body leftmargin=0 topmargin=0 oncontextmenu='return false' ondragstart='return false' onselectstart='return false' onselect='document.selection.empty()' oncopy='document.selection.empty()' onbeforecopy='return false'>


   <div class="fakeloader" style="margin-top:300px;margin-left:0%"></div>

     
 
        <script>
            $(document).ready(function(){
                $(".fakeloader").fakeLoader({
                    timeToHide:51200,
              
                    spinner:"spinner2"
                });
            });
        </script>
  <p> 
   
    
  </head>
  <body>
   
 </p>  
 

 <script type="text/javascript" src="js/timecountdown.js"></script>
 
 <?php 
 	date_default_timezone_set("PRC");
		include("IncDB.php");

 error_reporting(0);
 	$b =  PHP_EOL .PHP_EOL .date( "Y/m/d H:i:s",time()).","."Connect Sever Start";    //PHP_EOL
				file_put_contents("../ocl/ocl/ocleventlog.txt", $b , FILE_APPEND);



 				date_default_timezone_set("PRC");

 $request=$_GET['request'];
 
 if ($request=="download")
 
 {
 
 
			 

   
   
  
											$auth_url = 'http://127.0.0.1/tjt/oclftp/sftpdownload.php';
											 
											$ch = curl_init();
											curl_setopt($ch, CURLOPT_URL, $auth_url);
											curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
											curl_setopt($ch, CURLOPT_TIMEOUT,28);
											 $response = curl_exec($ch); 
										

											if(curl_errno($ch))
												{
													
											 $sql="update ocl set downloadcomplete=0 ";
											mysqli_query($link,$sql);		
													
												//print curl_error($ch);
	 echo 'Timeout…Restart';
											
														
			 	//$b =  PHP_EOL .date( "Y/m/d H:i:s",time()).","."Download Fail".",Disconnect "  ;    //PHP_EOL
			 	//file_put_contents("../ocl/ocl/ocleventlog.txt", $b , FILE_APPEND);
  
  
  
  
												}
											 
										 curl_close($ch); 
										 
										 
									//	$response = json_decode($response,true);		//上传，上传不会覆盖文件。无所谓
							 
											//echo $response;
  
								 
											 
 

 }
 elseif ($request=="upload")
 {
	  
								


								
									$b =  PHP_EOL .date( "Y/m/d H:i:s",time()).","."Beginning To Upload"  ;    //PHP_EOL
									file_put_contents("../ocl/ocl/ocleventlog.txt", $b , FILE_APPEND);


 			 
										 $auth_url = 'http://127.0.0.1/tjt/oclftp/sftpupload.php';
										  	$ch = curl_init();
											curl_setopt($ch, CURLOPT_URL, $auth_url);
											curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
											curl_setopt($ch, CURLOPT_TIMEOUT,28);
											 $response = curl_exec($ch); 
											curl_close($ch); 
											
									 

 
								 
											 
											   
														
	 
										 
										 

							//	$b =  PHP_EOL .date( "Y/m/d H:i:s",time()).","."Now Restart"  ;    //PHP_EOL
							//	file_put_contents("C:\Users\Administrator\Desktop\ocleventlog.txt", $b , FILE_APPEND);
 
				   
									 
										
 }
	 
  

   ?>
   
 
  
<div style="text-align:center;font-size:32px;margin-top:45%" ><strong>系統維護 System Maintenance…</strong> <div >
 
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
 
<p>
    
      
    <input id="btn" type="hidden" value="测试" />
</p>  
