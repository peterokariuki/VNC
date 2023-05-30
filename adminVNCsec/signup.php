<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VNC SignUp</title>
    <link rel="stylesheet" href="css/signup.css">
</head>

<body>

    <main>
        <div class="login-form">
            <?php
            if (isset($_GET['error'])) {
                if ($_GET['error'] == 'emptyinputs') {
                    echo '<div class="errorsignin">Please Fill in all fields</div>';
                } else if ($_GET['error'] == "invalidemail") {
                    echo '<div class="errorsignin">Please enter a valid email</div>';
                } else if ($_GET['error'] == "invalidname") {
                    echo '<div class="errorsignin">Use letters only in the name</div>';
                } else if ($_GET['error'] == "notmatchingpasswords") {
                    echo '<div class="errorsignin">Passwords do not match</div>';
                }
            } ?>
            <div class="login-title">Admin Sign Up</div>
            <form class="input-fields" method="POST" action="logic/signup.inc.php">
                <input type="text" placeholder="Name" name="name">
                <input type="email" name="email" placeholder="E-Mail">
                <input type="text" name="role" placeholder="Role">
                <input type="password" name="password" placeholder="Password">
                <input type="password" name="rptpassword" placeholder="Repeat Password">
                <button type="submit" id="login-btn" name="signup">Sign Up</button>
            </form>
        </div>
    </main>

</body>

</html>