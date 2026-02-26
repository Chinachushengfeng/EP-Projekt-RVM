 
<link rel="stylesheet" href="../css/style.css">
         <link rel="stylesheet" href="css/bootstrap.min.css"> 
        <link rel="stylesheet" href="css/fakeloader.css">
        
        
    <script src="jquery-1.9.1.min.js"></script> 
        <script src="js/jquery.min.js"></script>
        <script src="js/fakeloader.min.js"></script>
        
<style type="text/css">
body {
	background-image: url(../images/wait.jpg);
	background-repeat: no-repeat;
}
</style>
</head>

<body>

   <div class="fakeloader" style="margin-top:300px;margin-left:0%"></div>

     
 
        <script>
            $(document).ready(function(){
                $(".fakeloader").fakeLoader({
                    timeToHide:51200,
              
                    spinner:"spinner2"
                });
            });
        </script>
  <p> 
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
		                    if(data.success=="8"){  
				window.location.href='success.php?code='+data.code;   
		                     
		                     evdata.data.btn.click();    
						  $("#msg").append("<br>[8]"); 	 
							 
		                    }    
		                 //未从服务器得到数据，继续查询    
		                   


  					 if(data.success=="4"){   
 
				window.location.href='error2.php';   
		                       $("#msg").append("<br>[4]"); 
   
		                    evdata.data.btn.click(); 

		                    }
							
							 if(data.success=="6"){   
 
				window.location.href='error1.php';   
		                       $("#msg").append("<br>[4]"); 
   
		                    evdata.data.btn.click(); 

		                    }
	 if(data.success=="7"){   
 
				window.location.href='error1.php';   
		                       $("#msg").append("<br>[4]"); 
   
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
 	
     <script type="text/javascript" src="js/timecountdown.js"></script>
 
 

 <script language="javascript" type="text/javascript"> 
// 以下方式直接跳转
 
// 以下方式定时跳转
setTimeout("javascript:location.href='../../tjt/index.php'", 60000); 
</script>


<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>
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
      <embed height="0" width="0" src="../../sound/19.wav" />
    <input id="btn" type="hidden" value="测试" />
</p>  
