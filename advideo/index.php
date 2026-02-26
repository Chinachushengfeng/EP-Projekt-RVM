<!DOCTYPE html>
<html>
	<head>
		 
  <meta charset="utf-8" http-equiv="refresh" content="220;url=index.php">
		<link rel="stylesheet" href="css/style.css" />
		<script type="text/javascript" src="js/jquery-1.7.2.min.js" ></script>
		<script type="text/javascript" src="js/main.js" ></script>
		<title></title>
	</head>
 <body leftmargin=0 topmargin=0 oncontextmenu='return false' ondragstart='return false' onselectstart='return false' onselect='document.selection.empty()' oncopy='document.selection.empty()' onbeforecopy='return false'>
 
 	<div id="cans">

<?php 

 include("IncDB.php");
 
 
 			
					$sql="select * from  machineinformation  ";
					
					$result=mysqli_query($link,$sql);
					
					$result=mysqli_fetch_array($result);
				
				$mute=$result['mute'];
				
				if ($mute==0)
				{
					$mute="muted";
				}
				else{
					
					$mute="";
				}
 
 ?>
			<video   autoplay="autoplay" <?php echo $mute; ?>  id="video" 　src=""   height="630px" width="100%">
				
			</video>
			<aside id="playList">
				<header>
					<h4> </h4>
				</header>
				<ul>
				 
				<?php  
				
				
				
				
 
					
					
						
					$sql="select * from  machineinformation  ";
					
					$result=mysqli_query($link,$sql);
					
					$result=mysqli_fetch_array($result);
				
				$num=$result['record'];
					
					
					
				 
					
			 
					
						$sql='select * from  machineinformation where v_top'.$num.' <> "" ';
					
					$result=mysqli_query($link,$sql);
					
					$result=mysqli_fetch_array($result);
				
				$vtopstr="v_top".$num;
     			if	( $result[$vtopstr])
					
					{
						
						
				 

$sql="select * from machineinformation ";

$nextnum=mysqli_query($link,$sql);
$nextnum=mysqli_fetch_array($nextnum);

$nextnum=$nextnum['record']+1;
echo $nextnum; 
					$sql='select * from  machineinformation where v_top'.$nextnum.' <> "" ';
					$result1=mysqli_query($link,$sql);    // 判断下一个是否有广告,没有广告record就成0重新开始播放
					$result1=mysqli_fetch_array($result1);
					
					$vtopstr1="v_top".$nextnum;
				  if (!$result1[$vtopstr1])
				  {
					  		
						$sql="update machineinformation set record=0";
				   mysqli_query($link,$sql);

					  
				  }

else{
	 
						$sql="update machineinformation set record=record+1";
				   mysqli_query($link,$sql);


}
					//	  echo $thetotal;
					}

						 
  
				
	 	
					echo '<li value="'.$result[$vtopstr].'" title=" "></li>'.$vtopstr;
				
  
					
					?>
					
					
				</ul>
				<!--<button title="展开播放列表" id="playList-show"> > </button>-->
				<button title=" " id="playList-hidden"> < </button>
			</aside>
			<button title=" " id="playList-show1">  </button>
			 
 
 


 





<script type='text/javascript'>
var  myvideo = document.getElementById('video');
myvideo.addEventListener('ended',myHandler,false);
myvideo.onclick = function(){
	//alert("这是第一种点击方式");
	 myvideo.play();
}
  
    function myHandler(e) {

       　　  // need to show a hidden div!

<?php 


echo 'window.location.href="index.php";';
 
 
 
?>
    }
</script>


  
	 
	 
		</div>
	</body>
</html>
