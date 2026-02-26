 <html lang="en" class="dk_fouc has-js"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <title>屈臣氏</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Loading Bootstrap -->
 

    <!-- Loading Flat UI -->  
	    <link rel="stylesheet" href="css/dengdaitouping.css">
     
 	 
	 <script src="js/myjs.js"></script>
 

 	<style type="text/css">
 		#apDiv1 {
 			position: absolute;
 			left: 691px;
 			top: 1340px;
 			width: 95px;
 			height: 344px;
 			z-index: 1;
 		}

 		body,
 		td,
 		th {
 			font-family: Lato, sans-serif;
 		}

body {
	

 
  background-repeat: repeat;
  background-image: url(images/bj.png);
  font-family: "Arial Black", Gadget, sans-serif;
 
}

body::after {
  content: '';
  position: absolute;
  top: 0;
  left: -75%;
  width: 50%;
  height: 100%;
 
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
 			margin-top: 550px;
 			margin-left: -1121px;


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

 <body leftmargin=0 topmargin=0 oncontextmenu='return false' ondragstart='return false' onselectstart='return false' onselect='document.selection.empty()' oncopy='document.selection.empty()' onbeforecopy='return false'>

  
    
<script>
document.addEventListener('contextmenu', e => e.preventDefault());  // 禁止右键
document.addEventListener('selectstart', e => e.preventDefault()); // 禁止选中
document.addEventListener('dragstart', e => e.preventDefault());   // 禁止拖动
</script>
    
<?php 
 
error_reporting(0); 
 // $sql="SELECT SUM(value) as totalvalue from  user_transaction where user='$user' and transactiondone='0' and recognitionstatus="1""; 
// $result=mysqli_query($link,$sql);
// $result=mysqli_fetch_array($result);
// $totalvalue=$result['totalvalue'];
 


date_default_timezone_set("PRC");
 
 
include("IncDB.php");

include("function/sql.php");
 
	  
		 	  $sql="update command set  recognitionstatus='0'";
			 mysqli_query($link,$sql);	 
			 

 
$transactionid= select('command','transactionid');

$sql="select count(transactionid) as bottleQty from user_transaction where transactionid='$transactionid' and  metal='0' and recognitionstatus=1 and print_barcode='0'";
$bottleQty=  mysqli_query($link,$sql);
$bottleQty=mysqli_fetch_array($bottleQty);
$bottleQty=$bottleQty['bottleQty'];		
 

 

$sql="select count(transactionid) as canQty from user_transaction where transactionid='$transactionid' and  metal='1' and recognitionstatus=1 and print_barcode='0'";
$canQty=  mysqli_query($link,$sql);
$canQty=mysqli_fetch_array($canQty);
$canQty=$canQty['canQty'];		
 
 
 
 
 
	
	
	  
$sql="update user_transaction set  transactiondone=2  where transactionid='$transactionid'";//標記結束transaction    //每次在載入首頁時候會檢查是否有0標記並上傳。
mysqli_query($link,$sql);





 if ($canQty+$bottleQty>0)
 {
	 
	  
	 	   $printer_barcode=select("printer_barcode","barcode");
				  
				  
		 	  $sql="update command set  printer_barcode='$printer_barcode'";
			 mysqli_query($link,$sql);	 
			 
			 	  	  
		 	  $sql="update user_transaction  set  print_barcode='$printer_barcode' where transactionid='$transactionid'";
			 mysqli_query($link,$sql);	 
			 
			 
			 	  $sql="delete from printer_barcode  where  barcode='$printer_barcode'";
			 mysqli_query($link,$sql);	 
			 
 }
 
 
 	  $sql="update command  set  command=2 ";
			 mysqli_query($link,$sql);	 
			  








$sql="select * from command ";
$result=  mysqli_query($link,$sql);
$result=mysqli_fetch_array($result);
$transactionid=$result['transactionid'];



$sql="update user_transaction set  transactiondone=1 where transactionid='$transactionid'   ";    //1=完成增值,2是只是用户点击了结束。 
mysqli_query($link,$sql);

			 
			 
			 
$sql="select * from user_transaction where transactionid='$transactionid' ";
$comresult=  mysqli_query($link,$sql);
$comresult=mysqli_num_rows($comresult);
 
	 
$mid=select("command","mid");
 
$userscan= select("command","userscan");
$can= select("command","can");
$bottle= select("command","bottle");
$value= select("command","can_value")+select("command","pet_value");
if($comresult==11111)
{
    header("Location:../index.php"); 
}

 
 



?>
 
   
	<div class="container" style="position:absolute;margin-top:20%">
		<div class="row" style="padding:2em 0">
			 
			 
		</div>
	</div>
 
 
<div id="bottle-num">   </div> 

  
  
   </div>
</div>
<!--- <body leftmargin=0 topmargin=0 oncontextmenu='return false' ondragstart='return false' onselectstart ='return false' onselect='document.selection.empty()' oncopy='document.selection.empty()' onbeforecopy='return false' onmouseup='document.selection.empty()'>  
 
 -->
 <div align="center" style="margin-top:100px">
 <strong  style="font-size:48px;font-weight:bold;color:#1f90a4 "><b>  Recykling zakończony! <br> </strong>
</div>
 
 	<hr style="background-color:#67a5ae;border:none;height:1.5px;width:90%;margin-left:60px;position:absolute;margin-top:1%">

 <table width=100%  style="margin-top:30px;margin-left:55px" >

			 
				
		
				<tr>
				
 	<td width=50% align="left" style="font-size:28px  " > 
				 RVM ID:
				
				</td>
				
			
 

				
			<td width=40% align="right" style="font-size:28px  " > 
			
			<?php echo $mid;?>
				
				</td>
</tr>












				<tr>
				
 	 
				
			
  
</tr>





	<tr>
				
 	<td width=50% align="left" style="font-size:28px  " > 
				 Czas ukończenia:
				
				</td>
				
			
 

				
			<td width=40% align="right" style="font-size:28px  " > 
			
			<?php  date_default_timezone_set('Europe/Warsaw');
    echo date('Y-m-d H:i:s',time());?> 
				
				</td>
</tr>




				<tr>
				
 	<td width=50% align="left" style="font-size:28px  " > 
			   
			 Numer transakcji:
				</td>
				
 

				
			<td width=40% align="right" style="font-size:28px  " > 
			
 
					<span id="msg"  ><?php echo $transactionid; ?></span>  
				</td>
</tr>








		
				<tr>
				
 	<td width=50% align="left" style="font-size:28px  " > 
		    Twój rabat:
				</td>
				
 

				
			<td width=40% align="right" style="font-size:28px  " > 
	 
					<span id="msg"  > <?php echo  number_format ($value ,2);         ?> zł</span>  
				</td>
</tr>




	 

 
				<tr>
				<td width="244" align="center" style="font-size:28px ;font-weight:bold;" >
				
				
				</td>
				<td width="431" align="left" ><span class="bianjiziti" style="font-size:30px" ><strong>
 
				</strong></span></td>
				  <td>&nbsp;</td>
				<td>
				
				 
				</td>

				</tr>
				
				
					<tr>

 
		<td  width="200" align="center" style="font-size:20px ;font-weight:bold;" ><strong style="color:green; background-color:#fff;border-radius:10px"> </strong>
		 
		</td>
		
		
	 
		 
 
				</tr>
					
				 
        </table>
 
			<hr style="background-color:#67a5ae;border:none;height:1.5px;width:90%;margin-left:60px;margin-top:-10px">
		 

		
      </div> 
       


<div align="center" style="font-size:20px"> Jeśli to konieczne, zrób zdjęcie elektronicznego paragonu dla celów ewidencyjnych.  </div>	 

 
       
   
 	<div align="center">
 <img src="images/gou.gif?<?php echo rand(1,9999);?>" style="border-radius:70%;margin-top:5%" width=10% ></img>  
   </div>  
   

 	
     <script type="text/javascript" src="js/timecountdown.js"></script>
 
 

 <script language="javascript" type="text/javascript"> 
// 以下方式直接跳轉
 
// 以下方式定時跳轉
 
setTimeout("javascript:location.href='qshtothanks.php'",  7000); 
 


</script>
<br>

  


