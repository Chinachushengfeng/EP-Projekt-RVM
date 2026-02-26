	
	 <html lang="en" class="dk_fouc has-js">
        
        
    <script src="jquery-1.9.1.min.js"></script> 
        <script src="js/jquery.min.js"></script>
        <script src="js/fakeloader.min.js"></script>
        
        <link rel="stylesheet" href="css/fakeloader.css">
 
 	<style type="text/css">
 
		  body {
    background-image: url('images/cheating.jpg');
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;
    background-attachment: fixed; /* 可选：固定背景不滚动 */
  }
 
		 
 
					        .text {
            bottom:40%;
           text-align: center;
 position: absolute;
 
  left: 51%;
  transform: translate(-50%, -50%); 
            transform: translate(-50%, 0%);
            white-space: nowrap;
			width:15%;
			font-size:80px;
			font-weight :bold;
        color:#fff
		}
		
	 
  
 
 	</style>


 </head>



 <body leftmargin=0 topmargin=0 oncontextmenu='return false' ondragstart='return false' onselectstart='return false' onselect='document.selection.empty()' oncopy='document.selection.empty()' onbeforecopy='return false'>




  
  

 
 <?php
 
 include("incdb.php");

$sql = "select *from  command";
$result = mysqli_query($link, $sql);
$result = mysqli_fetch_array($result);
		$transactionid = $result['transactionid'];
		 
		$metal = $result['metal'];
		 
			
		 
if($metal==0)
{

		$sql = "update command set bottle=bottle-1"; 
		mysqli_query($link, $sql);

}
else
{
	
		$sql = "update command set can=can-1"; 
		mysqli_query($link, $sql);
	
}
 
 
 
 
 
 ?>
 
 
  
 <script type="text/javascript" src="js/timecountdown.js"></script>
 
 

 <script language="javascript" type="text/javascript"> 
// 以下方式直接跳转
 
// 以下方式定时跳转


 
 
setTimeout("javascript:location.href='dorecycle.php'", 15000); 

 

</script> 


<div class='text' id='myButton'  > 15  </div>

   
    <script>
        let countdown = 14;
        const button = document.getElementById('myButton');
        const interval = setInterval(() => {
            if (countdown > 0) {
                button.textContent = ` ${countdown} `;
                countdown--;
            } else {
                clearInterval(interval); 
				
                button.disabled = false;
                button.style.cursor = 'pointer';
                button.style.opacity = 1;
            }
        }, 1000);
    </script>
	
	
        
    
  </head>
  <body>
   
 </p>  
  