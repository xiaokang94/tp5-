<?php
/**
 * Created by IntelliJ IDEA.
 * User: Administrator
 * Date: 2019/2/13 0013
 * Time: 下午 5:24
 */

namespace Tiny\Notify;


class MailObject extends NotifyObject
{
    protected $mailPwd;
    protected $mail;

    public function __construct($username, $mail, $mailPwd = '')
    {
        parent::__construct($username);
        $this->mail = $mail;
        $this->mailPwd = $mailPwd;
    }
}