<?php
/**
 * Created by IntelliJ IDEA.
 * User: Administrator
 * Date: 2019/2/13 0013
 * Time: 上午 11:29
 * 邮件通知类
 */

namespace Tiny\Notify\MailNotify;

use Tiny\Mail\PHPMailer;
use Tiny\Notify\BaseMessage;
use Tiny\Notify\MailObject;

class MailNotify
{
    public function sendNotify(MailObject $sender, MailObject $receiver, BaseMessage $Message)
    {
        $msg = $Message->getMessage();
        $eMail = new PHPMailer();

        $eMail->SMTPDebug = 0;                               // Enable verbose debug output
        $eMail->isSMTP();                                      // Set mailer to use SMTP
        $eMail->Host = 'smtp.qq.com';  // Specify main and backup SMTP servers
        $eMail->SMTPAuth = true;                               // Enable SMTP authentication
        $senderMail = explode("@", $sender->mail);
        $eMail->Username = $senderMail[0];                 // SMTP username
        $eMail->Password = $sender->mailPwd;                            // SMTP password
        $eMail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
        $eMail->Port = 465;
        $eMail->CharSet = 'utf-8';
//        echo $mail->Host;                                  // TCP port to connect to
        $eMail->setFrom($sender->mail, $sender->username);
        // $mail->addAddress('714080794@qq.com', 'Joe User');     // Add a recipient
        if (is_array($receiver)) {
            foreach ($receiver as $v) {
                $eMail->addAddress($v->mail);               // Name is optional
            }
        } else {
            $eMail->addAddress($receiver->mail);
        }

//         $mail->addReplyTo('714034323@qq.com', 'Information');
//         $mail->addCC('714034323@qq.com');
//         $mail->addBCC('714034323@qq.com');
//         $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//         $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
        $eMail->isHTML(true);                                  // Set email format to HTML

        $eMail->Subject = $Message->subject;
        $eMail->Body = $Message->body;
//        $eMail->AltBody = $Message->title;

        if (!$eMail->send()) {
            $errmsg = $eMail->ErrorInfo;
            throw new \Exception($errmsg);
        }
        return true;
    }

    protected function send()
    {

    }
}