
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
	background-image: url(../images/04.jpg);
	background-repeat: no-repeat;
}
    </style>
 
    <p>
      <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
      <!--[if lt IE 9]>
     <![endif]-->
      </head>
      
   
      
       
      
<body leftmargin=0 topmargin=0 oncontextmenu='return false' ondragstart='return false' onselectstart ='return false' onselect='document.selection.empty()' oncopy='document.selection.empty()' onbeforecopy='return false' onmouseup='document.selection.empty()'>
 
   
      
      
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

<strong  > Octopus no.: </strong>	<span >  <?php 

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
echo   $userscan;

$ishide=$result['ishide'];

if ($ishide=="1")
{
	$remainvaluestr="";
	
}
else{
	$remainvaluestr="<strong> Remaining values: ".$remainvalue*0.1 ."</strong> ";
	
	
}
 

?></span>
 <br>
 
<?php 

echo $remainvaluestr;

?> 
  
  
  
</div> 

 
 <br>
         <table width=100%    style="margin-top:1px;margin-left:  30px" >

			 
				<tr style="font-size:14px">
<td width="8%" align="left"   ><strong style="color:green; background-color:#fff;border-radius:10px">編號No.</strong></td>
<td width="15" align="left"  ><strong style="color:green; background-color:#fff;border-radius:10px">增值日期Transaction Date Time<strong></td>

<td width="20%" align="left"   ><strong style="color:green; background-color:#fff;border-radius:10px">回收數 Rcycled Number<strong></td>
<td width="15%" align="left"   ><strong style="color:green; background-color:#fff;border-radius:10px">增值金額Amount<strong></td>
<td width="15%" align="left"    ><strong style="color:green; background-color:#fff;border-radius:10px">設備號Device ID<strong></td>
<td width="18%" align="left"    ><strong style="color:green; background-color:#fff;border-radius:10px">狀態 Status<strong></td>

</tr>
	<hr>


	
	<?php 
	
 
 
 $data=array();
 $data["cardid"]=$_COOKIE["user"];
  
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
	            //       var_dump($data);
				
				
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
	 
	 echo '
	 
<tr style="font-size:24px">
<td width="244" align="left"   > '. ($i+1) .$samemid.'</td>
<td width="431" align="left" >'.date("Y/m/d H:i:s",$data[$i]['dateline']).'<strong>
<td width="244" align="left"   > '.$data[$i]['recyclednum'].'</td>
<td width="431" align="left" > '.$data[$i]['amount'].'<strong>
<td width="431" align="left" >'.$data[$i]['deviceid'].'<strong> 
<td width="431" align="left" > '.$status.'<strong>

</tr>'; 
  	
	
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
	
	echo '<span style="right:3%;position:absolute;font-size:20px"><strong>發現有未完成的增值額：$'.$incompletetotalamount*0.1 .'</strong></span>';
	echo ' <a href="../index.php" class="btn2" style=" left:2%; top:70%; position: absolute; "> 
 
結束
 
 
 </a> 
   <a href="incomplete/index.php" class="btn2" style=" right:2%; top:70%; position: absolute; "> 
進入增值 
 </a>  ';
 
 
 
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
  

   <script type="text/javascript" src="js/timecountdown.js"></script>
 </p>
    <script language="javascript" type="text/javascript"> 
// 以下方式直接跳轉
 
// 以下方式定時跳轉
setTimeout("javascript:location.href='../index.php'", 60000); 
     </script>
 
  
</body></html>
