 
<link rel="stylesheet" href="../../css/style.css">
         <link rel="stylesheet" href="css/bootstrap.min.css"> 
        <link rel="stylesheet" href="css/fakeloader.css">
        
        
    <script src="jquery-1.9.1.min.js"></script> 
        <script src="js/jquery.min.js"></script>
        <script src="js/fakeloader.min.js"></script>
        
<style type="text/css">
body {
	background-image: url(../../images/wait.jpg);
	background-repeat: no-repeat;
}
</style>
</head>

<body>

   <div class="fakeloader" style="margin-top:300px;margin-left:0%"></div>

     
 
        <script>
            $(document).ready(function(){
                $(".fakeloader").fakeLoader({
                    timeToHide:51200,
              
                    spinner:"spinner2"
                });
            });
        </script>
  <p> 
   
    
  </head>
  <body>
   
 </p>  
 <?php 
 
 
  error_reporting(0); 
 
  date_default_timezone_set("PRC");
 include("IncDB.php");
 
 


 
$sql="select * from user";
$result=mysqli_query($link,$sql);
$result=mysqli_fetch_array($result);              

$mid=$result['mid'];
$isqcs=$result['isqcs'];
$isother=$result['isother'];
$user=$result['user'];

   
$sql="select * from command";
$result=mysqli_query($link,$sql);
$result=mysqli_fetch_array($result);
$userReference=$result['json'] ;
$reqMsgId =$result['latitude'] ;
$alipayid=$result['alipayid'];
 

$value=($isqcs*0.2+$isother*0.1)*100;
// $value="10";


  $auth_url = 'http://hk04aswirvmuat.eastasia.cloudapp.azure.com/qcsqcs/urlget/alp.php?alipayid='.$alipayid.'&mid='.$mid.'&alipayuserid='.$userReference.'&alipayisqcs='.$isqcs.'&alipayisother='.$isother.'&alipaytotalamount='.$value.'&user='.$user.'&alipaycreatenum=0&alipayisok=giveuptogiveup&alipaytopupRequestId=usergiveup&fundorderid=&reqmsgid='.$reqMsgId.'&reqtime=';
  
  
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $auth_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT,5); 
$response = curl_exec($ch); 
curl_close($ch); 


 ?>
 
 
 


 	
     <script type="text/javascript" src="js/timecountdown.js"></script>
 
 

 <script language="javascript" type="text/javascript"> 
// 以下方式直接跳转
 
// 以下方式定时跳转
setTimeout("javascript:location.href='../../../tjt/index.php'", 1000); 
</script>


 
 
 
 