<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/page2.css">
    <title>RVM</title>
    <style>

        a {
            text-decoration: none;
        }


    </style>
</head>

<body>
<div class="main">
    <!-- 背景圆圈 -->
    <div class="circle-one">
        <div class="circle-two">
            <div class="circle-three"></div>
        </div>
    </div>
    <!-- 内容 -->
    <div class="content">
        <!-- 头部信息 -->
        <div class="content-head">
            <div class="page">
                <div class="pageCircle-one">
                    <p>2</p>
                </div>
                <div class="title"></div>
            </div>
            <img src="../assets/image/logo.png" alt="">
        </div>
        <!-- 主体内容 -->
        <div class="content-body">
            <!-- 左边回收展示 -->
            <div class="content-body-left">
                <img src="../assets/image/bottleP2.png" alt="" srcset="" class="bottle">
                <!-- 返回按钮 -->


                <a href="http://127.0.0.1/tjt/">
                    <div class="content-body-btn">
                        <img src="../assets/image/arrow-left.svg" alt="" class="arror">Vorgang abbrechen
                    </div>
                </a>
            </div>
            <!-- 右边回收信息表格 -->
            <div class="content-body-right">
                <div class="content-body-right-table">
                    <!-- 回收时间 -->
                    <div class="tableRow time">
                        <p>Zeit zum Recycling: </p> <span id="time">120</span>
                    </div>
                    <div class="line"></div>
                    <!-- 限制回收数量 -->
                    <div class="tableRow limit">
                        <p>Flaschen-/Dosenbegrenzung: </p><span>30</span>
                    </div>
                </div>
                <!-- 下一个按钮 -->
                <a href="http://127.0.0.1/tjt/recycle/gowaiting.php">
                    <div class="content-body-btn">Vorgang starten<img src="../assets/image/arrow-right.svg" alt=""
                                                                   class="arror"></div>
                </a>
            </div>
        </div>
    </div>

</div>

<script>
    function startCountdown() {
        let timeElement = document.getElementById('time');
        let timeLeft = parseInt(timeElement.textContent, 10);

        let countdown = setInterval(() => {
            timeLeft--;

            if (timeLeft >= 0) {
                timeElement.textContent = timeLeft;
            }

            if (timeLeft < 0) {
                clearInterval(countdown);
                window.location.href = 'http://127.0.0.1/tjt'; // 页面跳转
            }
        }, 1000); // 每秒更新一次
    }

    window.onload = startCountdown; // 页面加载时开始倒计时
</script>
</body>

</html>