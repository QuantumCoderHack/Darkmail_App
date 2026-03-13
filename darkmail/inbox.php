<?php
// Kullanıcının seçtiği email adı
$email_name = $_GET['email'] ?? '';
$email_name = strtolower(preg_replace("/[^a-z0-9]/", "", $email_name));

if ($email_name == "") {
    header("Location: index.php");
    exit;
}

$email = $email_name . "@temp.local";

// Mail verilerini oku
$mails = [];
if(file_exists("data/mails.json")){
    $mails = json_decode(file_get_contents("data/mails.json"), true);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title><?php echo $email ?> Inbox</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-4">

<div class="row mb-3">
    <div class="col-md-12">
        <div class="card shadow">
            <div class="card-body">
                <h5 class="mb-3">Your Temporary Email</h5>
                <div class="input-group">
                    <input class="form-control" value="<?php echo $email ?>" readonly>
                    <a href="index.php" class="btn btn-primary">New Inbox</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">

<!-- Mail Gönderme Formu -->
<div class="col-md-4">
    <div class="card shadow">
        <div class="card-header">Send Email</div>
        <div class="card-body">
            <form action="send.php" method="POST">
                <input type="hidden" name="from" value="<?php echo $email ?>">
                <div class="mb-3">
                    <label class="form-label">To</label>
                    <input type="text" name="to" class="form-control" placeholder="receiver@temp.local" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Subject</label>
                    <input type="text" name="subject" class="form-control" placeholder="Email subject">
                </div>
                <div class="mb-3">
                    <label class="form-label">Message</label>
                    <textarea name="body" class="form-control" rows="5"></textarea>
                </div>
                <button class="btn btn-success w-100">Send</button>
            </form>
        </div>
    </div>
</div>

<!-- Inbox -->
<div class="col-md-8">
    <div class="card shadow">
        <div class="card-header">Inbox</div>
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>From</th>
                        <th>Subject</th>
                        <th>Message</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $found = false;
                    foreach($mails as $mail){
                        if($mail['to'] == $email){
                            $found = true;
                            echo "<tr>";
                            echo "<td>".htmlspecialchars($mail['from'])."</td>";
                            echo "<td>".htmlspecialchars($mail['subject'])."</td>";
                            echo "<td>".htmlspecialchars($mail['body'])."</td>";
                            echo "</tr>";
                        }
                    }
                    if(!$found){
                        echo "<tr><td colspan='3' class='text-center text-muted'>No mails yet</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>
</div>

</body>
</html>