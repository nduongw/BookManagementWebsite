<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
</head>

<body>
    <?php
    session_start();

    include('../shared/db_connection.php');

    $sent = isset($_POST["sent"]) && $_POST["sent"] = 1;
    $error = [];
    $valid = 0;

    if ($sent) {
        $username = $_POST['account'];

        if ($username == '') {
            $error['account'] = "Ban chua nhap tai khoan";
        }

        if ($_POST['password'] == '') {
            $error['password'] = "Ban chua nhap mat khau";
        }

        $password = md5($_POST['password']);

        if ($username != '' && $_POST['password'] != '') {
            $query = mysqli_query($dbcon, "SELECT username, password FROM customers WHERE username = '$username' ");
            if (mysqli_num_rows($query) == 0) {
                echo  "<p>" . "Tai khoang khong ton tai" . "</p>";
            } else {
                $row = mysqli_fetch_row($query);

                if ($password != $row['password']) {
                    echo "<p>" . "Mat khau khong chinh xac" . "</p>";
                } else {
                    $user = mysqli_query($dbcon, "SELECT * FROM customers WHERE username = '$username'");
                    $_SESSION['user'] = $user;
                    $valid = 1;
                    header("Location: ../shared/homepage.php");
                }
            }
        }
    }

    if (!$sent || count($error) > 0 || $valid == 0) {
    ?>

        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
            <input type="hidden" value='1' name='sent'>

            <p>
                Account <input type="text" name='account' value="<?= @$_POST["account"] ?>">
                <?php if (isset($error['account'])) echo "Ban chua nhap tai khoan" ?>
            </p>

            <p>
                Password <input type="password" name='password' value="<?= @$_POST["password"] ?>">
                <?php if (isset($error['password'])) echo "Ban chua nhap mat khau" ?>
            </p>

            <p><input type="submit" name="login" value="Log in"></p>
            <a href="register.php">Register</a>
        </form>

    <?php
    }
    ?>


</body>

</html>