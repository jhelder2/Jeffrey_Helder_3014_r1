<?php
    require_once 'admin\scripts\load.php';

    if(isset($_POST['submit'])){
        $username = trim($_POST['username']);
        $userpassword = trim($_POST['password']);

        if(!empty($username) && !empty($userpassword)){
           
            $message = login($username, $userpassword);
        }else{
            $message = 'Please fill out the required fields';
        }
    }if(isset($_POST['register'])){
        redirect_to('admin/user_signup.php');
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <title>Welcome to Login page</title>
</head>
<body>
    
    <form action="index.php" method="post">
        <p><?php echo !empty($message)?$message:' '; ?></p>
        <label>Username:</label>
        <input type="text" name="username" value="" /><br>

        <label>Password:</label>
        <input type="text" name="password" value="" /><br>

        <button name="submit">Submit</button>

        <button name="register">register</button>
    </form>
</body>
</html>