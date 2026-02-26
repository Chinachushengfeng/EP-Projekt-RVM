 <html lang="en" class="dk_fouc has-js">

 <head>
 	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

 	<title>屈臣氏</title>
 	<meta name="viewport" content="width=device-width, initial-scale=1.0">

 	<!-- Loading Bootstrap -->

   
    <script src="../../js/animation.js" defer></script>
    <script src="../../js/recycle.js"></script>
	 
	 	<link rel="stylesheet" type="text/css" href="css/style.css">

 	<link rel="stylesheet" href="css/swiper.min.css">
 	<link rel="stylesheet" href="css/naranja.min.css">
 	<!--  <link rel="stylesheet" href="css/swiper.min.css"> 優惠券!-->
 	<link rel="stylesheet" href="css/certify.css">
 	<link rel="stylesheet" href="css/dengdaitouping.css">
 	<script src="js/swiper.min.js"></script>

	<script src="js/jquery.min.js"></script>

 	<script type="text/javascript" src="js/naranja.js"></script>

 	<script src="js/myjs.js"></script>



 	<!-- Loading Flat UI -->
 	<link rel="stylesheet" type="text/css" href="css/style.css">

 	<link rel="stylesheet" href="css/swiper.min.css">
 	<link rel="stylesheet" href="css/naranja.min.css">
 	<!--  <link rel="stylesheet" href="css/swiper.min.css"> 優惠券!-->
 	<link rel="stylesheet" href="css/certify.css">
 	<link rel="stylesheet" href="css/dengdaitouping.css">
 	<script src="js/swiper.min.js"></script>

	<script src="js/jquery.min.js"></script>

 	<script type="text/javascript" src="js/naranja.js"></script>

 	<script src="js/myjs.js"></script>

 	<style type="text/css">
 		#apDiv1 {
 			position: absolute;
 			left: 691px;
 			top: 1340px;
 			width: 95px;
 			height: 344px;
 			z-index: 1;
 		}

 		body,
 		td,
 		th {
 			font-family: Lato, sans-serif;
 		}

body {
	

 
  background-repeat: repeat;
  background-image: url(images/bj.png);
  font-family: "Arial Black", Gadget, sans-serif;
  font-weight: bold;
 
  
  position: relative;
  overflow: hidden;
}

body::after {
  content: '';
  position: absolute;
  top: 0;
  left: -75%;
  width: 50%;
  height: 100%;
  background: linear-gradient(120deg, rgba(255,255,255,0), rgba(255,255,255,0.4), rgba(255,255,255,0));
  animation: shine 3s infinite;
    
}

 
 		#apDiv2 {
 			position: absolute;
 			left: 34px;
 			top: 262px;
 			width: 135px;
 			height: 305px;
 			z-index: 2;
 		}

 		#apDiv3 {
 			margin-top: 550px;
 			margin-left: -1121px;


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
 	</style>


 </head>

 <body leftmargin=0 topmargin=0 oncontextmenu='return false' ondragstart='return false' onselectstart='return false' onselect='document.selection.empty()' oncopy='document.selection.empty()' onbeforecopy='return false'>

 
    
<script>
document.addEventListener('contextmenu', e => e.preventDefault());  // 禁止右键
document.addEventListener('selectstart', e => e.preventDefault()); // 禁止选中
document.addEventListener('dragstart', e => e.preventDefault());   // 禁止拖动
</script>

 	<?php
	
