 
    
   
   
   
    
    <?php
 
	  error_reporting(0);
 include("IncDB.php");
				 
				 
		 
	
	
//error_reporting(0);
//微信扫码  	    
// header("Content-type: text/html; charset=gb2312"); 
//$user=$_GET['user'];
 
 
 
// if ($user) 
 //{
 
	 
 // $sql="INSERT INTO user (user, islogin) VALUES ('$user', '1') ";
//$result=mysqli_query($link,$sql); 
 
 
//} 

	 
$sql="select * from machineinformation  ";
$result = mysqli_query($link,$sql);
$result= mysqli_fetch_array($result);

 
$auth_url = "http://hk04aswirvmuat.eastasia.cloudapp.azure.com/qcsqcs/urlget/getnewad.php?mid=".$result['mid'] ;
 


$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $auth_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_TIMEOUT,28);
$response = curl_exec($ch);

 
curl_close($ch); 
$response = json_decode($response, true);
 
 
$getnewad=$response['getnewad'];
$ad0orpic1 =  $response ['ad0orpic1'];
$v_top0=  $response ['v_top0'];
$v_top1=  $response ['v_top1'];
$v_top2=  $response ['v_top2'];
$v_top3=  $response ['v_top3'];
$v_top4=  $response ['v_top4'];
$v_top5=  $response ['v_top5'];
$v_top6 =  $response ['v_top6'];
$v_top7=  $response ['v_top7'];
$v_top8=  $response ['v_top8'];
$v_top9=  $response ['v_top9'];
$v_top10 =  $response ['v_top10'];
$v_top11=  $response ['v_top11'];
$v_top12=  $response ['v_top12'];
$v_top13=  $response ['v_top13'];
$v_top14 =  $response ['v_top14'];
$v_top15=  $response ['v_top15'];
$v_top16=  $response ['v_top16'];
$v_top17=  $response ['v_top17'];
$v_top18 =  $response ['v_top18'];
$v_top19=  $response ['v_top19'];
$v_top20=  $response ['v_top20'];
$v_top21=  $response ['v_top21'];
$v_top22 =  $response ['v_top22'];
$v_top23=  $response ['v_top23'];
$v_top24=  $response ['v_top24'];
$v_top25=  $response ['v_top25'];
$v_top26 =  $response ['v_top26'];
$v_top27=  $response ['v_top27'];
$v_top28=  $response ['v_top28'];
$v_top29=  $response ['v_top29'];
$v_top30 =  $response ['v_top30'];

$p_top0=  $response ['p_top0'];
$p_top1=  $response ['p_top1'];
$p_top2=  $response ['p_top2'];
$p_top3=  $response ['p_top3'];



