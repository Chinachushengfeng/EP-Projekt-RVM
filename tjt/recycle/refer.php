 <html lang="en" class="dk_fouc has-js"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <title>屈臣氏</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Loading Bootstrap -->
    <link href="./Flat UI_files/bootstrap.min.css" rel="stylesheet">

    <!-- Loading Flat UI --> 
    <link rel="stylesheet" type="text/css" href="css/style.css">
 
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
	background-image: url(
	<?php 
	
	
	include("IncDB.php");

$sql="select * from command ";
$huodaoresult=mysqli_query($link,$sql);
$huodaoresult=mysqli_fetch_array($huodaoresult);
$huodao=$huodaoresult['hdjl'];



$sql="update command set command = 0";
mysqli_query($link,$sql);

$sql="select * from user ";
$result=mysqli_query($link,$sql);
$result=mysqli_fetch_array($result);
$user=$result['user'];
  $dateline=time();

 
if ($result['cishu']==9)
{ 

$sql="update command set command = 0,scan=0";
mysqli_query($link,$sql);

	echo "../images/point2.jpg?".rand();  
}	
else	
{
	echo "../images/point.jpg?".rand();  
}
	
	
	?>
	);
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
error_reporting(0);
 
		$sql="update command  SET   scan=1";

mysqli_query($link,$sql);  
 
  	 
			$code=$_GET['code'];
 
			$sql="select * from   qcscode where qcscode='$code'   ";

			$result=mysqli_query($link,$sql); 
 
			$existcode=mysqli_num_rows($result) ;

 
 
 

$sql="select * from user ";
$result=mysqli_query($link,$sql);
$result=mysqli_fetch_array($result);
$qcsbottle=$result['qcsbottle'];    //相应的积分  一般是5
$otherbottle=$result['otherbottle']; //相应的积分 一般是1



 
	  if ($existcode!==0)     
{ 
  
 //是屈臣氏的瓶子  +5分
		 
		  
 
 $isqcsbiaoji=1;

 
 
 
  }
 
  
  else
  {
	    
 
 
  $isqcsbiaoji=0;
  }
   
 
$sql="select *from getbarcode where barcode = $code and upddsapi=1";  //查询等待上传的为1
$existbottle=mysqli_query($link,$sql);
$existbottle=mysqli_fetch_array($existbottle);

  
 
 
if (!$existbottle['barcode'])
{ 
  
									$sql="select * from hkcode  where code = '$code'";
									$result=mysqli_query($link,$sql);
									$result=mysqli_fetch_array($result);
									$bottlename=$result['bottlename'];
									 
									if (!$bottlename )
									{
										$bottlename="noname";
									}
									else{
										$bottlename=$result['bottlename'];
									}
 
 
 
 if ($isqcsbiaoji==1)
 {
	 $bottlename="watsonsbottle";
	 
 }
 else{
	 
	 $bottlename="otherbrand";
	  
 }

 $sql=" insert into getbarcode (bottlename,barcode,dateline,user,doup,upddsapi,qty ,isqcs ) 
 VALUES   ('$bottlename','$code','$dateline','$user',1,1,1 ,'$isqcsbiaoji')";

 
 


 mysqli_query($link,$sql);
 
}
else    
{
	

$sql=" update   getbarcode set qty=qty+1 where barcode='$code' ";

mysqli_query($link,$sql);

}

		 
 
  
 
	  
	  
?>





<div id="apDiv1">
   <div align="center">
   
  
  
  
  
  
  
   </div>
</div>
 <body leftmargin=0 topmargin=0 oncontextmenu='return false' ondragstart='return false' onselectstart ='return false' onselect='document.selection.empty()' oncopy='document.selection.empty()' onbeforecopy='return false' onmouseup='document.selection.empty()'>
 
 
 
<table width="1010"    border="0" cellpadding="1" cellspacing="1" style="margin-left:5%;margin-top:62px">
   <tr>
      <td colspan="3" valign="middle"  > <p>&nbsp;</p>
      <p>&nbsp;</p></td>
