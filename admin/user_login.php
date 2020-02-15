<?php
    require_once '.\scripts\load.php';

    if(isset($_POST['submit'])){
        $username = trim($_POST['username']);
        $userpassword = trim($_POST['password']);

        if(!empty($username) && !empty($userpassword)){
           
            $message = login($username, $userpassword);
        }else{
            $message = 'Please fill out the required fields';
        }
    }if(isset($_POST['register'])){
        redirect_to('user_signup.php');
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome to Login page</title>
</head>
<body>
    <?php echo !empty($message)?$message:' '; ?>
    <form action="user_login.php" method="post">
        <label>Username:</label><br>
        <input type="text" name="username" value="" /><br>

        <label>Password:</label><br>
        <input type="text" name="password" value="" /><br>

        <button name="submit">Submit</button>

        <button name="register">register</button>
    </form>
</body>
</html>