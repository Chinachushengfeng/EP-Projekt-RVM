  
	<?php 
	//  <a href="http://127.0.0.1/tjt/login/index.php" class="btn bottombtn">
	
include("IncDB.php");


include("word_function/sql.php");
//echo select('START');

       $sql = "select * from  command ";
        $result = mysqli_query($link, $sql);
        $result = mysqli_fetch_array($result);
        $pjuli = $result['storageplastic']; //修改處 把juli<=15,目的是超聲波檢測到15的返回數據後，說明超聲波檢測到離樽有15cm距離，表示溢滿。
		$cjuli = $result['storagecan']; //修改處 把juli<=15,目的是超聲波檢測到15的返回數據後，說明超聲波檢測到離樽有15cm距離，表示溢滿。

 

        
	
 
  
  
 //version:103 /改动不转圈圈,修改空樽data.php为5
 //version:102 /改动关门后再切换


// errorcode
// 1 外門未正常打開
// 2 外門未正常關閉
// 4 內門未正常打開
// 8 內門未正常關閉
// 16 外門防夾手檢測有手超過30s
// 32 內門防夾瓶檢測有瓶超過30s
// 64 電機堵轉

// ===============================================檢測是否有transaction處理結束。================================
// 系統制作人，儲盛峰來自上海，  聯系維護 email:sharonxia@163.com  電話：13918715708
// ===============================================檢測是否要下載交換八達通文件。================================
// if(date("Hi",time()) > "1930" && date("Hi",time()) < "2000")
// 先檢測是否有新的八達通的交換文件   如果文件和服務器壹樣就不會執行， 註意，如果傳輸失敗，需要顯示錯誤信息，並且報告，記錄
 
 
 
 
  
date_default_timezone_set("PRC");


error_reporting(0);
 
 
 
	  
$sql = "update command set userscan=0,bottle=0,can=0 ";
mysqli_query($link, $sql);
 
 // =================================================心跳包。心跳包心跳包心跳包心跳包心跳包心跳包心跳包心跳包心跳包心跳包心跳包心跳包==============================================

if( (date("i", time()) %  20) == 0    )
{
$sql = "update command set command ='3' ";
mysqli_query($link, $sql);
sleep(1);
$photo= base64_encode(file_get_contents('debug/remote/1.jpg')) ;
$phototime=time();

}

$sql = "select * from barcode where id='2'";
$comresult = mysqli_query($link, $sql);
$comresult = mysqli_fetch_array($comresult);
$barcodeversion = $comresult['version'];

$sql = "select * from command ";
$result = mysqli_query($link, $sql);
$result = mysqli_fetch_array($result);
 
$data = array();

$data['info'] = array();
 
$heartinfo['storageplastic'] = $result['storage'];

$mystorage=  $result['storage'];


if( $mystorage ==0 or !$mystorage)
{
	
	
	$heartinfo['storageplastic'] = $result['storageplastic'];

}
 
$heartinfo['storagecan'] = $result['storagecan'];
$heartinfo['errorcode'] = $result['errorcode']; //故障時候的代碼
$heartinfo['mid'] = $result['mid'];
$heartinfo['statecode'] = $result['statecode']; //門開 門關 電機開 電機關 燈亮
$heartinfo['barcodeversion'] = $barcodeversion;
$heartinfo['device'] = $result['device'];
$heartinfo['photo'] =$photo;
$heartinfo['phototime'] =$phototime;

$heartinfo['heartpack'] =1;
 
// '	$info['oclibkl']=$result['storageplastic'];
// '	$info['oclblacklist']=$result['storageplastic'];
// '	$info['oclcch']=$result['storageplastic'];
// $info['oclotp']=1;
array_push($data['info'], $heartinfo);

$data = json_encode(encrypt($data));

// getcharity?lang=zh
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'http://31.134.49.108/rvm/public/urlget/user_transaction.php'); //這裏是判斷網絡狀況
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_TIMEOUT, 5); 

$response = curl_exec($ch);
 
 
  echo $response;
    if($response!=="ok")
   {
 
	 // exit;
   }
