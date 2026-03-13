<?php
$from = $_POST['from'] ?? '';
$to = $_POST['to'] ?? '';
$subject = $_POST['subject'] ?? '';
$body = $_POST['body'] ?? '';

if($from == "" || $to == ""){
    header("Location: index.php");
    exit;
}

$file = "data/mails.json";
$mails = [];

if(file_exists($file)){
    $mails = json_decode(file_get_contents($file), true);
}

$mails[] = [
    "from" => $from,
    "to" => $to,
    "subject" => $subject,
    "body" => $body
];

file_put_contents($file, json_encode($mails, JSON_PRETTY_PRINT));

// Maili gönderen inbox'a geri yönlendir
header("Location: inbox.php?email=" . preg_replace("/@.*$/", "", $from));
exit;