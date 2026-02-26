<!DOCTYPE html> <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <title>Flat UI</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/style.css" />
    <!-- Loading Bootstrap -->  
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
    body {
	background-repeat: no-repeat;
 
	background-image: url(../images/error03cR1.jpg);
}
    </style>

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]> 
    <![endif]-->
  </head>
  <body>
  
<body leftmargin=0 topmargin=0 oncontextmenu='return false' ondragstart='return false' onselectstart ='return false' onselect='document.selection.empty()' oncopy='document.selection.empty()' onbeforecopy='return false' onmouseup='document.selection.empty()'>

   <?php


	  
 include("IncDB.php");
  
  
$sql="select * from user ";
$result=  mysqli_query($link,$sql);
$result=mysqli_fetch_array($result);
 		
$mid=$result['mid']; 
 
  
 
 	$sql="update command set command = 0,scan=0,doing=1";
 mysqli_query($link,$sql);
			 
 
  
 
 $auth_url = 'http://hk04aswirvmuat.eastasia.cloudapp.azure.com/qcsqcs/urlget/geterrorcode.php?mid='.$mid.'&errorcode=01';
 
 


$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $auth_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT,5);
$response = curl_exec($ch); 
curl_close($ch); 

 ?>   
   
  </head>
  <body>
  </p> 
 
 <p>&nbsp;</p>
 <p>&nbsp;</p>
 <p>&nbsp;</p>
 
  
 <p>&nbsp;</p>
 <p>&nbsp;</p>
 <p>&nbsp;</p>
  <p>&nbsp;</p>
 <p>&nbsp;</p>
 <p>&nbsp;</p>
    
 
      <script src="jquery-1.9.1.min.js"></script> 

 
 
     <script>
		$(function(){ 
		    $("#btn").bind("click",{btn:$("#btn")},function(evdata){    
		         $.ajax({    
		                type:"POST",    
		                dataType:"json",    
		                url:"data.php",    
		                timeout:8000,     //ajax请求超时时间80秒    
		                data:{time:"50000"}, //40秒后无论结果服务器都返回数据    
		                success:function(data,textStatus){    
		                    //从服务器得到数据，显示数据并继续查询    
		              


  					 if(data.success=="5"){   
 
                  
 
				window.location.href='../index.php';   
		                       $("#msg").append("<br>[5]"); 
   
		                    evdata.data.btn.click(); 

		                    }
							
							 
							 
							
                    else{      
		                    evdata.data.btn.click();    
   				    $("#msg").append("<br>[0]"); 
		                    }    

		                },    
		             //Ajax请求超时，继续查询    
		             error:function(XMLHttpRequest,textStatus,errorThrown){    
		                     if(textStatus=="timeout"){    
		                         $("#msg").append("<br>[超时]");    
		                         evdata.data.btn.click();    
		                     }    
		             }    
		                    
		            });    
		    });    
		        
		});  
	</script>
	
 
	
	
	
  </head>
  <body>
  </p>
 
 
      <script src="jquery-1.9.1.min.js"></script> 
 

 
 <script type="text/javascript" src="js/timecountdown.js"></script>
 
  <script type="text/javascript">
// 两秒后模拟点击
setTimeout(function() {
// IE
if(document.all) {
document.getElementById("btn").click();
}
// 其它浏览器
else {
var e = document.createEvent("MouseEvents");
e.initEvent("click", true, true);
document.getElementById("btn").dispatchEvent(e);
}
}, 2000);
     </script> 
   <input id="btn" type="hidden" value="测试" />  
	 
	  
	
 	<?php 
date_default_timezone_set("PRC");	  
  
		// 以下是传给自己的大数据监控统计平台
  // 以下是传给自己的大数据监控统计平台
 
		
		 
  
  
$sql="select * from user ";
$result=  mysqli_query($link,$sql);
$result=mysqli_fetch_array($result);
//$huodao=$comresult['hdjl'];
//$rongliang=$comresult['rongliang'];

 		
$mid=$result['mid']; 
$user=$result['user'];

$user=str_replace(' ', '%20',$user); 
 
 
 
 
$isqcs=$result['isqcs'];
$isother=$result['isother'];
$totalquantity=$result['cishu'];
$nowquantity=$result['cishu'];
$zongjifen=$result['jifen'];
$zengjiadejifen=$result['bencijifen'];


 
 
 
$sql="select * from command ";
$comresult=  mysqli_query($link,$sql);
$comresult=mysqli_fetch_array($comresult);
$huodao=$comresult['hdjl'];
$rongliang=$comresult['rongliang'];

 
 

$auth_url = 'http://hk04aswirvmuat.eastasia.cloudapp.azure.com/qcsqcs/urlget/getdataback.php?mid='.$mid.'&user='.$user.'&isqcs='.$isqcs.'&isother='.$isother.'&totalquantity='.$totalquantity.'&nowquantity='.$nowquantity.'&zongjifen='.$zongjifen.'&zengjiadejifen='.$zengjiadejifen.'&huodao='.$huodao.'&rongliang='.$rongliang;
 



$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $auth_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT,5);
$response = curl_exec($ch); 
curl_close($ch); 

 
 
 

 
 
 
 
//以下： 传给滴滴赏api 的  start-----------------------------------------------------------
//---------------------------------------------------------------------------------------




 $sql="select * from user   ";
 
$result=   mysqli_query($link,$sql); 
$result = mysqli_fetch_array($result);
$qcsbottle=$result['qcsbottle'];
$otherbottle=$result['otherbottle'];

		
$token=$result['token'];
 
