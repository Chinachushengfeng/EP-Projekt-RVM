<?php
$t1 = microtime(true);
 


 
$link=mysqli_connect('127.0.0.1','root','chushengfeng123'); 

 //mysqli_query($link,'set names utf8');
if(!$link) 
{ 
die("<center>³ö´íÀ²222:1!</center>"); 
} 
if(!mysqli_select_db($link,'qcs')) 
{ 
die("<center>³ö´íÀ²333:2!</center>"); 
} 
 

 
	
	

 
 
// $img1  =  file_get_contents('php://input');
 
  //echo $img1;
  
 //$img1=json_decode($img1,true);

  
     
//  $img=$img1['image'];
  
 
  //$img=base64_decode($img[0]);
   
   
 
 $img  =  file_get_contents('c:/rvm/1.jpg');
 
 
   
$ch = curl_init();

 
 									  
 curl_setopt($ch, CURLOPT_URL, 'http://127.0.0.1:24401?threshold=0.2');
  
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS,  $img );
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



 //echo $response;


$response = json_decode($response, true);
 
 
 
  $i=0;
while ($response['results'][$i])
{
	
if(	$response['results'][$i]['x1']>0.40 && $response['results'][$i]['x1']<0.6)

{

$confidence= $response['results'][$i]['confidence'] *100;
 
 $x1= number_format ($response['results'][$i]['x1'],8) ;
 
$y1= number_format($response['results'][$i]['y1'],8) ;
 
 $x2= number_format($response['results'][$i]['x2'],8) ;
 $y2=number_format ($response['results'][$i]['y2'],8) ;
 

 
 $width=$x2-$x1;

$height=$y2-$y1;


  echo $confidence ;
 
  
 echo "<br>";
 echo $x1;
  
  echo "<br>";
 echo $y1;
  
  echo "<br>";
  echo $x2;
  
  echo "<br>";
  echo $y2;

 

 echo "<br>";
  echo "<br> ";
  echo $width;

  echo "<br>";
  echo $height; 

  
 
 //echo '<br>';
 
 
 $weizhi1=  100*$x1;
 $weizhi2=100-100*$x2;

$absweizhichazhi=abs($weizhi1-$weizhi2);
$ratevalue=1.6;  //设定值

$zhixindu=0;   //设定值
$rate= $height/$width;

 echo '<br>';
 echo 'weizhi1='.$weizhi1;
  echo '<br>';
  echo 'weizhi2='.$weizhi2;
   echo '<br>';
    echo 'weizhi左右绝对差值='.$absweizhichazhi ;
  echo '<br>';
   echo "<br>";
  echo "width:x2-x1=".($x2-$x1);
  echo "<br>";
 echo "height:y2-y1=".$height;
  echo "<br>";
 echo "当前图片rate=".$rate;
  echo "<br>";
  echo "barcodeexist=".$barcode;
  echo "<br>"."设定的ratevalue=".$ratevalue;
  echo "<br>"."设定的置信度=".$zhixindu;
echo "<br>"."y1=".$y1;
 


if($confidence  > $zhixindu  &&  0.9<= $rate && $rate<=$ratevalue && $absweizhichazhi <=3 )
	
	{
		 
 
  
		
//	echo	'<div style="margin-left:40%;margin-top:25%">Successful 识别成功 -> 正在回收'; 
//$myfile = fopen("c:/1/1.txt", "w") or die("Unable to open file!");
//$txt = "1"; //1成功
//fwrite($myfile, $txt); 
//fclose($myfile);
//
echo "yes";
	 
	  // $t2 = microtime(true);
   // echo '耗时'.round($t2-$t1,3).'秒';
	// exit;
	
	exit;
	
	}
else
	
	{
		
//	echo	'<div style="margin-left:40%;margin-top:25%">Fail 识别失败 Or 没有瓶子 -> 退出瓶子'; 


echo "no";


 $sql="update command set recognitionstatus =12";
	mysqli_query($link,$sql);
	exit;

	}
	
}

 
 $i=$i+1;
 
 }
 
 
	 echo "no";
	
 $sql="update command set recognitionstatus =12";
	mysqli_query($link,$sql);
 
 
?>