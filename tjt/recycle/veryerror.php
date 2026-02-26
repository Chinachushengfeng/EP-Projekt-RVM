<!DOCTYPE html> <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <title>Flat UI</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/style.css" />
    <!-- Loading Bootstrap -->  
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
    body {
	background-repeat: no-repeat;
	background-image: url(../images/28.jpg);
}
    </style>

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]> 
    <![endif]-->
  </head>
  <body>
  <body leftmargin=0 topmargin=0 oncontextmenu='return false' ondragstart='return false' onselectstart ='return false' onselect='document.selection.empty()' oncopy='document.selection.empty()' onbeforecopy='return false' onmouseup='document.selection.empty()'>


   <?php


	  
 include("IncDB.php");
  
 
?>
      
  
 <div class="wenzi">
    <div align="center"></div>
  </div>

 
  
  <p>
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
window.location.href='sbz.php';   
		                      $("#msg").append("<br>[1]"); 
		                     evdata.data.btn.click();    
							 
							 
		                    }    
		                 //未从服务器得到数据，继续查询  

 if(data.success=="5"){  
window.location.href='index.php';   
		                      $("#msg").append("<br>[5]"); 
		                     evdata.data.btn.click();    
							 
							 
		                    }    
							
							 if(data.success=="11"){  
window.location.href='enderror.php';   
		                      $("#msg").append("<br>[11]"); 
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
  </p>
 <p>&nbsp;</p>
 <p>&nbsp;</p>
 <p>&nbsp;</p>
 
 
 <p>&nbsp;</p>
 <p>&nbsp;</p>
 <p>&nbsp;</p>
  <p>&nbsp;</p>
 <p>&nbsp;</p>
 <p>&nbsp;</p>
 
 <p>
  <div id="msg">
   <input id="btn" type="submit" value="测试" />  
  </p> 
 
 
 




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
	
	 
	  
 	 

	 
</body></html>