date_default_timezone_set("PRC");	
		include("incdb.php");

		error_reporting(0);
		// $sql="SELECT SUM(value) as totalvalue from  user_transaction where user='$user' and transactiondone='0' and recognitionstatus="1""; 
		// $result=mysqli_query($link,$sql);
		// $result=mysqli_fetch_array($result);
		// $totalvalue=$result['totalvalue'];

		include("function/sql.php");

 	$mid = select("command", "mid");
	
		$sql = "update command set command=1"; //开门
		mysqli_query($link, $sql);

 

 

     $transactionid = select("command", "transactionid");


    $mid = select("command", "mid");

  $nowbottle = select("command", "bottle");
  $nowcan = select("command", "can");
  $nowglass = select("command", "glass");

 
 
 $totalvalue =  select("command", "pet_value")+select("command", "can_value");
 



 

		?>

 
 	 

 	<div class="container" style="position:absolute;margin-top:20%">
 		<div class="row" style="padding:2em 0">


 		</div>
 	</div>


 	<div id="bottle-num"> </div>



 	</div>
 	</div>



  	<?php
 
		 
			
	 	 setcookie("user",'donate',time()+3600,"/" );
	 
			$charityid=$_GET['donate'];
			
			
			$sql="update command set userscan ='donate',limitedvalue='30',charityid='$charityid'";
			mysqli_query($link,$sql);
				$limitedvalue = select("command", "limitedvalue");



			$userscan = "";
			$type="donate";
			$url = "qshtoreceipt.php";
			
			$charityid=$_GET['donate'];
			
			$sql="select * from charityname where charityid='$charityid'";
			$result=mysqli_query($link,$sql);
			$result=mysqli_fetch_array($result);
			$encharity=$result['encharityname'];
			$zhcharity=$result['chhcharityname'];
			
			
			$typestr='';
		 
		$button="Zakończ";
			
			
	  


		?>
  
 	<table width="92%" border="21px" style="margin-top:130px;margin-left:45px;color: #006691;">

 		<tr> 

 			<td width="62%" align="left" style="font-size:28px"><strong style=" border-radius:10px">
 					<?php echo $typestr;?></strong> <span style="font-size:28px"> <?php echo  $userscan; ?></span>

	<hr style="background-color:#fff;border:none;height:1px;width:50%;margin-left:10%;opacity:0; ">
 			
 			</td>

<tr>
<td>
 
</td>
</tr>


<tr>

 


 			<td  align="left"><span class="bianjiziti" style="font-size:28px ;">
			
			
			
 
					
					
				 

 					</strong></span>


 			</td>
 		</tr>



<?php 
//这里是捐赠机构的信息
	$getcharityid=  $_GET['donate'];
				
				$sql="select * from charityname where charityid='$getcharityid' ";
				$result=mysqli_query($link,$sql);
				$result=mysqli_fetch_array($result);
				$chcharityname=$result['chcharityname'];
				$encharityname=$result['encharityname'];
				
if($type=="donate")
{
	 
echo '

<tr   >

<td  colspan="2" class="bianjiziti"  style="font-size:28px ">

Numer transakcji：'.$transactionid.'    


 

</td>
 
 
</tr>



 <td> 
	
	 	<hr style="background-color:#59b1b6;border:none;height:1px;width:160%;margin-left:0px "> 
 			
 			
</td>
 
 
 
';

}



?>
 
 
 
  
 

 		<tr>
 		 

 

 			<td  align="left"><span style="font-size:28px;">  
			 
			
		 Kwota kaucji：    <img src='images/zl.png' style='margin-top:0px;margin-left:-5px;position:absolute'> </img> <span id="msg1" style='margin-left:45px'> <?php   echo     number_format ($totalvalue ,2);        ?></span>  ‌&nbsp‌ zł


		<hr style="background-color:#fff;border:none;height:1px;width:80%;margin-left:10%;opacity:0; ">
 			
			</td>
 		</tr>


		<tr>
  

 		<td  align="left" style="font-size:28px ;"><strong style="border-radius:10px">Pomyślnie odzyskano：</strong>
		
 				<span id="msg" style="text-decoration:underline"><?php echo $nowbottle ; ?></span>     <img src='images/b.png' style='margin-top:-10px;margin-left:10px;position:absolute'> </img>  
				
			 
 				<span id="thecanmsg"  style="text-decoration:underline;margin-left:65px" ><?php echo $nowcan; ?></span>     <img src='images/c.png' style='margin-top:-5px;margin-left:15px;position:absolute'></img> 

				
				<hr style="background-color:#fff;border:none;height:1px;width:80%;margin-left:10%;opacity:0; ">
 			
			</td>

 		</tr>
		
		

 		<tr>





 			<!--- <td  width="325" align="center" style="font-size:20px ;;" ><strong  >最多可回收:</strong>
		<span    >50個</span>
		<img src="images/bottle.png "width=35px> </img>
		</td>
		--->


			 <td  align="left" style="font-size:28px" width="10%">
			 
			 <strong>   Limit butelek/puszek：</strong>
 				<span id="msg3" > 50 </span> 		</td>
									
											<td style="font-size:20px"  >
									
				 <span id="msg6" style="font-size:27px;margin-left:10px"> <!-- <img src="images/bottle.png " width=35px> </img></span> -->
				 <strong> Odliczanie(S)：<img src='images/djs.png' style='position:absolute;margin-top:0px;margin-left:-10px'></img></strong>

 				<span id="timer" style="font-size:28px;margin-left:20px">120</span> 
				<!-- <span><img src="images/time.gif " width=35px /></span>  -->
				
 			</td>

 		</tr>




 	</table>

  
 	</div>


 

 		 
 



 <a href='qshtoreceipt.php'>	<span class="rebate"   style="bottom:50px;left:50%;position:absolute;transform:translate(-50%,-50%)"><?php echo $button ;?></span>
