<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="../../css/main.css">
    <script src="../../js/animation.js" defer></script>
    <link rel="stylesheet" href="../../css/end.css">
</head>

<body>
    <div class="main">
       <img src='../../img/end_smile.png'  style="width:48%;height:65%;margin-top:10%">
    </div>
</body>
<script>
    var main = document.getElementsByClassName('main')[0]
    main.style.opacity = 0
    // 倒计时60s
    let i = 3 // 倒计时秒数
    // 定时器 每隔一秒变化一次（1000ms = 1s）
    let t = setInterval(countDown, 1000);

    function countDown() {
        // 60 秒倒计时结束
        if (i === 1) {
            clearInterval(t);
            window.location.href = '../index.php';
        }
        i--;
    }
</script>


   
    
<script>
document.addEventListener('contextmenu', e => e.preventDefault());  // 禁止右键
document.addEventListener('selectstart', e => e.preventDefault()); // 禁止选中
document.addEventListener('dragstart', e => e.preventDefault());   // 禁止拖动
</script>

<?php 

  
date_default_timezone_set("PRC");
 
 
include("IncDB.php");

include("function/sql.php");
 


 
$transactionid= select('command','transactionid');
 
 
 $recognitionstatus  = select('command','recognitionstatus');
 
	
	
	  
$sql="update user_transaction set  transactiondone=2  where transactionid='$transactionid'";//標記結束transaction    //每次在載入首頁時候會檢查是否有0標記並上傳。
mysqli_query($link,$sql);


  
			 
 





 
 if ($recognitionstatus != '10'  )  //its means recycling door closed successful
	 
	 {
		 
		  	  Header("Location:../wait_restore.php");      
		  	exit;
	 }
	 
 
 




































$sql = "select * from user_transaction where uploaddone=0  "; //查找沒有update到服務器的。
$comresult = mysqli_query($link, $sql);
$comresult = mysqli_num_rows($comresult);

