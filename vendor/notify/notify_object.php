<?php
/**
 * Created by IntelliJ IDEA.
 * User: Administrator
 * Date: 2019/2/13 0013
 * Time: 上午 11:39
 */

namespace Tiny\Notify;


class NotifyObject
{
    protected $username;

    public function __construct($username)
    {
        $this->username = $username;
    }

    public function __get($name)
    {
        if (isset($this->$name)) {
            return $this->$name;
        } else {
            throw new \Exception("不存在属性" . $name . "的值");
        }
    }

    public function __set($name, $value)
    {
        $this->$name = $value;
    }
}