<!doctype html> 
<html lang="en" class="no-js"> 
<head> 
  <meta charset="gb2312" /> 
  <title></title> 
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/style.css" />
  
  <script type="text/javascript" src="js/qrcode.min.js"></script>
 
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
	background-image: url(../images/05.jpg);
	background-repeat: no-repeat;
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
 
</head> 

 <body leftmargin=0 topmargin=0 oncontextmenu='return false' ondragstart='return false' onselectstart ='return false' onselect='document.selection.empty()' oncopy='document.selection.empty()' onbeforecopy='return false'>
<div   class="wenzi1" style="margin-top:120px">
  <br>
  
  <br> 
  
   
   
   <?php 
   
   
	  
 include("IncDB.php");
		
		
		
		$sql="select * from user ";
		$result=mysqli_query($link,$sql);

$result=mysqli_fetch_array($result);

$machineid=$result['mid'];		
		
		
		
		
		?>
   
<input id="text" type=hidden value=<?php echo 'https://uat.ww-fun.club/en/reg?machineid='.$machineid ; ?> "style="width:80%" />
 


<br />




<div id="qrcode" style="width:150px; height:150px; margin-top:-48px; margin-left:635px"></div>

<br> 
 <br> 
<script type="text/javascript">
var qrcode = new QRCode(document.getElementById("qrcode"), {
	width : 230,
	height : 230
});

function makeCode () {		
	var elText = document.getElementById("text");
	
	if (!elText.value) {
		alert("Input a text");
		elText.focus();
		return;
	}
	
	qrcode.makeCode(elText.value);
}

makeCode();

$("#text").
	on("blur", function () {
		makeCode();
	}).
	on("keydown", function (e) {
		if (e.keyCode == 13) {
			makeCode();
		}
	});
</script>
<p><br> 
 </div>
              <div style="margin-left:5%"> <a href="scantorecycle.php" class="btn2">會員登入</a>&nbsp;&nbsp;&nbsp;&nbsp; <a href="../donate/giveup.php" class="btn2">暫不登記 </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <a href="gotoback.php" class="btn2 ">下一步</a> </div>
 
 
</div>
</div>
 <p>&nbsp;</p>
 <p>&nbsp;</p>
 <p>&nbsp;</p>
 <p>&nbsp;</p>
 <p>&nbsp;</p>
 <p>&nbsp;</p>

 <embed height="0" width="0" src="../../../sound/07.wav" />
  	  <script type="text/javascript" src="js/timecountdown.js"></script>
 
 

 <script language="javascript" type="text/javascript"> 
// 以下方式直接跳转
 
// 以下方式定时跳转
setTimeout("javascript:location.href='../../tjt/index.php'", 60000); 
</script>
 
</body> 
</html> 