</tr>
    <tr>
	<p>
    <br> 
    <br>
      <td colspan="3" valign="top"  align="left"    ><div >
         <table width="1035" border="1">
          <tr>
              <td width="244" align="left" style="font-size:25px ;font-weight:bold;" ><strong>屈臣氏蒸餾水樽：</strong></td>
              <td width="431" align="left" ><span class="bianjiziti" style="font-size:25px" ><strong>
                <?php 
	  
	   
	   $couponstr="";
	   
  $sql="select * from user ";
	  $result=mysqli_query($link,$sql);
	  
	  $result=mysqli_fetch_array($result);
	  
	  $jifen=$result['jifen'] ;
  $cishu=$result['cishu'];
    $isqcs = $result['isqcs'] ;
$isother=$result['isother'];
$dateline=time();
$user=$result['user'];
$mid=$result['mid'];
 $zongjifen=$result['jifen'];
$zengjiadejifen=$result['totalearnedpoint'];

 

$sql="select  *  from getbarcode";

$barcodecount=mysqli_query($link,$sql); 
  

$barcodecount =mysqli_num_rows($barcodecount);

  
 $totalquantity=$barcodecount;
 $nowquantity=$result['cishu'];






	  echo $isqcs."個 x GREEN POINT 5分";
	   
	  
	  ?>
              </strong></span></td>
              <td width="336" class="bianjiziti" style="font-size:25px;margin-right:200px"><?php echo "獲得積分：".$isqcs * $qcsbottle . "分"; ?></td>
          </tr>
            <tr>
              <td height="27" style="font-size:25px ;font-weight:bold"  ><strong>其他品牌水樽:</strong></td>
              <td><span class="bianjiziti" style="font-size:25px" ><strong>
                <?php 
	   
	  echo $isother."個 x GREEN POINT 1分" ;
	   
	  
	  ?>
              </strong></span></td>
              <td style="font-size:25px;font-weight:bold;" > <strong><?php echo "獲得積分：".$isother * $otherbottle . "分" ; ?></strong></td>
            </tr>
        </table>
      </div> 
       
       <br>
       
       
       
   <div align="left"></div> 
       
       
       
       
       
       <br>
              
        <div align="right"><span class="bianjiziti" style="font-size:25px;margin-right:250px" ><strong>總累積Green Point積分： 
	   <?php 
	   
	   
	   echo $jifen;
 
 
 
	   ?>
       分 </strong></span>
       
      </div></td>
    </tr>
    <tr>
   
	
	
       <?php 
	 
	 
	    $outcouponqty="";

	     global $outcouponqty;

	$sql="select * from user ";
	
	$result=mysqli_query($link,$sql);
	  
	$result=mysqli_fetch_array($result);
	  
	  function  coupon()
	  { 
	  
	  global  $jifen;
	  global $link;
	   global $couponstr;
	  
 
	   global $outcouponqty;
	  	$sql="select * from user ";
	
	$result=mysqli_query($link,$sql);
	  
	$result=mysqli_fetch_array($result);
	  
	  
	  	$thecouponname[0]=$result['coupona'];
		$thecouponname[1]=$result['couponb'];
		$thecouponname[2]=$result['couponc'];
	 	$thecouponname[3]=$result['coupond'];
		$thecouponname[4]=$result['coupone'];
		$thecouponname[5]=$result['couponf'];
	 	$thecouponname[6]=$result['coupong'];
		$thecouponname[7]=$result['couponh'];
		$thecouponname[8]=$result['couponi'];
	 
	 
		$thecouponpoint[0]=$result['couponapoint'];
		$thecouponpoint[1]=$result['couponbpoint'];
		$thecouponpoint[2]=$result['couponcpoint'];
	 	$thecouponpoint[3]=$result['coupondpoint'];
		$thecouponpoint[4]=$result['couponepoint'];
		$thecouponpoint[5]=$result['couponfpoint'];
	 	$thecouponpoint[6]=$result['coupongpoint'];
		$thecouponpoint[7]=$result['couponhpoint'];
		$thecouponpoint[8]=$result['couponipoint'];
	 
	   
	  
	  	$thecouponid[0]=$result['couponaid'];
		$thecouponid[1]=$result['couponbid'];
		$thecouponid[2]=$result['couponcid'];
	   	$thecouponid[3]=$result['coupondid'];
		$thecouponid[4]=$result['couponeid'];
		$thecouponid[5]=$result['couponfid'];
	   	$thecouponid[6]=$result['coupongid'];
		$thecouponid[7]=$result['couponhid'];
		$thecouponid[8]=$result['couponiid'];
	   
	 $cpnum=0;
	 $i=0;
	 $a=0;
	 while ( $i<9  ) 
	{
 	
					if ($jifen >= $thecouponpoint[$i] && $thecouponpoint[$i]>0)
					{  
						$cpnum=$cpnum+1;
						$thecouponpoint[$a]=$thecouponpoint[$i];
						$thecouponid[$a]=$thecouponid[$i];
						$thecouponname[$a]=$thecouponname[$i];
 
				// echo $thecouponname[$i].'<br>';
			 //echo $i;
					 $a=$a+1;
					}
					

	$i=$i+1;
  
	}
 
		
		$couponqty=$cpnum;
	// echo $couponqty;
     $outcouponqty=$couponqty;

	 	




	 		
 	if ($couponqty==1)
 	{ 
		$couponstr='  <div class="swiper-slide" style="margin-top:260px;margin-left:-250px" > 
 <p align="center" style="margin-top:-50px"><a href="qsh.php?url=couponok&coupon='.$thecouponname[0].'&couponid='.$thecouponid[0].'" class="coupon">以'.$thecouponpoint[0].'Green Points<br>換取'.$thecouponname[0].'</a>      
 
 </div>  ';
			}
		
		elseif($couponqty==2)   //2个优惠券的情况
		
		{
	$couponstr ='

	<div class="swiper-slide" style="margin-top:260px;margin-left:-250px" > 
 <p align="center" style="margin-top:-50px"><a href="qsh.php?url=couponok&coupon='.$thecouponname[0].'&couponid='.$thecouponid[0].'" class="coupon">以'.$thecouponpoint[0].'Green Points<br>換取'.$thecouponname[0].'</a>       <a href="qsh.php?url=couponok&coupon='.$thecouponname[1].'&couponid='.$thecouponid[1].'" class="coupon">以'.$thecouponpoint[1].'Green Points<br>換取'.$thecouponname[1].'</a> 
 </div>
  
 ';
		 }
		elseif($couponqty==3)  //3个优惠券的情况
		{ 
	$couponstr ='

	<div class="swiper-slide" style="margin-top:260px;margin-left:-250px" > 
 <p align="center" style="margin-top:-50px"><a href="qsh.php?url=couponok&coupon='.$thecouponname[0].'&couponid='.$thecouponid[0].'" class="coupon">以'.$thecouponpoint[0].'Green Points<br>換取'.$thecouponname[0].'</a>       <a href="qsh.php?url=couponok&coupon='.$thecouponname[1].'&couponid='.$thecouponid[1].'" class="coupon">以'.$thecouponpoint[1].'Green Points<br>換取'.$thecouponname[1].'</a> 
 
 
 </div>
 
 
 	<div class="swiper-slide" style="margin-top:260px;margin-left:-250px" > 
 <p align="center" style="margin-top:-50px"><a href="qsh.php?url=couponok&coupon='.$thecouponname[2].'&couponid='.$thecouponid[2].'" class="coupon">以'.$thecouponpoint[2].'Green Points<br>換取'.$thecouponname[2].'</a>      
 
 
 </div>
 
 '
 
 
 
 ;



	 
			}
		 
				elseif($couponqty==4)  //3个优惠券的情况
		{
	 
	$couponstr ='

	<div class="swiper-slide" style="margin-top:260px;margin-left:-250px" > 
 <p align="center" style="margin-top:-50px"><a href="qsh.php?url=couponok&coupon='.$thecouponname[0].'&couponid='.$thecouponid[0].'" class="coupon">以'.$thecouponpoint[0].'Green Points<br>換取'.$thecouponname[0].'</a>       <a href="qsh.php?url=couponok&coupon='.$thecouponname[1].'&couponid='.$thecouponid[1].'" class="coupon">以'.$thecouponpoint[1].'Green Points<br>換取'.$thecouponname[1].'</a>  

 </div>
 
 
  <div class="swiper-slide" style="margin-top:260px;margin-left:-250px" > 
 <p align="center" style="margin-top:-50px">
  <a href="qsh.php?url=couponok&coupon='.$thecouponname[2].'&couponid='.$thecouponid[2].'" class="coupon">以'.$thecouponpoint[2].'Green Points<br>換取'.$thecouponname[2].'</a>
  <a href="qsh.php?url=couponok&coupon='.$thecouponname[3].'&couponid='.$thecouponid[3].'" class="coupon">以'.$thecouponpoint[3].'Green Points<br>換取'.$thecouponname[3].'</a>   
 </div>
    ';
	 


	 
			}	
		
				elseif($couponqty==5)  //3个优惠券的情况
		{
	
	
	
	$couponstr ='

	<div class="swiper-slide" style="margin-top:260px;margin-left:-250px" > 
 <p align="center" style="margin-top:-50px"><a href="qsh.php?url=couponok&coupon='.$thecouponname[0].'&couponid='.$thecouponid[0].'" class="coupon">以'.$thecouponpoint[0].'Green Points<br>換取'.$thecouponname[0].'</a>       <a href="qsh.php?url=couponok&coupon='.$thecouponname[1].'&couponid='.$thecouponid[1].'" class="coupon">以'.$thecouponpoint[1].'Green Points<br>換取'.$thecouponname[1].'</a>  

 </div>
 
 
  <div class="swiper-slide" style="margin-top:260px;margin-left:-250px" > 
 <p align="center" style="margin-top:-50px">
  <a href="qsh.php?url=couponok&coupon='.$thecouponname[2].'&couponid='.$thecouponid[2].'" class="coupon">以'.$thecouponpoint[2].'Green Points<br>換取'.$thecouponname[2].'</a>
  <a href="qsh.php?url=couponok&coupon='.$thecouponname[3].'&couponid='.$thecouponid[3].'" class="coupon">以'.$thecouponpoint[3].'Green Points<br>換取'.$thecouponname[3].'</a>   
 </div>
    
	
	
  <div class="swiper-slide" style="margin-top:260px;margin-left:-250px" > 
 <p align="center" style="margin-top:-50px">
  <a href="qsh.php?url=couponok&coupon='.$thecouponname[4].'&couponid='.$thecouponid[4].'" class="coupon">以'.$thecouponpoint[4].'Green Points<br>換取'.$thecouponname[4].'</a>
  
 </div>
    
	'
	
	
	;
	 


	
			}
				elseif($couponqty==6)  //3个优惠券的情况
		{
			
			
	$couponstr ='

	<div class="swiper-slide" style="margin-top:260px;margin-left:-250px" > 
 <p align="center" style="margin-top:-50px"><a href="qsh.php?url=couponok&coupon='.$thecouponname[0].'&couponid='.$thecouponid[0].'" class="coupon">以'.$thecouponpoint[0].'Green Points<br>換取'.$thecouponname[0].'</a>       <a href="qsh.php?url=couponok&coupon='.$thecouponname[1].'&couponid='.$thecouponid[1].'" class="coupon">以'.$thecouponpoint[1].'Green Points<br>換取'.$thecouponname[1].'</a>  

 </div>
 
 
  <div class="swiper-slide" style="margin-top:260px;margin-left:-250px" > 
 <p align="center" style="margin-top:-50px">
  <a href="qsh.php?url=couponok&coupon='.$thecouponname[2].'&couponid='.$thecouponid[2].'" class="coupon">以'.$thecouponpoint[2].'Green Points<br>換取'.$thecouponname[2].'</a>
  <a href="qsh.php?url=couponok&coupon='.$thecouponname[3].'&couponid='.$thecouponid[3].'" class="coupon">以'.$thecouponpoint[3].'Green Points<br>換取'.$thecouponname[3].'</a>   
 </div>
    
	
	
  <div class="swiper-slide" style="margin-top:260px;margin-left:-250px" > 
 <p align="center" style="margin-top:-50px">
  <a href="qsh.php?url=couponok&coupon='.$thecouponname[4].'&couponid='.$thecouponid[4].'" class="coupon">以'.$thecouponpoint[4].'Green Points<br>換取'.$thecouponname[4].'</a>
  <a href="qsh.php?url=couponok&coupon='.$thecouponname[5].'&couponid='.$thecouponid[5].'" class="coupon">以'.$thecouponpoint[5].'Green Points<br>換取'.$thecouponname[5].'</a>   
 </div>
    
	'
	;
			}
				elseif($couponqty==7)  //3个优惠券的情况
		{


		
	$couponstr ='

	<div class="swiper-slide" style="margin-top:260px;margin-left:-250px" > 
 <p align="center" style="margin-top:-50px"><a href="qsh.php?url=couponok&coupon='.$thecouponname[0].'&couponid='.$thecouponid[0].'" class="coupon">以'.$thecouponpoint[0].'Green Points<br>換取'.$thecouponname[0].'</a>       <a href="qsh.php?url=couponok&coupon='.$thecouponname[1].'&couponid='.$thecouponid[1].'" class="coupon">以'.$thecouponpoint[1].'Green Points<br>換取'.$thecouponname[1].'</a>  

 </div>
 
 
  <div class="swiper-slide" style="margin-top:260px;margin-left:-250px" > 
 <p align="center" style="margin-top:-50px">
  <a href="qsh.php?url=couponok&coupon='.$thecouponname[2].'&couponid='.$thecouponid[2].'" class="coupon">以'.$thecouponpoint[2].'Green Points<br>換取'.$thecouponname[2].'</a>
  <a href="qsh.php?url=couponok&coupon='.$thecouponname[3].'&couponid='.$thecouponid[3].'" class="coupon">以'.$thecouponpoint[3].'Green Points<br>換取'.$thecouponname[3].'</a>   
 </div>
    
	
	
  <div class="swiper-slide" style="margin-top:260px;margin-left:-250px" > 
 <p align="center" style="margin-top:-50px">
  <a href="qsh.php?url=couponok&coupon='.$thecouponname[4].'&couponid='.$thecouponid[4].'" class="coupon">以'.$thecouponpoint[4].'Green Points<br>換取'.$thecouponname[4].'</a>
  <a href="qsh.php?url=couponok&coupon='.$thecouponname[5].'&couponid='.$thecouponid[5].'" class="coupon">以'.$thecouponpoint[5].'Green Points<br>換取'.$thecouponname[5].'</a>   
 </div>
    

  <div class="swiper-slide" style="margin-top:260px;margin-left:-250px" > 
 <p align="center" style="margin-top:-50px">
  <a href="qsh.php?url=couponok&coupon='.$thecouponname[6].'&couponid='.$thecouponid[6].'" class="coupon">以'.$thecouponpoint[6].'Green Points<br>換取'.$thecouponname[6].'</a>
 </div>


	'
	;


	}
					elseif($couponqty==8)  //3个优惠券的情况
		{
	
	$couponstr ='

	<div class="swiper-slide" style="margin-top:260px;margin-left:-250px" > 
 <p align="center" style="margin-top:-50px"><a href="qsh.php?url=couponok&coupon='.$thecouponname[0].'&couponid='.$thecouponid[0].'" class="coupon">以'.$thecouponpoint[0].'Green Points<br>換取'.$thecouponname[0].'</a>       <a href="qsh.php?url=couponok&coupon='.$thecouponname[1].'&couponid='.$thecouponid[1].'" class="coupon">以'.$thecouponpoint[1].'Green Points<br>換取'.$thecouponname[1].'</a>  

 </div>
 
 
  <div class="swiper-slide" style="margin-top:260px;margin-left:-250px" > 
 <p align="center" style="margin-top:-50px">
  <a href="qsh.php?url=couponok&coupon='.$thecouponname[2].'&couponid='.$thecouponid[2].'" class="coupon">以'.$thecouponpoint[2].'Green Points<br>換取'.$thecouponname[2].'</a>
  <a href="qsh.php?url=couponok&coupon='.$thecouponname[3].'&couponid='.$thecouponid[3].'" class="coupon">以'.$thecouponpoint[3].'Green Points<br>換取'.$thecouponname[3].'</a>   
 </div>
    
	
	
  <div class="swiper-slide" style="margin-top:260px;margin-left:-250px" > 
 <p align="center" style="margin-top:-50px">
  <a href="qsh.php?url=couponok&coupon='.$thecouponname[4].'&couponid='.$thecouponid[4].'" class="coupon">以'.$thecouponpoint[4].'Green Points<br>換取'.$thecouponname[4].'</a>
  <a href="qsh.php?url=couponok&coupon='.$thecouponname[5].'&couponid='.$thecouponid[5].'" class="coupon">以'.$thecouponpoint[5].'Green Points<br>換取'.$thecouponname[5].'</a>   
 </div>
    

  <div class="swiper-slide" style="margin-top:260px;margin-left:-250px" > 
 <p align="center" style="margin-top:-50px">
  <a href="qsh.php?url=couponok&coupon='.$thecouponname[6].'&couponid='.$thecouponid[6].'" class="coupon">以'.$thecouponpoint[6].'Green Points<br>換取'.$thecouponname[6].'</a>
  <a href="qsh.php?url=couponok&coupon='.$thecouponname[7].'&couponid='.$thecouponid[7].'" class="coupon">以'.$thecouponpoint[7].'Green Points<br>換取'.$thecouponname[7].'</a>

 </div>


	'
	;


			}
			
						elseif($couponqty==9)  //3个优惠券的情况
		{
	 

	$couponstr ='

	<div class="swiper-slide" style="margin-top:260px;margin-left:-250px" > 
 <p align="center" style="margin-top:-50px"><a href="qsh.php?url=couponok&coupon='.$thecouponname[0].'&couponid='.$thecouponid[0].'" class="coupon">以'.$thecouponpoint[0].'Green Points<br>換取'.$thecouponname[0].'</a>       <a href="qsh.php?url=couponok&coupon='.$thecouponname[1].'&couponid='.$thecouponid[1].'" class="coupon">以'.$thecouponpoint[1].'Green Points<br>換取'.$thecouponname[1].'</a>  

 </div>
 
 
  <div class="swiper-slide" style="margin-top:260px;margin-left:-250px" > 
 <p align="center" style="margin-top:-50px">
  <a href="qsh.php?url=couponok&coupon='.$thecouponname[2].'&couponid='.$thecouponid[2].'" class="coupon">以'.$thecouponpoint[2].'Green Points<br>換取'.$thecouponname[2].'</a>
  <a href="qsh.php?url=couponok&coupon='.$thecouponname[3].'&couponid='.$thecouponid[3].'" class="coupon">以'.$thecouponpoint[3].'Green Points<br>換取'.$thecouponname[3].'</a>   
 </div>
    
	
	
  <div class="swiper-slide" style="margin-top:260px;margin-left:-250px" > 
 <p align="center" style="margin-top:-50px">
  <a href="qsh.php?url=couponok&coupon='.$thecouponname[4].'&couponid='.$thecouponid[4].'" class="coupon">以'.$thecouponpoint[4].'Green Points<br>換取'.$thecouponname[4].'</a>
  <a href="qsh.php?url=couponok&coupon='.$thecouponname[5].'&couponid='.$thecouponid[5].'" class="coupon">以'.$thecouponpoint[5].'Green Points<br>換取'.$thecouponname[5].'</a>   
 </div>
    

  <div class="swiper-slide" style="margin-top:260px;margin-left:-250px" > 
 <p align="center" style="margin-top:-50px">
  <a href="qsh.php?url=couponok&coupon='.$thecouponname[6].'&couponid='.$thecouponid[6].'" class="coupon">以'.$thecouponpoint[6].'Green Points<br>換取'.$thecouponname[6].'</a>
  <a href="qsh.php?url=couponok&coupon='.$thecouponname[7].'&couponid='.$thecouponid[7].'" class="coupon">以'.$thecouponpoint[7].'Green Points<br>換取'.$thecouponname[7].'</a>

 </div>


  <div class="swiper-slide" style="margin-top:260px;margin-left:-250px" > 
 <p align="center" style="margin-top:-50px">
  <a href="qsh.php?url=couponok&coupon='.$thecouponname[8].'&couponid='.$thecouponid[8].'" class="coupon">以'.$thecouponpoint[8].'Green Points<br>換取'.$thecouponname[8].'</a>

 </div>


	'
	;
	 
	 
	 
	 
			}
				
		return $couponstr;
		
	  }
	  
	  
	  
	  
	  if ($cishu  <= 10)
	  {
		  
		   coupon();
		
		  
	  }
	  
	  
	   
	 


 


