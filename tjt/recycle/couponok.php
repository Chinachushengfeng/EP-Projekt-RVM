<!doctype html> 
<html lang="en" class="no-js"> 
<head> 
 
  <title> </title> 
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/style.css" />
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
	background-image: url(../images/14.jpg);
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
  <body leftmargin=0 topmargin=0 oncontextmenu='return false' ondragstart='return false' onselectstart ='return false' onselect='document.selection.empty()' oncopy='document.selection.empty()' onbeforecopy='return false' onmouseup='document.selection.empty()'>
 
 <?php  
 
 
 error_reporting(0);
		date_default_timezone_set("PRC");
 include("IncDB.php");
		
  
		
 $sql="update command  SET   scan=0";

mysqli_query($link,$sql);  
	
  
 $sql="select * from user   ";
 
$result=   mysqli_query($link,$sql); 
$result = mysqli_fetch_array($result);
 
 
 
$cishu=$result['cishu'];
$mid=$result['mid']; 
$user=$result['user'];

$user=str_replace(' ', '%20',$user);  
$isqcs=$result['isqcs'];
$isother=$result['isother'];
 




$coupon=$_GET['coupon'];
$couponid=$_GET['couponid'];


$sql="select * from user ";
$result=mysqli_query($link,$sql);
$result=mysqli_fetch_array($result);


if ($result['couponaid']==$couponid)
{
	$print=$result['couponprinta'];
	$couponpoint=$result['couponapoint'];
	$coupon=$result['coupona'];
}
elseif($result['couponbid']==$couponid)
{
		$print=$result['couponprintb'];
	$couponpoint=$result['couponbpoint'];
$coupon=$result['couponb'];
}
elseif($result['couponcid']==$couponid)
{
		$print=$result['couponprintc'];
	$couponpoint=$result['couponcpoint'];
	$coupon=$result['couponc'];
}
 
if ($result['coupondid']==$couponid)
{
	$print=$result['couponprintd'];
	$couponpoint=$result['coupondpoint'];
	$coupon=$result['coupond'];
}
elseif($result['couponeid']==$couponid)
{
		$print=$result['couponprinte'];
	$couponpoint=$result['couponepoint'];
$coupon=$result['coupone'];
}
elseif($result['couponfid']==$couponid)
{
		$print=$result['couponprintf'];
	$couponpoint=$result['couponfpoint'];
	$coupon=$result['couponf'];
}
 
 
if ($result['coupongid']==$couponid)
{
	$print=$result['couponprintg'];
	$couponpoint=$result['coupongpoint'];
	$coupon=$result['coupong'];
}
elseif($result['couponhid']==$couponid)
{
		$print=$result['couponprinth'];
	$couponpoint=$result['couponhpoint'];
$coupon=$result['couponh'];
}

elseif($result['couponiid']==$couponid)
{
		$print=$result['couponprinti'];
	$couponpoint=$result['couponipoint'];
	$coupon=$result['couponi'];


}
  

 
 
  
 
$token=$result['token'];
 
 
 
 
$data = array('token' => $token, 'earnedpoint' => $result['bencijifen'],'giftid'=>$couponid,'language'=>2);
 $data =  json_encode($data);
 
	$ch = curl_init();   
	  
	curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Content-Length: ' )
);
  
curl_setopt($ch, CURLOPT_URL, 'https://uat.ww-fun.club/rvmapi/redeemonlinereward');
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
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
 
 
 
 $response = $response['data'];
 
 $response=$response['p'];
 
 $p=$response;
  
 $sql="update user set jifen= $p ,bencijifen=0,duihuanhoujifen=0 ";   //更新积分 
 mysqli_query($link,$sql);
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 //--------------------以下是给：API准备的数据。
		
$sql="update user set totalspendpoint = totalspendpoint+25 ";
mysqli_query($link,$sql);


$sql="select *from onlinegifts where giftid='$couponid'  and upddsapi=1";  //查询等待上传的   giftid=couponid
$onlinegifts=mysqli_query($link,$sql);
$onlinegifts=mysqli_fetch_array($onlinegifts);

 
  $dateline=time();
