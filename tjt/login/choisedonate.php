 <link rel="stylesheet" href="../css/style.css" />
 <meta charset="utf-8">
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
		font-family:'Microsoft YaHei';
 		background-repeat: repeat;
 		background-image: linear-gradient(#279038, #005d30);
 	}

 	#apDiv2 {
 		position: absolute;
 		left: 54px;
 		top: 213px;
 		width: 413px;
 		height: 115px;
 		z-index: 1;
 	}

	 .bottombtn {
            bottom: 5%;
            left: 50%;
            position: absolute;
            transform: translate(-50%, 0%);
            white-space: nowrap;
        }
 </style>

 </head>

 <body leftmargin=0 topmargin=0 oncontextmenu='return false' ondragstart='return false' onselectstart='return false' onselect='document.selection.empty()' oncopy='document.selection.empty()' onbeforecopy='return false'>
 
 <br> 
 <br> 
 <br> 
 <br> 
 <br> <br> <br> <br> <br>
  
  <div style="margin-left:5%;margin-top:10px;font-size:50px;font-weight : bold"> <strong>Please select the charity<br><br>for<span style="color:#f9bb07"> donation</span></strong>  </div>
 
 
  
 
 
 <?php 
 	include("incdb.php");
	
	
	$sql='select * from command';
	$result=mysqli_query($link,$sql);
	$result=mysqli_fetch_array($result);
	$username=$result['userscan'];
	
  	 setcookie("user",$username,time()+3600,"/" );
	 

		// ============================== 獲取慈善機構的名稱；===========================
		$auth_url = "http://188.125.156.176:8080/rvm/public/urlget/getcharity.php";

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $auth_url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_TIMEOUT,28);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($ch, CURLOPT_SSLVERSION, 1);
		$response = curl_exec($ch);

if(!$response )
{
	
 
 Header("Location:../index.php");  
 exit;

}



		$response = json_decode($response, true);



		$i = 0;
//echo var_dump($response[0]);
		while (isset($response[$i])) {
			$zhcharity  = $response[$i]['ch_charityname'];
			$encharity  = $response[$i]['en_charityname'];
			$charityid = $response[$i]['charityid'];
			$logo = $response[$i]['logo'];
			
			$sql = "insert into charityname (chcharityname,encharityname,charityid) values ('$zhcharity','$encharity','$charityid')";
			mysqli_query($link, $sql);
			$i = $i + 1;
		}
		// ============================== 獲取慈善機構的名稱結束===========================
		
		 
 
 
 ?>

 	<div style="position:absolute;top:21%;width:100%;height:40%">
	
	
		<div style="float:right;width:50%">
		<a  href="../recycle/chrecycle.php?donate=<?php echo $response[0]['charityid'];?>" class="donatebtn" style="position:relative;float:left;width: 58%; height:60%;margin-top:-10%;margin-left:40%">
		
		<div >  <img src="<?php echo $response[0]['logo'];?>" height="45px" style="margin-top:-15px"></img></div>
 <?php echo $response[0]['ch_charityname'];?>
  
 <br>
<div style="color:#393939;font-size:15px;margin-top:10px">  <?php echo $response[0]['en_charityname'];?></div>
 
 
 
 <br>
 
 
 
 		</a> 
		</div>		 
		
		
		<div style="float:right;width:50%">
 		<a href="../recycle/chrecycle.php?donate=<?php echo $response[1]['charityid'];?>" class="donatebtn" style="position: relative;float:left;width: 58%;height:60%;margin-top:21%;margin-left:140%">
 	
<div >  <img src="<?php echo $response[1]['logo']; ?>" height="45px" style="margin-top:-15px"></img></div>
	<?php echo $response[1]['ch_charityname'];?>
	  <br>
 
 <div style="color:#393939;font-size:15px;margin-top:10px">  <?php echo $response[1]['en_charityname'];?></div>
 
 
		 </a>
		</div>
		
		
		
			<div style="float:right;width:50%;margin-top:-19%;margin-right:5%">
 		<a href="../recycle/chrecycle.php?donate=<?php echo $response[2]['charityid'];?>" class="donatebtn" style="position: relative;float:left;width:58%;height:60%;margin-top:40%;margin-left:50%;">
 			
<div >  <img src="<?php echo $response[2]['logo'];?>" height="45px" style="margin-top:-15px"></img></div>
			<?php echo $response[2]['ch_charityname'];?>
			 	  
 <br>
			  
			   	<div style="color:#393939;font-size:15px;margin-top:10px">  <?php echo $response[2]['en_charityname'];?></div>
 
 
		 </a>
		 
		</div>
		
		
				</div>
		
		
		
		
		
		
		

 		<!---  <br><a href="scantoapp.php" class="paybtn">愛心奉獻</a>  !-->


 	</div> 
	
 	<a href="index.php" class="btn bottombtn" style="left:10.6%;bottom:5%;position:absolute" >Back</a>

 

 	<div style="bottom:35px;left:35%;position:absolute">


 		</h1>



 		<div style="margin-top:3px;margin-left:100%">



 		</div>

 		</p>
 	</div>
 	<p align="center" class="wenzi1">
 		</div>
 		</div>


 		<p>&nbsp;</p>
 		<script type="text/javascript" src="js/timecountdown.js"></script>



 		<script language="javascript" type="text/javascript">
 			// 以下方式直接跳轉

 			// 以下方式定時跳轉
 			setTimeout("javascript:location.href='index.php'", 60000);
 		</script>



 










 		</div>
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
	
	 <embed height="0" width="0" src="http://127.0.0.1/sound/Please select charity organization or Go Back.wav" />



 </body>

 </html>