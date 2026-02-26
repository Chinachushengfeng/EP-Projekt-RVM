
<!DOCTYPE html>
<!-- saved from url=(0033)http://www.bootcss.com/p/flat-ui/ -->
<html lang="en" class="dk_fouc has-js"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <title>Flat UI</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/mynumkb.css">
        <link rel="stylesheet" type="text/css" href="css/mystyle.css">
    <!-- Loading Bootstrap --> 

    <!-- Loading Flat UI -->
    <link href="./Flat UI_files/flat-ui.css" rel="stylesheet"> 

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]>
      <script src="http://cdn.bootcss.com/html5shiv/3.6.2/html5shiv.js"></script>
    <![endif]-->
  </head>
  <body>
  
  
  
  
 
  
  
  <form name="form1" method="get" action="#">
  
 
  	 
 <div style="margin-left:40%;margin-top:15%" >

    <?php
error_reporting(0);
$ban=$_GET['ban'];
$restore=$_GET['restore'];
if ($ban)
{
echo '<div align:"center" style="font-size:18px;color:red;margin-left:-10%"><b>'.$ban."</b> HAS BEEN BANED</div>";

}

?>
      <br><p>  <div class="span3" style="margin-top:2%"><b>輸禁用的alipay賬號</b><br><p>
		
          <div class="control-group error">
            <input id="input1" name="ban" type="text" value="" class="span3">
          </div>
       
	 
 	 
		  
  <?php
 
 


 include("IncDB.php");  //  自己设置下账户密码和表名。
 


if ($ban)
{
$sql="insert into ali (account) values('$ban')";   // 建立个ali的表 .里面有account的字段。

mysql_query($sql);
}

 




?> 
    <label align="center" >
      <input name="Submit" type="submit" class="btn-info" value="CONFIRM">
    </label>
  </form>
  <br>
 
   <script src="js/jquery.min.js"></script>
        <script src="js/mynumkb.js"></script>
		 <script>
            $("#input1").mynumkb();
            $("#input2").mynumkb();
            $("#input3").mynumkb();
            $("#input4").mynumkb();
            $("#input5").mynumkb();
        </script>
