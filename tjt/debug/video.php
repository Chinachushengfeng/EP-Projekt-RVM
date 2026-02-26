<!DOCTYPE html>
<html lang="en" oncontextmenu="return false" onselectstart="return false" oncopy="return false">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>  RVM</title> 
    <link rel="stylesheet" type="text/css" href="./css/debug.css"> 
    <script type="text/javascript" src="./js/myjs.js"></script>
 
	
</head>
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
	background-image :url(img/bg.jpg);
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

a:link{text-decoration: none;color: #004607}

a:active{text-decoration:blink}

a:hover{text-decoration:underline;color:  #004607}

a:visited{text-decoration: none;color:  #004607}

</style> 
<body> 
 <br><br><br><br> 
    <!-- 調試頁面 -->
	 
 
	
   
	

	  <img src='img/video.png' width=100% style="margin-top:-95px;margin-left:-8px;position:absolute;z-index:-1"></img><!-- 輪播圖 -->
	
	
	
 	<br><br><br><br><br><br>
  	<br><br><br><br><br><br> 	
	<br><br><br><br><br><br>
	
	
                <?php 
				error_reporting(0);
				 
 function printdir($dir)
{$filetime = 0;
	$files = array();
	//opendir() 打开目录句柄
	if($handle = @opendir($dir)){
	//readdir()从目录句柄中（resource，之前由opendir()打开）读取条目,
	// 如果没有则返回false
		while(($file = readdir($handle)) !== false){//读取条目
			if( $file != ".." && $file != "."){//排除根目录
				if(is_dir($dir . "/" . $file)) {//如果file 是目录，则递归
					$files[$file] = printdir($dir . "/" . $file);
				} else {
					//获取文件修改日期
					 
					//文件修改时间作为健值
					$files[$filetime] = $file;
					$filetime = $filetime+1;
				}
			}
		}
		@closedir($handle);
		return $files;
	}
	
} 

function arraysort($aa) {
	if( is_array($aa)){
		ksort($aa);
		foreach($aa as $key => $value) {
			if (is_array($value)) {
				$arr[$key] = arraysort($value);
			} else {
				$arr[$key] = $value;
			}
		}
		return $arr;
	} else {
		return $aa;
	}
}


   
$dir = "../../check/";//目录

$videoname=$dir.$_GET['videoname'];
//echo $videoname;
$filename=   arraysort(printdir($dir));   //原本是end函数
 $filename=array_reverse($filename);
 unset($filename[0]);
 $page= $_GET['page'];
if (!$page)
{
	
$page="1";

}

 $num=4;
$themynum=1;
 
 
				if ($page=="1")
				{

				$offset=0; 


				}

				else 
				{

				$offset=($page-1)*$num;

				}

				  
foreach ($filename as $myvalue)
{
	 
	 
	 if ($themynum>=$offset+1)
	 {
	echo '<a href="?page='.$page.'&videoname='.$myvalue.'"><button ">'.$myvalue.'</button></a>';
	
	
	
					 
				 if(fmod($themynum,$num)==0   )
				 {
					  
						 
						  break;
							 	
				 }
				 
	 }
	
	

 
	$themynum=1+$themynum;
}


  
 
 
 
  $total=sizeof($filename); 
  $pagenum=ceil($total/$num);
  
   If($page>$pagenum || $page == 0)
			 {
				Echo "No File Current".'<span style="font-size:18px;"> </span><span style="font-size:24px;"> </span>';
			//	Exit;
			 }
 if ($page=="1")
 {
      $offset=0; 
	 

 }
 else 
{
   $offset=($page-1)*$num; 
 }
  
  
  
  
				
				
				
				echo '<br> 
				
				<div style="margin-left:40%;margin-top:5%">';
				
		 $page1=$page-1;
	  
	  $show=($page!=="1")? '<a href="video.php?page=1&starttime='.$starttime.'&endtime='.$endtime.'&district='.$district.'">第1页</a><a href="video.php?page='.$page1.'&starttime='.$starttime.'&endtime='.$endtime.'&district='.$district.'"><<上一页 </a>  ':"<<上一页";
       Echo $show." ";
	     
	 
For($i=$page-4,$pagecount=1;$i<=$pagenum && fmod( $pagecount,10)!=0  ;$i++,$pagecount++){



  if($i<=0)
 {
	 $i=$pagecount;
 }

		 				
       $show=($i!=$page)? ' <a href="video.php?page='.$i.'&starttime='.$starttime.'&endtime='.$endtime.'&district='.$district.'">'.$i.'</a>':"<b>$i</b>";
       Echo $show." ";
		 	    
		
		 
		
}


 

	 $page1=$page+1;
		
		
		  if($page!=$pagenum)
		  {
		  $show='<a href="video.php?page='.$page1.'&starttime='.$starttime.'&endtime='.$endtime.'&district='.$district.'">下一页>></a><a href="video.php?page='.$pagenum.'&starttime='.$starttime.'&endtime='.$endtime.'&district='.$district.'">共'.$pagenum.'页</a>';
		  }
		  else
		   {
		  
		 $show= "下一页>>";
		  
		  }
		  
		  
		  
       Echo $show." ";
	    
	
  ?>
				
				 
				</div>
				
				 
				
				
				<br><br><br>
 <video  controls="controls" controls="controls" src="<?php echo $videoname;?>" muted="ture" width=540px height=540px  autoplay="autoplay" style="margin-left:250px"> </video>
		 
		 	
				
		<div style="margin-left:20px;font-size:40px"><a href="index.html">  <-BACK </a></div>
		 
</body>

</html>