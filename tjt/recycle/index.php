<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="../../css/main.css">
    <link rel="stylesheet" href="../../css/user.css">
    <script src="../../js/user.js"></script>
    <script src="../../js/animation.js" defer></script>
</head>

<body>
    <div class="main">
        <div class="content">
            <div class="table">
                <!-- id -->
                <div class="row">
                    <div class="first">
                        <img src="../../img/user/userid.png" alt="">
                    </div>
                    <div class="second">
                        <p id="userid">20091931</p>
                    </div>
                    <div class="third">
                        <img src="../../img/user/userid2.png" alt="">
                    </div>
                </div>
                <!-- name -->
                <div class="row">
                    <div class="first">
                        <img src="../../img/user/name.png" alt="">
                    </div>
                    <div class="second">
                        <p id="name">Nasri Ala Eddine</p>
                    </div>
                    <div class="third">
                        <img src="../../img/user/name2.png" alt="">
                    </div>
                </div>
                <!-- mobile -->
                <div class="row">
                    <div class="first">
                        <img src="../../img/user/mobile.png" alt="">
                    </div>
                    <div class="second">
                        <p id="mobile">0500000000</p>
                    </div>
                    <div class="third">
                        <img src="../../img/user/mobile2.png" alt="">
                    </div>
                </div>
                <!-- points -->
                <div class="row">
                    <div class="first">
                        <img src="../../img/user/point.png" alt="">
                    </div>
                    <div class="second">
                        <p style="color:#1da28a "><span style="margin-right: 10px;" id="point"> 27</span>points</p>
                    </div>
                    <div class="third">
                        <img src="../../img/user/points2.png" alt="">
                    </div>
                </div>
                <!-- last use -->
                <div class="row">
                    <div class="first">
                        <img src="../../img/user/lastUse.png" alt="">
                    </div>
                    <div class="second">
                        <p id="lastUse">20/01/2024</p>
                    </div>
                    <div class="third">
                        <img src="../../img/user/lastUse2.png" alt="">
                    </div>
                </div>
            </div>
            <div class="logo"></div>
        </div>
        <div class="footer">
            <div class="backBtn" onclick="back()">
                <a href='../index.php'><img src="../../img/btn-back.png" alt=""></a>
            </div>
            <div class="continueBtn" onclick="start()"> <a href='dorecycle.php'><img src="../../img/btn-start.png" alt=""></a></div>
        </div>
    </div>
	
	 

 </head>

  
  <body leftmargin=0 topmargin=0 oncontextmenu='return false' ondragstart='return false' onselectstart ='return false' onselect='document.selection.empty()' oncopy='document.selection.empty()' onbeforecopy='return false' onmouseup='document.selection.empty()'>  
 
	
<script>
    var main = document.getElementsByClassName('main')[0]
    main.style.opacity = 0
</script>

 


 

		<?php
		
		 

		include("IncDB.php");
		
		include("../../word_function/sql.php");
 



		//先查詢是否有未結算金額，有就強制結算
 
  

///////////////////////////////////清空//////////////////////////////////////////////////////////////////////


	  
        $userscan =  $_COOKIE["user"];
        
	    $sql = "update command set userscan='$userscan' "; //清空ocl
		mysqli_query($link, $sql);
		
		
		
		if(!$userscan)
		{
			
 	  Header("Location:../../index.php");  
		}
		
		
		if (strlen($userscan)  == 32) {
			$userscan = substr($userscan, -13, 13);
		}
			
		$data = array();
		$data["cardid"] = $userscan;

	  
		$data = json_encode(encrypt($data));


 
 


 
	$url='http://43.251.100.152/saodi/public/urlget/alipaysearch.php';
 
  
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_TIMEOUT, 20);

		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
			'Content-Type: application/json; charset=utf-8',
		));
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($ch, CURLOPT_SSLVERSION, 1);
		$response = curl_exec($ch);

	 
if($response==false)
	
  {

	 
 
			print curl_error($ch);
	
 	  Header("Location:../../index.php");  
		 
		
			exit;
		}
	 
 
		$i = 0;
		$response = decrypt($response);
	  
		  
		$data = json_decode($response, true);
		
 
