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


 	<?php
		include("IncDB.php");
		
 


//此时写入transactionid
$sql = "select *from  command";
$result = mysqli_query($link, $sql);
$result = mysqli_fetch_array($result);
 $mid=$result['mid'];
$transactionid = $mid.time();
$sql = "update command set transactionid='$transactionid'"; //標記結束transaction    //每次在載入首頁時候會檢查是否有0標記並上傳。
mysqli_query($link, $sql);

//此时写入transactionid

		
		
 
		
		
		$sql = "select *from  ocl";
$result = mysqli_query($link, $sql);
$result = mysqli_fetch_array($result);
$userencountcode = $result['userencountcode'];
 $blacklistout = $result['blacklistout']; //ocl 黑名單是否過期=======================================





		if ($userencountcode == "100050") { // 如果在這個時間沒有人用，並且在此時間內檢測到最近的ocl數據表中userencountcode=100050的標記的時候，除非不等於1000050否則壹直循環解決這個問題。
    $ocl100050 = 1; //按鈕標記暫停
    // del_DirAndFile('c:/rwl/download/');
    // 先刪除文件，好讓重新下載文件
  
  
  
  
  
}
		else{
			 $ocl100050 = 0;
		}
		
		
		

		?>

 	<div style="position:absolute;top:58%;width:100%;height:40%">
 
		
		
		<div style="float:right;width:50%">
 		<a href="alipaylogin/gotoscan.php" class="paybtn" style="position: relative;float:left;width: 60%;height:60%;margin-left:-60%;margin-top:-20%;">
 			<img src="../images/alipay.jpg" style="top:50%;left:50%;position:absolute;transform:translate(-50%,-50%);width:90%"/>
		 </a>
		</div>
		
		
		
			<div style="float:right;width:40%;margin-top:-30.5%;margin-right:16.5%">
 		<a href="http://127.0.0.1/tjt/login/alipaylogin/gotoscan.php?mark=donate" class="paybtn" style="position: relative;float:right;width:80%;height:126%;background:#ffcc00">
 			<img src="img/donate.png" style="top:50%;left:50%;position:absolute;transform:translate(-50%,-50%);width:75%"/>
		 </a>
		</div>
		
		
		
		
		
		
		
		
		
		

 		<!---  <br><a href="scantoapp.php" class="paybtn">愛心奉獻</a>  !-->


 	</div>
	<?php 
	
 
		 
		 if ($ocl100050 == 1   ) {
   
 
		echo '<span style="left:21%;top:62%;text-align:center;position:absolute;color:black;background:yellow;font-size:16.5px">八達通暫停服務<br>請使用其他增值方法<br>Octopus system suspension of service <br>Please use other value-added methods.</span>';
  
 

}
		 
		 elseif($blacklistout  == 0){
			 
   
	echo '<span style="left:23%;top:62%;text-align:center;position:absolute;color:black;background:yellow;font-size:20px;border-radius:10px;margin-right:10px">
	 黑名單過期，請聯絡技術支援<br>Blacklist outdated. Please<br> contact technical  support.</span>';
  
				 
			 
			 
		 }
		
	?>	
 	<a href="qsh.php" class="btn bottombtn">Back</a>


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
 			setTimeout("javascript:location.href='qsh.php'", 60000);
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
	
	 <embed height="0" width="0" src="http://127.0.0.1/sound/please insert eligible beverage containers into the RVM.wav" />










	   <script src="js/jquery-1.9.1.min.js"></script> 
    <script>
		$(function(){ 
		    $("#btn").bind("click",{btn:$("#btn")},function(evdata){    
		         $.ajax({    
		                type:"POST",    
		                dataType:"json",    
		                url:"data.php",    
		                timeout:80000000,     //ajax请求超时时间80秒    
		                data:{time:"5000000000"}, //40秒后无论结果服务器都返回数据    
		                success:function(data,textStatus){    
		                    //从服务器得到数据，显示数据并继续查询    
		                    if(data.success=="1"){  
window.location.href='caidan.php';  
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
		                         $("#msg").append("<br>[超时空白页]");    
		                         evdata.data.btn.click();    
		                     }    
		             }    
		                    
		            });    
		    });    
		        
		});  
	</script>
	  <input id="btn" type="hidden" value="测试" />  
  </p> 

 
  
<div id="msg" style="margin-top:700px"> </div>

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
	 

















 </body>

 </html>