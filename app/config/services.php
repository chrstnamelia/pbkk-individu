<?php

use Phalcon\Session\Manager as SessionManager;
use Phalcon\Session\Adapter\Stream as Session;
use Phalcon\Security;
use Phalcon\Mvc\Dispatcher;
use Phalcon\Events\Event;
use Phalcon\Events\Manager;
use Phalcon\Mvc\View;
use Phalcon\Mvc\ViewBaseInterface;
use Phalcon\Mvc\View\Engine\Volt;
use Phalcon\Flash\Direct as FlashDirect;
use Phalcon\Flash\Session as FlashSession;

$container['config'] = function() use ($config){
    return $config;
};

