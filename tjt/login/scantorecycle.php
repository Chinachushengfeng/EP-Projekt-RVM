<!doctype html> 
<html lang="en" class="no-js"> 
<head> 
  <meta charset="gb2312" /> 
  <title>屈臣氏</title> 
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
	background-image: url(
../images/07(TBC).jpg);
	background-repeat: no-repeat;
	background-image: url(../images/07.jpg);
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

 <body leftmargin=0 topmargin=0 oncontextmenu='return false' ondragstart='return false' onselectstart ='return false' onselect='document.selection.empty()' oncopy='document.selection.empty()' onbeforecopy='return false'  >
 <p>&nbsp;</p>
 <p>&nbsp;</p>
 <p>&nbsp;</p>
 <p>&nbsp;</p>
 <p>&nbsp;</p>
 <p>&nbsp;</p>
 <p>&nbsp;</p>
 <p>&nbsp;</p>
 <div align="left" style="margin-left:5%;margin-top:-1%">  <a href="index.php" class="btn2"  >返回</a>
	  
  </div>
	  
	  
	  
	  
	   <script src="js/jquery-1.9.1.min.js"></script> 
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
		                    if(data.success=="1"){  
window.location.href='../recycle/index.php';   
		                      $("#msg").append("<br>[1]"); 
		                     evdata.data.btn.click();    
							 
							 
		                    }    
		                 //未从服务器得到数据，继续查询  

else if(data.success=="5"){  
window.location.href='qrerror.php';   
		                      $("#msg").append("<br>[1]"); 
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
	  <input id="btn" type="hidden" value="测试" />  
  </p> 


 



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
}, 1000);
     </script>
	 
	 
	 
 </div>
 <p>&nbsp;</p>
 
  
<?php 

 
 include("IncDB.php");
 


 $sql="UPDATE user SET coupona='', couponb='', couponc='', coupond='', coupone='', couponf='', coupong='', couponh='', couponi='', 	
 couponapoint='', couponbpoint='', couponcpoint='', coupondpoint='', couponepoint='', couponfpoint='', coupongpoint='', couponhpoint='', couponipoint='',
couponaid='', couponbid='', couponcid='', coupondid='', couponeid='', couponfid='', coupongid='', couponhid='', couponiid='', 
couponprinta='', couponprintb='', couponprintc='', couponprintd='', couponprinte='', couponprintf='', couponprintg='', couponprinth='', couponprinti=''  ";
 mysqli_query($link,$sql);


 $sql="UPDATE command SET json='',  doing=1	";
 mysqli_query($link,$sql);


  $starttime=time();
  
$sql="update user set starttime='$starttime',bencijifen=0,isqcs=0,isother=0,jifen=0";
 mysqli_query($link,$sql);

 
 			//mysqli_query( 'set names utf8');
	  $sql="select  * from  user";  

$result=mysqli_query($link,$sql);

$result=mysqli_fetch_array($result);

 
$auth_url = "https://uat.ww-fun.club/rvmapi/getgreenreward?languageid=2&machineid=".$result['mid'];
              
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
	print curl_error($ch);
}
curl_close($ch); 
$response = json_decode($response, true);

 

$response=  $response ['data']    ; 
//echo var_dump($response);





 



 
$i=array();
$str=array();
$giftpoint=array();

$a=-1;
$couponqty=0;

 

foreach ($response as $value) {
	
	 
	$a=$a+1;
	
	$couponqty=$couponqty+1;
	//<PRINT>https://bit.ly/2VMQqq2</PRINT>优惠券
	     
		 
		 
		 
	if(strtolower(substr($value['name'],7,12))=="print")
	{
 
		$i[$a]= substr(strstr($value['name'],"\u003c/PRINT\u003e"),8);  
  
//	echo '<br>'.$i[$a];
	
	}
	
else
{
	
	$i[$a]= $value['name'];
	
}
		 
 
$couponprint[$a]= substr($value['name'],0,strrpos($value['name'],"</PRINT>"));  
$couponprint[$a]=substr($couponprint[$a],7);  

$str[$a]=$value['giftId'];
$giftpoint[$a]=$value['point'];
    
	
	
	
 
 
}


$couponshuzu = array(
  array(
    'id' => $str[0],
    'point' => $giftpoint[0],
    'name' =>$i[0],
  ),
  array(
    'id' => $str[1],
    'point' => $giftpoint[1],
    'name' =>$i[1],
  ),
  array(
 'id' => $str[2],
    'point' => $giftpoint[2],
    'name' =>$i[2],
  ),
    array(
    'id' => $str[3],
    'point' => $giftpoint[3],
    'name' =>$i[3],
  ),
  array(
  'id' => $str[4],
    'point' => $giftpoint[4],
    'name' =>$i[4],
  ),
  array(
 'id' => $str[5],
    'point' => $giftpoint[5],
    'name' =>$i[5],
  ),
    array(
 'id' => $str[6],
    'point' => $giftpoint[6],
    'name' =>$i[6],
  ),
  array(
    'id' => $str[7],
    'point' => $giftpoint[7],
    'name' =>$i[7],
  ),
  array(
     'id' => $str[8],
    'point' => $giftpoint[8],
    'name' =>$i[8],
  )
  
   
  
);

