<html>

<head>

    <meta http-equiv="refresh" content="3;url=http://127.0.0.1/tjt/recycle/dorecycle.php"/>

    <script src="js/jquery-1.9.1.min.js"></script>

    <script src="js/jquery.min.js"></script>

    <link rel="stylesheet" href="css/fakeloader.css">

    <script src="js/fakeloader.min.js"></script>
    <title></title>

    <link rel="stylesheet" href="../assets/css/index.css">
</head>

<body leftmargin=0 topmargin=0 oncontextmenu='return false' ondragstart='return false' onselectstart='return false'
      onselect='document.selection.empty()' oncopy='document.selection.empty()' onbeforecopy='return false'>

<div class="main"  >
    <!-- 背景圆圈 -->
    <div class="circle-one" style='margin-top:-220px;left:0px'>
        <div class="circle-two">
            <div class="circle-three"  ></div>
        </div>
    </div>

 
    
<script>
document.addEventListener('contextmenu', e => e.preventDefault());  // 禁止右键
document.addEventListener('selectstart', e => e.preventDefault()); // 禁止选中
document.addEventListener('dragstart', e => e.preventDefault());   // 禁止拖动
</script>
    <style type="text/css">
        body {
            background-color: #005D30;

            background-repeat: repeat;
            background-image: linear-gradient(#07874c, #07874c);
            font-family: "Arial Black", Gadget, sans-serif;
        }

        .text {
            bottom: 5%;
            left: 50%;
            position: absolute;
            transform: translate(-50%, 0%);
            white-space: nowrap;
            color: #fff
        }


    </style>

    <div class="fakeloader" style="margin-top:265px;margin-left:2px"></div>


    <script>
        $(document).ready(function () {
            $(".fakeloader").fakeLoader({
                timeToHide: 51200,

                spinner: "spinner2"
            });
        });
    </script>
    <p>


        </head>
        <body>


        <div style='font-size:30px;top:420px' class='text'>
        </div>


        <?php
        include("incdb.php");


        $sql = "update command set command=1,userscan=123";
        mysqli_query($link, $sql);


        date_default_timezone_set("PRC");

        //此时写入transactionid
        $sql = "select *from  command";
        $result = mysqli_query($link, $sql);
        $result = mysqli_fetch_array($result);
        $mid = $result['mid'];
        $transactionid = $mid . time();
        $sql = "update command set transactionid='$transactionid'"; //標記結束transaction    //每次在載入首頁時候會檢查是否有0標記並上傳。
        mysqli_query($link, $sql);


        ?>
 
 
  