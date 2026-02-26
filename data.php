 
 
    <?php
 
	  error_reporting(0);
 include("IncDB.php");
				 
				 
		 
	  


	
 $sql="select * from command";
$result = mysqli_query($link,$sql);
$result= mysqli_fetch_array($result);
 
$jiejin=$result['jiejin'];

 $doing=$result['doing'];

    if ($jiejin==1  ) 
	{
 
 
 
 set_time_limit(0);//无限请求超时时间    
$i=0;    
while (true){    
    //sleep(1);    
    usleep(30000);//0.5秿   
    $i++;    
        
      
      
 
        $arr=array('jiejin'=>'1');    
        echo json_encode($arr);    
      
       exit();  



	} 
	
}

 
	

else
{
	
 
 
 set_time_limit(0);//无限请求超时时间    
$i=0;    
while (true){    
    //sleep(1);    
    usleep(60000);//0.5秿   
    $i++;    
        
      
      
 
        $arr=array('jiejin'=>'8');    
        echo json_encode($arr);    
      
       exit();  



} 
	
	
	
}

		  
	 ?>
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   