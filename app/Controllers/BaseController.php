<?php

namespace App\Controllers\PublicController;

use App\Classes\CustomerData\UserSession;
Use eftec\bladeone\BladeOne;

class BaseController
{
    use UserSession;

    protected function view($view, $data = [])
    {
        $views = realpath(__DIR__ . '../../../resources/views');
        $cache = realpath(__DIR__ . '../../../resources/cache');
        $blade = new BladeOne($views, $cache, BladeOne::MODE_DEBUG);
        if($this->isLogged())
        {
            $blade->setAuth($this->user()->username,'user');
        }
        return $blade->run($view, $data);
    }
}