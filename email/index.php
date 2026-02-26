<?php
 
 
 
 $mid=$_GET['mid'];
 $content=$_GET['content'];
 
 
 
 $ret = send_mail_by_smtp('waikeungk@aswatson.com', '機號:'.$mid, $content, '故障');
							//收件人
function send_mail_by_smtp($address, $subject, $body, $file = '')
{
  require('PHPMailer-master/Exception.php');
  require('PHPMailer-master/PHPMailer.php');
  require('PHPMailer-master/SMTP.php');

  //date_default_timezone_set("Asia/Shanghai");//设定时区东八区

  $mail = new PHPMailer();

  //Server settings
  $mail->SMTPDebug = 2;
  $mail->isSMTP();                                      // 使用SMTP方式发送
  $mail->Host = 'smtp.163.com';                         // SMTP邮箱域名
  $mail->SMTPAuth = true;                               // 启用SMTP验证功能
  $mail->Username = "18276321110@163.com";                    // 邮箱用户名(完整email地址)
  $mail->Password = "BOZEFMTZNJEXDEUE";                            // smtp授权码，非邮箱登录密码
  $mail->Port = 25;
  $mail->CharSet = "utf-8";                             //设置字符集编码 "GB2312"

  // 设置发件人信息，显示为   人(xxxx@126.com)
  $mail->setFrom($mail->Username, 'RVM SYSTEM');

  //设置收件人 参数1为收件人邮箱 参数2为该收件人设置的昵称  添加多个收件人 多次调用即可
  //$mail->addAddress('********@163.com', '你看我那里像好人');

  if (is_array($address)) {
    foreach ($address as $item) {
      if (is_array($item)) {
        $mail->addAddress($item['address'], $item['nickname']);
      } else {
        $mail->addAddress($item);
      }
    }
  } else {
    $mail->addAddress($address, '接收人');
  }


  //设置回复人 参数1为回复人邮箱 参数2为该回复人设置的昵称
  //$mail->addReplyTo('*****@126.com', 'Information');

  if ($file !== '') $mail->AddAttachment($file); // 添加附件

  $mail->isHTML(true);    //邮件正文是否为html编码 true或false
  $mail->Subject = $subject;     //邮件主题
  $mail->Body = $body;           //邮件正文 若isHTML设置成了true，则可以是完整的html字符串 如：使用file_get_contents函数读取的html文件
  //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';  //附加信息，可以省略

  return $mail->Send() ? true : 'ErrorInfo:' . $mail->ErrorInfo;
}	
			 
?>