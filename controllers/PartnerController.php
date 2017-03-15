<?php

class  PartnerController
{
    public function actionAuthorization()
    {
        echo 'Метод:' . __METHOD__.'<br>';
        echo 'Класс:'.__CLASS__;
        return true;
    }
}
$ob=new PartnerController();
$actionAuthorization='actionAuthorization';
$ob->$actionAuthorization();