// =================================================結束：心跳包。心跳包心跳包心跳包心跳包心跳包心跳包心跳包心跳包心跳包心跳包心跳包心跳包===結束：===========================================



  
 
 
 

///////////////////////////////////清空//////////////////////////////////////////////////////////////////////

  $mysql = "select * from mid ";
    $result = mysqli_query($link, $mysql);
    $result = mysqli_fetch_array($result);
    $mid = $result['mid'];
 	
 $sql = " truncate alipay"; //清空ocl
		mysqli_query($link, $sql);
 

 $sql = " truncate charityname"; //清空charityname
		mysqli_query($link, $sql);
		
		
    $mysql = "insert into  alipay (mid) values  ('$mid')";
        mysqli_query($link, $mysql);




 
	
	
	
		
///////////////////////////////////清空//////////////////////////////////////////////////////////////////////




 

 
 

function mysqltorepair($mytable)
{
    include("IncDB.php");

    $mysql = "select * from mid ";
    $result = mysqli_query($link, $mysql);
    $result = mysqli_fetch_array($result);
    $mid = $result['mid'];
    $device = $result['device'];
    $row = mysqli_query($link, 'check table qcs.' . $mytable);
    $row = mysqli_fetch_array($row);

    $rowmsg = $row['Msg_text'];

    if ($rowmsg !== "OK") {
        $mysql = 'repair table qcs.' . $mytable;
        mysqli_query($link, $mysql);

        $mysql = 'truncate ' . $mytable;
        mysqli_query($link, $mysql);



if($mytable=='command')
{
        $mysql = 'insert into ' . $mytable . " (mid,device) values  ('$mid','$device')";
        mysqli_query($link, $mysql);
}
  
  
  else
  {
	    $mysql = 'insert into ' . $mytable . " (mid) values  ('$mid')";
        mysqli_query($link, $mysql);
	  
  }
		
		
        if ($mytable == "machineinformation") {
            $sql = "select * from machineinformationbackup";

            $backup = mysqli_query($link, $sql);
            $backup = mysqli_fetch_array($backup);

            $ad0orpic1 = 0;
            $mute = $backup['mute'];

            $v_top0 = $backup['v_top0'];
            $v_top1 = $backup['v_top1'];
            $v_top2 = $backup['v_top2'];
            $v_top3 = $backup['v_top3'];
            $v_top4 = $backup['v_top4'];
            $v_top5 = $backup['v_top5'];
            $v_top6 = $backup['v_top6'];
            $v_top7 = $backup['v_top7'];
            $v_top8 = $backup['v_top8'];
            $v_top9 = $backup['v_top9'];
            $v_top10 = $backup['v_top10'];
            $v_top11 = $backup['v_top11'];
            $v_top12 = $backup['v_top12'];
            $v_top13 = $backup['v_top13'];
            $v_top14 = $backup['v_top14'];
            $v_top15 = $backup['v_top15'];
            $v_top16 = $backup['v_top16'];
            $v_top17 = $backup['v_top17'];
            $v_top18 = $backup['v_top18'];
            $v_top19 = $backup['v_top19'];
            $v_top20 = $backup['v_top20'];
            $v_top21 = $backup['v_top21'];
            $v_top22 = $backup['v_top22'];
            $v_top23 = $backup['v_top23'];

            $v_top24 = $backup['v_top24'];
            $v_top25 = $backup['v_top25'];
            $v_top26 = $backup['v_top26'];
            $v_top27 = $backup['v_top27'];
            $v_top28 = $backup['v_top28'];
            $v_top29 = $backup['v_top29'];
            $v_top30 = $backup['v_top30'];
            $p_top0 = $backup['p_top0'];
            $p_top1 = $backup['p_top1'];
            $p_top2 = $backup['p_top2'];
            $p_top3 = $backup['p_top3'];
            $p_down0 = $backup['p_down0'];
            $p_down1 = $backup['p_down1'];
            $p_down2 = $backup['p_down2'];
            $p_down3 = $backup['p_down3'];
            $p_down4 = $backup['p_down4'];
            $p_down5 = $backup['p_down5'];
            $p_down6 = $backup['p_down6'];
            $p_down7 = $backup['p_down7'];
            $p_down8 = $backup['p_down8'];
            $p_down9 = $backup['p_down9'];
            $p_down10 = $backup['p_down10'];
            $p_down11 = $backup['p_down11'];
            $p_down12 = $backup['p_down12'];
            $p_down13 = $backup['p_down13'];
            $p_down14 = $backup['p_down14'];
            $p_down15 = $backup['p_down15'];
            $p_down16 = $backup['p_down16'];
            $p_down17 = $backup['p_down17'];
            $p_down18 = $backup['p_down18'];
            $p_down19 = $backup['p_down19'];
            $p_down20 = $backup['p_down20'];
            $p_down21 = $backup['p_down21'];
            $p_down22 = $backup['p_down22'];
            $p_down23 = $backup['p_down23'];
            $p_down24 = $backup['p_down24'];
            $p_down25 = $backup['p_down25'];
            $p_down26 = $backup['p_down26'];
            $p_down27 = $backup['p_down27'];
            $p_down28 = $backup['p_down28'];
            $p_down29 = $backup['p_down29'];
            $p_down30 = $backup['p_down30'];

            $sql = "UPDATE machineinformation SET ad0orpic1 =0 ,mute='$mute',
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

            mysqli_query($link, $sql);
        }
    }
}

