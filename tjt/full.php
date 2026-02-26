<!DOCTYPE html>
<html lang="en">


  <title>背景图片示例</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            height: 100vh;
            background-image: url('images/full.png');
            background-size: cover;      /* 让图片覆盖整个屏幕 */
            background-position: center; /* 图片居中显示 */
            background-repeat: no-repeat; /* 不重复图片 */
            background-attachment: fixed; /* 背景固定，不随滚动条滚动 */
        }
        
   
    </style>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
  <meta charset="utf-8" http-equiv="refresh" content="30;url=index.php">
     
    <script src="../js/animation.js" defer></script>
  
</head>

<body>
    <div class="main">
        <div class="content"></div>
    </div>
</body>
 
<script>
    var main = document.getElementsByClassName('main')[0]
    main.style.opacity = 0
</script>

</html>
 
    
<script>
document.addEventListener('contextmenu', e => e.preventDefault());  // 禁止右键
document.addEventListener('selectstart', e => e.preventDefault()); // 禁止选中
document.addEventListener('dragstart', e => e.preventDefault());   // 禁止拖动
</script>