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
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    h1 {
        color: whitesmoke;
        position: relative;
    }
</style>

<body>
    <h1>Welcome to Students Page</h1>
    <div class="contain">
        <a href="streg.php"><button>click Here for registration</button></a><br><br><br>
        <a href="markcard.php"><button>Click Here for viewing marks Card</button></a><br><br>
        <a href="login.php"><button>Logout</button></a>
    </div>
</body>

</html>