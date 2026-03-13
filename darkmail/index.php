<!DOCTYPE html>
<html>
<head>
    <title>Temp Mail</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">

<div class="card shadow mx-auto" style="max-width: 500px;">
    <div class="card-body text-center">
        <h3 class="mb-3">Create Your Temporary Email</h3>
        <form action="inbox.php" method="GET">
            <div class="input-group mb-3">
                <input type="text" name="email" class="form-control" placeholder="Enter email name" required>
                <span class="input-group-text">@temp.local</span>
            </div>
            <button class="btn btn-primary w-100">Create Inbox</button>
        </form>
    </div>
</div>

</div>
</body>
</html>