echo '<br>';
echo '<br>';
 
$last_names = array_column($couponshuzu,'point');
$last_names1 = array_column($couponshuzu,'id');



array_multisort($last_names,SORT_DESC,$last_names1,SORT_DESC,$couponshuzu);
echo '<br>';
echo '<br>';

echo var_dump($couponshuzu);




 
   
$sql="update user set couponqty = '$couponqty'" ;
 mysqli_query($link,$sql);
 
   
   
 
   $value="";
   
   $a=0;
foreach ($couponshuzu as $value) {
	
	 
 
	$couponqty=$couponqty+1;
	//<PRINT>https://bit.ly/2VMQqq2</PRINT>优惠券
	     
		 
		 
		 
	if(strtolower(substr($value['name'],1,5))=="print")
	{
 
		$i[$a]= substr(strstr($value['name'],"</PRINT>"),8);  
  
	}
else
{
	
	$i[$a]= $value['name'];
	
}
		 
 
$couponprint[$a]= substr($value['name'],0,strrpos($value['name'],"</PRINT>"));  
$couponprint[$a]=substr($couponprint[$a],7);  

$str[$a]=$value['id'];
$giftpoint[$a]=$value['point'];
    
 
	
 echo '<br>';
 
 echo $str[$a];
  	$a=$a+1;
}


	 

  //echo '<p><br>'; 
 // echo $i[0];
 //echo $str[0];
// $sql="update user set coupona='$i[0]',couponapoint='$giftpoint[0]',  couponaid='$str[0]',couponbpoint='',couponb='',couponcpoint='', couponc='',couponbid='',couponcid='' ";
// mysql_query($sql);
// $sql="update user set coupona='$i[0]',couponb='$i[1]', couponaid=$str[0],   couponbid=$str[1],couponc='',couponcid='',couponapoint='$giftpoint[0]',couponbpoint='$giftpoint[1]',couponcpoint='', ";
// mysql_query($sql);
// $sql="update user set coupona='$i[0]',couponapoint='$giftpoint[0]',couponaid=$str[0],couponbpoint='$giftpoint[1]', couponb='$i[1]', couponbid=$str[1],couponc='$i[2]' ,   couponcpoint='$giftpoint[2]',  couponcid=$str[2]";
// mysql_query($sql);


//echo "<br>111".var_dump($i[0]);
 
 
 
// echo '<br>'.$i[0];
$sql="update user set coupona='$i[0]',  couponaid=$str[0], couponapoint='$giftpoint[0]', couponprinta='$couponprint[0]', couponb='$i[1]', couponbid=$str[1] , couponbpoint='$giftpoint[1]',couponprintb='$couponprint[1]',couponcid='$str[2]' ,couponc='$i[2]',couponcpoint='$giftpoint[2]',couponprintc='$couponprint[2]'
,coupondid='$str[3]' ,coupond='$i[3]',coupondpoint='$giftpoint[3]',couponprintd='$couponprint[3]'
,couponeid='$str[4]' ,coupone='$i[4]',couponepoint='$giftpoint[4]',couponprinte='$couponprint[4]'
,couponfid='$str[5]' ,couponf='$i[5]',couponfpoint='$giftpoint[5]',couponprintf='$couponprint[5]'
,coupongid='$str[6]' ,coupong='$i[6]',coupongpoint='$giftpoint[6]',couponprintg='$couponprint[6]'
,couponhid='$str[7]' ,couponh='$i[7]',couponhpoint='$giftpoint[7]',couponprinth='$couponprint[7]'
,couponiid='$str[8]' ,couponi='$i[8]',couponipoint='$giftpoint[8]',couponprinti='$couponprint[8]' 
 ";
  mysqli_query($link,$sql);  
//	 $sql="UPDATE command SET qcsbottle= $i[0], otherbottle= $i[1] ";
 
 //mysql_query($sql); 
  
   

?>
	  <script type="text/javascript" src="js/timecountdown.js"></script>
 
 

 <script language="javascript" type="text/javascript"> 
// 以下方式直接跳转
 
// 以下方式定时跳转
setTimeout("javascript:location.href='../../tjt/index.php'",60000); 
</script>
 
 <p>&nbsp;</p>
 <p>&nbsp;</p>
 <p>&nbsp;</p>
 <p>&nbsp;</p>
 <p>&nbsp;</p>
</body> 
</html> 