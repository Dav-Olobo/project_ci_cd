<?php

return [

    'host' => $_ENV['MAIL_HOST'],

    'port' => (int) $_ENV['MAIL_PORT'],

    'username' => $_ENV['MAIL_USERNAME'],

    'password' => $_ENV['MAIL_PASSWORD'],

    'from' => $_ENV['MAIL_FROM'],

    'to' => $_ENV['MAIL_TO']

];