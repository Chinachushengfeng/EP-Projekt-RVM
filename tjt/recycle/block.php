	
	 <html lang="en" class="dk_fouc has-js">
        
        
    <script src="jquery-1.9.1.min.js"></script> 
        <script src="js/jquery.min.js"></script>
        <script src="js/fakeloader.min.js"></script>
        
        <link rel="stylesheet" href="css/fakeloader.css">
 
 	<style type="text/css">
 
		  body {
    background-image: url('images/crusher.jpg');
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;
    background-attachment: fixed; /* 可选：固定背景不滚动 */
  }
 
		
 
					        .text {
            bottom:40%;
           text-align: center;
 position: absolute;
 
  left: 51%;
  transform: translate(-50%, -50%); 
            transform: translate(-50%, 0%);
            white-space: nowrap;
			width:15%;
			font-size:80px;
			font-weight :bold;
        color:#fff
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
 
 include("incdb.php");

$sql = "select *from  command";
$result = mysqli_query($link, $sql);
$result = mysqli_fetch_array($result);
		$transactionid = $result['transactionid'];
		 
		
 ?>
 
 
  
 <script type="text/javascript" src="js/timecountdown.js"></script>
 
 

 <script language="javascript" type="text/javascript"> 
// 以下方式直接跳转
 
// 以下方式定时跳转


 
 
setTimeout("javascript:location.href='service.php'", 120000); 

 

</script> 


<div class='text' id='myButton' style='margin-left:170px;top:260px;color:#000'  > 120  </div>

   
    <script>
        let countdown = 119;
        const button = document.getElementById('myButton');
        const interval = setInterval(() => {
            if (countdown > 0) {
                button.textContent = ` ${countdown} `;
                countdown--;
            } else {
                clearInterval(interval); 
				
                button.disabled = false;
                button.style.cursor = 'pointer';
                button.style.opacity = 1;
            }
        }, 1000);
    </script>
	
	
        
    
  </head>
  <body>
   
 </p>  
 
 <script type="text/javascript" src="js/timecountdown.js"></script>
  
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
 					url: "crusherdata.php",
 					timeout: 80000000, //ajax請求超時時間80秒    
 					data: {
 						time: "50000000"
 					}, //40秒後無論結果服務器都返回數據    
 					success: function(data, textStatus) {
 
   
 	
	if (data.success == "20") {
 
 
 
setTimeout("javascript:location.href='blockqsh.php'", 1000); 





							
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
		
		
 




 	</script>


 	<script src="js/jquery-1.9.1.min.js"></script>


 	<input id="btn" type="hidden" value="測試" />
 	<div id="msg2" style="margin-top:1500px; position:absolute"> 12</div>




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
	

 
 
 
 
 
 
 
  