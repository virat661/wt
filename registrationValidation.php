<!DOCTYPE html>
<html>

<head>
    <style>
        .error {
            color: #FF0001;
        }
    </style>
</head>

<body>

    <?php

    $nameErr = $emailErr = $mobilenoErr = $genderErr = $websiteErr = $agreeErr = "";
    $name = $email = $mobileno = $gender = $website = $agree = "";


    if ($_SERVER["REQUEST_METHOD"] == "POST") {


        if (empty($_POST["name"])) {
            $nameErr = "Name is required";
        } else {
            $name = $_POST["name"];

            if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
                $nameErr = "Only alphabets and white space are allowed";
            }
        }


        if (empty($_POST["email"])) {
            $emailErr = "Email is required";
        } else {
            $email = $_POST["email"];

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Invalid email format";
            }
        }
        if (empty($_POST["mobileno"])) {
            $mobilenoErr = "Mobile no is required";
        } else {
            $mobileno = $_POST["mobileno"];

            if (!preg_match("/^[0-9]*$/", $mobileno)) {
                $mobilenoErr = "Only numeric value is allowed.";
            }

            if (strlen($mobileno) != 10) {
                $mobilenoErr = "Mobile no must contain 10 digits.";
            }
        }

        if (empty($_POST["website"])) {
            $website = "";
        } else {
            $website =$_POST["website"];

            if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $website)) {
                $websiteErr = "Invalid URL";
            }
        }


        if (empty($_POST["gender"])) {
            $genderErr = "Gender is required";
        } else {
            $gender = $_POST["gender"];
        }


        if (!isset($_POST['agree'])) {
            $agreeErr = "Accept terms of services before submit.";
        } else {
            $agree = $_POST["agree"];
        }
    }

    ?>

    <h2>Registration Form</h2>
    <span class="error">* required field </span>
    <br><br>
    <form method="post" action="<?php $_SERVER["PHP_SELF"] ?>">
        Name:
        <input type="text" name="name">
        <span class="error">* <?php echo $nameErr; ?> </span>
        <br><br>
        E-mail:
        <input type="text" name="email">
        <span class="error">* <?php echo $emailErr; ?> </span>
        <br><br>
        Mobile No:
        <input type="text" name="mobileno">
        <span class="error">* <?php echo $mobilenoErr; ?> </span>
        <br><br>
        Website:
        <input type="text" name="website">
        <span class="error"><?php echo $websiteErr; ?> </span>
        <br><br>
        Gender:
        <input type="radio" name="gender" value="male"> Male
        <input type="radio" name="gender" value="female"> Female
        <input type="radio" name="gender" value="other"> Other
        <span class="error">* <?php echo $genderErr; ?> </span>
        <br><br>
        Agree to Terms of Service:
        <input type="checkbox" name="agree">
        <span class="error">* <?php echo $agreeErr; ?> </span>
        <br><br>
        <input type="submit" name="submit" value="Register">
        <br><br>
    </form>

    <?php
    if (isset($_POST['submit'])) {
        if ($nameErr == "" && $emailErr == "" && $mobilenoErr == "" && $genderErr == "" && $websiteErr == "" && $agreeErr == "") {
            echo "<h3 color = #FF0001> <b>You have sucessfully registered.</b> </h3>";
            echo "<h2>Your Input:</h2>";
            echo "Name: " . $name;
            echo "<br>";
            echo "Email: " . $email;
            echo "<br>";
            echo "Mobile No: " . $mobileno;
            echo "<br>";
            echo "Website: " . $website;
            echo "<br>";
            echo "Gender: " . $gender;


        } else {
            echo "<h3> <b>You didn't filled up the form correctly.</b> </h3>";
        }
    }
    ?>

</body>

</html>