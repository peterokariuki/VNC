<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VNC Admin</title>
    <link rel="stylesheet" href="css/admin.css">
</head>

<body>

    <main>
        <div class="login-form">
            <?php if (isset($_GET['error'])) {
                if ($_GET['error'] == 'emptyinputs') {
                    echo '<div class="errorsignin">Please Fill in all fields</div>';
                } elseif ($_GET['error'] == 'wrongdetails') {
                    echo '<div class="errorsignin">Wrong email or password</div>';
                }
            } ?>
            <div class="login-title">Admin Sign In</div>
            <form class="input-fields" method="POST" action="logic/login.inc.php">
                <input type="email" name="email" placeholder="E-Mail">
                <input type="password" name="password" placeholder="Password">
                <button type="submit" name="login" id="login-btn">Sign In</button>
            </form>
        </div>
    </main>

</body>

</html>