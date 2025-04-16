<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>CAPTCHA Verification</title>
</head>

<body>
    <h1>CAPTCHA Verification</h1>
    <form action="verify.php" method="post">
        <img src="captcha.php" alt="CAPTCHA Image">
        <br>
        <input type="text" name="captcha" placeholder="Enter the text above">
        <button type="submit">Submit</button>
    </form>
</body>

</html>