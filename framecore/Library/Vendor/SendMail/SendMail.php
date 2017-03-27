<?php
include 'phpmailer.php';
include 'SMTP.php';
class SendMail
{
    public function send_ringtone($to,$m4r,$title,$id)
    {
        $subject = $title.'  ringtone from vShare ';//邮件标题
        $body ='';//邮箱内容
        $body .= '<span style="  line-height: 22.3999996185303px;">Instructions:</span>';
        $body .= '<br style=" line-height: 22.3999996185303px;">';
        $body .= '<span style=" line-height: 22.3999996185303px;">1. Click the attached file and choose OPEN. It will now open in iTunes under the ringtones tab.</span>';
        $body .= '<br style=" line-height: 22.3999996185303px;">';
        $body .= '<span style=" line-height: 22.3999996185303px;">2. Sync your iPhone.</span>';
        $body .= '<br style=" line-height: 22.3999996185303px;">';
        $body .= '<span style=" line-height: 22.3999996185303px;">3. Grab your iPhone and select the new ringtone in Settings &gt; Sounds &gt; Ringtones.</span></div>';
        $body .= '<div><span style=" line-height: 22.3999996185303px;"><br></span></div>';
        $body .='<div><span style=" line-height: 22.3999996185303px;">Alternative way:</span>';
        $body .='<br style=" line-height: 22.3999996185303px;">';
        $body .='<br style=" line-height: 22.3999996185303px;">';
        $body .='<span style=" line-height: 22.3999996185303px;">1. Save the attached file in a local folder on your computer.</span>';
        $body .='<br style=" line-height: 22.3999996185303px;">';
        $body .='<span style=" line-height: 22.3999996185303px;">2. Open iTunes and import the ringtone. It will show up under the Ringtones tab.</span>';
        $body .='<br style=" line-height: 22.3999996185303px;">';
        $body .='<span style=" line-height: 22.3999996185303px;">3. Sync your iPhone</span>';
        $body .='<br style=" line-height: 22.3999996185303px;">';
        $body .='<span style=" line-height: 22.3999996185303px;">4. Grab your iPhone and select the new ringtone in Settings &gt; Sounds &gt; Ringtones.</span></div>';
        $body .='<div><span style=" line-height: 22.3999996185303px;"><br></span></div><div>';
        $body .='<span style=" line-height: 22.3999996185303px;"><br></span></div>';
        $body .='<div><hr style=" line-height: 22.3999996185303px; color: rgb(204, 204, 204);">';
        $body .='<span style=" line-height: 22.3999996185303px;">Regards from the vShare Team</span>';
        $body .='<br style=" line-height: 22.3999996185303px;"><a target="_blank" href="http://www.vshare.com/">www.vshare.com</a>';
        $body .='<span style=" line-height: 22.3999996185303px;">- Free your phone</span>';
        $body .='<br style=" line-height: 22.3999996185303px;"><br style=" line-height: 22.3999996185303px;">';
        $body .='<span style=" line-height: 22.3999996185303px;">This email was sent because you or someone else requested it in a service provided by vShare. </span>';
        
        
        $fileDir = dirname($_SERVER['DOCUMENT_ROOT']).'/tempfile/mailringtonem4r/'; // 需要创建的文件目录和名称
        $fileName = $fileDir.$title.'.m4r';
        if (!is_dir($fileDir)) mkdir($fileDir, 0777);
        if (!file_exists($fileName)) {
            chmod($fileName, 0777);
            $test =  file_get_contents($m4r);
            $james=fopen($fileName,"w");
            fwrite($james,$test);
            fclose($james);
        }
        
        date_default_timezone_set('Asia/Shanghai');//设定时区东八区
        $mail = new phpmailer(); //new一个PHPMailer对象出来
        //$body = eregi_replace("[\]", '', $body); //对邮件内容进行必要的过滤
        $mail->CharSet = "utf-8";//设定邮件编码，默认ISO-8859-1，如果发中文此项必须设置，否则乱码
        $mail->IsSMTP(); // 设定使用SMTP服务
        $mail->SMTPDebug = 0;                  // 启用SMTP调试功能
        $mail->SMTPAuth = true;                  // 启用 SMTP 验证功能
        // $mail->SMTPSecure = "ssl";                 // 安全协议，可以注释掉
        $mail->Host = 'smtp.vearndollars.com';      // SMTP 服务器
        $mail->Port = 25;                   // SMTP服务器的端口号
        $mail->Username = 'ringtone@vearndollars.com';               // SMTP服务器用户名
        $mail->Password = 'appvv.com!#1234';            // SMTP服务器密码
        $mail->SetFrom('ringtone@vearndollars.com', 'ringtone@vearndollars.com');
        
        $mail->AddReplyTo($to,$to);
        $mail->Subject = $subject;
        $mail->AltBody = 'To view the message, please use an HTML compatible email viewer!'; // optional, comment out and test
        $mail->MsgHTML($body);
        $address = $to;
        $mail->AddAddress($address, '');
        $mail->AddAttachment($fileName); // attachment
        
        if (!$mail->Send()) {
            $res = array(
                'error_code' => 1,
                'error_des' => $mail->ErrorInfo,
            );
        }else{
            if (file_exists($fileName)) {
                chmod($fileName, 0777);
                unlink($fileName);
            }
            $res = array(
                'error_code' => 0,
            );
        }

        $mail->smtpClose();
        unset($mail);
        return $res;
    }
}