if ($huodao>58)
{
	 $huanshui='<div class="huanshui" style="font-size:16px">4 3 0 毫升屈臣氏蒸餾水<br>已暫時換罄</a>' ;
	
 
}
else
{
 $huanshui=' <a style="margin-top:-10px;font-size:16px" href="qsh.php?url=rewardwaiting&mid='.$mid.'&dateline='.$dateline.'&user='.$user.'&isqcs='.$isqcs.'&isother='.$isother.'&totalquantity='.$totalquantity.'&nowquantity='.$nowquantity.'&zengjiadejifen='.$zengjiadejifen.'&zongjifen='.$zongjifen.'" class="huanshui">以 50 Green Points<br>換領蒸餾水430毫升壹支</a>' ;
	
}
	 
	  
	 
	 
	 
	 		echo '    
   
      
<td  colspan="3"  style="font-size:12px"><div align="center"  style="font-size:12px;margin-top:-22220px" >
</div><br></td>
     </tr>
 
        <td  colspan="3" ><div align="center"  ><br></div><br></td>
     </tr>
    <tr>
      <td colspan="3" height="75px" >
      <div style="margin-top:20px" align="center" > 
	  
	  
	  
	  
	   
<div id="certify" style="margin-top:-380px" >
<div class="swiper-container">
<div class="swiper-wrapper">




	  
	 
 
 '.$couponstr.'


 
 
   
 
 
 
 
 
