<?php
/**
 * Created by PhpStorm.
 * User: primera
 * Date: 2017/08/27
 * Time: 16:20
 */

Class Hello{
    //メンバ変数
    private $message=null;

    public function __construct()
    {
        $this->message="Hello";
    }

    public function say(){
        echo $this->message;
    }
}

$obj=new Hello();
$obj->say();
