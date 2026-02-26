 
    <?php
   

 
  
 
   include("IncDB.php");
   date_default_timezone_set("PRC");
   
      
   $sql="select * from command";
   $result=mysqli_query($link,$sql);
   $result=mysqli_fetch_array($result);
   $userscan=$result['userscan'];
    
       
    
    // $userscan= '4JDPTvGxLLsz7Uct7BOpX7jwnSU6qoLqNfii9pO4zqnSihD6BGza6y8d0AgkizD0';
     
      $userscan=  AESCipher::main($userscan);
    
     
    
    
    
    
    $json=json_decode($userscan,true);
    $points=$json['points'];
    $active=$json['active'];
     $name=$json['name'];
     $userid=$json['id'];
      
      
      
      
      //4JDPTvGxLLsz7Uct7BOpX7jwnSU6qoLqNfii9pO4zqnSihD6BGza6y8d0AgkizD0
       
    
   if ( $active==1    )   //ֱ�ӹ��˵���32λ���û�id
   {
    
    
           $sql = "update command set user_points='$points',userscan='$name' ,user_id='$userid',user_active='$active'"; //���ocl
       mysqli_query($link, $sql);
      
   
   
    
     // $sql="update command  set longitude =0 , print=1 ";
   // mysqli_query($link,$sql);
   
   
    set_time_limit(0);//��������ʱʱ��    
      
   while (true){    
       //sleep(1);    
       
         $arr=array('success'=>"1",'name'=>"null");    
           echo json_encode($arr);    
         sleep(1);//0.5��   
        
          exit();
        
    
       }
     
   }
    
    
   
   else 
   {
    
    set_time_limit(0);//��������ʱʱ��    
   while (true) {     
         $arr=array('success'=>"0",'name'=>"null") ;    
           echo json_encode($arr) ;    
         sleep(1) ;//0.5��   
          exit();
       }
   }
   
   
    
   
   
   
   
   class AESCipher {
       // Generate MD5 hash of the secret key
       private static function getSecretKey($myKey) {
           return substr(hash('md5', $myKey, true), 0, 16);
       }
   
       // Encrypt the data
       public static function encrypt($data, $secret) {
           $secretKey = self::getSecretKey($secret);
           $cipher = "AES-128-ECB";
           $encrypted = openssl_encrypt($data, $cipher, $secretKey, OPENSSL_RAW_DATA);
           return base64_encode($encrypted);
       }
   
       // Decrypt the data
       public static function decrypt($encryptedData, $secret) {
           $secretKey = self::getSecretKey($secret);
           $cipher = "AES-128-ECB";
           $decrypted = openssl_decrypt(base64_decode($encryptedData), $cipher, $secretKey, OPENSSL_RAW_DATA);
           return $decrypted;
       }
   
       public static function main($data) {
           try {
               $secretKey = "6a3d5e7f9b2c8e4f1a7b6c3d9e8f7a2c";
               $jsonData = $data;
   
               // Encrypt the JSON data
               // $encryptedData = self::encrypt($jsonData, $secretKey);
               // echo "Encrypted Data: " . $encryptedData . "\n";
   
               // Decrypt the JSON data
               $decryptedData = self::decrypt($jsonData, $secretKey);
              // echo "Decrypted Data: " . $decryptedData . "\n";
   return $decryptedData;
           } catch (Exception $e) {
               echo 'Caught exception: ',  $e->getMessage(), "\n";
           }
       }
   }
   
    
   
     
      
    ?>
    
    
      