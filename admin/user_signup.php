<?php
    require_once '.\scripts\load.php';

    if(isset($_POST['submit'])){
        $useremail = trim($_POST['useremail']);
        $username = trim($_POST['username']);
        $userfname = trim($_POST['firstname']);
        $userlname = trim($_POST['lastname']);
        $userdob = trim($_POST['DOB']);
        $userpassword = trim($_POST['password']);

        if(!empty($useremail) && !empty($userpassword) && !empty($userfname) && !empty($userlname) && !empty($userdob) && !empty($username)){
         
            $message = register($useremail, $username, $userfname, $userlname, $userdob, $userpassword);
        }else{
            $message = 'Please fill out the required fields';
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome to register page</title>
</head>
<body>
    <?php echo !empty($message)?$message:' '; ?>
    <form action="user_signup.php" method="post">
        <label>Email:</label><br>
        <input type="text" name="useremail" value="" /><br>

        <label>Username:</label><br>
        <input type="text" name="username" value="" /><br>

        <label>First Name:</label><br>
        <input type="text" name="firstname" value="" /><br>

        <label>Last Name:</label><br>
        <input type="text" name="lastname" value="" /><br>

        <label>Date Of Birth:</label><br>
        <input type="text" name="DOB" value="" /><br>

        <label>Password:</label><br>
        <input type="text" name="password" value="" /><br>

        <button name="submit">Submit</button>
    </form>
</body>
</html>