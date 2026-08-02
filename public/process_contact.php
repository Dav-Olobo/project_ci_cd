<?php

require_once __DIR__ . '/../app/bootstrap.php';
require_once __DIR__ . '/../app/Validators/ContactValidator.php';
require_once __DIR__ . '/../app/Services/Mailer.php';

session_start();

$validator = new ContactValidator();

$errors = $validator->validate($_POST);

if (!empty($errors)) {

    $_SESSION['errors'] = $errors;

    $_SESSION['old'] = $_POST;

    header('Location: contact.php');

    exit;
}

$mailer = new Mailer();

$sent = $mailer->send(

    $_POST['name'],

    $_POST['email'],

    $_POST['subject'],

    $_POST['message']

);

if ($sent) {

    $_SESSION['success'] =

        "Your message has been sent successfully!";

} else {

    $_SESSION['errors'] = [

        "Unable to send your message."

    ];

    $_SESSION['old'] = $_POST;
}

header('Location: contact.php');

exit;