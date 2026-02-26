<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title></title>
	
	<link rel="stylesheet" href="./assets/css/index.css">
 


 
 	<style type="text/css">
 
		  body {
			  background-color: #dcf0f0;
			  background-image: url('images/error.png');
 
background-repeat: no-repeat;
background-position: center;
background-attachment: fixed;
	
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
	 
		<!-- 背景圆圈 --> 
		<div class="content">
			<div class="center"> 
				<div class="context"></div>
				<!-- 按钮 --><br><br>
				 <br><br><br><br><br><br><br><br><br>
			 
					<div class="btnContent" style='margin-top:100px'>
				  
			 
			  <a href="http://127.0.0.1/tjt/wait_restore.php" >  
			  <button  class="btn  " style='margin-top:800px;margin-left:20;color:#FFF;box-shadow:none;font-size:21px;background:#30a0bd'   >Próba odzyskania</button>  
  
 </a> 
  
  
 
 
 
 
	   <script src="js/jquery-1.9.1.min.js"></script> 
    <script>
		$(function(){ 
		    $("#btn").bind("click",{btn:$("#btn")},function(evdata){    
		         $.ajax({    
		                type:"POST",    
		                dataType:"json",    
		                url:"myapi.php",    
		                timeout:80000000,     //ajax请求超时时间80秒    
		                data:{time:"5000000000"}, //40秒后无论结果服务器都返回数据    
		                success:function(data,textStatus){    
		                    //从服务器得到数据，显示数据并继续查询    
		   evdata.data.btn.click();    
       $("#msg").append("<br>[0]");   
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
 

						
						
					</div>
				</div>

			</div>
		</div>

	</div>
</body>

</html>