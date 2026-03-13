<?php

$id = $_GET['id'] ?? 0;

$mails = json_decode(file_get_contents("data/mails.json"), true);

$mail = $mails[$id] ?? null;

?>

<!DOCTYPE html>
<html>
<head>

<title>Mail</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

<div class="card shadow">

<div class="card-header">
<?php echo $mail['subject'] ?>
</div>

<div class="card-body">

<p><strong>From:</strong> <?php echo $mail['from'] ?></p>

<hr>

<p><?php echo $mail['body'] ?></p>

</div>

</div>

</div>

</body>
</html>