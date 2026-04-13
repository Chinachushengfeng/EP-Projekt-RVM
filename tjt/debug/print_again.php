


<?php 
error_reporting(0);

$print_barcode = $_GET['print_barcode'];
$can = $_GET['can'];
$bottle = $_GET['bottle'];

include('incdb.php');

// 修正 SQL 语法：mysqli_query(连接, SQL语句)
$sql = "UPDATE command SET command=8, printer_barcode='$print_barcode', bottle='$bottle', can='$can'";

// 执行查询
$result = mysqli_query($link, $sql);

if ($result) {
    // 成功：显示提示并跳转
        echo '<div style="text-align:center; padding:50px; font-family:Arial; margin-top:100px;">
        <div style="font-size:60px;">Zrobione</div>
        <h2 style="color:#4c7d3c;">Wydano polecenie drukowania, proszę sprawdzić.</h2> 
        <a href="barcode_records.php" style="display:inline-block; margin-top:20px; padding:10px 25px; background:#4c7d3c; color:white; text-decoration:none; border-radius:5px;">← Wróć teraz</a>
        <meta http-equiv="refresh" content="5;url=barcode_records.php">
    </div>'; 
} else {
    // 失败：显示错误信息
    echo "<script> 
        window.history.back(); // 返回上一页 
    </script>";
}

// 可选：输出 SQL 用于调试（建议关闭）
// echo $sql;
?>



 