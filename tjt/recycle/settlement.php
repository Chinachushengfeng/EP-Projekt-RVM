 <html lang="en" class="dk_fouc has-js"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <title>屈臣氏</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Loading Bootstrap -->
 

    <!-- Loading Flat UI --> 
    <link rel="stylesheet" type="text/css" href="css/style.css">
 
  
  	<link rel="stylesheet" href="css/naranja.min.css">
  <!--  <link rel="stylesheet" href="css/swiper.min.css"> 优惠券!--> 
    <link rel="stylesheet" href="css/certify.css">
	    <link rel="stylesheet" href="css/dengdaitouping.css">
    <script src="js/swiper.min.js"></script>
	
   <link rel="stylesheet" href="../css/style.css" />
     <link rel="stylesheet" href="css/swiper.min.css">
    <link rel="stylesheet" href="css/certify.css">
    <script src="js/swiper.min.js"></script>
	
	
	


<style type="text/css">
#apDiv1 {
	position: absolute;
	left: 691px;
	top: 1340px;
	width: 95px;
	height: 344px;
	z-index: 1;
}
body,td,th {
	font-family: Lato, sans-serif;
}
body {
	background:#0a8131;
	background-repeat: repeat;
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
	margin-top:550px;
 margin-left:-1121px ;
	
	
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

<body>
 
 
<?php 
include ("incdb.php")

 // $sql="SELECT SUM(value) as totalvalue from  user_transaction where user='$user' and transactiondone='0' and recognitionstatus="1""; 
// $result=mysqli_query($link,$sql);
// $result=mysqli_fetch_array($result);
// $totalvalue=$result['totalvalue'];



?>
 
      
  
   
	<div class="container" style="position:absolute;margin-top:20%">
		<div class="row" style="padding:2em 0">
			 
			 
		</div>
	</div>
	
	<script type="text/javascript" src="js/naranja.js"></script>
 
 


  
  
   </div>
</div>
 
 
 
<table width="1010"    border="0" cellpadding="1" cellspacing="1" style="margin-left:5%;margin-top:4%">
   <tr>
      <td colspan="3" valign="middle"  > <p>&nbsp;</p>
      <p>&nbsp;</p></td>
</tr>
    <tr>
	<p>
    <br> 
    <br>
      <td colspan="3" valign="top"  align="left"    ><div >
	  <br>
 
       
       
   <br>
<br>
<br><br><br><br> 


 
 
  
<td  colspan="3"  style="font-size:12px"><div align="center"  style="font-size:12px;margin-top:-22220px" >
</div><br></td>
     </tr>
 
        <td  colspan="3" ><div align="center"  ><br></div><br></td>
     </tr>
    <tr>
      <td colspan="3" height="75px" >
      <div style="margin-top:-20px" align="center" > 
	  
	  
	  
	  <?php 
	  

$sql="select * from charityname ";

$result=mysqli_query($link,$sql);
$charityarray=array();
$i=0;
while (  $charityname=mysqli_fetch_array($result) )
{

$charityarray['charity'][$i] = $charityname['charityname'] ;

$i=$i+1;
}

	  ?>
	  
 


 
 
<div style="margin-top:-220px">  
 <a href="qsh.php?donate=<?php echo $charityarray['charity'][0]?>" class="coupon" style="color:red; background-color:#fff;font-size:28px ;font-weight:bold;">  <strong>    <?php echo $charityarray['charity'][0]?>     </strong> </a>
 
</div>
  <br>
 <div> 
 <a href="qsh.php?donate=<?php echo $charityarray['charity'][1]?>"  ><img src="images/1.jpg" width="180px" class="coupon"></img>    </a>      
 </div>
  <br>
  
   <div> 
 <a href="qsh.php?donate=<?php echo $charityarray['charity'][2]?>"  > <img src="images/3.jpg" width="180px" class="coupon"></img></a>   
  </div>


<br>
<div > 
<a href="gotoalipay/kaiqi.php"  class="jiesuan" >  现金回赠$     </a>     

<!--  <img style="position:absolute;margin-left:-120px;margin-top:0px" src="images/alipay.jpg" width="120px"></img> ！-->


</div>
 
 
   
	
	
	   <input id="btn" type="hidden" value="测试" />  
 <div id="msg2"  >  </div>
 

 
  
 
 
 <div id="timer" style=" color:green; background-color:#fff;border-radius:10px;position:absolute;margin-left:1%;margin-top:-50px;font-size:30px;  font-weight:bold"> 
 
 </div>

 
<!--  <img style="position:absolute;margin-left:-120px;margin-top:0px" src="images/alipay.jpg" width="120px"></img> ！-->

 
 
 
   
  
   
  <script type="text/javascript">
 var maxtime = 120; //  
 var temp =0;
 
      function CountDown() {
		  
		 
        if (maxtime >= 0) {
         
          seconds = maxtime;
         msg =  seconds  ;     //原来的：   msg =  seconds + "秒";
          document.all["timer"].innerHTML = msg;
          
            --maxtime;
        
		
		} else{
			
			
          clearInterval(timer);
     
		  
		  
		  
        }
		
		
		  
		
	  
					
			 
			 if( document.getElementById("timer").innerHTML == '0')  //如果要加秒的话 记住是'0秒'
			 {
 
				 window.location.href='qrerror.php'; 
 
			 }			 
			 
					 
					
		
      }
      timer = setInterval("CountDown()", 1000);   
	  
	  
	  
 </script>
 
 
