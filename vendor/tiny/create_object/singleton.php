<?php
/**
 * Created by IntelliJ IDEA.
 * User: kangkang94
 * Date: 2019-02-13
 * Time: 23:06
 * 生成对象之单例模式
 * 思想：生成一个且只生成一个对象实例的特殊类
 * 原则：把对象实例化的工作委托出来
 * 工厂就是负责生成对象的类或方法
 *
 * 单例模式出现的背景: 全局变量乱用，命名空间冲突 全局变量覆盖，不使用全局变量时，又会出现耦合问题
 *
 * 特点：
 *  1. 被系统中的任何对象使用
 *  2. 不能错误地覆写，
 *  3. 系统中只有一个 并对象可以直接访问
 *
 *  笔记： 不能外部实例化 可全局访问
 *
 *  静态方法不能访问普通属性、只能被类调用
 *
 *  缺点：调试不好调试
 *
 */

namespace Tiny\Singleton;


class Singleton
{
    private static $instance;

    private function __construct()
    {
    }

    public function getInstance()
    {
        if (empty(self::$instance)) {
            self::$instance = new Singleton();
        }
        return self::$instance;
    }


}