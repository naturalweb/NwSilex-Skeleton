<?php
class HomeController extends BaseController
{
    public function getIndex()
    {
        return $this->twig('home/index.html');
    }
}
