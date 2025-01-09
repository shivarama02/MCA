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
        padding-left: 60px;
        padding-right: 60px;
        padding-top: 40px;
        padding-bottom: 30px;
        border: rgba(83, 109, 255, 0.47) solid 2px;
    }

    h1 {
        color: whitesmoke;
        position: relative;
    }
</style>

<body>
    <h1>Welcome to Mark Entry</h1>
    <form action="" method="post">
        <div class="contain">
            <table>
                <td><label for="">Select Student to Enter Marks : </label></td>
                <td><select name="opt" id="">
                        <?php
                        $con = mysqli_connect("localhost", "root", "", "deepak");
                        if ($con) {
                            $query = "SELECT ID from students WHERE 1";
                            $result = mysqli_query($con, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                foreach ($row as $key => $value) {
                                    echo "<option value=$value>$value</option>";
                                }
                            }
                        }
                        ?>
                    </select></td>
                </tr>
                <tr>
                    <td><label>Enter Course Code </label></td>
                    <td><input type="text" name="course"></td>
                </tr>
                <tr>
                    <td><label for="">Enter External marks</label></td>
                    <td><input type="Number" name="internal" max="40"></td>
                </tr>
                <tr>
                    <td><label for="">Enter External Marks</label></td>
                    <td><input type="Number" name="external" max="60"></td>
                </tr>
                <tr>
                    <td align ="center" colspan="2"><input type="submit" name="sub"></td>
                </tr>
            </table>
        </div>
    </form>
    <?php
    if (isset($_POST['sub'])) {
        $course = $_POST['course'];
        $intern = $_POST['internal'];
        $extern = $_POST['external'];
        $id = $_POST['opt'];

        $tot = $intern + $extern;
        if ($tot > 90) {
            $grade = 'S';
        } elseif ($tot > 80) {
            $grade = 'A';
        } elseif ($tot > 70) {
            $grade = 'B';
        } elseif ($tot > 60) {
            $grade = 'C';
        } elseif ($tot > 50) {
            $grade = 'P';
        } else {
            $grade = 'F';
        }


        $entry = "UPDATE students SET CourseCode='$course', Internal='$intern', External='$extern', Total='$tot', Grade='$grade' WHERE ID='$id'";
        $enter = mysqli_query($con, $entry);

        if ($enter) {
            echo '<h4 color="red">Mark Entry Succesfull</h4>';
            echo "<a href='admin.php'><button>back to admin</button></a>";
        } else {
            echo "Failed Update: " . mysqli_error($con);
        }
    }
    ?>
</body>

</html>