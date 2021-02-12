<html>

<head>
    <title>User Details</title>
</head>

<body>

    <?php

    $userId = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $userId = $_POST["userId"];
    }
    ?>


    <center>
        <h1>User Information</h1>
    </center>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <center>

            UserId : <input type="text" name="userId">
            <input type="submit" name="submit" value="Submit">
        </center>
    </form>




    <?php
    $exist = 0;
    $data = simplexml_load_file("user.xml") or die("Failed to load");
    foreach ($data->children() as $user) {
        if ($user->userid == $userId) {
            $exist = 1;
            echo "<br>";
            echo "<center> <b> UserId</b> :  $user->userid </center><br> ";
            echo "<center><b>UserName</b> :  $user->username </center><br>";
            echo "<center><b>Address</b> :  $user->address </center><br>";
            echo "<center><b>Mobile Number</b> :  $user->phone</center><br>";
            echo "<center><b>Email-Id </b>:  $user->email</center> <br>";
        }
    }
    if ($exist == 0) {
        echo "<br>";
        echo "<center> Sorry !! , User details does not exist.</center>";
    }

    ?>
</body>

</html>