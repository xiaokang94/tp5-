<?php
/**
 * Created by IntelliJ IDEA.
 * User: Administrator
 * Date: 2019/2/13 0013
 * Time: 下午 7:56
 */

namespace Tiny\Notify;

class MailMessage extends BaseMessage
{
    public $subject;
    public $body;

    public function __construct()
    {
        parent::__construct();
    }
}