$p_down0=  $response ['p_down0'];
$p_down1=  $response ['p_down1'];
$p_down2=  $response ['p_down2'];
$p_down3=  $response ['p_down3'];
$p_down4=  $response ['p_down4'];
$p_down5=  $response ['p_down5'];
$p_down6=  $response ['p_down6'];
$p_down7=  $response ['p_down7'];
$p_down8=  $response ['p_down8'];
$p_down9=  $response ['p_down9'];
$p_down10=  $response ['p_down10'];
$p_down11=  $response ['p_down11'];
$p_down12=  $response ['p_down12'];
$p_down13=  $response ['p_down13'];
$p_down14=  $response ['p_down14'];
$p_down15=  $response ['p_down15'];
$p_down16=  $response ['p_down16'];
$p_down17=  $response ['p_down17'];
$p_down18=  $response ['p_down18'];
$p_down19=  $response ['p_down19'];
$p_down20=  $response ['p_down20'];
$p_down21=  $response ['p_down21'];
$p_down22=  $response ['p_down22'];
$p_down23=  $response ['p_down23'];
$p_down24=  $response ['p_down24'];
$p_down25=  $response ['p_down25'];
$p_down26=  $response ['p_down26'];
$p_down27=  $response ['p_down27'];
$p_down28=  $response ['p_down28'];
$p_down29=  $response ['p_down29'];
$p_down30=  $response ['p_down30'];
$mute=  $response ['mute'];






 
    if ($getnewad==1)  
	
  
         
	{
		  
    $sql="UPDATE machineinformation SET ad0orpic1 ='$ad0orpic1' ,mute='$mute',
	v_top0 ='$v_top0' ,v_top1 ='$v_top1' ,v_top2 ='$v_top2' ,
	v_top3 ='$v_top3' ,v_top4 ='$v_top4' ,v_top5 ='$v_top5' ,v_top6 ='$v_top6' ,
	v_top7 ='$v_top7' ,v_top8 ='$v_top8' ,v_top9 ='$v_top9' ,v_top10 ='$v_top10' ,
	v_top11 ='$v_top11' ,v_top12 ='$v_top12' ,v_top13 ='$v_top13' ,v_top14 ='$v_top14' ,
	v_top15 ='$v_top15' ,v_top16 ='$v_top16' ,v_top17 ='$v_top17' ,v_top18 ='$v_top18' ,
	v_top19 ='$v_top19' ,v_top20 ='$v_top20' ,v_top21 ='$v_top21' ,v_top22 ='$v_top22',v_top23 ='$v_top23' ,
	v_top24 ='$v_top24' ,v_top25 ='$v_top25' ,v_top26 ='$v_top26' ,v_top27 ='$v_top27',v_top28 ='$v_top28' ,
	v_top29 ='$v_top29',v_top30 ='$v_top30' ,p_top0 ='$p_top0' ,p_top1 ='$p_top1' ,p_top2 ='$p_top2' ,
	p_top3 ='$p_top3' ,p_down0 ='$p_down0' ,	p_down1 ='$p_down1' ,p_down2 ='$p_down2' ,p_down3 ='$p_down3' ,
	p_down4 ='$p_down4' ,p_down5 ='$p_down5' ,p_down6 ='$p_down6' ,	p_down7 ='$p_down7' ,p_down8 ='$p_down8' ,p_down9 ='$p_down9' ,p_down10 ='$p_down10' ,
	p_down11 ='$p_down11' ,p_down12 ='$p_down12' ,p_down13 ='$p_down13' ,p_down14 ='$p_down14' ,
	p_down15 ='$p_down15' ,p_down16 ='$p_down16' ,p_down17 ='$p_down17' ,p_down18 ='$p_down18' ,
	p_down19 ='$p_down19' ,p_down20 ='$p_down20' ,p_down21 ='$p_down21' ,p_down22 ='$p_down22',p_down23 ='$p_down23' ,
	p_down24 ='$p_down24' ,p_down25 ='$p_down25' ,p_down26 ='$p_down26' ,p_down27 ='$p_down27',p_down28 ='$p_down28' ,
	p_down29 ='$p_down29',p_down30 ='$p_down30'	";
	
	
	
	
	
 
    mysqli_query($link,$sql); 	   	  
		  	 
			 
			 
			 //........................
	

    $sql="UPDATE machineinformationbackup SET ad0orpic1 ='$ad0orpic1' ,mute='$mute',
	v_top0 ='$v_top0' ,v_top1 ='$v_top1' ,v_top2 ='$v_top2' ,
	v_top3 ='$v_top3' ,v_top4 ='$v_top4' ,v_top5 ='$v_top5' ,v_top6 ='$v_top6' ,
	v_top7 ='$v_top7' ,v_top8 ='$v_top8' ,v_top9 ='$v_top9' ,v_top10 ='$v_top10' ,
	v_top11 ='$v_top11' ,v_top12 ='$v_top12' ,v_top13 ='$v_top13' ,v_top14 ='$v_top14' ,
	v_top15 ='$v_top15' ,v_top16 ='$v_top16' ,v_top17 ='$v_top17' ,v_top18 ='$v_top18' ,
	v_top19 ='$v_top19' ,v_top20 ='$v_top20' ,v_top21 ='$v_top21' ,v_top22 ='$v_top22',v_top23 ='$v_top23' ,
	v_top24 ='$v_top24' ,v_top25 ='$v_top25' ,v_top26 ='$v_top26' ,v_top27 ='$v_top27',v_top28 ='$v_top28' ,
	v_top29 ='$v_top29',v_top30 ='$v_top30' ,p_top0 ='$p_top0' ,p_top1 ='$p_top1' ,p_top2 ='$p_top2' ,
	p_top3 ='$p_top3' ,p_down0 ='$p_down0' ,	p_down1 ='$p_down1' ,p_down2 ='$p_down2' ,p_down3 ='$p_down3' ,
	p_down4 ='$p_down4' ,p_down5 ='$p_down5' ,p_down6 ='$p_down6' ,	p_down7 ='$p_down7' ,p_down8 ='$p_down8' ,p_down9 ='$p_down9' ,p_down10 ='$p_down10' ,
	p_down11 ='$p_down11' ,p_down12 ='$p_down12' ,p_down13 ='$p_down13' ,p_down14 ='$p_down14' ,
	p_down15 ='$p_down15' ,p_down16 ='$p_down16' ,p_down17 ='$p_down17' ,p_down18 ='$p_down18' ,
	p_down19 ='$p_down19' ,p_down20 ='$p_down20' ,p_down21 ='$p_down21' ,p_down22 ='$p_down22',p_down23 ='$p_down23' ,
	p_down24 ='$p_down24' ,p_down25 ='$p_down25' ,p_down26 ='$p_down26' ,p_down27 ='$p_down27',p_down28 ='$p_down28' ,
	p_down29 ='$p_down29',p_down30 ='$p_down30'	";
	 
    mysqli_query($link,$sql); 	   	  
		  	 	
			 
			 
			 
			 
			 
			 
			 
			 
			 
			 
			 
			 
			 
		  	 
 set_time_limit(0);//无限请求超时时间    
$i=0;    
while (true){    
    //sleep(1);    
    usleep(500000);//0.5秿   
    $i++;    
        
      
      
 
        $arr=array('getnewad'=>'1');    
        echo json_encode($arr);    
      
       exit();  



	  } 


		}


	
 
				 
 
	
 $sql="select * from command";
$result = mysqli_query($link,$sql);
$result= mysqli_fetch_array($result);
 
 
 
 
$jiejin=$result['jiejin'];

 $doing=$result['doing'];



 



 
 

if ( $doing ==0  && $jiejin==0 )
	
	{
 		
			set_time_limit(0);//无限请求超时时间    
			$i=0;    
			while (true){    
			//sleep(1);    
			usleep(60000000);//0.5秿   
	 
			$i++;    


 $sql="select * from command";
$result = mysqli_query($link,$sql);
$result= mysqli_fetch_array($result);
 $thedoing=$result['doing'];
 if( $thedoing==0)
{
			$arr=array('jiejin'=>'0');    
			echo json_encode($arr);    

			exit();  
}		
		
	}
 }
	

else
{
	
 
 
 set_time_limit(0);//无限请求超时时间    
$i=0;    
while (true){    
    //sleep(1);    
    usleep(400000);//0.5秿   
    $i++;    
        
      
      
 
        $arr=array('jiejin'=>'8');    
        echo json_encode($arr);    
      
       exit();  



} 
	
	
	
}

		  
	 ?>
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   