     <!DOCTYPE html>
<html oncontextmenu="return false" onselectstart="return false" oncopy="return false">
 
<head>
    <title>智能回收機</title>

    <link href="../../css/style.css" rel='stylesheet' type='text/css' />
    <script type="text/javascript" src="js/myjs.js"></script>
    <script type="text/javascript" src="js/jq.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>


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
  </style>
  
 
<body>
 <?php
 
 	   include("IncDB.php");

 $sql="update ocl set task=3,returncode=0";
 mysqli_query($link,$sql);
 
 
 ?>
		
		
  <img src="images/paika.gif" width="40%" style="top:30%;left:50%;position:absolute;transform:translate(-50%,-50%)" ></img>
      
 
	  
   <span   style="top:68%;left:50%;position:absolute;transform:translate(-50%,-50%);font-size:38px;text-align:center">請拍八達通卡 <br>Please Tap Octopus Card</span>
      
		<a href="../index.php" class="btn"  style="bottom:-10px;left:50%;position:absolute;transform:translate(-50%,-50%)">Back</a>  </div>  
	    
</div>
 	
	
  <br><br><br><br><br> <br><br><br>
   
	   <script src="js/jquery-1.9.1.min.js"></script> 
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
window.location.href='../../recycle/oclqsh.php?url=index';   
		                      $("#msg").append("<br>[1]"); 
		                     evdata.data.btn.click();    
							  
		                    }    
		                 //未從服務器得到數據，繼續查詢  

 else if(data.success=="2")
 {
	 
	 window.location.href='oclqsh.php?returncode=' + data.text; ;   
		                      $("#msg").append("<br>[1]"); 
		                     evdata.data.btn.click();    
							  
 }
						 
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
	  <input id="btn" type="hidden" value="測試" />  
  </p> 

 <br><br><br><br><br><br><br> <br><br><br><br><br><br><br> <br><br><br><br><br><br><br> 
  <br><br><br><br><br><br><br>
 <div id="msg" > 2</div>



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
}, 1000);
     </script>
	 
	 
	 
 </div>
 
 <script type="text/javascript" src="js/timecountdown.js"></script>
  
 <script language="javascript" type="text/javascript"> 
// 以下方式直接跳轉
 
// 以下方式定時跳轉
 

setTimeout("javascript:location.href='../index.php'", 60000); 

</script> 
 

 <p>&nbsp;</p>
 
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
	
	 <embed height="0" width="0" src="http://127.0.0.1/sound/Please tap octopus or Go Back.wav" />



</body>

</html>