<?php
require_once 'PHPMailer.php';
require_once 'class.smtp.php';

class SendEmail {
	
	public function send_ringtone($to,$m4r,$title,$id)
	{
        ini_set('display_errors', 'On');
        error_reporting(E_ALL);
		$subject = $title.'  ringtone from vShare ';//�ʼ�����
        $body ='';//��������
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

        
        $fileDir = dirname($_SERVER['DOCUMENT_ROOT']).'/tempfile/mailringtonem4r/'; // ��Ҫ�������ļ�Ŀ¼������
        $fileName = $fileDir.$title.'.m4r';
        if (!is_dir($fileDir)) mkdir($fileDir, 0777);
        if (!file_exists($fileName)) {
            chmod($fileName, 0777);
            $test =  file_get_contents($m4r);
            $james=fopen($fileName,"w");
            fwrite($james,$test);
            fclose($james);
        }
        
        date_default_timezone_set('Asia/Shanghai');//�趨ʱ��������
        $mail = new PHPMailer(); //newһ��PHPMailer�������
        //$body = eregi_replace("[\]", '', $body); //���ʼ����ݽ��б�Ҫ�Ĺ���
        $mail->CharSet = "utf-8";//�趨�ʼ����룬Ĭ��ISO-8859-1����������Ĵ���������ã���������
        $mail->IsSMTP(); // �趨ʹ��SMTP����
        $mail->SMTPDebug = 0;                  // ����SMTP���Թ���
        $mail->SMTPAuth = true;                  // ���� SMTP ��֤����
        // $mail->SMTPSecure = "ssl";                 // ��ȫЭ�飬����ע�͵�
        $mail->Host = 'smtp.mailgun.org';      // SMTP ������
        $mail->Port = 587;                   // SMTP�������Ķ˿ں�
        $mail->Username = 'ringtong@apphehe.com';               // SMTP�������û���
        $mail->Password = '7368&message3!55';            // SMTP����������
        $mail->SetFrom('ringtong@apphehe.com', 'ringtong@apphehe.com');
        
        $mail->AddReplyTo($to,$to);
        $mail->Subject = $subject;
        $mail->AltBody = 'To view the message, please use an HTML compatible email viewer!'; // optional, comment out and test
        $mail->MsgHTML($body);
        $address = $to;
        $mail->AddAddress($address, '');
        $mail->AddAttachment($fileName); // ����
        

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