</div>
</div> ';


if ($outcouponqty<>0)
{

echo 
'
<div class="swiper-button-prev"></div>
<div class="swiper-button-next"></div>';
}

echo '
</div>
    
    <div style="margin-top:-100px">
	
	<tr width="900"   > 
     
 
       
	  
		
		      <td width="240" align="right"    >  <div class="span3"    >
           <div align="center" style="margin-left:-25px  "  ><a href="index.php" class="btn2"   >繼續投放</a> </div>
	
      </div></td> 
	  
	  
		
		
	    <td width="244" height="36" align="right"    >  
      
       
            <div class="span3"  >
           <div align="center" > ';
		   
		   
		   
		   
		   
		   
		   
		   
		   
		   
		   
		   
		   
		   
		   
		   
		   
	
 if ($jifen>=50)
 {	 
		   
echo 		 $huanshui;

 
 }		   
		   
		   echo ' </div>
        </div>   </td>
	 
      <td width="280"   >  <div class="span3"    style="margin-left:30px">
   <div   ><a href="qsh.php?url=thanks&mid='.$mid.'&dateline='.$dateline.'&user='.$user.'&isqcs='.$isqcs.'&isother='.$isother.'&totalquantity='.$totalquantity.'&nowquantity='.$nowquantity.'&zengjiadejifen='.$zengjiadejifen.'&zongjifen='.$zongjifen.'"  class="btn2">結束回收</a> </div>
    			 
      </div></td>     
 
   
    </table>
 ';
	 









	  

 
		
		
  
 
  
	  
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
window.location.href='index.php';   
		                    
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
		                          
		                         evdata.data.btn.click();    
		                     }    
		             }    
		                    
		            });    
		    });    
		        
		});  
	</script>
 
 
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
   <input id="btn" type="hidden" value="测试" />  
 







