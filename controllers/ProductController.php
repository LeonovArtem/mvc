<?php

class ProductController
{
    public function actionList()
    {
        echo 'Метод:' . __METHOD__ . '<br>';
        echo 'Класс:' . __CLASS__;
        return true;
    }
}