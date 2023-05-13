<?php

use banana\Container;
use banana\Controllers\UserController;
use banana\FileLogger;
use banana\LoggerInterface;
use banana\Repository\UserRepository;


return [
    UserController::class => function (Container $container){
        $userRepository = $container->get(UserRepository::class);

        return new UserController($userRepository);
    },


    UserRepository::class => function (Container $container){
        $connection = $container->get('db');

        return new UserRepository($connection);
    },


    LoggerInterface::class => function () {

        return new FileLogger();
    },


    'db' => function(Container $container) {
        $settings = $container->get('settings');
        $host = $settings['db']['host'];
        $name = $settings['db']['dbname'];
        $user = $settings['db']['username'];
        $password = $settings['db']['password'];

        return new PDO("pgsql:host={$host};dbname={$name}", "{$user}", "{$password}");
    }

];