if ($comresult!=0) {
    $doup = 1; //標記


	$sql = "select * from barcode ";
    $comresult = mysqli_query($link, $sql);
    $comresult = mysqli_fetch_array($comresult);
    $barcodeversion = $comresult['version'];
	
	
 
    // echo $barcodeversion;
    $sql = "select * from command ";
    $comresult = mysqli_query($link, $sql);
    $comresult = mysqli_fetch_array($comresult);
    $statecode = $comresult['statecode'];
    $mid = $comresult['mid'];
	
 $errorcode=$comresult['errorcode'];
    $device = $comresult['device']; //device
    $storageplastic = $comresult['storageplastic']; //得到箱子的滿溢狀態
    if ($storageplastic == 1000) {
        $storageplastic = 10;
    }

  $storagecan = $comresult['storagecan']; //得到箱子的滿溢狀態
    if ($storagecan == 1000) {
        $storagecan = 10;
    }
	
	
    $sql = "select * from user_transaction where transactionid='$transactionid' order by dateline asc"; //查找沒有update到服務器的。
    $comresult = mysqli_query($link, $sql);
    $comresult = mysqli_fetch_array($comresult);

    $user = $comresult['user'];
    $dateline = $comresult['dateline'];
    $rebateordonate = $comresult['rebateordonate'];
    $platform = $comresult['payplatform'];
    $charityname = $comresult['charityname']; 
    $charityid = $comresult['charityid']; 
 $transactionid = $comresult['transactionid'];
    $octreceipt = $comresult['octreceipt'];
    $transactiondone = $comresult['transactiondone'];
 

    $sql = "select sum(bottlevalue) as total from user_transaction where transactionid='$transactionid'  and recognitionstatus=1  ";
    $bottlevalue = mysqli_query($link, $sql);

    $bottlevalue = mysqli_fetch_array($bottlevalue);
    $bottlevalue = $bottlevalue['total'];

    $totalbottlevalue = $bottlevalue; //計算累計value
	
 
if(!$totalbottlevalue)
{
	$totalbottlevalue=0;
	
}


    $sql = "select * from user_transaction  where transactionid='$transactionid'"; //
    $result = mysqli_query($link, $sql);

    $data = array();

    $data['barcodedata'] = array();
    $data['info'] = array();
    // $data['barcodedata']['barcode']=array();
    // $data['barcodedata']['weight']=array();
    // $data['barcodedata']['bottlevalue']=array();
    // $data['barcodedata']['recognitionstatus']=array();
    while ($it = mysqli_fetch_array($result)) {
        $barcodedata['dateline'] = $it['dateline'];
        $barcodedata['barcode'] = $it['barcode'];
        $barcodedata['weight'] = $it['weight'];
        $barcodedata['bottlevalue'] = $it['bottlevalue'];
        $barcodedata['recognitionstatus'] = $it['recognitionstatus'];
		$barcodedata['diam']=$it['diam']; 
		$barcodedata['bors']=$it['metal']; 
 
        array_push($data['barcodedata'], $barcodedata);
    }

    $info['transactionid'] = $transactionid;
    $info['totalvalue'] = $totalbottlevalue; //$value;
    $info['user'] = $user;
    $info['rebateordonate'] = $rebateordonate;
	 
	if($user=='donate')
	{
		$platform="donate";
	}
    $info['platform'] = $platform;
   // $info['value'] = 1; //$value;
    $info['charityname'] = $charityname;
	  $info['charityid'] = $charityid;
    $info['storageplastic'] = $storageplastic;
	    $info['storagecan'] = $storagecan;
    $info['statecode'] = $statecode;
    $info['mid'] = $mid;
    $info['device'] = $device;
    $info['barcodeversion'] = $barcodeversion;
    $info['octreceipt'] = $octreceipt;
    $info['transactiondone'] = $transactiondone; 
    $info['break'] = $transactiondone;
 $info['errorcode'] = $errorcode;
 
 
    array_push($data['info'], $info);
    echo var_dump(json_encode($data));
    $data = json_encode(encrypt($data));



    /**
     * echo var_dump($data);
     * echo '<br>';
     * echo var_dump(decrypt($data));
     */
/* 
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'http://31.134.49.108/rvm/public/urlget/user_transaction.php'); //這裏要做壹個接受中斷數據的接口
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_TIMEOUT, 28);

    curl_setopt(
        $ch,
        CURLOPT_HTTPHEADER,
        array('Content-Type: application/json; charset=utf-8',)
    );
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_SSLVERSION, 1);
    
 $response = curl_exec($ch);

echo $response;

if(curl_errno($ch))
{
										//	有错误情况
		echo '2error='.curl_errno($ch);
}
else
{
	
  //成功
				   
						 $sql = "update ocl set addvaluetime='' "; //標記結束transaction    //每次在載入首頁時候會檢查是否有0標記並上傳。
						mysqli_query($link, $sql);

						 
								if ($transactiondone = 0) {//還沒有點擊結算，很有可能是斷電。
									$sql = "update user_transaction set transactiondone=1,uploaddone=1 where transactionid='$transactionid'"; //標記結束transaction    //每次在載入首頁時候會檢查是否有0標記並上傳。
									mysqli_query($link, $sql);
								} elseif ($transactiondone = 2) {  //已經點擊結算，結束了投樽之後的情況。
									$sql = "update user_transaction set uploaddone=1 where transactionid='$transactionid'"; //標記結束transaction    //每次在載入首頁時候會檢查是否有0標記並上傳。
									mysqli_query($link, $sql);
								}
								
			 	
						
		
    } 
    curl_close($ch);   */



}

 
 



 
 
 
 
 
 function encrypt($id)
{
    $id = serialize($id);
    $key = file_get_contents("../../SECRET-AES-256/secret.txt");

    $data['iv'] = base64_encode(substr($key, 0, 16));
    $data['value'] = openssl_encrypt($id, 'AES-256-CBC', $key, 0, base64_decode($data['iv']));
    $encrypt = base64_encode(json_encode($data));
    return $encrypt;
}

function decrypt($encrypt)
{
    $key = file_get_contents("../../SECRET-AES-256/secret.txt");
    $encrypt = json_decode(base64_decode($encrypt), true);
    $iv = base64_decode($encrypt['iv']);
    $decrypt = openssl_decrypt($encrypt['value'], 'AES-256-CBC', $key, 0, $iv);
    $id = unserialize($decrypt);
    if ($id) {
        return $id;
    } else {
        return 0;
    }
}

 




?>
</html>