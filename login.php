<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Card</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="css/stylelogin1.css">
</head>

<body>


    <form action="cek_login.php" method="post"></form>
    <div id="card">
        <div id="card-content">
            <div id="card-title">
                <h2>Welcome Admin</h2>
                <div class="underline-title"></div>
            </div>
            <form action="cek_login.php" method="post" class="form">
                <label for="username" style="padding-top:13px">
                    &nbsp;username
                </label>
                <input id="username" class="form-content" type="username" name="username" autocomplete="on" required />
                <div class="form-border"></div>
                <label for="password" style="padding-top:22px">&nbsp;Password
                </label>
                <input id="password" class="form-content" type="password" name="password" required />
                <div class="form-border"></div>
                <a href="#">
                    <legend id="forgot-pass">Forgot password?</legend>
                </a>
                <input id="submit-btn" type="submit" name="submit" value="LOGIN" />
                <br>
                <?php
                if (isset($_GET['pesan'])) {
                    if ($_GET['pesan'] == "gagal") {
                        echo "<div class='alert'>Username dan Password Salah!</div>";
                    }
                }
                ?>

            </form>
        </div>
    </div>

</body>

</html>