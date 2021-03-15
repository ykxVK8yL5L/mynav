<?php


namespace app;


class Index extends Base
{

    public function index() {
        return $this->fetch('view/index');
    }

}