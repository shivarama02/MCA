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
    table{
        align-items: center;
        background-color: rgba(255, 255, 255, 0.82);
        padding: 50px;
        border-collapse: collapse;
        width: 460px;
        height: 200px;
    }
    h1 {
        color: whitesmoke;
        position: relative;
    }

</style>

<body>
    <?php
    session_start();
    $Id = $_SESSION['qwe'];

    $con = mysqli_connect("localhost", "root", "", "deepak");

    if ($con) {
        $query = "SELECT CourseCode, Internal, External, Total, Grade FROM students WHERE ID='$Id'";
        $result = mysqli_query($con, $query);

        if (!$result) {
            echo "fetching Details Failed";
        } else {
            $row = mysqli_fetch_assoc($result);
            $course = $row["CourseCode"];
            $int = $row["Internal"];
            $ext = $row["External"];
            $Tot = $row["Total"];
            $grad = $row["Grade"];

            echo "<h1>Welcome to ScoreCard</h1>";

            echo "<table border='1px'>";
            echo "<tr>";
            echo "<td align='center' colspan='2'>Your Marks for $course</td>";
            echo "</tr>";
            echo "<tr><td align='center'>Internal marks</td><td align='center'>$int</td></tr>";
            echo "<tr><td align='center'>External marks</td><td align='center'>$ext</td></tr>";
            echo "<tr><td align='center'>Total marks</td><td align='center'>$Tot</td></tr>";
            echo "<tr><td align='center'>Grade</td><td align='center'>$grad</td></tr>";
            echo"<tr><td align='center' colspan='2'><a href='login.php'><button>Logout</button></a></td></tr>";
            echo "</table>";
        }
    }
    ?>
</body>

</html>