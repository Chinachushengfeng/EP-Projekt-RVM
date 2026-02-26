
<!DOCTYPE html><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <title>屈臣氏</title>
  
    <!-- Loading Bootstrap -->
    <link href="./Flat UI_files/bootstrap.min.css" rel="stylesheet">
<link href="../css/style.css" rel="stylesheet">
    <!-- Loading Flat UI --> 
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
		background-repeat: repeat;
	background-image: linear-gradient(#279038, #005d30);  
}
    </style>
 
    <p>
      <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
      <!--[if lt IE 9]>
     <![endif]-->
      </head>
      
   
      
       
      
  <body leftmargin=0 topmargin=0 oncontextmenu='return false' ondragstart='return false' onselectstart ='return false' onselect='document.selection.empty()' oncopy='document.selection.empty()' onbeforecopy='return false' onmouseup='document.selection.empty()'>  
 
    <?php 

  include("IncDB.php");
 
date_default_timezone_set("Asia/Shanghai");
 
 $sql="update ocl set task=2,cardid=0"; //清空ocl
 mysqli_query($link,$sql);
  
  
  $sql="select * from command ";
 $result=mysqli_query($link,$sql);
$result=mysqli_fetch_array($result);
$ishide=$result['ishide'];
 $mid=$result['mid'];
$userscan=$result['userscan'];
$remainvalue=$result['uservalue'];

//echo   $userscan;

$ishide=$result['ishide'];

if ($ishide=="1")
{
	$remainvaluestr="";
	
}
else{
	$remainvaluestr="";
	
	//$remainvaluestr="<strong>八達通餘額 Octopus Remaining Value: $". number_format(($remainvalue*0.1),1) ."</strong> ";
	
	
}
 

?>
      
      
  </head>
  <body> 
 
 <div class="wenzi ">
 
 
</div>
 </div>
</p>
 <p>&nbsp;</p>
 <p>&nbsp;</p>
 <p>&nbsp;</p>
  
 
<div style="font-size:33px;margin-top:-42%;margin-left:30px"> 

<span>八達通號碼 Octopus no.<?php echo   $userscan; ?></span>	




 <br>
 
 
 
 
 
 <span   style="top:27%;text-align:center;position:absolute;width:95%;font-size:28px">
<?php 

echo $remainvaluestr ;

?> 
  </span>
  
  
</div> 

 
 <br>
        
 
	
	<?php 
	
 
 
 $data=array();
 $data["cardid"]=$userscan;
 
$data=json_encode(encrypt($data));
 
 

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'http://188.125.156.176:8080/rvm/public/urlget/octsearch.php'); 
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
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

 //echo $response;
 
 if(curl_exec($ch) === false  )
{
	
 
print curl_error($ch);

exit;

} 
	
	 	
	 $i=0;
	$response=decrypt($response);
 
	$data=json_decode($response,true);
	  //  var_dump($data);
				
				
		$incompletetotalamount=0;
		
 while(isset($data[$i]))
 {
	  if($data[$i]['mid']==$mid){
				$samemid="#";
	  }
	  else{
		  $samemid="";
	  }
			
			
			if ($data[$i]['status']==2)
			{
				$status='<strong style="color:green; background-color:yellow;border-radius:10px">Incomplete</strong>';
				$incomplete=1;
			}
			elseif($data[$i]['status']==0)  //0是中斷數據
			{
					$status='<strong style="color:green; background-color:yellow;border-radius:10px">Incomplete</strong>';
					$incomplete=1;
		}
			else{
				
				$status="Complete";
				 
			}
	 
	 
 if($data[$i]['status']==2 || $data[$i]['status']==0)
 {
	 
	 $incompletetotalamount=$data[$i]['amount']+ $incompletetotalamount;
	 	 
 }
	 
 
	
	 $i=$i+1;
	
	
 }
 
 $sql="update ocl set qty='$incompletetotalamount'";
 mysqli_query($link,$sql);
 
 
 if($i==0)
 {

 
	 echo '<div   style="font-size:40px;top:40%;left:43%;position:absolute">無數據</div> ';  
	 
	
 }
	
	
	

 function encrypt($id){
    $id=serialize($id);
		$key=file_get_contents("../../SECRET-AES-256/secret.txt");
   
    $data['iv']=base64_encode(substr($key,0,16));
    $data['value']=openssl_encrypt($id, 'AES-256-CBC',$key,0,base64_decode($data['iv']));
    $encrypt=base64_encode(json_encode($data));
    return $encrypt;
}



function decrypt($encrypt)
{
   	$key=file_get_contents("../../SECRET-AES-256/secret.txt");
    $encrypt = json_decode(base64_decode($encrypt), true);
    $iv = base64_decode($encrypt['iv']);
    $decrypt = openssl_decrypt($encrypt['value'], 'AES-256-CBC', $key, 0, $iv);
    $id = unserialize($decrypt);
    if($id){
        return $id;
    }else{
        return 0;
    }
}
 
 
 	
	 	
		?>	 
				 
        </table>


<hr>
 	 
 
<?php
 
 
if(isset($incomplete) && $incomplete==1)
{
	
	echo '<span style="top:34%;text-align:center;position:absolute;width:100%;font-size:28px"><strong>您有一筆未領取的回贈 You have an uncollected rebate：$'. number_format($incompletetotalamount*0.1,1) .'</strong></span>';
	echo ' <a href="../index.php" class="btn" style=" left:3%; bottom:5%; position: absolute; ">結束 end</a> 
   <a href="incomplete/index.php" class="btn" style=" right:3%; bottom:5%; position: absolute; ">進入增值 Go Rebate</a>  ';
 
 echo '<embed height="0" width="0" src="http://127.0.0.1/sound/You have an uncollected rebate.wav" />';
 
}

else
{
	
	
	echo ' <a href="index.php" class="btn2" style=" left:43%; top:70%; position: absolute; "> 
 
 返回 </a> ';
 
 
 
 
}


?>
 
 
 
 
 
 <p>&nbsp;</p>
 <p>&nbsp;</p> 
 <p>
  	<hr style="margin-top:10%">
		
		  

   <script type="text/javascript" src="js/timecountdown.js"></script>
 </p>
    <script language="javascript" type="text/javascript"> 
// 以下方式直接跳轉
 
// 以下方式定時跳轉
  setTimeout("javascript:location.href='../index.php'", 60000); 
     </script>
 
  
</body></html>
