<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />  
 <meta charset="utf-8" http-equiv="refresh" content="20;url=index.php">
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
 <body leftmargin=0 topmargin=0 oncontextmenu='return false' ondragstart='return false' onselectstart='return false' onselect='document.selection.empty()' oncopy='document.selection.empty()' onbeforecopy='return false'>

 
 
<div class="content" style="width:10px" auto;overflow:hidden;">
    <div id="slider">

	<?php
    include("IncDB.php");
										
	$sql="select * from  machineinformation  ";
	$result=mysqli_query($link,$sql);
	$result=mysqli_fetch_array($result);
	$therecord=$result['downrecord'];

	for ($num=0;$num<30;$num++) {
        $sql='select * from  machineinformation where p_down'.$num.' <> "" ';
		$result=mysqli_query($link,$sql);
		$result=mysqli_fetch_array($result);
		$vdownstr="p_down".$num;
		if	( $result[$vdownstr]) {
            $thetotal=$num;
        }
    }

	if ($therecord >= $thetotal  or $therecord  == $thetotal -1 ) {
        $sql="update  machineinformation set downrecord=0";
        mysqli_query($link,$sql);
    } else {
        $sql="update  machineinformation set downrecord=downrecord+1";
        mysqli_query($link,$sql);
    }

	for ($i=0;$i<4;$i++) {
        $thei=$i+$therecord;
        $p_down="p_down".$thei;
        $sql = "select * from machineinformation where $p_down<>''   " ;
        $result= mysqli_query($link,$sql);
        $result= mysqli_fetch_array($result);

        if (!$result[$p_down]) {
            $therecord=0;
            $p_down="p_down0" ;
        }
						$sql = "select * from machineinformation    " ;
					$result= mysqli_query($link,$sql);
					$result= mysqli_fetch_array($result);

				 echo '<a href="#"><img src="'.$result[$p_down].'"  /></a>    ';
      //  echo '<a href="#"><img src="/downadpic/img/automat'.$i.'.jpg"  /></a>    ';

					}
					?>
					
					 
				</div>
			</div>
	
    <script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>
	<script type="text/javascript" src="js/slider.min.js"></script>
	<script type="text/javascript">
		$(function() {
			$('#slider').vmcSlider({
				width: 1080,
				height: 730,
				gridCol: 10,
				gridRow: 5,
				gridVertical: 20,
				gridHorizontal: 10,
				autoPlay: true,
				ascending: true,
				effects: [
					'fade', 'fadeLeft', 'fadeRight', 'fadeTop', 'fadeBottom', 'fadeTopLeft', 'fadeBottomRight',
					'blindsLeft', 'blindsRight', 'blindsTop', 'blindsBottom', 'blindsTopLeft', 'blindsBottomRight',
					'curtainLeft', 'curtainRight', 'interlaceLeft', 'interlaceRight', 'mosaic', 'bomb', 'fumes'
				],
				ie6Tidy: false,
				random: false,
				duration: 15000,
				speed: 1200
			});
		});
	</script>
</body>

	
				<?php  
				
				
						 
				
				
			//<body leftmargin=0 topmargin=0 oncontextmenu='return false' ondragstart='return false' onselectstart ='return false' onselect='document.selection.empty()' oncopy='document.selection.empty()' onbeforecopy='return false' onmouseup='document.selection.empty()'>
 	
				
 include("IncDB.php");
										
					$sql="select * from  machineinformation  ";
					
					$result=mysqli_query($link,$sql);
					
					$result=mysqli_fetch_array($result);
				
     				
				$therecord=$result['downrecord'];
					

 
					
					for ($num=0;$num<30;$num++)
						
						{
					
						$sql='select * from  machineinformation where p_down'.$num.' <> "" ';
					
					$result=mysqli_query($link,$sql);
					
					$result=mysqli_fetch_array($result);
				
				$vdownstr="p_down".$num;
     			if	( $result[$vdownstr])
					
					{
						
						$thetotal=$num;
				 
				 	  echo $thetotal;
					}


						}
						
						
						?>
</html>


 