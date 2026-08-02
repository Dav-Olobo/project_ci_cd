<?php

// For Render Platform deployment, you can use the following SMTP settings for testing email sending:
// - SMTP Host: smtp.mailtrap.io  

require_once __DIR__ . '/../vendor/autoload.php';

if (file_exists(__DIR__ . '/../.env')) {
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
    $dotenv->load();
}

// For localhost development, you can use the following SMTP settings for testing email sending:
// - SMTP Host: sandbox.smtp.mailtrap.io

// require_once __DIR__ . '/../vendor/autoload.php';

// $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
// $dotenv->load();