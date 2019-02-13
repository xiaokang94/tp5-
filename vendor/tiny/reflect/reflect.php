<?php
/**
 * Created by IntelliJ IDEA.
 * User: kangkang94
 * Date: 2019-02-11
 * Time: 22:33
 * 包含反射类的基本方法
 * 使用反射api 可以在运行时访问对象、函数、和脚本中的扩展信息
 * 根据命名规则创建一个调用模板类中方法的框架
 */

namespace Tiny\Reflect\Reflect;


class Reflect
{

    public function getClassFileByObjName($objName)
    {
        $RC = new \ReflectionClass($objName);

    }

    /**
     * @param $objName
     * @throws \ReflectionException
     */
    public function echoClassInfoByObjName($objName)
    {
        $Rc = new \ReflectionClass($objName);
        \Reflection::export($Rc);
    }

    public function getClassMethodAll($objName)
    {
        $methodInfoList = array();
        $Rc = new \Reflection($objName);
        $RcMethods = $Rc->getMethods();

        foreach ($RcMethods as $method) {
            $methodInfo = array();
            $methodName = $method->getName();
            $methodInfo = array(
                'methodData' => $this->getMethodData($method),
                'methodname' => $methodName,
                'filepath' => $method->getFileName(),
                'startLine' => $method->getStartLine(),
                'endLine' => $method->getEndLine(),
            );
            $methodInfoList[$methodName] = $methodInfo;
        }

        return $methodInfoList;
    }

    protected function getMethodData(\ReflectionMethod $RcMethod)
    {
        $methodData = array(
            'isUserDefined' => array('value' => $RcMethod->isUserDefined(), 'desc' => '是否是用户定义类'),
            'isInternal' => array('value' => $RcMethod->isInternal(), 'desc' => '是否内置类'),
            'isAbstract' => array('value' => $RcMethod->isAbstract(), 'desc' => '是否是抽象类'),
            'isFinal' => array('value' => $RcMethod->isFinal(), 'desc' => '是否禁止继承'),
            'isStatic' => array('value' => $RcMethod->isStatic(), 'desc' => '是否是静态方法'),
            'isConstructor' => array('value' => $RcMethod->isConstructor(), 'desc' => '是否是构造函数'),
            'returnsReference' => array('value' => $RcMethod->returnsReference(), 'desc' => '是否是返回引用即方法名前有&'),
            'isPublic' => array('value' => $RcMethod->isPublic(), 'desc' => '是否是公共方法'),
            'isPrivate' => array('value' => $RcMethod->isPrivate(), 'desc' => '是否是私有方法'),
            'isProtected' => array('value' => $RcMethod->isProtected(), 'desc' => '是否是受保护的方法'),
        );
        return $methodData;
    }

    public function getMethodParametersAll(\Reflection $Rc, $methodName)
    {
        $method = $Rc->getMethod($methodName);

        $params = $method->getParameters();
        $list = array();
        foreach ($params as $param) {
            $name = $Rc->getName();
            $postion = $Rc->getPosition();
            $paramInfo = array(
                'paramname' => $Rc->getName(),
                'position' => $Rc->getPosition(),
                'paramdata' => $this->getMethodParamData($param)
            );
            $list[$name] = $paramInfo;
        }
        return $list;
    }

    protected function getMethodParamData(\ReflectionParameter $RcParam)
    {
        $paramData = array();
        $declaringclass = $RcParam->getDeclaringClass();
        $name = $RcParam->getName();
        $class = $RcParam->getClass();
        $position = $RcParam->getPosition();
        $classname = '';
        if (!empty($class)) {
            $classname = $class->getName();
            $isObject = true;
            $objectDesc = $classname;
        } else {
            $isObject = false;
            $objectDesc = '';
        }
        $paramData = array(
            'isObject' => array('value' => $isObject, 'desc' => "是否为对象（$classname)"),
            'isPassedByReference' => array('value' => $RcParam->isPassedByReference(), 'desc' => '是否是引用'),
            'isDefaultValueAvailable' => array('value' => $RcParam->isDefaultValueAvailable(), 'desc' => '是否默认值可用')
        );
        return $paramData;
    }

    protected function getClassData(\Reflection $Rc)
    {
        $name = $Rc->getName();

        $classData = array(
            'isUserDefined' => array('value' => $Rc->isUserDefined(), 'desc' => '是否是用户定义类'),
            'isInternal' => array('value' => $Rc->isInternal(), 'desc' => '是否内置类'),
            'isAbstract' => array('value' => $Rc->isAbstract(), 'desc' => '是否是抽象类'),
            'isFinal' => array('value' => $Rc->isFinal(), 'desc' => '是否禁止继承'),
            'isInstantiable' => array('value' => $Rc->isInstantiable(), 'desc' => '是否能得到类的实例'),
            'isInterface' => array('value' => $Rc->isInterface(), 'desc' => '是否是接口'),
        );
        return $classData;
    }
}