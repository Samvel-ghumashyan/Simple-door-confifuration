<?php


namespace app\controllers;


use dconf\Controller;

class PageController extends Controller
{

    public function pageAction()
    {
        $allDone = $this->model->get_doorConf();
        $this->setMeta('Главная страница', 'Description...', 'keywords...');
        $this->set(compact('allDone'));
    }

}