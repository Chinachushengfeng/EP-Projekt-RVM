 
    <?php
 
	  
include("IncDB.php");
				 
error_reporting(0);
//微信扫码  	    
 header("Content-type: text/html; charset=gb2312"); 
 
 $sql="select * from command ";
 $result=mysqli_query($link,$sql);
 $result=mysqli_fetch_array($result);

$userscan=$result['userscan'];

 
  if($userscan=="141592653589793238462643383279502")
       
{

   $sql="update command set userscan='' ";
 mysqli_query($link,$sql);
 

     
        
 set_time_limit(0);//无限请求超时时间    
$i=0;    
while (true){    
    //sleep(1);    
    usleep(500000);//0.5秿   
    $i++;    
        
      
        $arr=array('success'=>"1",'name'=>'pp','text'=>"55");    
        echo json_encode($arr);    
        exit();  

    

 
}

      
}


       
        else
		{
			
			   $sql="update command set userscan='' ";
 mysqli_query($link,$sql);
 

     
        
 set_time_limit(0);//无限请求超时时间    
$i=0;    
while (true){    
    //sleep(1);    
    usleep(500000);//0.5秿   
    $i++;    
        
      
        $arr=array('success'=>"0",'name'=>'pp','text'=>"55");    
        echo json_encode($arr);    
        exit();  

    

 
}

  
			
			
			
			
		}
		
		
 

	 
		
		
	 
  
	 
  
   
 ?>
 
 
   