<?php
/**
 * Created by IntelliJ IDEA.
 * User: Administrator
 * Date: 2019/2/13 0013
 * Time: 上午 11:26
 */

namespace Tiny\Notify;

abstract class BaseNotify
{
    // 异步通知抽象类
    abstract public function sendNotify(NotifyObject $from, NotifyObject $dst, BaseMessage $msg);
}