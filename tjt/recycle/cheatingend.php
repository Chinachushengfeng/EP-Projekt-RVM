<!DOCTYPE html>
<!-- saved from url=(0033)http://www.bootcss.com/p/flat-ui/ -->
<html lang="en" class="dk_fouc has-js"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <title>Flat UI</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Loading Bootstrap -->
    

    <!-- Loading Flat UI -->
    <link href="../css/style.css" rel="stylesheet">
    

 
 	<style type="text/css">
 
		  body {
    background-image: url('images/cheatingend.png');
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;
    background-attachment: fixed; /* 可选：固定背景不滚动 */
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
	
<body leftmargin=0 topmargin=0 oncontextmenu='return false' ondragstart='return false' onselectstart ='return false' onselect='document.selection.empty()' oncopy='document.selection.empty()' onbeforecopy='return false' onmouseup='document.selection.empty()'>

   
      <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
      <!--[if lt IE 9]>
      <script src="http://cdn.bootcss.com/html5shiv/3.6.2/html5shiv.js"></script>
    <![endif]-->
      </head>
      <body>
 
 
 
   <script type="text/javascript" src="js/timecountdown.js"></script>
   
       
 
 

 <script language="javascript" type="text/javascript"> 
// 以下方式直接跳转
 
// 以下方式定时跳转


 
 
setTimeout("javascript:location.href='../index.php'", 15000); 

 

</script> 
 
 
<?php

include("incdb.php");	 
include("function/sql.php");

 


$transactionid= select('command','transactionid');


$metal = select('command','metal');
$bottle = select('command','bottle');

$can = select('command','can');

 
			
		 
if($metal==0)
{

		$sql = "update command set bottle=bottle-1"; 
		mysqli_query($link, $sql);

}
else
{
	
		$sql = "update command set can=can-1"; 
		mysqli_query($link, $sql);
	
}
 
 
 
 
 
$sql="select count(transactionid) as bottleQty from user_transaction where transactionid='$transactionid' and  metal='0' and recognitionstatus=1 and print_barcode='0'";
$bottleQty=  mysqli_query($link,$sql);
$bottleQty=mysqli_fetch_array($bottleQty);
$bottleQty=$bottleQty['bottleQty'];		
 
 
 
$sql="select count(transactionid) as canQty from user_transaction where transactionid='$transactionid' and  metal='1' and recognitionstatus=1 and print_barcode='0'";
$canQty=  mysqli_query($link,$sql);
$canQty=mysqli_fetch_array($canQty);
$canQty=$canQty['canQty'];		
  
 
 
 
  
$sql="update user_transaction set  transactiondone=5  where transactionid='$transactionid'";//標記結束transaction 4=crusher问题 標記結束transaction 5=两次欺诈结束   //每次在載入首頁時候會檢查是否有0標記並上傳。
mysqli_query($link,$sql);


 

 if ( ($can+$bottle)>0)
 {
	 
	  
	 	   $printer_barcode=select("printer_barcode","barcode");
				  
				  
		 	  $sql="update command set  printer_barcode='$printer_barcode'";
			 mysqli_query($link,$sql);	 
			 
			 	  	  
		 	  $sql="update user_transaction  set  print_barcode='$printer_barcode' where transactionid='$transactionid'";
			 mysqli_query($link,$sql);	 
			 
			 
			 	  $sql="delete from printer_barcode  where  barcode='$printer_barcode'";
			 mysqli_query($link,$sql);	 
			 
 }
 
 
 	  $sql="update command  set  command=2";
			 mysqli_query($link,$sql);	 
			 
 
 
							?>
							
							
 
 
   
   </head>
   <body>
   <input id="btn" type="hidden" value="测试" />  
   <body leftmargin=0 topmargin=0 oncontextmenu='return false' ondragstart='return false' onselectstart ='return false' onselect='document.selection.empty()' oncopy='document.selection.empty()' onbeforecopy='return false' onmouseup='document.selection.empty()'>
   
   
   
    

  
 
</body></html>