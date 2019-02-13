<?php
/**
 * Created by IntelliJ IDEA.
 * User: Administrator
 * Date: 2019/2/13 0013
 * Time: 下午 12:08
 */

namespace Tiny\Notify;


class BaseMessage
{
    private $msg;

    public function __construct()
    {
    }

    public function getMessage()
    {
        return $this->msg;
    }

    public function __get($name)
    {
        if (isset($this->$name)) {
            return $this->$name;
        } else {
            $msg = "不存在属性值为" . $name . "的值";
            throw new \Exception($msg);
        }
    }

    public function __set($name, $value)
    {
        $this->$name = $value;
    }
}