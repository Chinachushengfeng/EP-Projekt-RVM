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
    background-image: url('images/service.jpg');
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
   
    
 <?php 
 include("IncDB.php");
 
include("function/sql.php");

 


$transactionid= select('command','transactionid');

 $bottle= select('command','bottle');
$can= select('command','can');



 
  
$sql="update user_transaction set  transactiondone=4  where transactionid='$transactionid'";//標記結束transaction 4=crusher问题   //每次在載入首頁時候會檢查是否有0標記並上傳。
mysqli_query($link,$sql);





$sql="SELECT count(id) as bottleQTY from user_transaction where recognitionstatus=1 and metal=0 and transactionid='$transactionid'";
 $bottleQTY=  mysqli_query($link,$sql);
 $bottleQTY=mysqli_fetch_array($bottleQTY);
 $bottleQTY=$bottleQTY['bottleQTY'];	
 
 
			 
	$sql="select sum(bottlevalue) as totalvalue from user_transaction where transactionid='$transactionid'and metal='0' and recognitionstatus=1";
$totalBvalue=  mysqli_query($link,$sql);
$totalBvalue=mysqli_fetch_array($totalvalue);
$totalBvalue=$totalvalue['totalvalue'];		 
			 



  
$sql="update command set  bottle='$bottleQTY' ,pet_value= '$totalBvalue' ";//標記結束transaction    //每次在載入首頁時候會檢查是否有0標記並上傳。
mysqli_query($link,$sql);
 


 






 
$sql="SELECT count(id) as canQTY from user_transaction where recognitionstatus=1 and metal=1 and transactionid='$transactionid'";
$canQTY=  mysqli_query($link,$sql);
$canQTY=mysqli_fetch_array($canQTY);
$canQTY=$canQTY['canQTY'];	

 			 
$sql="select sum(bottlevalue) as totalvalue from user_transaction where transactionid='$transactionid'and metal='1' and recognitionstatus=1";
$totalcvalue=  mysqli_query($link,$sql);
$totalcvalue=mysqli_fetch_array($totalvalue);
$totalcvalue=$totalvalue['totalvalue'];		 
		


 
   
$sql="update command set  can='$canQTY' ,can_value='$totalcvalue";//標記結束transaction    //每次在載入首頁時候會檢查是否有0標記並上傳。
mysqli_query($link,$sql);
 





 if (($canQTY+$bottleQTY )>0)
 {
	 
	  
	 	   $printer_barcode=select("printer_barcode","barcode");
				  					  
$printer_barcode = select('printer_barcode', 'barcode');

if (empty($printer_barcode) || $printer_barcode === '0' || $printer_barcode === 0) {
    $printer_barcode = 'nobarcode';
}  

				  
		 	  $sql="update command set  printer_barcode='$printer_barcode'";
			 mysqli_query($link,$sql);	 
			 
			 	  	  
		 	  $sql="update user_transaction  set  print_barcode='$printer_barcode' where transactionid='$transactionid'";
			 mysqli_query($link,$sql);	 
			 
			 
			 	  $sql="delete from printer_barcode  where  barcode='$printer_barcode'";
			 mysqli_query($link,$sql);	 
			 
 }
 



 	$sql="update command set command = 2  ";
 mysqli_query($link,$sql);
			 

 
 ?>
 
   
   </head>
   <body>
   <input id="btn" type="hidden" value="测试" />  
   <body leftmargin=0 topmargin=0 oncontextmenu='return false' ondragstart='return false' onselectstart ='return false' onselect='document.selection.empty()' oncopy='document.selection.empty()' onbeforecopy='return false' onmouseup='document.selection.empty()'>
   
   
   
    

  
 
</body></html>