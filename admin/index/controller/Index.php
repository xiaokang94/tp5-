<?php

namespace app\index\controller;

use Tiny\Notify\MailMessage;
use Tiny\Notify\MailNotify\MailNotify;
use Tiny\Notify\MailObject;

class Index
{
    public function index()
    {
        require_once "E:/web/tiny/vendor/notify/autoload.php";
        $username = "系统发送";
        $sender = new MailObject($username, '41478184@qq.com', "vejohtiqnmpecada");
        $receiver = new MailObject($username, "1259039066@qq.com");

        $Message = new MailMessage();
        $Message->subject = '这是一个测试的邮件';
        $Message->body = "这是一个标题";


        $mailNotify = new MailNotify();
        $mailNotify->sendNotify($sender, $receiver, $Message);
    }
}
