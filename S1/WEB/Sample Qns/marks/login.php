<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<style>
    body {
        background-color: black;
        color: black;
        width: 98%;
        height: 80vh;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    .contain {
        background-color: rgba(255, 255, 255, 0.47);
        padding: 50px;
        border: rgba(83, 109, 255, 0.47) solid 2px;
    }

    h1 {
        color: whitesmoke;
        position: relative;
    }
</style>

<body>
    <h1>Student and Admin Login</h1>
    <div class="contain">
        <form action="" method="post">
            <table>
                <tr>
                    <td><label for="">User Name</label></td>
                    <td><input type="text" name="Uname"></td>
                </tr>
                <tr>
                    <td><label for="">Password</label></td>
                    <td><input type="password" name="pass"></td>
                </tr>
                <tr>
                    <td><br></td>
                </tr>
                <tr>
                    <td align="center" colspan="2"><input type="submit" name="sub"></td>
                </tr>
            </table>
    </div>
    </form>

    <?php
    session_start();

    if (isset($_POST['sub'])) {
        $user = $_POST['Uname'];
        $pass = $_POST['pass'];

        if ($user == "admin" and $pass == "admin") {
            header("Location: admin.php");
        } else {
            $conn = mysqli_connect("localhost", "root", "", "deepak");

            if (!$conn) {
                echo "Connection has Failed";
            } else {
                $sql = "SELECT ID,Password FROM students WHERE ID='$user'";
                $result = mysqli_query($conn, $sql);

                $row = mysqli_fetch_assoc($result);
                if (mysqli_num_rows($result) != 0) {
                    if ($row['Password'] == $pass) {
                        echo "$row[ID]";
                        $_SESSION["qwe"] = $row['ID'];
                        header("Location: student.php");
                    } else {
                        echo "<h3 style={color:red;}>Password Inccorrect</h3>";
                    }
                } else {
                    echo "<h3 style={color:red;}>Invalid User</h3>";
                }
            }
        }
        mysqli_close( $con );
    }
    ?>
</body>

</html>