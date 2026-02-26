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
	background-image: url(../images/21.jpg);
	background-repeat: no-repeat;
	font-size: 24px;
	height: auto;
}
    .dk_fouc.has-js body p {
	font-size: 55px;
}
    </style>
<body leftmargin=0 topmargin=0 oncontextmenu='return false' ondragstart='return false' onselectstart ='return false' onselect='document.selection.empty()' oncopy='document.selection.empty()' onbeforecopy='return false' onmouseup='document.selection.empty()'>

   
      <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
      <!--[if lt IE 9]>
    <![endif]-->
 <p>
   <script type="text/javascript" src="js/timecountdown.js"></script>
   
   
   
   <script language="javascript" type="text/javascript"> 
// 以下方式直接跳轉
 
// 以下方式定時跳轉
setTimeout("javascript:location.href='../../tjt/index.php'", 60000); 
  </script>
   <script src="jquery-1.9.1.min.js"></script> 
   <script>
		$(function(){ 
		    $("#btn").bind("click",{btn:$("#btn")},function(evdata){    
		         $.ajax({    
		                type:"POST",    
		                dataType:"json",    
		                url:"data.php",    
		                timeout:8000,     //ajax請求超時時間80秒    
		                data:{time:"50000"}, //40秒後無論結果服務器都返回數據    
		                success:function(data,textStatus){    
		                    //從服務器得到數據，顯示數據並繼續查詢    
		                    if(data.success=="1"){  
							
							 
window.location.href='opendoor.php';   
		                     
		                     evdata.data.btn.click();    
							  $("#msg").append("<br>[1]");
		                    }    
		                 //未從服務器得到數據，繼續查詢    
		                   else{      
		                    evdata.data.btn.click();    
							       $("#msg").append("<br>[0]");
		                    }    
		                },    
		             //Ajax請求超時，繼續查詢    
		             error:function(XMLHttpRequest,textStatus,errorThrown){    
		                     if(textStatus=="timeout"){    
		                         $("#msg").append("<br>[超時]");    
		                         evdata.data.btn.click();    
		                     }    
		             }    
		                    
		            });    
		    });    
		        
		});  
	</script>
   
   </head>
   <body> 
   <input id="btn" type="hidden" value="測試" />  
 
   
   
  
   
   
   
   <script type="text/javascript">
// 兩秒後模擬點擊
setTimeout(function() {
// IE
if(document.all) {
document.getElementById("btn").click();
}
// 其它瀏覽器
else {
var e = document.createEvent("MouseEvents");
e.initEvent("click", true, true);
document.getElementById("btn").dispatchEvent(e);
}
}, 2000);
     </script> 
    
 </p>
 
    
        <div align="right" style="margin-right:10%;margin-top:45%">
          <p><a href="index.php" class="btn2">繼續投放</a></p>
</div>

 <embed height="0" width="0" src="../../sound/21.wav" />
</body></html>