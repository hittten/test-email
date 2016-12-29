<?php
require_once 'vendor/autoload.php';

$smtp_server = '127.0.0.1';
$smtp_port = 25;
$smtp_username = '';
$smtp_password = '';

$form = ['from@127.0.0.1'];
$to = [''];

$transport = Swift_SmtpTransport::newInstance($smtp_server, $smtp_port)
    ->setUsername($smtp_username)
    ->setPassword($smtp_password)
;

$mailer = Swift_Mailer::newInstance($transport);

$message = Swift_Message::newInstance('Wonderful Subject')
    ->setFrom($form)
    ->setTo($to)
    ->setBody('Here is the message itself')
;
try{
    $result = $mailer->send($message);
    ldd($result);
} catch (\Exception $exception) {
    ldd($exception);
}
