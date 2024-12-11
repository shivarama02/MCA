<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<center>
<body>
    <h2><u>LOGIN</u></h2>
    <form action="" method="POST">
        <table>
            <tr>
                <th>Enter your email:</th>
                <td><input type="email" name="email" placeholder="example@gmail.com" required></td>
            </tr>
            <tr>
                <th>Enter your password:</th>
                <td><input type="password" name="password" placeholder="*******" required></td>
            </tr>
        </table><br>
        <input type="submit" name="login" value="Login"><br>
        <h5>Not having an account? <a href="register.php">Register!</a></h5>
    </form>
    <?php
    session_start();
    if (isset($_POST['login'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $conn = mysqli_connect('localhost', 'root', '', 'babudev');
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        } else {
            $q = "SELECT * FROM details WHERE email='$email' AND password='$password'";
            $query = mysqli_query($conn, $q);

            if (mysqli_num_rows($query) > 0) {
                $row = mysqli_fetch_assoc($query);
                $_SESSION["name"] = $row['name'];
                header('Location: welcome.php');
                exit();
            } else {
                echo "Invalid username and password";
            }
            mysqli_close($conn);
        }
    }
    ?>
</body>
</center>
</html>
