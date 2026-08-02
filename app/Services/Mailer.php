<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once __DIR__ . '/../../vendor/autoload.php';

class Mailer
{
    private array $config;

    public function __construct()
    {
        $this->config = require __DIR__ . '/../Config/mail.php';
    }

    public function send($name, $email, $subject, $message): bool
    {
        $mail = new PHPMailer(true);

        try {

            $mail->isSMTP();

            $mail->Host = $this->config['host'];

            $mail->SMTPAuth = true;

            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

            $mail->Port = (int) $this->config['port'];

            $mail->Username = $this->config['username'];

            $mail->Password = $this->config['password'];

            $mail->setFrom(
                $this->config['from'],
                'David Portfolio'
            );

            $mail->addAddress(
                $this->config['to']
            );

            $mail->addReplyTo(
                $email,
                $name
            );

            $mail->isHTML(false);

            $mail->Subject = $subject;

            $mail->Body =
                "Name: {$name}\n\n" .
                "Email: {$email}\n\n" .
                "Subject: {$subject}\n\n" .
                "Message:\n{$message}";

            return $mail->send();

        } catch (Exception $e) {

            // Log the error instead of displaying it to users
            error_log('PHPMailer Error: ' . $mail->ErrorInfo);
            error_log('Exception: ' . $e->getMessage());

            return false;
        }
    }
}