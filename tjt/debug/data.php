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
 
error_reporting(0);
 
			
				$sql="update command set command='2'";
				mysqli_query($link,$sql);	
 
$sql="select * from command ";
$comresult=  mysqli_query($link,$sql);
$comresult=mysqli_fetch_array($comresult);
$userscan=$comresult['userscan'];
 
 
    if (strlen ($userscan)>=3  )   //&& $cishu<10  //success
	
	{
		  
		   
	  
		 
 
 
 
 	$arr=array('success'=>"1",'num'=>1,'value'=>$userscan);    
    echo json_encode($arr); 
					
 
	    usleep(100000);//0.5秿   
	  
}  
      
         


else 

{

  
      
        
 set_time_limit(100000);//无限请求超时时间    
$i=0;    
while (true){    
    //sleep(1);    
    usleep(100000);//0.5秿   
    $i++;    
        
      
        $arr=array('success'=>"0",'num'=>'1','value'=>"1");    
        echo json_encode($arr);    
        exit();  

    

 
}




      
}


 

	 
		
		
	 
  
	 
  
   
 ?>
 
 
   