mysqltorepair("command");
mysqltorepair("user");
mysqltorepair("getbarcode");
mysqltorepair("machineinformation");
mysqltorepair("ocl");
mysqltorepair("qcscode");
mysqltorepair("alipay");
 
       
  
		 
 
 
  
// ================ 從服務器得到barcode=======================
$sql = "select *from  command";
$result = mysqli_query($link, $sql);
$result = mysqli_fetch_array($result);
//$state = $result['recognitionstatus'];
// if ($state !== '10') {  //判断是否要关门
    // $sql = "UPDATE command SET command=2 ,recognitionstatus='10'	";

    // mysqli_query($link, $sql);
// }
// if (date("Hi",time())=="1300" || date("Hi",time())=="1600" || date("Hi",time())=="1900"  )
$auth_url = "http://31.134.49.108/rvm/public/urlget/getbarcode.php?mid=".$mid; 
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $auth_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_TIMEOUT, 28);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($ch, CURLOPT_SSLVERSION, 1);
 

if(curl_errno($ch))
{
    
		echo '1error='.curl_errno($ch);
 
 
}
else
{
	
$response = curl_exec($ch);

	$response = json_decode($response, true);
$i = 0;

}
 //echo $response;



if (!isset($response[$i])) {
	
} elseif($response[$i]['value']) {
    $sql = 'truncate  barcode';
    mysqli_query($link, $sql);

    while (isset($response[$i])) {
        $version = $response[$i]['version'];
        $barcode = $response[$i]['barcode'];
        $brand = $response[$i]['companybrand'];
        $bottleinfo = $response[$i]['productname'];
        $value = $response[$i]['value'];
        $weight = $response[$i]['weight'];
		$material_type=$response[$i]['material_type'];
		$metal=$response[$i]['metal'];
		
		
		 $minbdiam = $response[$i]['minbdiam'];
		 $maxbdiam = $response[$i]['maxbdiam'];
		 $minsdiam = $response[$i]['minsdiam'];
		 $maxsdiam = $response[$i]['maxsdiam'];
	          $omit=$response[$i]['omit']; 
		$capacity= $response[$i]['capacity'];
 
        $sql = "insert into barcode (version,barcode,brand,bottleinfo,omit,value,weight,material_type,metal,minsdiam,maxsdiam,maxbdiam,minbdiam,capacity) values ('$version','$barcode','$brand','$bottleinfo','$omit','$value','$weight','$material_type','$metal','$minsdiam','$maxsdiam','$maxbdiam','$minbdiam','$capacity')   ";
        mysqli_query($link, $sql);
		
	 
		
        $i = $i + 1;
    }
}
// ================ 從服務器得到barcode  結束=======================
// ==========================================檢測是否有transaction 沒有上傳的  有的話處理上傳=======================================