</a>	
 
<script>
	var pressed=0;
	 
$(function () {
	  
				 
            $('#endbtn').click(function () {
				
					 if (pressed==1)
					 {
						 return;
					 }
					 pressed=1;
					 
					 
					 
                var count = 30;
                var countdown = setInterval(CountDown, 1000);
				 document.getElementById("endbtn").innerHTML = "Proszę czekać";
				 maxtime=30;
				  
                function CountDown() { 
				//	document.all["timer"].innerHTML = count;
					
					
					 
					
                    if (count == 0) {
						console.log("点击我");
                        clearInterval(countdown);
	   
				window.location = '<?php echo $url;?>'
			     }
					count--; 
							$.ajax({
							url: "data.php?close=1",
							type: 'get',
						    dataType: "json",

							 success: function (res) {
									 console.log(res);
										if(res.success=='close')
										{ 
											count=0;
										}
										else{

											} 
										}
		 
							}) 
                }
				 
				 $.ajax({
					 
							url: "data.php?close=1",
							type: 'get',
         
    })
			
				
				
			 	
            })
			
			
			
			 
 				 
			

			
			
			
			
			
			
			
			
			
			
			
			
			
        });
		
		
		
		
		
		
		
		
		
		
		
</script>




 	<!--  <img style="position:absolute;margin-left:-120px;margin-top:0px" src="images/alipay.jpg" width="120px"></img> ！-->




<audio id="sound"> </audio>


 	<script type="text/javascript">
 		var maxtime = 120; //  
 		var temp = 0;

 		function CountDown() {

 
 			if (maxtime >= 0) {

 				seconds = maxtime;
 				msg = seconds; //原來的：   msg =  seconds + "秒";
 				document.all["timer"].innerHTML = msg;

 				--maxtime;


 			} else {


 				clearInterval(timer);




 			}





 			if (document.getElementById("msg").innerHTML != temp) {

 				maxtime = 120;


 				temp = document.getElementById("msg").innerHTML;

 			}


 			if (document.getElementById("timer").innerHTML == '0') //如果要加秒的話 記住是'0秒'
 			{




									//	window.location.href = '<?php echo $url; ?>';
										
										
										 
										var count = 0;
										var countdown = setInterval(CountDown, 1000);
										 document.getElementById("endbtn").innerHTML = "Proszę czekać";
										 
										function CountDown() { 
											document.all["timer"].innerHTML = count; 
											if (count == 0) {
												console.log("点击我");
												clearInterval(countdown);
							   
										window.location = 'qshtoreceipt.php'
										 }
											count--; 
													$.ajax({
													url: "data.php?close=1",
													type: 'get',
													dataType: "json",

													 success: function (res) {
															 console.log(res);
																if(res.success=='close')
																{ 
																	count=0;
																}
																else{

																	} 
																}
								 
													}) 
										}
										 
										 $.ajax({
											 
													url: "data.php?close=1",
													type: 'get',
								 
							})
									
				
				
			 	
          
				
				

 			}




 		}
 		timer = setInterval("CountDown()", 1000);
 	</script>




 
 
