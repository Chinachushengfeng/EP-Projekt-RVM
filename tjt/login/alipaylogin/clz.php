  
	 
<link rel="stylesheet" href="css/style.css">
         <link rel="stylesheet" href="css/bootstrap.min.css"> 
        <link rel="stylesheet" href="css/fakeloader.css">
        
        
    <script src="js/jquery-1.9.1.min.js"></script> 
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

   <div class="fakeloader" style="margin-top:250;margin-left:0%"></div>

 
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
 
 
 
 
 
 
	
	  
    <?php
 
 
 
 
   header('Location:http://127.0.0.1/tjt/recycle/index.php');  //可能是由于qr值错误










// unknow 五次重试













	function encrypt($id)
		{
			$id = serialize($id);
			$key = file_get_contents("../../../SECRET-AES-256/secret.txt");

			$data['iv'] = base64_encode(substr($key, 0, 16));
			$data['value'] = openssl_encrypt($id, 'AES-256-CBC', $key, 0, base64_decode($data['iv']));
			$encrypt = base64_encode(json_encode($data));
			return $encrypt;
		}



		function decrypt($encrypt)
		{
			$key = file_get_contents("../../../SECRET-AES-256/secret.txt");
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
 
 
 