//		 echo var_dump($response);

		 

 error_reporting(0);


		$user_limited_daliy = $data['user_limited_daliy']; //用户当天限制(屈臣氏)的额度（已计算）
        $user_amount_today = $data['user_amount_today']; //用户一天已经增值的额度
		$isblack= $data['isblack'];
 
 	$value = $data['value'];
 	 
	 if(!$value)
	 {
		 $value=0;
 }
			 
 


 


		///////////////////////////////檢查有沒有incomplete強制增值

		$sql = "select * from command ";
		$result = mysqli_query($link, $sql);
		$result = mysqli_fetch_array($result);
		$ishide = $result['ishide'];
 

	   $hotline=$result['hotline'];

		$sql = "select * from ocl ";
		$result = mysqli_query($link, $sql);
		$result = mysqli_fetch_array($result);

		$oclvalue = $result['value'];
		
		
		
if (substr($oclvalue,0,1)=="-")
{
	$fuhao='-';
	$oclvalue=abs($oclvalue);
}
else
{
	$fuhao='';
	
}



		$usermaxvalue = $result['usermaxvalue'];
		
	 
		
		 $themax= min($user_limited_daliy ,$usermaxvalue ) ;//比较2个大小。
 
 
	
 
	
		if ( $themax  <= 0 &&  $ishide != 1)
     	{
			$limit = 1;
			
			
		}
		
		
		
		if (   $ishide == 1)
     	{
			
			if ( $user_limited_daliy<=0 )
			{
			$limit = 1;
			}
			
			  
			$themax=$user_limited_daliy;//比较2个大小。
 
			 
		}
		
				$sql = "update command set limitedvalue='$themax' "; //清空ocl
		mysqli_query($link, $sql);








		
		if (isset($limit) && $limit==1)
		{
			$limitstr='<a href="../../index.php" class="btn "  style="left:38%;bottom:5%;position:absolute">'.select('End').'</a>' ; 
		}
		else
		{ 
			$limitstr='<a href="../../index.php" class="btn "  style="left:3%;bottom:5%;position:absolute">'.select('Back').'</a>' ;
			
		}
		
		 
		
 
		$userscanlen = strlen($userscan);
			 
		//	$userscan = substr($userscan, -13, 13);
			$typestr = " ";

 
	$alipay_limited_value=	floor($user_limited_daliy*1 )    ;
		
			$nomalstr = "normální";
			$url = "dorecycle.php";
			$type = "alipay";
			
			 
			
			$typename=select('User number:'); 
			$resyclestartstr = '  <a href="../../index.php" class="btn"  style="left:3%;bottom:5%;position:absolute">'.select('Back').'</a>   
			
								<a href="dorecycle.php" class="btn"  style="right:3%;bottom:5%;position:absolute">'.select('Startbtn').'</a> ';
	 		 
  
		 
		
		
		
	 

		if (isset($limit) && $limit == 1) {

			 
		 
			$nomalstr = "normální";
			$url = "dorecycle.php";
			 

			$resyclestartstr = $limitstr;
		}

		function encrypt($id)
		{
			$id = serialize($id);
			$key = file_get_contents("../../../../SECRET-AES-256/secret.txt");

			$data['iv'] = base64_encode(substr($key, 0, 16));
			$data['value'] = openssl_encrypt($id, 'AES-256-CBC', $key, 0, base64_decode($data['iv']));
			$encrypt = base64_encode(json_encode($data));
			return $encrypt;
		}



		function decrypt($encrypt)
		{
			$key = file_get_contents("../../../../SECRET-AES-256/secret.txt");
			$encrypt = json_decode(base64_decode($encrypt), true);
			$iv = base64_decode($encrypt['iv']);
			$decrypt = openssl_decrypt($encrypt['value'], 'AES-256-CBC', $key, 0, $iv);
			$id = unserialize($decrypt);
			if ($id) {
				return $id;
			} else {
				return 0;
			}
		}
		
		 
		
		?>

		<div style="font-size:45px;margin:13% 5% 0% 5%;"> <?php echo   $typename. substr($userscan,0,1).'****'.substr($userscan,-3); ?></a>
			<hr style="background-color:#ededed;border:none;height:2px;width:100%;margin:5px 0 5px 0">
			
			<table style="margin-left:0px;font-size:26px;width:100%;margin-top:2%;border-collapse:separate; border-spacing:0 7px;">
				<tr style="width:100%;">
					<td >
					 
						<?php
					
 // echo select('Daily Rebate Limit：');  修改1228
					
  echo ' <span   style="border-radius:10px;font-size:26px;right:5% " > Vaše body：' . number_format($value ).'</span>';
						
			
						
						 if($alipay_limited_value >0 && $type=='alipay')
						
						{
//			1228 修改			echo '$' . number_format( $alipay_limited_value*0.1,1);
								
								$resyclestartstr = '<!-- <a href="chaxun.php" class="btn"  style="right:35%;bottom:5%;position:absolute;font-size;20px">查詢Records</a> -->
							 
							 <a href="../../index.php" class="btn"  style="left:3%;bottom:5%;position:absolute">'.select('Back').'</a>  
			
								 <a href="dorecycle.php" class="btn"  style="right:3%;bottom:5%;position:absolute">'.select('Startbtn').'</a> ';
								 
								 
										$sql = "update command set limitedvalue='$alipay_limited_value' "; //清空ocl
										mysqli_query($link, $sql);

								 
						}
						elseif($alipay_limited_value <=0 && $type=='alipay')
						{
							
								 echo select('Card exceeds limit today') ;
								 
							
							$resyclestartstr = ' <a href="../../index.php" class="btn"  style="left:43%;bottom:5%;position:absolute">'.select('end').'</a>  ';
						}
	 
	 
	 
	 
	 
	 
	 
	 
						?>
					</td>
					
						</tr>

				<tr>
					
					
					<td align="left" >
					
				 
						<?php 
					
					
					
					
					
					
					
						echo select('User status：');
						







