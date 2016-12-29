<?php
require_once 'vendor/autoload.php';

$smtp_server = '10.122.8.19';
$smtp_port = 25;
$smtp_username = 'termostatoenua@viesgo.com';
$smtp_password = 'T3m0@E8979';

$form = ['termostatoenua@viesgo.com'];
$to = ['glopez@appforbrands'];

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
