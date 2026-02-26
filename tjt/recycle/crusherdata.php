<?php
	
	
//1开门成功 
//2到位成功  
//3:没扫描到 
//4条码不符 
//5超重 
//6过轻 
//7回收成功 
//8回收失败 
//9退瓶成功 
//10关门成功 
//11机内有瓶子 
//12图像识别失败
 



date_default_timezone_set("PRC");	

include("IncDB.php");
include("function/sql.php");


error_reporting(0); 


$command=select("command","recognitionstatus");
  
  $errorcode=select("command","errorcode");
  
  
  
 $close=$_GET['close'];
 
 
         if($close=="1")
		{
			
			
			 
 

			
		if($command=="10")	
		{ 
		
 $arr=array('success'=>'close');    
    echo json_encode($arr); 
			
			
			exit; 
		}
	 
 
		

		
 exit;
		}
		 
		 
		 
		 
 
   
 //1开门成功 2到位成功  3:没扫描到 4条码不符 5超重 6过轻 7回收成功 8回收失败 9退瓶成功 10关门成功 11机内有瓶子 12图像识别失败
 

    // if ($command==20 )   //&& $cishu<10  //success
	
	// { 
 
 	// $arr=array('success'=>"20" );    
    // echo json_encode($arr); 
					 


  // $sql="update command set recognitionstatus=0 ";
 // mysqli_query($link,$sql);	 



 // exit();   

			// }
			
			
			

if ($command==20)   //  恢复页面  
{ 
	
	 
 	$arr=array('success'=>"20" );    
    echo json_encode($arr); 
			


  $sql="update command set recognitionstatus=0 ";
 mysqli_query($link,$sql);	 


 
				   exit(); 
	
	
	
} 


 			

if ($command==10)   //  恢复页面  
{ 
	
	 
 	$arr=array('success'=>"10" );    
    echo json_encode($arr); 
			


   


 
				   exit(); 
	
	
	
} 


 
 
 

else

			{
				
				$arr=array('success'=>"0" );    
				echo json_encode($arr); 
								 
						 
						 
						 
							   exit();  

				
				
			}	
				  
	  


  
   
 ?>
 
 
   