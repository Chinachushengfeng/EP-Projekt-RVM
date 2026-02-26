<!DOCTYPE html>
<!-- saved from url=(0033)http://www.bootcss.com/p/flat-ui/ -->
<html lang="en" class="dk_fouc has-js"><head><meta http-equiv="Content-Type" content="text/html; charset=gbk">
    
    <title>Flat UI</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Loading Bootstrap -->
    <link href="./Flat UI_files/bootstrap.min.css" rel="stylesheet">

    <!-- Loading Flat UI -->
    <link href="./Flat UI_files/flat-ui.css" rel="stylesheet">
    <link rel="shortcut icon" href="http://www.bootcss.com/p/flat-ui/images/favicon.ico">
    <style type="text/css">
    body,td,th {
	font-family: Lato, sans-serif;
}
a:link {
	text-decoration: none;
}
a:visited {
	text-decoration: none;
}
a:hover {
	text-decoration: none;
}
a:active {
	text-decoration: none;
}
    </style>
 <body leftmargin=0 topmargin=0 oncontextmenu='return false' ondragstart='return false' onselectstart ='return false' onselect='document.selection.empty()' oncopy='document.selection.empty()' onbeforecopy='return false' onmouseup='document.selection.empty()'>

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]>
      <script src="http://cdn.bootcss.com/html5shiv/3.6.2/html5shiv.js"></script>
    <![endif]-->
  </head>
  <body>
  <table width="100%" height="553" border="0" align="center" cellspacing="0" class="btn-primary">
    <tr>
      <td width="1925" height="553"><table width="500" border="0" align="center" cellspacing="0" class="btn-info">
        <tr>
            <td height="113" align="center"><div>
              <div class="pager">登陆成功 請選擇:</div>
              <div></div>
          </td>
          </tr>
          <tr>
            <td height="106" align="center"><div class="span4">
              <div><a href="exchange/index.html">我要兌換禮板</a></div>
            </div></td>
          </tr>
          <tr>
            <td height="85" align="center"><div class="btn-warning">
              <div>
                <div><a href="recycle/index.html">我要投放瓶罐</a></div>
                <div></div>
              </div>
            </div></td>
          </tr>
          <tr>
            <td height="121" align="left"><div>
              <div class="controls"><span class="btn"><a href="index.html">返回&#13;</a></span></div>
              <div></div>
            </div></td>
          </tr>
      </table></td>
    </tr>
  </table>














<?php

      include("IncDB.php");
	

    $sql="UPDATE command SET cishu=0,command=0,code=0  ";
 
    mysqli_query($link,$sql); 
 


?>
</body></html>





































