 
		<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="../../../css/main.css">
    <link rel="stylesheet" href="../../../css/login.css">
    <script src="../../../js/animation.js" defer></script>
    <script src="../../../js/login.js"></script>
</head>



 
  
 


	  <body leftmargin=0 topmargin=0 oncontextmenu='return false' ondragstart='return false' onselectstart ='return false' onselect='document.selection.empty()' oncopy='document.selection.empty()' onbeforecopy='return false' onmouseup='document.selection.empty()'>
 
 
     <div class="main">
        <div class="step"></div>
        <div class="scan"></div>
        <div class="footer">
            <div class="backBtn" onclick="back()">
                <img src="../../../img/btn-back.png" alt="">
            </div> 
        </div>
    </div>
</body>
<script>
    var main = document.getElementsByClassName('main')[0]
    main.style.opacity = 0
</script>


  
 
  	
     <script type="text/javascript" src="js/timecountdown.js"></script>
 
   <div align="left"  >  
   <?php 
 include("IncDB.php");
include("../../word_function/sql.php");


 
 
 
date_default_timezone_set("PRC");

//此时写入transactionid
$sql = "select *from  command";
$result = mysqli_query($link, $sql);
$result = mysqli_fetch_array($result);
 $mid=$result['mid'];
$transactionid = $mid.time();
$sql = "update command set transactionid='$transactionid'"; //標記結束transaction    //每次在載入首頁時候會檢查是否有0標記並上傳。
mysqli_query($link, $sql);

//此时写入transactionid


 

 
 setcookie("user",'',time()+3600,"/" );
	 
 ?>
  
   
		  
	 
					  
		 
				
				
		  
		       <script type="text/javascript" src="js/timecountdown.js"></script>
 
 <script language="javascript" type="text/javascript"> 
  
 setTimeout("javascript:location.href='../../index.php'", 60000); 
 
   </script>
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
window.location.href=
<?php 

error_reporting(0);
$mark=$_GET['mark'];

 echo "'qsh.php?mark=$mark'" ;
 
 ?>;  //'qsh.php'
		                      $("#msg").append("<br>[1]"); 
		                     evdata.data.btn.click();    
 
		                    }    
		                 //未从服务器得到数据，继续查询  

else if(data.success=="5"){  
window.location.href='qrerror.php';   
		                      $("#msg").append("<br>[1]"); 
		                     evdata.data.btn.click();    
							 
							 
		                    }  
							

else if(data.success=="6"){  
window.location.href='enderrorww.php?errorcode=consult'+data.name;   
 
		                      $("#msg").append("<br>[1]"); 
		                     evdata.data.btn.click();    
							 
							 
		                    }  
						 

else if(data.success=="8"){  
window.location.href='enderror.php?errorcode=consult'+data.name;   
		                      $("#msg").append("<br>[1]"); 
		                     evdata.data.btn.click();    
							 
							 
		                    }  
						 

else if(data.success=="9"){  
window.location.href='enderrorww.php?errorcode=consult'+data.name;  
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