if (!$onlinegifts['giftid'])
{ 
 
				$sql=" insert into onlinegifts (giftid,dateline,user,doup,upddsapi,qty,pointamount ) 
			  	VALUES   ('$couponid',$dateline ,'$user',1,1,1,25 )";

 
 mysqli_query($link,$sql);
 
}
else    
{
  
$sql=" update   onlinegifts set qty=qty+1 where giftid='$couponid' and upddsapi=1 ";

mysqli_query($link,$sql);

}
 
		
		//以下是给我的大数据做提交
		
		
$coupon=str_replace(' ', '',$coupon); 
		
		 // $auth_url = 'http://hk04aswirvmuat.eastasia.cloudapp.azure.com/qcsqcs/urlget/getcoupon.php?mid='.$mid.'&user='.$user.'&couponid='.$couponid.'&coupon='.$coupon;
 
 
 
// $ch = curl_init();
 
// curl_setopt($ch, CURLOPT_URL, $auth_url);
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
// curl_setopt($ch, CURLOPT_CONNECTTIMEOUT,5); 
// curl_setopt($ch, CURLOPT_SSLVERSION, 1);
 
// $response = curl_exec($ch); 
// curl_close($ch); 

//echo var_dump($response);

 


$myfile = fopen("C:/print.txt", "w") or die("Unable to open file!");//这个是在c盘根目录生成文件
 
// foreach($txt as $k=>$v){
  // $b = $b ."[".$k."]=>".$v."\n";
// }
// $txt1 = $_POST;
// foreach($txt1 as $k=>$v){
  // $b = $b ."[".$k."]=>".$v."\n";
// }
 
 
 
 $ref=time().rand(1,100);
   
$b = $print.".web".PHP_EOL."l^********************************".PHP_EOL."l^回收機編號(RID):            ".$mid.PHP_EOL."l^禮品編號(GID):              ".$couponid.
PHP_EOL."l^參考編號(REF):      ". $ref.PHP_EOL."l^列印日期(DATE):".date('y-m-d H:m:s')."".PHP_EOL."l^********************************".
PHP_EOL.'C:\rvm\CouponFooter.jpg';
 

fwrite($myfile, $b);//写入内容,可以写多次哦,不过没啥意义,因为你拼接好字符串,一次写入就行了
fclose($myfile);//关闭该操作


$auth_url = 'http://hk04aswirvmuat.eastasia.cloudapp.azure.com/qcsqcs/urlget/getcoupon.php?mid='.$mid.'&user='.$user.'&couponid='.$couponid.'&coupon='.$coupon.'&ref='.$ref.'&couponimg='.$print.'&couponpoint='.$couponpoint;
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $auth_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT,5); 
curl_setopt($ch, CURLOPT_SSLVERSION, 1);
 
$response = curl_exec($ch); 
curl_close($ch); 


if($print!=="")
{
 
		$sql="update command  SET   print=1";

mysqli_query($link,$sql);  

}
 
		?>

 
 

 

 	
     <script type="text/javascript" src="js/timecountdown.js"></script>
 
 

 <script language="javascript" type="text/javascript"> 
// 以下方式直接跳转
 
// 以下方式定时跳转
setTimeout("javascript:location.href='../../tjt/index.php'", 60000); 
</script>






 <p>&nbsp;</p>
 <p>&nbsp;</p>
 <p>&nbsp;</p>
 <p>&nbsp;</p>
 <p>&nbsp;</p>
 <p>&nbsp;</p>
 <p>&nbsp;</p>
 <p>&nbsp;</p>
 <div align="left" style="margin-left:10%">  





<?php   


if ($cishu==10)
{	


 echo ' &nbsp;&nbsp;&nbsp;&nbsp; <a href="qsh.php?url=thanks"class="btn2" style="margin-left:30%">結束回收</a>';
 
	 
   
}
elseif($cishu<10)

{
	
echo ' <a href="index.php" class="btn2">繼續投放</a> &nbsp;&nbsp;&nbsp;&nbsp; <a href="qsh.php?url=thanks"class="btn2">結束回收</a> 
	';
	
}	
   
   
   
   ?>
   
   
   
  </div>
   
 </div> 
</body> 
</html> 


 

