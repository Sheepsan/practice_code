<?php
/**
 * Created by PhpStorm.
 * User: im
 * Date: 2018/02/01
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