$machineid=$result['mid'];
 
$starttime=json_decode($result['starttime'],true);
$endtime=time();
$totalearnedpoint=json_decode($result['totalearnedpoint'],true);
$totalspendpoint=json_decode($result['totalspendpoint'],true);
$outstandingpoint=json_decode($result['bencijifen'],true);  //其实就是bencijifen
$pointamount=json_decode($result['pointamount'],true);
$alipayamount=json_decode($result['alipayamount'],true);
$rewardsku=json_decode($result['rewardsku'],true);
$rewardqty=json_decode($result['rewardqty'],true);
$rewardpointamount=json_decode($result['rewardpointamount'],true);
$onlinegiftid=json_decode($result['onlinegiftid'],true);
$onlinegiftqty=json_decode($result['onlinegiftqty'],true);
 
  
$dds['membertype']=0;
$dds['languageId']=2;
$dds['token']=$token;
$dds['machineId']=$machineid;
//$dds['location']=;
//$dds['coordinate']="879";
 $dds['starttime']= date('Y-m-d\TH:i:s.0000\Z',$starttime); 
 $dds['endtime']=date('Y-m-d\TH:i:s.0000\Z', time());
 

 

$dds['totalearnedpoint']=$totalearnedpoint;

$sql="update user set totalearnedpoint =0";
mysqli_query($link,$sql);



$dds['totalspendpoint']=$totalspendpoint;
$sql="update user set totalspendpoint =0";
mysqli_query($link,$sql);

$dds['outstandingpoint']=$outstandingpoint;   //其实就是bencijifen
$dds['alipayamount']="0"; 
 			 
								 //recycleinfo  list<bottle> 回收数据
									 
									$sql="select * from  getbarcode where upddsapi=1   ";		  // 
										
									$bottleinformation =   mysqli_query($link,$sql); 

			 	$dds['recycleinfo'] = array();

									while(	$thebottleinformation=mysqli_fetch_array($bottleinformation))
										
										{     //查询未上传的数据 
				 
									  $fileinfo['bottlesku'] = $thebottleinformation['bottlename'] ;
										$fileinfo['qty'] =$thebottleinformation['qty'];
										
										if ($thebottleinformation['isqcs']==1)
										{
											$bottlepoint="5";
											
										}
										else
										{
											$bottlepoint="1";
										}
										$fileinfo['pointamount'] = $bottlepoint;
										$fileinfo['barcode'] =$thebottleinformation['barcode'];
										
										$fileinfo['alipayamount'] = 0;
										
									  array_push($dds['recycleinfo'], $fileinfo);

									}
					 	 
	
									$sql="update getbarcode set upddsapi=0 ";
									mysqli_query($link,$sql);
									
 // --------------------------------------------------onsitereward
									$sql="select * from  onsitereward where upddsapi=1   ";		  // 
										
									$onsitereward =   mysqli_query($link,$sql); 

			  
									while(	$theonsitereward=mysqli_fetch_array($onsitereward))
										
										{     //查询未上传的数据 
								 
									 $rewardsku=	$theonsitereward['rewardsku'] ;
									  $fileinfoonsitereward['rewardsku'] = $rewardsku; 
									 
										$fileinfoonsitereward['qty'] =$theonsitereward['qty'];
										
										 
										$fileinfoonsitereward['pointamount'] = $theonsitereward['pointamount'];
										
									 	if ($theonsitereward['upddsapi'])
										{
											
											$dds['onsiterewards'] = array(); 
									  array_push($dds['onsiterewards'], $fileinfoonsitereward);
										}
									}
									
									$sql="update onsitereward set upddsapi=0 ";
									mysqli_query($link,$sql);
									
								//----------------------------------------------------onlinegifts	
									
					 	 		$sql="select * from  onlinegifts where upddsapi=1   ";		  // 
										
									$onlinegifts =   mysqli_query($link,$sql); 

			  

									while(	$theonlineGifts=mysqli_fetch_array($onlinegifts))
										
										{     //查询未上传的数据 
								 
									$fileinfoonlinegifts['giftid']  =	$theonlineGifts['giftid'] ;
								 
										$fileinfoonlinegifts['qty'] =$theonlineGifts['qty'];
										
										 
										$fileinfoonlinegifts['pointamount'] = $theonlineGifts['pointamount'];
										
									 
										
										
										
										if ($theonlineGifts['upddsapi'])
										{	$dds['onlineGifts'] = array();
									  array_push($dds['onlineGifts'], $fileinfoonlinegifts);
										}



									}
									
									$sql="update onlineGifts set upddsapi=0 ";
									mysqli_query($link,$sql);
									





									//$res['bottlesku']="280ml watsons water bottle";
								 
									 
										 
									  
								 

  $dds=json_encode($dds);
 
 
 
// echo $dds;
 
 


$ch = curl_init();
 

 curl_setopt($ch, CURLOPT_URL, 'https://uat.ww-fun.club/rvmapi/uploaddata');
  
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $dds);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT,5);
  
  curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json; charset=utf-8',
                )
        );
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($ch, CURLOPT_SSLVERSION, 1);
$response = curl_exec($ch);



if(curl_errno($ch))
{
    print curl_error($ch);
}
curl_close($ch); 
$response = json_decode($response, true);
 
 
//echo var_dump($response);
 
 
 
 
  $sql="update user set bencijifen=0,cishu=0,isqcs=0,isother=0 ";
 mysqli_query($link,$sql);  
  
 
 
 
 
 
?>
</body></html>