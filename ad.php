<style type="text/css">
body {
	background-color: #057835;
}
</style>
<a href="index.php"><img src="tjt/images/01.jpg"  width="1070" height="1902" border="0" align="left" /></a>

	  
	   <script src="js/jquery-1.9.1.min.js"></script> 
    <script>
		$(function(){ 
		    $("#btn").bind("click",{btn:$("#btn")},function(evdata){    
		         $.ajax({    
		                type:"POST",    
		                dataType:"json",    
		                url:"data.php",    
		                timeout:80000,     //ajax请求超时时间80秒    
		                data:{time:"50000"}, //40秒后无论结果服务器都返回数据    
		                success:function(data,textStatus){    
		                    //从服务器得到数据，显示数据并继续查询    
		                    if(data.jiejin=="1"){  
window.location.href='index.php';   
		                      $("#msg").append("<br>[1]"); 
		                     evdata.data.btn.click();    
							 
							 
		                    }    
		                 //未从服务器得到数据，继续查询    
		                   else{      
		                    evdata.data.btn.click();    
 
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
	  <input id="btn" type="hidden" value="测试" />  
 

 



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
	 
 <?php 

date_default_timezone_set("PRC");	
 include("IncDB.php");
			


 

 $sql="select * from command   ";
 
$result=   mysqli_query($link,$sql); 
$result = mysqli_fetch_array($result);
$mid=$result['mid'];
$juli=$result['juli'];


 
  $auth_url = 'http://hk04aswirvmuat.eastasia.cloudapp.azure.com/qcsqcs/urlget/geterrorcode.php?mid='.$mid.'&errorcode=0';
  
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $auth_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_TIMEOUT,28);
$response = curl_exec($ch); 
curl_close($ch); 




 $auth_url = 'http://hk04aswirvmuat.eastasia.cloudapp.azure.com/qcsqcs/urlget/getjuli.php?mid='.$mid.'&juli='.$juli;

 
 
 
$ch = curl_init();
 
curl_setopt($ch, CURLOPT_URL, $auth_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_TIMEOUT,28);
 
$response = curl_exec($ch); 
curl_close($ch); 


 $auth_url = 'http://hk04aswirvmuat.eastasia.cloudapp.azure.com/qcsqcs/urlget/getgift.php?mid='.$mid;
 
 
 
$ch = curl_init();
 
curl_setopt($ch, CURLOPT_URL, $auth_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_TIMEOUT,28);
$response = curl_exec($ch); 
curl_close($ch); 

//echo var_dump($response);   
 if (strlen($response)==79)
	 
 
 {	 
	 $sql="update command  set hdjl=0";
	 
	 mysqli_query($link,$sql);
	 
	 
	 
	 	
 $auth_url = 'http://hk04aswirvmuat.eastasia.cloudapp.azure.com/qcsqcs/urlget/getgift.php?mid='.$mid.'&hdjlfw=1';
 
 
 
$ch = curl_init();
 
curl_setopt($ch, CURLOPT_URL, $auth_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT,5); 
curl_setopt($ch, CURLOPT_SSLVERSION, 1);
 curl_setopt($ch, CURLOPT_TIMEOUT,28);
$response = curl_exec($ch); 
curl_close($ch); 



 }









 
if (date("Hi",time())=="1300" || date("Hi",time())=="1600" || date("Hi",time())=="1900"  )
{
	 

//---------------------获取barcode！
  
  $auth_url = "https://uat.ww-fun.club/rvmapi/getBottlePointMapping"; 

//$auth_url = "http://127.0.0.1/curl/curl.php"; 

 
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $auth_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_TIMEOUT,28);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($ch, CURLOPT_SSLVERSION, 1);
 
 
 
 
 
 
$response = curl_exec($ch);
if(curl_errno($ch))
{
	//print curl_error($ch);
}
curl_close($ch); 

 
$response = json_decode($response, true);


   
$response=  $response ['data'];
  
foreach ($response as $value) {
	
		
	 
$sku =  "name";   
$barcode =$value['barcode'];
$point=$value['point'];
     
	 
	 $sql="select *  from  hkcode where code =  '$barcode'  ";
	 $result=mysqli_query($link,$sql);
 
 $it=mysqli_fetch_array($result) ;

 
       if (!$it['code'])
			 
			 {	 
 
 $sql="insert into hkcode (bottlename,code,point )  values ('$sku','$barcode','$point')  " ;
			 mysqli_query($link,$sql);
			 }
 
  
  
  
  if ($point=="5") 
  {
   
	 $sql="select *  from  qcscode where qcscode =  '$barcode'  ";
	 $result=mysqli_query($link,$sql);
 
 $it=mysqli_fetch_array($result) ;

 
       if (!$it['qcscode'])
			 
			 {	 
 
 $sql="insert into qcscode (qcscode )  values ( '$barcode')  " ;
			 mysqli_query($link,$sql);
			 }
  
  }
  
  
  

}
    					   
 
    
  
	
	
}
 			
	

 	
		
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
curl_setopt($ch, CURLOPT_TIMEOUT,28);
  
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
    //print curl_error($ch);
}
curl_close($ch); 
$response = json_decode($response, true);
 
 
 // echo var_dump($response);
 
 
 
 
 
 
  $sql="update user set bencijifen=0,cishu=0,isqcs=0,isother=0,token=0,user=0";
 mysqli_query($link,$sql);  
 
 
?>

 
 