<script>
certifySwiper = new Swiper('#certify .swiper-container', {
	watchSlidesProgress: true, 
	slidesPerView: 'auto',
	centeredSlides: true,
	loop: true,
	loopedSlides: 5,
	autoplay: false,
	navigation: {
		nextEl: '.swiper-button-next',
		prevEl: '.swiper-button-prev',
	},
	pagination: {
		el: '.swiper-pagination',
		//clickable :true,
	},
	on: {
		progress: function(progress) {
			for (i = 0; i < this.slides.length; i++) {
				var slide = this.slides.eq(i);
				var slideProgress = this.slides[i].progress;
				modify = 0.2;
				if (Math.abs(slideProgress) > 21) {
					modify = (Math.abs(slideProgress) - 1) * 0.2 + 1;
				}
				translate = slideProgress * modify * 260 + 'px';
				scale = 1 - Math.abs(slideProgress)  ;
				zIndex = 999 - Math.abs(Math.round(10 * slideProgress));
				slide.transform('translateX(' + translate + ') scale(' + scale + ')');
				slide.css('zIndex', zIndex);
				slide.css('opacity', 1);
				if (Math.abs(slideProgress) > 1) {
					slide.css('opacity', 0);
				}
			}
		},
		setTransition: function(transition) {
			for (var i = 0; i <  this.slides.length; i++) {
				var slide = this.slides.eq(i)
				slide.transition(transition);
			}

		}
	}

})
</script> 





 	
     <script type="text/javascript" src="js/timecountdown.js"></script>
 
 

 <script language="javascript" type="text/javascript"> 
// 以下方式直接跳转
 
// 以下方式定时跳转
setTimeout("javascript:location.href='thanks.php'", 120000); 
</script>