$sql = "select *from  ocl";
$result = mysqli_query($link, $sql);
$result = mysqli_fetch_array($result);
$octaddvaluetime=$result['addvaluetime'];
 if(!$octaddvaluetime)
 {
	 $octaddvaluetime=time()-25;
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
	
	
    $sql = "select * from user_transaction where uploaddone=0  "; //查找沒有update到服務器的。
    $comresult = mysqli_query($link, $sql);
    $comresult = mysqli_fetch_array($comresult);
    $transactionid = $comresult['transactionid'];
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
	$info['octaddvaluetime']=$octaddvaluetime;
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
    curl_close($ch);
}

else  //如果沒有需要上傳的數據
{
		$sql = "update ocl set addvaluetime='' "; //標記結束transaction    //每次在載入首頁時候會檢查是否有0標記並上傳。
		mysqli_query($link, $sql);

}
// ===============================================檢測是否有transaction處理結束。================================
// 系統制作人，儲盛峰來自上海，  聯系維護 email:shengfeng2015@163.com / sharonxia@163.com 電話 and wechat：13918715708
// ===============================================檢測是否要下載交換八達通文件。================================
// if(date("Hi",time()) > "1930" && date("Hi",time()) < "2000")
// 先檢測是否有新的八達通的交換文件   如果文件和服務器壹樣就不會執行， 註意，如果傳輸失敗，需要顯示錯誤信息，並且報告，記錄
 
 






 
 
 
 
 
 function encrypt($id)
{
    $id = serialize($id);
    $key = file_get_contents("../SECRET-AES-256/secret.txt");

    $data['iv'] = base64_encode(substr($key, 0, 16));
    $data['value'] = openssl_encrypt($id, 'AES-256-CBC', $key, 0, base64_decode($data['iv']));
    $encrypt = base64_encode(json_encode($data));
    return $encrypt;
}

function decrypt($encrypt)
{
    $key = file_get_contents("../SECRET-AES-256/secret.txt");
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

function del_DirAndFile($dirName)
{
    if (is_dir($dirName)) {
        echo "<br /> ";

        if ($handle = opendir("$dirName")) {
            while (false !== ($item = readdir($handle))) {
                if ($item != "." && $item != "..") {
                    if (is_dir("$dirName/$item")) {
                        del_DirAndFile("$dirName/$item");
                    } else {
                        if (unlink("$dirName/$item")) {
                            echo "已刪除文件: $dirName/$item<br /> ";
                        }
                    }
                }
            }

            closedir($handle);
        }
    }
}




 

 


?>




<?php

//重新提交澳大利亚支付接口





  $sql="select * from command   ";
$result=  mysqli_query($link,$sql);
$result=mysqli_fetch_array($result);
  $deviceId=$result['device'];     // 这个是每个RVM对应的 RVMid
 
 
 
 
 
 $sql="select * from user_transaction order by id desc ";
$result=  mysqli_query($link,$sql);
$result=mysqli_fetch_array($result);
$transactionid=$result['transactionid'];

 
 $au_data=array();
 
  
 
 
 
 
$sql="select * from user_transaction where   transactionid='$transactionid'  order by dateline desc";
$comresult=  mysqli_query($link,$sql);
$comresult=mysqli_fetch_array($comresult);
 $user=$comresult['user'];
 
 
 $consumerId=$user;
 $transactedOn= date("Y-m-d",time()).'T'.date("H:i:s",time()).'.510Z';
 $transactedby='';
 
 
 
 $paymentMethod='SCHEME';
 
 
 
$sql="select count(transactionid) as total from user_transaction where transactionid='$transactionid' and recognitionstatus=1   ";
$bottlevalue=mysqli_query($link,$sql);
$bottlevalue=mysqli_fetch_array($bottlevalue);
$totalQuantity=$bottlevalue['total'];    //计算累计 


 
 $typejson='  [
    {
        "id": "GLASSMIXED",
        "name": "Glass - Mixed",
        "refundEligible": true,
        "attributes": {
            "colours": [
                "Amber/Brown",
                "Blue",
                "Flint/Clear",
                "Green",
                "Other"
            ]
        }
    },
    {
        "id": "ALUMINIUM",
        "name": "Aluminium",
        "refundEligible": true
    },
    {
        "id": "PETCLEAR",
        "name": "PET - Clear",
        "refundEligible": true
    },
    {
        "id": "PETCOLORED",
        "name": "PET - Colour",
        "refundEligible": true
    },
    {
        "id": "HDPE",
        "name": "HDPE",
        "refundEligible": true
    },
    {
        "id": "LQDPAPERBRD",
        "name": "Liquid Paper Board",
        "refundEligible": true
    },
    {
        "id": "STEEL",
        "name": "Steel",
        "refundEligible": true
    },
    {
        "id": "OTHER",
        "name": "Other Materials",
        "refundEligible": true
    },
    {
        "id": "GLASSDIRECT",
        "name": "Glass - Direct",
        "refundEligible": true
    },
    {
        "id": "INELIGIBLE",
        "name": "Ineligible Containers",
        "refundEligible": false
    }
]';