<script src="js/jquery-1.9.1.min.js"></script>

 
 	<script>
 		var datavalue;

 		function narn(type,datatitle,text_ch,text_rn) {
 			naranja()[type]({


 				title: datatitle,
 				textch: text_ch,
				texten:text_rn,
 				timeout: '3000',




 			 
 			})
 		}


 

 		$(function() {



 			$("#btn").bind("click", {
 				btn: $("#btn")
 			}, function(evdata) {
 				$.ajax({
 					type: "POST",
 					dataType: "json",
 					url: "data.php",
 					timeout: 80000000, //ajax請求超時時間80秒    
 					data: {
 						time: "50000000"
 					}, //40秒後無論結果服務器都返回數據    
 					success: function(data, textStatus) {
 						if (document.getElementById("msg3").innerHTML == "0") {
 							document.getElementById("msg3").innerHTML = "Recykling zakończony"; 
 							document.getElementById("msg6").innerHTML = "";

 							javascript: location.href = '<?php  echo $url; ?>'
 						}

 						//從服務器得到數據，顯示數據並繼續查詢    
 						if (data.success == "1") {
							
							
							
								
				if (data.metal == "0") {   //是塑料瓶
					
					 		
 							evdata.data.btn.click();
 							document.getElementById("msg3").innerHTML = parseInt(document.getElementById("msg3").innerHTML) - 1;
 						 

 							bottletotalvalue = document.getElementById("msg1").innerHTML; //msg1本身
 							document.getElementById("msg1").innerHTML = (parseFloat(bottletotalvalue) + parseFloat(data.bottlevalue) * 1).toFixed(2); //每次乘以0.2(mynum*0.2).toFixed(1);

 							successnum = parseInt(document.getElementById("msg").innerHTML) + 1;
 							document.getElementById("msg").innerHTML = successnum;
 		 
 							narn("success", "sukces","", "Dodaj plastikową butelkę.");

							playsound("dingding");

 
				}

				else if (data.metal == "1")
				{
	
								
 						evdata.data.btn.click();
 							document.getElementById("msg3").innerHTML = parseInt(document.getElementById("msg3").innerHTML) - 1;
 							 

 							bottletotalvalue = document.getElementById("msg1").innerHTML; //msg1本身
 							document.getElementById("msg1").innerHTML = (parseFloat(bottletotalvalue) + parseFloat(data.bottlevalue) * 1).toFixed(2); //每次乘以0.2(mynum*0.2).toFixed(1);

 							successnum = parseInt(document.getElementById("thecanmsg").innerHTML) + 1;
 							document.getElementById("thecanmsg").innerHTML = successnum;
 		 
 							narn("success", "sukces","","Dodaj puszkę po napoju gazowanym.");

							playsound("dingding");

	
	
				}
  
 
 		 else if (data.success == "44") {

 
 setTimeout("javascript:location.href='cheating.php'", 1000); 


 						}
						
						else if (data.success == "55") {

 
setTimeout("javascript:location.href='cheatingend.php'", 1000); 

 						}
 


 						} else if (data.success == "2") {

	playsound("Please try again");
 							evdata.data.btn.click();
 							/* 
document.getElementById("msg1").innerHTML=data.value;
document.getElementById("msg").innerHTML=data.num; */
 						 
narn("error", "Błąd wagi","", "Usuń płyn i spróbuj ponownie");



 						} else if (data.success == "3") {
playsound("barcode not in database");
 							evdata.data.btn.click();
 							/* document.getElementById("msg1").innerHTML=data.value;
 							document.getElementById("msg").innerHTML=data.num; */
 						 
 							narn("error",  "Kod nie istnieje", " ", "Nie w bazie");


 						} else if (data.success == "6") {
playsound("Unreadable Barcode");
 							evdata.data.btn.click();
 							/* 
document.getElementById("msg1").innerHTML=data.value;
document.getElementById("msg").innerHTML=data.num; */
 						 
 							narn("error",  "Nie odczytano kodu"," ",  "Spróbuj ponownie");


 						} else if (data.success == "4") {
playsound("Please try again");
 							evdata.data.btn.click();
 							/* document.getElementById("msg1").innerHTML=data.value;
 							document.getElementById("msg").innerHTML=data.num; */
 							datavalue = "图像错误Image failed";
							
 					narn("error", "Błąd rozpoznania"," ", "Obiekt nienadający się do recyklingu");

 						} else if (data.success == "5") {
 
 							evdata.data.btn.click();
 							/* document.getElementById("msg1").innerHTML=data.value;
 							document.getElementById("msg").innerHTML=data.num; */
 							datavalue = "回收失败Recycle failed";
 							 
							narn("warn", "Nie dotykaj butelki."," ",  "Nie dotykać butelki podczas recyklingu.");

 						} else if (data.success == "7") {
playsound("Please try again");
 							evdata.data.btn.click();
 							/* document.getElementById("msg1").innerHTML=data.value;
 							document.getElementById("msg").innerHTML=data.num; */
 							datavalue = "樽身不符Size mismatch";
 							narn("error","Nieprawidłowa butelka"," ",  "Niedopasowanie kształtu butelki");

 						}
 else if (data.success == "8") {
 playsound("Please try again");
 							evdata.data.btn.click();
 							/* document.getElementById("msg1").innerHTML=data.value;
 							document.getElementById("msg").innerHTML=data.num; */
 							datavalue = "回收失败Recycle failed";
 							 
								narn("warn", "Nie dotykaj butelki."," ",  "Nie dotykać butelki podczas recyklingu.");

 						}


 else if (data.success == "9") { 
 							evdata.data.btn.click();
 							/* document.getElementById("msg1").innerHTML=data.value;
 							document.getElementById("msg").innerHTML=data.num; */
 							datavalue = "Voll";
 							 
							narn("error","Voll","Pudełko na plastikowe butelki jest pełne.","voll");

 						}

 else if (data.success == "10") { 
 							evdata.data.btn.click();
 							/* document.getElementById("msg1").innerHTML=data.value;
 							document.getElementById("msg").innerHTML=data.num; */
 							datavalue = "Voll";
 							 
								narn("error","Voll","Pudełko na puszki jest pełne","Full");
 						}

 
 
					else if (data.success == "19") {
  
setTimeout("javascript:location.href='block.php'", 1000); 


						}
						
						


else if (data.success == "20") {
  
setTimeout("javascript:location.href='qsh.php'", 1000); 


						}
						
						else {

 							evdata.data.btn.click();
 							$("#msg2").append("<br>0");


 							/*  
 							 document.getElementById("msg1").innerHTML=data.value;
 							document.getElementById("msg").innerHTML=data.num;
 							 */

 							/* document.getElementById("msg1").innerHTML=data.value;
 							document.getElementById("msg").innerHTML=data.num; */



 						}
						
						
 					},




 					//Ajax請求超時，繼續查詢    
 					error: function(XMLHttpRequest, textStatus, errorThrown) {
 						if (textStatus == "timeout") {
 							$("#msg").append("<br>[超時空白頁]");
 							evdata.data.btn.click();
 						}
 					}




 				});
 			});





 		});
		
		
 


		function playsound(name){
  sound.pause();
  //语音路径
  sound.src="http://127.0.0.1/sound/"+name+".wav";
  sound.play();
}
 

 	</script>




 	<input id="btn" type="hidden" value="測試" />
 	<div id="msg2" style="margin-top:500px;"> 12</div>

 <embed height="0" width="0" src="http://127.0.0.1/sound/Please insert plastic bottles into the RVM.wav" />


 	<script type="text/javascript">
 		// 兩秒後模擬點擊
 		setTimeout(function() {
 			// IE
 			if (document.all) {
 				document.getElementById("btn").click();
 			}
 			// 其它瀏覽器
 			else {
 				var e = document.createEvent("MouseEvents");
 				e.initEvent("click", true, true);
 				document.getElementById("btn").dispatchEvent(e);
 			}
 		}, 1000);
 	</script>