if ($isblack==1)
{
	$nomalstr='<span style=" color:yellow">'.select('Blacklisted').'<br>
	 
'.select('Blacklisted words').$hotline. '
	</span>';
	
 
	
	
	$resyclestartstr='<a href="../../index.php" class="btn "  style="left:43%;bottom:5%;position:absolute">'.select('end').'</a>' ;       
	
	
}

						echo $nomalstr;

						?>
	 
						
					</td>
					<!---<td width="400" align="left">
						用戶類型：<span class="bianjiziti" style="font-size:30px" ><strong><span   style="border-radius:10px;font-size:28px ;"></span><span><?php echo $typestr; ?></strong></span></span>
					</td>  --->
			 
					
					<td colspan="2">
						<?php
						if ($type == "alipay") {
							
							
							
		 				
							
							
							goto end;
							
							
							
						}
						?>
						
						<?php
						
						if ($ishide == 1) {
							echo "&nbsp; ";
						} else {
							echo '//<span   style="border-radius:10px;font-size:26px;right:5%;position:absolute" >   Remaining value：'.$fuhao.'$' . number_format($oclvalue*0.1,1).'</span>';
						}

						end:
						?>

						</span>

					</td>
					

				</tr>

			</table>
			<?php 
if ($ishide==1)
{
	echo '<hr style="background-color:#ededed;border:none;height:2px;width:100%;margin:30px 0 5px 0">';
}
else
	
	{
		echo '<hr style="background-color:#ededed;border:none;height:2px;width:100%;margin:30px 0 5px 0">';
	}


		
		
			
			
			
			
			echo  $resyclestartstr;

 

			?>

<!--  <div style="bottom:-200px; font-size:16px" align='right'>If you need any assistance , please call：<?php echo $hotline; ?></div>   -->


			<p>&nbsp;</p>
			<p>&nbsp;</p>
			<p>


				<script type="text/javascript" src="js/timecountdown.js"></script>
			</p>
			<script language="javascript" type="text/javascript">
				// 以下方式直接跳轉

				// 以下方式定時跳轉
				setTimeout("javascript:location.href='../../index.php'", 60000);
			</script>

<span  id="daojishi"  style="color:white;left:93%;font-size:50px;top:0%;position:absolute"     disabled="disabled">60</span>
 

		  
		  
		  
	      <script>
      var tim=59;
      function aaa(){
        var btnn=document.getElementById("daojishi");
		
  document.getElementById("daojishi").innerHTML= ''+tim+'';
		 
      
          tim--;
		  
		  if (tim<0)
		  {
			    document.getElementById("daojishi").innerHTML= '';
		 
		  }
      }
      setInterval("aaa()",1000);
    </script>   

 <embed height="0" width="0" src="http://127.0.0.1/sound/Please select Start or Go Back.wav" />



	</body>

	</html>