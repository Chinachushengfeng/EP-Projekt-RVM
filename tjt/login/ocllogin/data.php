 
    <?php
 
	  
include("IncDB.php");
				 
error_reporting(0);
//微信扫码  	    
 header("Content-type: text/html; charset=utf-8"); 
 
 $sql="select * from ocl ";
 $result=mysqli_query($link,$sql);
 $result=mysqli_fetch_array($result);

 $cardid =$result['cardid'];  //有用户拍卡
 $returncode=$result['returncode'];
  $value=$result['value'];
 
 
     if ( strlen( $cardid) >=7   )  
 
{ 
 
			 
	
 
	 	 setcookie("user",$cardid,time()+3600,"/" );
	 
	 
	
$sql="update command set userscan='$cardid'";
 mysqli_query($link,$sql);
 

 $sql="update ocl set lasttransaction='$cardid'";
 mysqli_query($link,$sql);
 
 
 
 set_time_limit(0);//无限请求超时时间    
$i=0;    
				while (true){    
				//sleep(1);    
				usleep(1000000);//0.5秿   
				$i++;    
 
 
				$arr=array('success'=>"1",'name'=>'pp','text'=>$returncode);   
				echo json_encode($arr);    
 
				exit();  


				}




}

elseif($returncode!="100032" && $returncode!="" && $returncode!="0" )
{
	
	 
 
 
 set_time_limit(0);//无限请求超时时间    
$i=0;    
				while (true){    
				//sleep(1);    
				usleep(1000000);//0.5秿   
				$i++;    
 
 
				$arr=array('success'=>"2",'name'=>$returncode,'text'=>$returncode);    
				echo json_encode($arr);    
 
 
 						

						
$b =  PHP_EOL .date( "Y/m/d H:i:s",time()).","."Errorcode:".$returncode;
 

file_put_contents("../../../ocl/ocl/ocleventlog.txt", $b , FILE_APPEND);




				exit();  


				}


	
}
     
 
	else

{

  
      
        
 set_time_limit(0);//无限请求超时时间    
$i=0;    
while (true){    
    //sleep(1);    
    usleep(1000000);//0.5秿   
    $i++;    
        
      
        $arr=array('success'=>"0",'name'=>'pp','text'=>"55");    
        echo json_encode($arr);    
        exit();  

    

 
}

      
}


       
        
		
		
 

	 
		
		
	 
  
	 
  
   
 ?>
 
 
   