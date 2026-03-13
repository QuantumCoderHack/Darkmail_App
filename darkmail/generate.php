<?php

$name = $_POST['name'] ?? '';

$name = strtolower(trim($name));

if($name == ""){
header("Location: index.php");
exit;
}

$email = $name . "@temp.local";

header("Location: inbox.php?email=".$email);
exit;