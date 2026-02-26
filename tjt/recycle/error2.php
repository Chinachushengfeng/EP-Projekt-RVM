<!DOCTYPE html>
<!-- saved from url=(0033)http://www.bootcss.com/p/flat-ui/ -->
<html lang="en" class="dk_fouc has-js"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <title>Flat UI</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Loading Bootstrap -->
    

    <!-- Loading Flat UI -->
    <link href="../css/style.css" rel="stylesheet">
    
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
	background-image: url(
../images/21(TBC).jpg);
	background-repeat: no-repeat;
	font-size: 24px;
	height: auto;
	background-image: url(../images/error02c.jpg);
}
    .dk_fouc.has-js body p {
	font-size: 55px;
}
    </style>
<body leftmargin=0 topmargin=0 oncontextmenu='return false' ondragstart='return false' onselectstart ='return false' onselect='document.selection.empty()' oncopy='document.selection.empty()' onbeforecopy='return false' onmouseup='document.selection.empty()'>

   
      <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
      <!--[if lt IE 9]>
      <script src="http://cdn.bootcss.com/html5shiv/3.6.2/html5shiv.js"></script>
    <![endif]-->
      </head>
      <body>
 
 
 
   <script type="text/javascript" src="js/timecountdown.js"></script>
   
   
    
  <?php 
 include("IncDB.php");
 	$sql="update command set command = 0,scan=0,doing=1";
 mysqli_query($link,$sql);
			 

 
 ?>
 
 
   <script src="jquery-1.9.1.min.js"></script> 
   <script>
		$(function(){ 
		    $("#btn").bind("click",{btn:$("#btn")},function(evdata){    
		         $.ajax({    
		                type:"POST",    
		                dataType:"json",    
		                url:"data.php",    
		                timeout:8000,     //ajax请求超时时间80秒    
		                data:{time:"50000"}, //40秒后无论结果服务器都返回数据    
		                success:function(data,textStatus){    
		                    //从服务器得到数据，显示数据并继续查询    
		                    if(data.success=="1"){  
							
					 
							
window.location.href='opendoor.php';   
		                     
		                     evdata.data.btn.click();    
							 
							 
		                    }  
     if(data.success=="5"){  
	 
	 	
						 
window.location.href='index.php';   
		                     
		                     evdata.data.btn.click();    
							 
							 
		                    } 
   if(data.success=="10"){  
	 
	 	
						 
window.location.href='veryerror.php';   
		                     
		                     evdata.data.btn.click();    
							 
							 
		                    } 


							
		                 //未从服务器得到数据，继续查询    
		                   else{      
		                    evdata.data.btn.click();    
		                    }    
		                },    
		             //Ajax请求超时，继续查询    
		             error:function(XMLHttpRequest,textStatus,errorThrown){    
		                     if(textStatus=="timeout"){    
		                         $("#msg").append("<br>[超时]");    
		                         evdata.data.btn.click();    
		                     }    
		             }    
		                    
		            });    
		    });    
		        
		});  
	</script>
   
   </head>
   <body>
   <input id="btn" type="hidden" value="测试" />  
   <body leftmargin=0 topmargin=0 oncontextmenu='return false' ondragstart='return false' onselectstart ='return false' onselect='document.selection.empty()' oncopy='document.selection.empty()' onbeforecopy='return false' onmouseup='document.selection.empty()'>
   
   
   
   
   
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
}, 2000);
     </script> 
   
   
   <script type="text/javascript" src="js/timecountdown.js"></script>
 </p>
 

  <div align="right" style="margin-right:38%;margin-top:45%"> 
</div>
 <embed height="0" width="0" src="../../sound/22.wav" />
</body></html>