$typejson=json_decode($typejson,true);








 $au_data['transactionId']=$transactionid;
 $au_data['transactedBy']=$transactedby;
  $au_data['deviceId']=$deviceId;
 $au_data['consumerId']=$consumerId; 
 $au_data['refundPaymentType']="SCHEME_PAID";
  $au_data['paymentMethod']='SCHEME'; 
 $au_data['customerDeclaration']="false";
 $au_data['transactedOn']=$transactedOn; 
 $au_data['totalQuantity']=$totalQuantity;  
 $au_data['materialTypes']=array();
 
  
 
 
 $sql="select DISTINCT  material from user_transaction where transactionid='$transactionid' and recognitionstatus=1    ";
$materialquantity=mysqli_query($link,$sql);
 

while($it=mysqli_fetch_array($materialquantity))
{
	
	$i=0;
	
	
	error_reporting(0);
	while($typejson[$i])
	{
		
			if($it['material']==$typejson[$i]['name'])
			{

			$materialTypeId=$typejson[$i]['id'];

			}
 
 	$i=$i+1;
		
	}
	 
$material=$it['material'];

$sql="select count(*) as totalnow  from user_transaction where transactionid='$transactionid' and recognitionstatus=1  and material='$material'  ";
$totalnow=mysqli_query($link,$sql);
$totalnow=mysqli_fetch_array($totalnow);

$temp_data['materialTypeId']= $materialTypeId;
$temp_data['quantity']   =$totalnow['totalnow'];

 
$temp_data['refundAmountPerUnit'] =number_format (0.1,1) ;
$temp_data['grossAmount']  = number_format(0.1* $temp_data['quantity'],2);
$temp_data['gstAmount'] =number_format( $temp_data['grossAmount']/11,4);
$temp_data['taxableAmount'] =number_format($temp_data['grossAmount']-$temp_data['gstAmount'],4); 

  array_push ($au_data['materialTypes'],$temp_data);
  	
	 
}

 
 $au_data= '['.json_encode($au_data).']';

 
  
  

  

 //得到Token 写入数据库
 

 


		
		
		
		
 $auth_url = 'http://31.134.49.108/rvm/public/urlget/api/transaction.php'; 
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $auth_url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $au_data);
    curl_setopt($ch, CURLOPT_TIMEOUT, 28);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	//curl_setopt($ch, CURLOPT_ENCODING, 'gzip');
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
   $response = curl_exec($ch);
 
 
 

 
 

?>


<?php 


//廣告接口


$sql="select * from machineinformation  ";
$result = mysqli_query($link,$sql);
$result= mysqli_fetch_array($result);
 
$auth_url = "http://31.134.49.108/rvm/public/urlget/getnewad.php?mid=".$result['mid'] ;
				
 

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $auth_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT,5);

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
		  	 	
			 
		 


		}
		
		
		
		
		
		
		 
  
 
 
 
 
 
 
 
?>
 



<p>&nbsp;</p>
</body>

</html>