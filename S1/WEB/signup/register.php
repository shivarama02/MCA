<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <center>
    <h2>REGISTER NOW</h2><br>
    <form action="" method="POST">
        <table>
            <tr>
                <td>Name :</td>
                <td><input type="text" name="name" required></td>
            </tr>
            <tr>
                <td>Email :</td>
                <td><input type="email" name="email" required></td>
            </tr>
            <tr>
                <td>Password :</td>
                <td><input type="password" name="password" required></td>
            </tr>
        </table><br>
        <input type="submit" name="register" value="Register">
        <h5>Have already registered?<a href="login.php">Login!</a></h5>
    </form>

    <?php
    if (isset($_POST['register'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $conn = mysqli_connect('localhost', 'root', '', 'babudev');

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        } else {
            $q = "INSERT INTO details (name, email, password) VALUES ('$name', '$email', '$password')";
            $query = mysqli_query($conn, $q);

            if ($query) {
                echo "<br><h3>Successfully registered.</h3>";
            } else {
                echo "Registration Failed!!!";
            }
            mysqli_close($conn);
        }
    }
    ?>
    </center>
</body>
</html>
