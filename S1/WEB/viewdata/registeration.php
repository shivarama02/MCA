<!DOCTYPE html>
<html lang="en">
<head>
    <title>Registration</title>
</head>
<body>
    <center>
        <form action="" method="POST">
            <fieldset style="width:500px;height:370px;">
                <legend>Fill the form</legend><br>
                <table cellpadding="8px">
                    <tr>
                        <th>First name : </th>
                        <td><input type="text" name="fname"></td>
                    </tr>
                    <tr>
                        <th>Last name : </th>
                        <td><input type="text" name="lname"></td>
                    </tr>
                    <tr>
                        <th>Email id : </th>
                        <td><input type="email" name="email"></td>
                    </tr>
                    <tr>
                        <th>Mobile No. : </th>
                        <td><input type="text" name="mob"></td>
                    </tr>
                    <tr>
                        <th>Age : </th>
                        <td><select name="age" id="">
                            <option value="Below 18">Below 18</option>
                            <option value="18-21">18-21</option>
                            <option value="21-25">21-25</option>
                        </select></td>
                    </tr>
                    <tr>
                        <th>Gender : </th>
                        <td>
                            <input type="radio" name="gender" value="male">male
                            <input type="radio" name="gender" value="female">female
                            <input type="radio" name="gender" value="other">others
                        </td>
                    </tr>
                    <tr>
                        <th>Qualification : </th>
                        <td>
                            <input type="checkbox" name="qn[]" value="sslc">SSLC
                            <input type="checkbox" name="qn[]" value="plustwo">Plustwo
                            <input type="checkbox" name="qn[]" value="graduation">Graduation
                            <input type="checkbox" name="qn[]" value="pg">Post Graduation
                        </td>
                    </tr>
                </table><br>
                <input type="submit" value="submit" name="submit">
            </fieldset>
        </form>
        <?php
        session_start();
        if (isset($_POST['submit'])) {
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $email = $_POST['email'];
            $mob = $_POST['mob'];
            $age = $_POST['age'];
            $gender = $_POST['gender'];
            $qn = implode(", ", $_POST['qn']); // Handle multiple checkbox values

            $conn = mysqli_connect('localhost', 'root', '', 'babudev');

            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            } else {
                $q = "INSERT INTO info (firstname, lastname, email, mobile, age, gender, qualification) VALUES ('$fname', '$lname', '$email', '$mob', '$age', '$gender', '$qn')";
                $query = mysqli_query($conn, $q);

                if ($query) {
                    echo "<br><h3>Details successfully recorded.</h3>";
                } else {
                    echo "Failed!!!";
                }

                $q = "SELECT * FROM info WHERE firstname='$fname'";
                $query = mysqli_query($conn, $q);

                if (mysqli_num_rows($query) > 0) {
                    $row = mysqli_fetch_assoc($query);
                    $_SESSION["fname"] = $row['firstname'];
                    $_SESSION["lname"] = $row['lastname'];
                    $_SESSION["email"] = $row['email'];
                    $_SESSION["mob"] = $row['mobile'];
                    $_SESSION["age"] = $row['age'];
                    $_SESSION["gender"] = $row['gender'];
                    $_SESSION["qn"] = $row['qualification'];
                    header('Location: details.php');
                    exit();
                } else {
                    echo "Invalid username and password";
                }
                mysqli_close($conn);
            }
        }
        ?>
    </center>
</body>
</html>
