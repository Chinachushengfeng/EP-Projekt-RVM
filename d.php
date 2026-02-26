<?php 

error_reporting(0);

$num1=0;
$num0=0;
$mynum=array();
 $chuxianchishu1=0;
$chuxianchishu0=0;	
$zuigao1=0;
$zuigao0=0;
$cost=10;
$earn=0;

$beishu=2.3;
$rd=1000;


$lost=0;
$resultlost=0;
for($i=0;$i<=1000;$i++)
{
	
		   $num=rand(0,1);
				
		array_push($mynum,$num);
		
				
 echo $num;
 
 $index= count($mynum);

 



 
if(  $num  ==1 )
{
 $index= count($mynum);
 
	 
  if($mynum[ $index-2]=="0" || $mynum[ $index-2]==NULL )  
 {
	 
	 $lost=0;
 
	 $diyici=$cost;
 }//如果上一个是赢


else
{
		 $diyici=0;
}


 
 

$lost= $lost*$beishu+$diyici ;

 
   
if($lost>$rd  )
{
 
 
	$n=$n+1;
	
	if($n==1)
	{
		
	//echo  $n.'d';
  // echo 'RD';
  $lost=$cost; 
  $n=0;
  
	}
	 
	
 
	$totallostmax700=$totallostmax700+$lost;
	
	
	
  //  echo "<".$earn.">";

  
}
 //echo "[".$lost."]";





 //echo '{-'.$lost.'-}';

	$resultlost=	$resultlost+$lost;

 

 
  
 // echo "【累输：".$resultlost."】";

 
 
}
 
if(   $num  ==0 ) //赢
{
 
 
 
 
 
 
	   if($mynum[ $index-2]=="1" )  
		   
 {
$win=($lost*$beishu)*0.9; 

//echo '['.$lost*beishu.']';
if( $resultlost>$rd)
{
	//echo '到了';
	$lost=$cost; 
	$win=$cost*0.9; 
}


 }
 else
 {
	$win=$cost*0.9; 
	 
 }
 
 
 
	
 


$earn=$win+$earn;

 
$win=0;
 
  //echo '['.$cost.']';
  //echo "<累赢：".$earn.">";
}


 
if((count($mynum)) % 150 ==0)
{
	echo '<br>';
}
			if($num==0)
			{
				$num1=$num1+1;
				
	
			}
			else
			{
				
					$num0=$num0+1;
			 
			}


	$chuxianchishu1=0;

$currentcount=count($mynum);
 		
			 for($j=0;$j<=10;$j++)
			 {
				 
			
			
				if($mynum[$currentcount-$j]==1)
				{
					
					$chuxianchishu1=$chuxianchishu1+1; 
			
 
	 
	 
	 	  if($chuxianchishu1==10)
			  {
				     
				$chuxianchishu1=0;
			    $zuigao1=$zuigao1+1;
				 
             break;
  

			// echo '<zhigao>:'.$chuxianchishu1.'<zuigao>';
			  }	
			 
	 
	 
				}
				 else{
					 
					 	$chuxianchishu1=0;
				 }
			  
			 
		
			  
			  
		 
			 }




}

 

 echo "<br>";
  echo "<br>";
  
  
  echo "赢钱总数:".($earn).'<br>';
  echo "连败熔断输钱数：".$totallostmax700.'<br>';
  
  echo "输钱总数：".$resultlost.'<br>';
  
  
  ECHO '盈利'.($earn-$resultlost).'<br>';
 // echo '<br>';
 
// echo "输钱总数:".$resultlost;
echo "<br>";
  
 echo  "总样本：".count($mynum); echo "<br>";
echo "1000个样本出现连续10连败的次数=". $zuigao1;

echo "<br>";
echo "赢的次数:".$num1;
echo "<br>";
echo "输的次数:".$num0;


echo "<br>";

$m=$cost;
echo $cost."+";
for ($i=0;$i<20;$i++)
{
	
	
	
	  $m=$m*$beishu;
	
	echo  number_format($m,0) ."+";
	
	
	
	
	
	
}


















?>