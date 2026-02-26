 <html lang="en" class="dk_fouc has-js">

 <head>
 	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

 	<title>屈臣氏</title>
 	<meta name="viewport" content="width=device-width, initial-scale=1.0">

 	<!-- Loading Bootstrap -->


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
 			background-color: #005D30;

 			background-repeat: repeat;
 			background-image: linear-gradient(#279038, #005d30);
 			font-family: "Arial Black", Gadget, sans-serif;
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



 	<?php
date_default_timezone_set("PRC");	
		include("incdb.php");

		error_reporting(0);
		// $sql="SELECT SUM(value) as totalvalue from  user_transaction where user='$user' and transactiondone='0' and recognitionstatus="1""; 
		// $result=mysqli_query($link,$sql);
		// $result=mysqli_fetch_array($result);
		// $totalvalue=$result['totalvalue'];

		include("function/sql.php");
	$getcharityid=  $_GET['donate'];
 	$mid = select("command", "mid");
	
		$sql = "update command set command=1 ,  charityid ='$getcharityid' "; //开门
		mysqli_query($link, $sql);

		$sql = "update ocl set task=2"; // 
		mysqli_query($link, $sql);

 

	 
   $octreceipt= intval(substr($mid,2,6)).substr(time(),1,12);
   
 
 
   
   
 $sql="update  ocl  set receipt='$octreceipt'  ";
 mysqli_query($link,$sql);






 

		?>

 
 	 

 	<div class="container" style="position:absolute;margin-top:20%">
 		<div class="row" style="padding:2em 0">


 		</div>
 	</div>


 	<div id="bottle-num"> </div>



 	</div>
 	</div>



 	<?php
	    $userscan =  $_COOKIE["user"];
		//$userscan = select("command", "userscan");
		$limitedvalue = select("command", "limitedvalue");
		$usermaxvalue = select("ocl", "usermaxvalue");
		$ishide=select("command", "ishide");



		 
			$type="alipay";
			$url = "donate.php";
			$typestr=selectword('User number:');
		echo '<img src="images/alipay.png" style="position:absolute;margin-left:5%;margin-top:30px;opacity:0.9" width=90%> </img>';
		$button=selectword('rebate');
		
		
	 
	 
//这里是捐赠机构的信息
 
				
				$sql="select * from charityname where charityid='$getcharityid' ";
				$result=mysqli_query($link,$sql);
				$result=mysqli_fetch_array($result);
				$chcharityname=$result['chcharityname'];
				$encharityname=$result['encharityname'];
				
 
	 
 
 
		?>
		 
		
		
		<div style='width:90%;margin-left:60px;margin-top:16%;position:absolute;color:yellow;font-size:20px'> 

		<?php 
		
		echo '

 

  Charitable Organization：'.$encharityname.'</span>';
		
		?></div>
		
		
		
 	<hr style="background-color:#ededed;border:none;height:2px;width:90%;margin-left:60px;position:absolute;margin-top:20%">





 	<table width="90%" border="21px" style="margin-top:230px;margin-left:58px">
 
			
 			<td width="40%" align="left" style="font-size:24px"><strong style=" border-radius:10px">
 					<?php echo $typestr;?></strong> <span style="font-size:24px"> <?php echo  $userscan; ?></span>


 			</td>


 			<td width="60%" align="right"><span class="bianjiziti" style="font-size:24px ;">
	 
					
					
					
					
				 

 					</strong></span>


 			</td>
 		</tr>



 



 		<tr>
 			<td width="55%" align="left" style="font-size:24px ;"><strong style="border-radius:10px"> <?php echo selectword('Bottle Returned：');  ?></strong>
 				<span id="msg">0</span>
 			</td>


 			<td width="0%" align="right"><span style="font-size:24px;"> <strong style=" border-radius:10px;margin-left:-20px"><?php if($type!="donate") {echo 'Donation Amount：';}else{echo selectword('Rebate Amount：');}?> </strong> $<span id="msg1">0.0</span>



 					<hr style="background-color:#fff;border:none;height:1px;width:80%;margin-left:10%;opacity:0; ">
 			</td>

 		</tr>


 		<tr>





 			<!--- <td  width="325" align="center" style="font-size:20px ;;" ><strong  >最多可回收:</strong>
		<span    >50個</span>
		<img src="images/bottle.png "width=35px> </img>
		</td>
		--->


			 <td  align="left" style="font-size:20px">
			 <strong><?php  echo  selectword('Return Limit Remained：') ;?></strong>
 				<span id="msg3" ><?php

 

	
									if ($limitedvalue * 0.1 / 0.1 > 200) {   //0.1是设定的值！
										echo 200;
									} else {
										echo filter($limitedvalue * 0.1 / 0.1, 0);  //0.1是设定的值！
									}



									function filter($money, $accuracy = 2)
									{
										$str_ret = 0;
										if (empty($money) === false) {
											$str_ret = sprintf("%." . $accuracy . "f", substr(sprintf("%." . ($accuracy + 1) . "f", floatval($money)), 0, -1));
										}

										return floatval($str_ret);
									}





									?></span> <span id="msg5"> <?php echo selectword('Bottles');?></span>		</td>
									
											<td style="font-size:20px" align="right">
									
				 <span id="msg6" > <!-- <img src="images/bottle.png " width=35px> </img></span> -->
				 <strong>  <?php echo selectword('Countdown(s)：');?></strong>

 				<span id="timer" style="font-size:20px;">120</span> 
				<!-- <span><img src="images/time.gif " width=35px /></span>  -->
				
 			</td>

 		</tr>




 	</table>

 	<hr style="background-color:#ededed;border:none;height:2px;width:90%;margin-left:60px;margin-top:15px">

 	</div>












 

 						<?php
						
 
						
						if ($type=="alipaynope"){
							 
						
						
						
						echo '
 	<span style="margin-left:35%;; border-radius:10px"><strong><span style="color:#ff7300"> ❤ </span>您還可以通過以下慈善組織進行捐贈 <span style="color:#ff7300"> ❤ </span></strong></span>
 	<br>
 	<span style="margin-left:20%;; border-radius:10px"><strong><span style="color:#ff7300"> ❤ </span> You can also donate through the following charitable organizations<span style="color:#ff7300"> ❤ </span></strong></span>








 	<div id="certify" style="margin-top:-320px;margin-left:6%">
 		<div class="swiper-container">
 			<div class="swiper-wrapper">




 				<div class="swiper-slide" style="margin-top:255px;margin-left:-250px">
 					<p align="center" style="margin-top:-30px">
';
						
						
						
						
						
						
						

							$sql = "select * from charityname ";

							$result = mysqli_query($link, $sql);
							$charityarray = array();
							$i = 0;
							while (($charityname = mysqli_fetch_array($result) ) && $i<=2 ) {



								$charityarray['zhcharity'][$i] = $charityname['chcharityname'];

								$charityarray['encharity'][$i] = $charityname['encharityname'];
								$charityarray['charityid'][$i] = $charityname['charityid'];


								echo ' <a href="donate.php?url=donate&donate=' . $charityarray['charityid'][$i] . '" class="coupon" style="font-size:24px">' . $charityarray['zhcharity'][$i]."<br> <span style='font-size:18px'>".$charityarray['encharity'][$i]   . '</span></a> ';  //<img src="images/1.jpg" width="180px" style="border-radius:50px" >

								$i = $i + 1;
								
								
								
								
							}


							echo '</div>






							</div>
							</div>



							<div class="swiper-button-prev"></div>
							<div class="swiper-button-next"></div>

							</div>';









						}
						




							?>







 				 






 	<br><br>



 	<span class="rebate" id="endbtn" style="bottom:-10px;left:50%;position:absolute;transform:translate(-50%,-50%)"><?php echo $button ;?></span>
	
 
<script>
$(function () {
            $('#endbtn').click(function () {
                var count = 200;
                var countdown = setInterval(CountDown, 1000);
				 document.getElementById("endbtn").innerHTML = "<?php echo selectword('Please wait a moment');?> ";
				 
                function CountDown() {
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

 				window.location.href = '<?php echo $url; ?>';

 			}




 		}
 		timer = setInterval("CountDown()", 1000);
 	</script>





 	<script>
 		certifySwiper = new Swiper('#certify .swiper-container', {
 			watchSlidesProgress: true,
 			slidesPerView: 'auto',
 			centeredSlides: true,
 			loop: true,
 			loopedSlides: 5,
 			autoplay: false,
 			navigation: {
 				nextEl: '.swiper-button-next',
 				prevEl: '.swiper-button-prev',
 			},
 			pagination: {
 				el: '.swiper-pagination',
 				//clickable :true,
 			},
 			on: {
 				progress: function(progress) {
 					for (i = 0; i < this.slides.length; i++) {
 						var slide = this.slides.eq(i);
 						var slideProgress = this.slides[i].progress;
 						modify = 0.2;
 						if (Math.abs(slideProgress) > 21) {
 							modify = (Math.abs(slideProgress) - 1) * 0.2 + 1;
 						}
 						translate = slideProgress * modify * 260 + 'px';
 						scale = 1 - Math.abs(slideProgress);
 						zIndex = 999 - Math.abs(Math.round(10 * slideProgress));
 						slide.transform('translateX(' + translate + ') scale(' + scale + ')');
 						slide.css('zIndex', zIndex);
 						slide.css('opacity', 1);
 						if (Math.abs(slideProgress) > 1) {
 							slide.css('opacity', 0);
 						}
 					}
 				},
 				setTransition: function(transition) {
 					for (var i = 0; i < this.slides.length; i++) {
 						var slide = this.slides.eq(i)
 						slide.transition(transition);
 					}

 				}
 			}

 		})
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
 							document.getElementById("msg3").innerHTML = "回收結束";
 							document.getElementById("msg5").innerHTML = "";
 							document.getElementById("msg6").innerHTML = "";

 							javascript: location.href = '<?php  echo $url; ?>'
 						}

 						//從服務器得到數據，顯示數據並繼續查詢    
 						if (data.success == "1") {

 							evdata.data.btn.click();
 							document.getElementById("msg3").innerHTML = parseInt(document.getElementById("msg3").innerHTML) - 1;
 							mynum = parseInt(document.getElementById("msg").innerHTML) + 1;

 							bottletotalvalue = document.getElementById("msg1").innerHTML; //msg1本身
 							document.getElementById("msg1").innerHTML = (parseFloat(bottletotalvalue) + parseInt(data.bottlevalue) * 0.1).toFixed(1); //每次乘以0.2(mynum*0.2).toFixed(1);

 							successnum = parseInt(document.getElementById("msg").innerHTML) + 1;
 							document.getElementById("msg").innerHTML = successnum;
 							datavalue = " "  ;
 							narn("success","Success","<?php echo selectword('recycle successful'); ?>","");

							playsound("dingding");

 


 						} else if (data.success == "2") {

	playsound("Too much Residual Liquid Inside Bottle");
 							evdata.data.btn.click();
 							/* 
document.getElementById("msg1").innerHTML=data.value;
document.getElementById("msg").innerHTML=data.num; */
 							datavalue = "Overweight";
 						 
narn("error","Error","<?php echo selectword('overweight'); ?> ","");


 						} 
						
						else if (data.success == "9") {

	playsound("Material mismatch");
	
 							evdata.data.btn.click();
 							/* 
document.getElementById("msg1").innerHTML=data.value;
document.getElementById("msg").innerHTML=data.num; */
 							datavalue = "Material mismatch";
 						 
narn("error","Error","Material mismatch","");


 						}
						
						
						else if (data.success == "3") {
playsound("barcode not in database");
 							evdata.data.btn.click();
 							/* document.getElementById("msg1").innerHTML=data.value;
 							document.getElementById("msg").innerHTML=data.num; */
 							datavalue = "Refused";
 							narn("error","Error","<?php echo selectword('NotinDatabase'); ?>","");

 						} else if (data.success == "6") {
playsound("Unreadable Barcode");
 							evdata.data.btn.click();
 							/* 
document.getElementById("msg1").innerHTML=data.value;
document.getElementById("msg").innerHTML=data.num; */
 							datavalue = "Miss scaned";
 							narn("error","Error","<?php echo selectword('UnreadableBarcode'); ?> ","");


 						} else if (data.success == "4") {
playsound("Image recognition failure");
 							evdata.data.btn.click();
 							/* document.getElementById("msg1").innerHTML=data.value;
 							document.getElementById("msg").innerHTML=data.num; */
 							datavalue = "Image failed";
 						narn("error","Error","<?php echo selectword('Imagerecognition'); ?> ","");

 						} else if (data.success == "5") {
 playsound("Please Do Not Touch The Bottle When Recycling");
 							evdata.data.btn.click();
 							/* document.getElementById("msg1").innerHTML=data.value;
 							document.getElementById("msg").innerHTML=data.num; */
 							datavalue = "Recycle failed";
 							 
							narn("warn","warn","<?php echo selectword('DoNotTouch'); ?> ","");

 						} else if (data.success == "7") {
playsound("Bottle Shape And Barcode Does Not Match");
 							evdata.data.btn.click();
 							/* document.getElementById("msg1").innerHTML=data.value;
 							document.getElementById("msg").innerHTML=data.num; */
 							datavalue = "Size mismatch";
 								narn("error","Error","<?php echo selectword('ShapeNotMatch'); ?>","");

 						}
 else if (data.success == "8") {
 playsound("Please try again");
 							evdata.data.btn.click();
 							/* document.getElementById("msg1").innerHTML=data.value;
 							document.getElementById("msg").innerHTML=data.num; */
 							datavalue = "Recycle failed";
 							 
							narn("warn","warn","<?php echo selectword('DoNotTouch'); ?> ","");

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

 <embed height="0" width="0" src="http://127.0.0.1/sound/please insert eligible beverage containers into the RVM" />


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